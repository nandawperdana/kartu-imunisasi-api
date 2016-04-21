<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\VaccineHistory;
use App\Http\Requests\VaccineHistoryRequest;

class VaccineHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','edit','destroy']]);
        // $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccineHistory = vaccineHistory::all();
        return view('vaccineHistory.index', compact('vaccineHistory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaccineHistory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaccineHistoryRequest $request)
    {
        $vaccineHistory = VaccineHistory::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone' => $request['phone'],
            'address' => $request['address'],
            'role' => 'admin',
            'status' => 'enable'
        ]);
        //$vaccineHistory = vaccineHistory::create( $request->all());
        //$vaccineHistory->address()->create($request->all());
        return redirect('vaccineHistory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaccineHistory = vaccineHistory::findOrFail($id);
        return view('vaccineHistory.show', compact('vaccineHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccineHistory = vaccineHistory::findOrFail($id);
        return view('vaccineHistory.edit', compact('vaccineHistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VaccineHistoryRequest $request, $id)
    {
        $vaccineHistory = vaccineHistory::findOrFail($id);
        $vaccineHistory->update($request->all());
        return redirect('vaccineHistory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccineHistory = vaccineHistory::findOrFail($id);
        $vaccineHistory->delete();
        return redirect('vaccineHistory');
    }

    
}
