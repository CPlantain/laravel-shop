<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getProductsPivot(Product $product)
    {
        return $this->products()->where('product_id', $product->id)->first()->pivot;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public static function getCurrent()
    {
        if (Auth::check()) {
            $order = self::where('user_id', Auth::id())
                        ->where('status', 0)
                        ->latest()
                        ->first();
        } else {
            $order_id = session('order_id');

            $order = self::find($order_id);
        }        

        return $order ?: false;
    }

    public function getTotalPrice()
    {
    	$price = 0;

    	foreach ($this->products as $product) {
    		$price += $product->getTotalPrice();
    	}

    	return $price;
    }

    public function getConfirmationTime()
    {
        return $this->updated_at->format('H:m d/m/Y');
    }

    public static function findOrMake()
    {
        $order = self::getCurrent();

        if (!$order) {
            $order = self::create();

            if (Auth::check()) {
                $order->user_id = Auth::id();
                $order->save();
            }

            session([ 'order_id' => $order->id ]);
        }

        return $order;
    }

    private function increaseQuantity(Product $product)
    {
        $productInCart = $this->getProductsPivot($product);
        $productInCart->count++;
        $productInCart->update();

        return $this;    
    }

    private function reduceQuantity(Product $product)
    {
        $productInCart = $this->getProductsPivot($product);
        $productInCart->count--;
        $productInCart->update();

        return $this;
    }

    public function addProduct(Product $product)
    {
        if ($this->products->contains($product)) {
            $this->increaseQuantity($product);
        } else {
            $this->products()->attach($product);
        }

        return $this;
    }

    public function removeProduct(Product $product)
    {
        if ($this->products->contains($product)) {

            if ($product->getCountIn($this) < 2 || request()->button === 'trash') {
                $this->products()->detach($product);
            } else {
                $this->reduceQuantity($product);
            }
            
            return $this;
        }

        return false;
    }

    private function store()
    {
        # code...
    }

    public function place($name, $phone)
    {
        if ($this->status === 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();

            session()->forget('order_id');

            return $this;
        } else {
            return false;
        }
    }
}
