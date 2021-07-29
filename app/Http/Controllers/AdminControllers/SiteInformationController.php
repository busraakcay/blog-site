<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInformation;

class SiteInformationController extends Controller
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
        return view('adminLayouts.siteInformationLayouts.index');
    }

    public function update(Request $request, $id)
    {
        SiteInformation::where('id', $id)->update([
            'name' => $request->input('name'),
            'footer' => $request->input('footer')
        ]);

        return redirect()->back();
    }
}
