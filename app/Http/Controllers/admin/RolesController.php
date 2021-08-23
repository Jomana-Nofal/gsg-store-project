<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('adminRoles.index',compact('roles'));

    }


    public function create()
    {
       return view('adminRoles.create', [
        'role' => new Role(),
    ]);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role = new Role();
        $role::create($request->all());

        return redirect()->route('roles.index')->with('status', 'Role added');
    }





    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('adminRoles.edit',compact('role'));
    }


    public function update(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            'abilities' => 'required|array',
        ]);

        $role = Role::findOrFail($id);
        $role->update($request->all());
        

        return redirect()->route('roles.index')->with('status', 'Role Updated');
    }


    public function delete($id)
    {
        $role = Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('status', 'Role Deleted');
    }



}
