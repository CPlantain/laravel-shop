<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Uploadable
{
	protected function saveImage($image, $path)
    {
    	if ($image instanceof UploadedFile) {
	        $image_name = $image->store($path);

	        $this->image = $image_name;
	        $this->save();
	    }

	    return $this;
    }

    public function updateImage($image, $path)
    {
        if ($image instanceof UploadedFile) {
            if ($this->image) {
                Storage::delete($this->image);
            }

            $this->saveImage($image, $path);
        }

        return $this;        
    }

    public function removeImage()
    {
    	if ($this->image) {
            Storage::delete($this->image);
        }

        return $this;
    }
}