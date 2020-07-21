<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Uploadable;

	protected $fillable = ['name', 'slug', 'description'];

	protected $image_path = 'img/categories';
	
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public static function make($params)
    {
    	$category = self::create($params);
    	$category->saveImage($params['image'], $this->image_path);

    	return $category;
    }

    public function updateAll($params)
    {
    	$this->update($params);
    	$this->updateImage($params['image'], $this->image_path);

    	return $this;
    }

    public function remove()
    {
    	$this->removeImage();
    	
    	return $this->delete();
    }
}
