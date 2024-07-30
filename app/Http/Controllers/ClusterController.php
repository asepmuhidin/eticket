<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Http\Requests\StoreClusterRequest;
use App\Http\Requests\UpdateClusterRequest;
use Illuminate\View\View;


class ClusterController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-cluster|edit-cluster|delete-cluster', ['only' => ['index','show']]);
       $this->middleware('permission:create-cluster', ['only' => ['create','store']]);
       $this->middleware('permission:edit-cluster', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-cluster', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clusters.index', [
            'clusters' => Cluster::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clusters.create');    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClusterRequest $request)
    {
        Cluster::create($request->all());
        return redirect()->route('clusters.index')
                ->withSuccess('New cluster Type is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cluster $cluster): View
    {
        
        return view('clusters.show', [
            'cluster' => $cluster,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cluster $cluster)
    {
        return view('clusters.edit', [
            'cluster' => $cluster,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClusterRequest $request, Cluster $cluster)
    {
        $cluster->update($request->all());
        return redirect()->back()
                ->withSuccess('Cluster is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cluster $cluster)
    {
        $cluster->delete();
        return redirect()->route('clusters.index')
                ->withSuccess('Cluster is deleted successfully.');
    }
}