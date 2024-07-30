<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Cluster;
use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use Illuminate\View\View;

class HouseController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-house|edit-house|delete-house', ['only' => ['index','show']]);
       $this->middleware('permission:create-house', ['only' => ['create','store']]);
       $this->middleware('permission:edit-house', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-house', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('houses.index', [
            'houses' => House::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('houses.create', [
            'clusters' => Cluster::all()
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHouseRequest $request)
    {
        House::create($request->all());
        return redirect()->route('houses.index')
                ->withSuccess('New House Compliance Type is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house): View
    {
        
        return view('houses.show', [
            'house' => $house,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(House $house)
    {
        return view('houses.edit', [
            'house' => $house,
            'clusters' => Cluster::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHouseRequest $request, House $house)
    {
        $house->update($request->all());
        return redirect()->back()
                ->withSuccess('House is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        $house->delete();
        return redirect()->route('houses.index')
                ->withSuccess('House is deleted successfully.');
    }
}
