<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class UserHomeController extends Controller
{
    public function index(){
        $articles = Article::orderBy('id', 'desc')->paginate(4);
        return view('userLayouts.article', compact('articles'));
    }

    public function show($id){
        $id = request()->segment(3);
        $article = Article::find($id);
        return view('userLayouts.articleShow', compact('article'));
    }

    // public function show($locale, $id){
    //     dd($id);
    //     die();
    //     $id = request()->segment(3);
    //     $article = Article::find($id);
    //     return view('userLayouts.articleShow', compact('article'));
    // }
}
