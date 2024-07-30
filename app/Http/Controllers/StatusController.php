<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StatusController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-status|edit-status|delete-status', ['only' => ['index','show']]);
       $this->middleware('permission:create-status', ['only' => ['create','store']]);
       $this->middleware('permission:edit-status', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-status', ['only' => ['destroy']]);
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('status.index', [
            'statuses' => Status::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $colors=['primary','success','danger','warning','info','dark'];
        return view('status.create',['colors'=>$colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestatusRequest $request): RedirectResponse
    {
        Status::create($request->all());
        return redirect()->route('status.index')
                ->withSuccess('New status is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(status $status): View
    {
        return view('status.show', [
            'status' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(status $status): View
    {
        $colors=['primary','success','danger','warning','info','dark'];
        return view('status.edit', [
            'status' => $status,
            'colors'=>$colors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestatusRequest $request, status $status): RedirectResponse
    {
        //dd($request->all());
        $status->update($request->all());
        return redirect()->back()
                ->withSuccess('Status is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(status $status): RedirectResponse
    {
        $status->delete();
        return redirect()->route('status.index')
                ->withSuccess('Status is deleted successfully.');
    }
}