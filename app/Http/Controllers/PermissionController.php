<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;



class PermissionController extends Controller 
{

    public function __construct()
    {
        $this->middleware('permission:view permissions')->only('index');
        $this->middleware('permission:edit permissions')->only('edit', 'update');
        $this->middleware('permission:create permissions')->only('create', 'store');
        $this->middleware('permission:delete permissions')->only('destroy');
    }




    //this method will show permission page 
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('permissions.list', compact('permissions'));
    }

    //this method will create permission page 
    public function create()
    {
        return view('permissions.create');
    }

    //this method will insert a permission in DB 
    public function store(Request $request)
    {
        $validated = $request-> validate([
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validated) {
            // Create the permission
                $permission = new Permission();
                $permission->name= $request->name;
                $permission->save();
            return redirect()->route('permissions.index')->with('success', 'permission added successfully');

        }else{
            return redirect()-> route('permissions.create')->withInput()->withErrors($validated);
        }

    }

    //this method will show   edit permission page 
    public function edit($id)

    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', ['OurPermission' => $permission]);
    }

    //this method will update permission page
    public function update(Request $request, $id)
    {
        $validated = $request-> validate([
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validated) {
            // Create the permission
                $permission = Permission::findOrFail($id);
                $permission->name= $request->name;
                $permission->save();
            return redirect()->route('permissions.index')->with('success', 'permission updated successfully');

        }else{
            return redirect()-> route('permissions.create')->withInput()->withErrors($validated);
        }
    }

        //this method will delete permission page in db
    public function destroy($id)
    {
        $permission= Permission::findOrFail($id);
        $permission->delete();
        
        return redirect()->route('permissions.index')->with('success', 'permission deleted successfully');
    }
}
        



