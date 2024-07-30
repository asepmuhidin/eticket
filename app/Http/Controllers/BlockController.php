<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Cluster;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use Illuminate\View\View;

class BlockController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-block|edit-block|delete-block', ['only' => ['index','show']]);
       $this->middleware('permission:create-block', ['only' => ['create','store']]);
       $this->middleware('permission:edit-block', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-block', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blocks.index', [
            'blocks' => Block::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blocks.create', [
            'clusters' => Cluster::all()
        ]);    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlockRequest $request)
    {
        Block::create($request->all());
        return redirect()->route('blocks.index')
                ->withSuccess('New Block is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Block $block): View
    {
        
        return view('blocks.show', [
            'block' => $block,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Block $block)
    {
        return view('blocks.edit', [
            'block' => $block,
            'clusters' => Cluster::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlockRequest $request, Block $block)
    {
        $block->update($request->all());
        return redirect()->back()
                ->withSuccess('Block is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Block $block)
    {
        $block->delete();
        return redirect()->route('blocks.index')
                ->withSuccess('Block is deleted successfully.');
    }
}