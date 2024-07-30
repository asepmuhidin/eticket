<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class PermissionController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-permission|edit-permission|delete-permission', ['only' => ['index','show']]);
       $this->middleware('permission:create-permission', ['only' => ['create','store']]);
       $this->middleware('permission:edit-permission', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('permission.index', [
            'permissions' => Permission::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name'   => 'required|unique:permissions'
        ]);
        Permission::create($request->all());
        return redirect()->route('permission.index')
                ->withSuccess('New permission is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(permission $permission): View
    {
        return view('permission.show', [
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission): View
    {
        return view('permission.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, permission $permission): RedirectResponse
    {
        $this->validate($request, [
            'name'   => 'required|unique:permissions'
        ]);
        $permission->update($request->all());
        return redirect()->back()
                ->withSuccess('permission is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(permission $permission): RedirectResponse
    {
        $permission->delete();
        return redirect()->route('permission.index')
                ->withSuccess('permission is deleted successfully.');
    }
}
