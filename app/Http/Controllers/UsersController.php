<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
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
        $users = user::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $imgUsrFileName = null;
        $imgUsrFilePath = null;
        if($request->hasFile('imgUsrFileName')){
            $imgUsrFileName = time().'.'.$request->file('imgUsrFileName')->getClientOriginalExtension();
            $imgUsrFilePath = '/images/parents/' .$imgUsrFileName;
            $request->file('imgUsrFileName')->move(
                base_path() . '/public/images/parents/', $imgUsrFileName
            );
        }
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'country' => $request['country'],
            'state' => $request['state'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            //'statusInfo' => $request['statusInfo'],
            //'profession' => $request['profession'],
            'tempatLahir' => $request['tempatLahir'],
            'tglLahir' => $request['tglLahir'],
            //'educLevId' => $request['educLevId'],
            'imgUsrFileName' => $imgUsrFileName,
            'imgUsrFilePath' => $imgUsrFilePath
            //'lastStudy' => $request['lastStudy'],
            //'statusInfoUpAt' => $request['statusInfoUpAt']
        ]);

        

        
        //$user = user::create( $request->all());
        //$user->address()->create($request->all());
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $imgUsrFileName = null;
        $imgUsrFilePath = null;
        if($request->hasFile('imgUsrFileName')){
            $imgUsrFileName = time().'.'.$request->file('imgUsrFileName')->getClientOriginalExtension();
            $imgUsrFilePath = '/images/parents/' .$imgUsrFileName;
            $request->file('imgUsrFileName')->move(
                base_path() . '/public/images/parents/', $imgUsrFileName
            );
            $request['imgUsrFileName'] = $imgUsrFileName;
            $request['imgUsrFilePath'] = $imgUsrFilePath;
        }
        $user = user::findOrFail($id);
        $user->update($request->all());
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();
        return redirect('users');
    }

    
}
