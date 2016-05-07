<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Attribute;
use App\Reminder;
use App\Http\Requests\ReminderRequest;

class RemindersController extends Controller
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
        $reminders = Reminder::all();
        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = attribute::lists('name','id');
        return view('reminders.create', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReminderRequest $request)
    {
        $vaccine = attribute::find($request['attribute_id']);
        $reminder = new Reminder($request->all());
        $reminder->attribute()->associate($vaccine);
        $reminder->save();
        //$reminder = Reminder::create( $request->all());
        //$reminder->address()->create($request->all());
        return redirect('reminders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reminder = Reminder::findOrFail($id);
        return view('reminders.show', compact('reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributes = attribute::lists('name','id');
        $reminder = Reminder::findOrFail($id);
        return view('reminders.edit', compact('reminder','attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReminderRequest $request, $id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->update($request->all());
        return redirect('reminders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();
        return redirect('reminders');
    }

    
}
