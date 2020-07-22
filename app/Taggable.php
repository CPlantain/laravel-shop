<?php

namespace App;

trait Taggable
{
	public static function tags()
    {
        return ['new', 'hot', 'recommended'];
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeHot($query)
    {
        return $query->where('hot', 1);
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommended', 1);
    }

	public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHotAttribute($value)
    {
        $this->attributes['hot'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendedAttribute($value)
    {
        $this->attributes['recommended'] = $value === 'on' ? 1 : 0;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isHot()
    {
        return $this->hot === 1;
    }

    public function isRecommended()
    {
        return $this->recommended === 1;
    }

    protected function updateTags($params)
    {
        foreach (self::tags() as $input) {

            if (!isset($params[$input])) {
                $this->$input = 0;
                $this->save();
            }
        }

        return $this;
    }
}