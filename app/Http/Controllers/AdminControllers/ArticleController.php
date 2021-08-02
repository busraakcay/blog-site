<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware("auth");
        view()->share('categories', Category::get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(4);
        return view('adminLayouts.articleLayouts.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminLayouts.articleLayouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'littleImage' => 'mimes:jpg,png,jpeg',
            'bigImage' => 'mimes:jpg,png,jpeg',
            'title_en' => 'required|string',
            'title_tr' => 'required|string',
            'body_en' => 'required|string',
            'body_tr' => 'required|string'
        ]);

        $newImageNameForLittleImg = time() . rand(1, 100) . "." . $request->littleImage->extension();
        $imagePathLittle = 'images/' . $newImageNameForLittleImg;
        Image::make($request->littleImage)->resize(200, 100)->save($imagePathLittle);

        $newImageNameForBig = time() . rand(1, 100) . "." . $request->bigImage->extension();
        $imagePathBig = 'images/' . $newImageNameForBig;
        Image::make($request->bigImage)->resize(1108, 270)->save($imagePathBig);

        Article::create([
            'category_id' => $request->input('category'),
            'littleImage' => $imagePathLittle,
            'bigImage' => $imagePathBig,
            'title_en' => $request->input('title_en'),
            'title_tr' => $request->input('title_tr'),
            'body_en' => $request->input('body_en'),
            'body_tr' => $request->input('body_tr'),
        ]);

        $articles = Article::orderBy('id', 'desc')->get();
        return redirect()->route('admin.article', [
            'locale' => app()->getLocale(),
            'articles' => $articles,
        ]);
        die();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = request()->segment(5);
        $article = Article::find($id);
        return view('adminLayouts.articleLayouts.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg',
            'title_en' => 'required|string',
            'title_tr' => 'required|string',
            'body_en' => 'required|string',
            'body_tr' => 'required|string'
        ]);

        if ($request->littleImage) {
            $newImageNameForLittleImg = time() . rand(1, 100) . "." . $request->littleImage->extension();
            $imagePathLittle = 'images/' . $newImageNameForLittleImg;
            Image::make($request->littleImage)->resize(200, 100)->save($imagePathLittle);
            Article::where('id', $id)->update(['littleImage' => $imagePathLittle]);
        }
            
        if ($request->bigImage) {
            $newImageNameForBig = time() . rand(1, 100) . "." . $request->bigImage->extension();
            $imagePathBig = 'images/' . $newImageNameForBig;
            Image::make($request->bigImage)->resize(1180, 300)->save($imagePathBig);
            Article::where('id', $id)->update(['bigImage' => $imagePathBig]);
        }

        Article::where('id', $id)->update([
            'category_id' => $request->input('category'),
            'title_en' => $request->input('title_en'),
            'title_tr' => $request->input('title_tr'),
            'body_en' => $request->input('body_en'),
            'body_tr' => $request->input('body_tr'),
        ]);

        $articles = Article::orderBy('id', 'desc')->get();
        return redirect()->route('admin.article', [
            'locale' => app()->getLocale(),
            'articles' => $articles,
        ]);
        die();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Article::find($id);
        $adminCountBeforeDelete = Article::count();
        $admin->delete();
        $adminCountAfterDelete = Article::count();
        if ($adminCountAfterDelete < $adminCountBeforeDelete) {
            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
