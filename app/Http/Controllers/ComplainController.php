<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\User;
use App\Http\Requests\StoreComplainRequest;
use App\Http\Requests\UpdateComplainRequest;
use Illuminate\View\View;

class ComplainController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-complain|edit-complain|delete-complain', ['only' => ['index','show']]);
       $this->middleware('permission:create-complain', ['only' => ['create','store']]);
       $this->middleware('permission:edit-complain', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-complain', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('complains.index', [
            'complains' => Complain::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complains.create', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplainRequest $request)
    {
         // dd($request->all());
         Complain::create($request->all());
         return redirect()->route('complains.index')
                 ->withSuccess('New Compliance Type is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain) : View
    {
        return view('complains.show', [
            'complain' => $complain,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complain $complain)
    {
        //dd($complain);
        return view('complains.edit', [
            'complain' => $complain,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplainRequest $request, Complain $complain)
    {
        $complain->update($request->all());
        return redirect()->back()
                ->withSuccess('Compliance is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complain $complain)
    {
        $complain->delete();
        return redirect()->route('complains.index')
                ->withSuccess('Compliance is deleted successfully.');
    }
}
