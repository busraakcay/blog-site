<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
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
        $admins = User::orderBy('id', 'asc')->get();
        return view('adminLayouts.manageLayouts.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminLayouts.manageLayouts.create');
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
            'name' => 'required|string|max:255|min:3',
            'username' => 'required|string|max:50|min:3|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:25',
            'password' => 'required|string|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),

        ]);

        $admins = User::orderBy('id', 'asc')->get();
        return view('adminLayouts.manageLayouts.index', compact('admins'));
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
        $admin = User::find($id);
        return view('adminLayouts.manageLayouts.edit', compact('admin'));
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
        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role')
        ]);

        $admins = User::orderBy('id', 'asc')->get();
        return redirect()->route('admin.manage', [
            'locale' => app()->getLocale(),
            'admins' => $admins,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $adminCountBeforeDelete = User::count();
        $admin->delete();
        $adminCountAfterDelete = User::count();
        if ($adminCountAfterDelete < $adminCountBeforeDelete) {
            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
