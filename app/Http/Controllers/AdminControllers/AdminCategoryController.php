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
        $category = new Category();

        foreach(config('app.locales') as $locale){
            $category->translateOrNew($locale)->name = $request->input('name:' . $locale);
        }

        $category->save();

        // $request->validate([
        //     'name_en' => 'required|string',
        //     'name_tr' => 'required|string',
        // ]);

        // Category::create([
        //     'name_en' => $request->input('name_en'),
        //     'name_tr' => $request->input('name_tr'),
        // ]);

        $categories = Category::get();
        return redirect()->route('admin.category',  [
            'locale' => app()->getLocale(),
            'admins' => $categories,
        ]);
        die();
    }

    public function update(Request $request, $id)
    {
        if ($request->status == 'on') {
            Category::where('id', $id)->update([
                'status' => 1
            ]);
        }

        if ($request->status == null) {
            Category::where('id', $id)->update([
                'status' => 0
            ]);
        }

        return redirect()->back();
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
