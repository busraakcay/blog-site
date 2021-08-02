<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware("auth");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('adminLayouts.categoryLayouts.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminLayouts.categoryLayouts.create');
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
            'name_en' => 'required|string',
            'name_tr' => 'required|string',
        ]);

        Category::create([
            'name_en' => $request->input('name_en'),
            'name_tr' => $request->input('name_tr'),
        ]);
        $categories = Category::get();
        return view('adminLayouts.categoryLayouts.index', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Category::find($id);
        $adminCountBeforeDelete = Category::count();
        $admin->delete();
        $adminCountAfterDelete = Category::count();
        if ($adminCountAfterDelete < $adminCountBeforeDelete) {
            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
