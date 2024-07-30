<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTictypeRequest;
use App\Http\Requests\UpdateTictypeRequest;
use App\Models\Tictype;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TictypeController extends Controller
{
    /**
     * Instantiate a new typeController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-type|edit-type|delete-type', ['only' => ['index','show']]);
       $this->middleware('permission:create-type', ['only' => ['create','store']]);
       $this->middleware('permission:edit-type', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-type', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('type.index', [
            'types' => Tictype::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTictypeRequest $request): RedirectResponse
    {
        Tictype::create($request->all());
        return redirect()->route('types.index')
                ->withSuccess('New type is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tictype $type): View
    {
        return view('type.show', [
            'type' => $type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tictype $type): View
    {
        return view('type.edit', [
            'type' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTictypeRequest $request, Tictype $type): RedirectResponse
    {
        $type->update($request->all());
        return redirect()->back()
                ->withSuccess('Type is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tictype $type): RedirectResponse
    {
        $type->delete();
        return redirect()->route('types.index')
                ->withSuccess('Type is deleted successfully.');
    }
}
