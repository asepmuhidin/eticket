<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelevelsRequest;
use App\Http\Requests\UpdatelevelsRequest;
use App\Models\Level;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LevelsController extends Controller
{
    /**
     * Instantiate a new levelController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-level|edit-level|delete-level', ['only' => ['index','show']]);
       $this->middleware('permission:create-level', ['only' => ['create','store']]);
       $this->middleware('permission:edit-level', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-level', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('levels.index', [
            'levels' => Level::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelevelsRequest $request): RedirectResponse
    {
       // dd($request->all());
        Level::create($request->all());
        return redirect()->route('levels.index')
                ->withSuccess('New level is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level): View
    {
       
         return view('levels.show', [
            'level' => $level
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level): View
    {
        return view('levels.edit', [
            'level' => $level
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelevelsRequest $request, Level $level): RedirectResponse
    {
        $level->update($request->all());
        return redirect()->back()
                ->withSuccess('level is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level): RedirectResponse
    {
        $level->delete();
        return redirect()->route('levels.index')
                ->withSuccess('level is deleted successfully.');
    }
}