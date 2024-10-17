<?php 

namespace App\Traits;
trait SlugableTrait
{

    public function getSlug($string)
    {
        return \Str::slug($string);
    }
}