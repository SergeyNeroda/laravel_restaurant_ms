<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Hash;
use Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(7);
        return view('admin.user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();

      return view('admin.user.create',['products'=>$roles]);
      //  return view('admin.user.create');
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
        'role' => 'required',
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
      ]);
      //створюю об'єкт
      $user = new User;
      //записую значення
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $role = $request->role;
      $roleUser = (int)$role;
      $user->role_id = $roleUser;
      $user->remember_token = $request->_token;
      //зберігаю в бд
      $user->save();
      return redirect()->back()->with('success', 'Користувача додано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = Role::all();
      $user = User::find($id);
      return view('admin.user.edit',['products'=>$roles,'user'=>$user]);
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
       $this->validate($request,[
         'role' => 'required',
         'name' => 'required',
         'email' => 'required',
         'password' => 'required',
       ]);
       $user = User::find($id);
       //записую значення
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $role = $request->role;
       $roleUser = (int)$role;
       $user->role_id = $roleUser;
       $user->remember_token = $request->_token;
       //зберігаю в бд
       $user->save();
       return redirect('/user')->with('success', 'Користувача редаговано!');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(User $user)
     {
       $user->delete();
       return redirect()->route('user.index');
     }

     public function password (Request $request) {

     }
}
