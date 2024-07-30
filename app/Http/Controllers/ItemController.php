<?php

namespace App\Http\Controllers;

use App\Models\Item; 
use App\Http\Requests\StoreItemComplainRequest;
use App\Http\Requests\UpdateItemComplainRequest;
use Illuminate\View\View;

class ItemController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-itemcomplain|edit-itemcomplain|delete-itemcomplain', ['only' => ['index','show']]);
       $this->middleware('permission:create-itemcomplain', ['only' => ['create','store']]);
       $this->middleware('permission:edit-itemcomplain', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-itemcomplain', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index', [
            'items' => Item::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemComplainRequest $request)
    {
        Item::create($request->all());
        return redirect()->route('items.index')
                ->withSuccess('New Item Compliance Type is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item): View
    {
        
        return view('items.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemComplainRequest $request, Item $item)
    {
        $item->update($request->all());
        return redirect()->back()
                ->withSuccess('Item Compliance is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')
                ->withSuccess('Item Compliance is deleted successfully.');
    }
}
