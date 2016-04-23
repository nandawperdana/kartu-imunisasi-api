<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Child;
use App\Attribute;
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
        $vaccineHistories = VaccineHistory::all();
        return view('vaccineHistories.index', compact('vaccineHistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $children = child::lists('name','id');
        $attributes = attribute::lists('name','id');
        return view('vaccineHistories.create', compact('children','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaccineHistoryRequest $request)
    {
        $child = child::find($request['child_id']);
        $vaccine = attribute::find($request['attribute_id']);
        $vaccineHistory = new VaccineHistory($request->all());
        $vaccineHistory->child()->associate($child);
        $vaccineHistory->attribute()->associate($vaccine);
        $vaccineHistory->save();
        //$vaccineHistory = VaccineHistory::create( $request->all());
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
        $vaccineHistory = VaccineHistory::findOrFail($id);
        return view('vaccineHistories.show', compact('vaccineHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $children = child::lists('name','id');
        $attributes = attribute::lists('name','id');
        $vaccineHistory = VaccineHistory::findOrFail($id);
        return view('vaccineHistories.edit', compact('vaccineHistory','children','attributes'));
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
        $vaccineHistory = VaccineHistory::findOrFail($id);
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
        $vaccineHistory = VaccineHistory::findOrFail($id);
        $vaccineHistory->delete();
        return redirect('vaccineHistory');
    }

    
}
