<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    /**
     * Instantiate a new departmentController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-department|edit-department|delete-department', ['only' => ['index','show']]);
       $this->middleware('permission:create-department', ['only' => ['create','store']]);
       $this->middleware('permission:edit-department', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-department', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('department.index', [
            'departments' => Department::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request): RedirectResponse
    {
       // dd($request->all());
        Department::create($request->all());
        return redirect()->route('department.index')
                ->withSuccess('New Department is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department): View
    {
        return view('department.show', [
            'department' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department): View
    {
        return view('department.edit', [
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department): RedirectResponse
    {

        $department->update($request->all());
        return redirect()->back()
                ->withSuccess('Department is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department): RedirectResponse
    {
        //$department->position->delete();
        $department->delete();
        return redirect()->route('department.index')
                ->withSuccess('Department is deleted successfully.');
    }
}