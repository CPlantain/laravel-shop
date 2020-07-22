<?php

namespace App;

use App\Category;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Uploadable, Taggable;

    protected $fillable = ['name', 'slug', 'description', 'category_id', 'price', 'new', 'hot', 'recommended'];

    protected $image_path = 'img/products';
    
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function orders()
    {
    	return $this->belongsToMany(Order::class)->withPivot('count')->withTimestamps();
    }

    public function getCountIn(Order $order)
    {
        return $this->orders()->where('order_id', $order->id)->first()->pivot->count;
    }

    public function getTotalPrice()
    {
        if (!is_null($this->pivot)) {
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

    public function scopeFilteredBy($query, $params)
    {
        $query = Product::with('category');

        if (isset($params['price_min']) && !empty($params['price_min'])) {
            $query->where('price', '>=', $params['price_min']);
        }

        if (isset($params['price_max']) && !empty($params['price_max'])) {
            $query->where('price', '<=', $params['price_max']);
        }

        foreach (self::tags() as $input) {
            if (isset($params[$input]) && !empty($params[$input])) {
                $query->$input();
            }
        }

        return $query;
    }

    public static function make($params)
    {
        $product = self::create($params);
        $product->saveImage($params['image'], $this->image_path);

        return $product;
    }

    public function updateAll($params)
    {
        $this->update($params);
        $this
            ->updateImage($params['image'], $this->image_path)
            ->updateTags($params);

        return $this;
    }

    public function remove()
    {
        $this->removeImage();

        return $this->delete();
    }

    public function path($append = '')
    {
    	$path = route('product', [$this->category, $this]);
    	return $append ? "{$path}/{$append}" : $path;
    }
}
