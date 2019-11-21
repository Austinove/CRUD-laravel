<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::orderBy('created_at', 'desc')->paginate(1);
        $users = User::orderBy('name', 'asc')->paginate(10);
        return view('pages.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'role' => 'required',
            'image' => 'image|file|max:19999'
        ]);

        if($request->hasFile('image')){
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extention;
            $path=$request->file('image')->storeAs('public/user_images', $fileNameToStore);
        }else{
            return redirect('/user')->with('error', 'File Not Uploaded');
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->department = $request->input('department');
        $user->role = $request->input('role');
        $user->password= Hash::make('password');
        $user->userImage= $fileNameToStore;
        $user->save();
        return redirect('/user')->with('success', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user= User::find($id);
        return view('pages.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->hasFile('image')){

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'department' => 'required',
                'role' => 'required',
                'image' => 'image|file|max:19999'
            ]);
            $user = User::find($id);

            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extention;
            $path=$request->file('image')->storeAs('public/user_images', $fileNameToStore);

            
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->department = $request->input('department');
            $user->role = $request->input('role');
            $user->password= Hash::make('password');
            $user->userImage= $fileNameToStore;
            $user->save();
            return redirect('/user')->with('success', 'User Updated');


        }else{

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'department' => 'required',
                'role' => 'required'
            ]);

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->department = $request->input('department');
            $user->role = $request->input('role');
            $user->password=Hash::make('password');
            $user->save();
            return redirect('/user')->with('success', 'User Updated');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/')->with('success', 'User Deleted');
    }



    public function deleteUser($id)
    {
        $user= User::find($id);
        return view('pages.deleteUser')->with('user', $user);
    }
}
