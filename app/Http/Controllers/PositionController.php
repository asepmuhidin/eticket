<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Department;
use App\Models\Position;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PositionController extends Controller
{
     /**
     * Instantiate a new positionController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-position|edit-position|delete-position', ['only' => ['index','show']]);
       $this->middleware('permission:create-position', ['only' => ['create','store']]);
       $this->middleware('permission:edit-position', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-position', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('position.index', [
            'positions' => Position::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $departments = Department::all();
        return view('position.create',['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepositionRequest $request): RedirectResponse
    {
       // dd($request->all());
        Position::create($request->all());
        return redirect()->route('position.index')
                ->withSuccess('New position is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position): View
    {
        return view('position.show', [
            'position' => $position
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position): View
    {
        $departments = Department::all();
        return view('position.edit', [
            'position' => $position,
            'departments'=>$departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepositionRequest $request, Position $position): RedirectResponse
    {
        $position->update($request->all());
        return redirect()->back()
                ->withSuccess('Position is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(position $position): RedirectResponse
    {
        
        $position->delete();
        return redirect()->route('position.index')
                ->withSuccess('Position is deleted successfully.');
    }
}
