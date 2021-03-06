<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::active()->withTranslation()
        ->translatedIn(app()->getLocale())->get();
        return view('userLayouts.category', compact('categories'));
    }
}
