<?php

namespace App\Http\Controllers;

use App\Traits\SlugableTrait;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use SlugableTrait;
    public function index()
    {
        $title = 'how to create Blog title testing ';
        $slug =$this->getSlug($title);

        return $slug;
    }
}
