<?php 


function genSlug(string $string)
{
    $slug = Str::slug($string);

    return $slug;
}