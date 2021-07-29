<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInformation;

class AdminAboutController extends Controller
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
        return view('adminLayouts.aboutLayouts.index');
    }

    public function update(Request $request, $id)
    {
        SiteInformation::where('id', $id)->update([
            'about' => $request->input('about')
        ]);

        return redirect()->back();
    }
}
