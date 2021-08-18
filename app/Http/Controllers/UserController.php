<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'ASC')->get();
        return view('admin.user.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_name'=> 'required',
            'user_email'=> 'required|email',
            'user_pass'=> 'required|min:8',
            'confirm_pass'=> 'nullable',
            'is_admin'=> 'required',
            'cover_pic'=> 'image|nullable',
            'description'=> 'nullable'
        ]);

        // print_r($request->input('user_type'));
        // exit(); 

        $user = new User();
        $user->name = $request->input('user_name');
        $user->email = $request->input('user_email');
        
        if($request->has('user_pass') && $request->input('user_pass') != null){
            if($request->input('user_pass') == $request->input('confirm_pass')){
                $user->password = bcrypt($request->input('user_pass'));
            }
            else{
                return redirect()->back()->with('error','Password did not matched!!');
            }

        }
        $user->user_type = $request->input('user_type');
        $user->description = $request->input('description');
        $user->slug = str::slug($request->user_name, '_') ;


         //image handel
        if($request->hasfile('cover_pic'))
        {
            $filenameWithext=$request->file('cover_pic')->getClientOriginalName();

            $filename=pathinfo($filenameWithext, PATHINFO_FILENAME);

            $extension=$request->file('cover_pic')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;
            
            $path=$request->file('cover_pic')->storeAs('public/user_image', $filenametostore);

        }

        else{

            $filenametostore='noimage';
        }

        $user->image = $filenametostore;
        $user->save();

        return redirect('admin/user')->with('success','User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //return $user;
        return view('admin.user.update', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'user_name'=> 'required',
            'user_email'=> 'required|email',
            'user_pass'=> 'nullable|min:8',
            'confirm_pass'=> 'nullable',
            'user_type'=> 'required',
            'cover_pic'=> 'image|nullable',
            'description'=> 'nullable'
        ]);

        if($request->hasfile('cover_pic'))
        {
            $filenameWithext=$request->file('cover_pic')->getClientOriginalName();

            $filename=pathinfo($filenameWithext, PATHINFO_FILENAME);

            $extension=$request->file('cover_pic')->getClientOriginalExtension();

            $filenametostore=$filename.'_'.time().'.'.$extension;
            
            $path=$request->file('cover_pic')->storeAs('public/user_image', $filenametostore);

        }

        else{

            $filenametostore=$user->image;
        }

        $user->name = $request->input('user_name');
        $user->email = $request->input('user_email');

        if($request->has('user_pass') && $request->user_pass != null){
            if($request->user_pass == $request->confirm_pass){
                $user->password = bcrypt($request->input('user_pass'));
            }
            else{
                return redirect()->back()->with('error','Password did not matched!!');
            }

        }
        $user->user_type = $request->input('user_type');
        $user->image = $filenametostore;
        $user->description = $request->input('description');
        $user->slug = str::slug($request->user_name, '_') ;
        $user->save();

        return redirect('admin/user')->with('success','User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image != 'noimage'){
            Storage::delete('public/user_image/'.$user->image);
          }
        $user->delete();
        return redirect('/admin/user')->with('success', 'User deleted successfully.');
    }
}
