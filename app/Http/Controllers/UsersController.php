<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        if (!Auth::user()->is_admin) {
            // Auth::logout();
            return redirect()->route('home')->with('danger', "vous n'avez pas accès à cette page");
        } else {
            $users = User::all();
            return view('Users-view.index', [
                'users' => $users
            ]);
        }
    }

    // public function getUserData(){
    //     $userData = User::all();
    //     // dd($userData);
    //     return json_encode(array('data'=>$userData));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('danger', "vous n'avez pas accès à cette page");
        }
        return view('Users-view.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('danger', "vous n'avez pas accès à cette page");
        }

        $validatedData = $request->validate([
            'name' => 'bail|required|string|max:255|unique:users',
            'email' => 'bail|required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4||max:255',
            // 'password_confirmation' => 'same:password'
        ]);

        $User = new User();
        $User->email = $request->input('email');
        $User->name = $request->input('name');
        $User->password =  Hash::make($request->input('password'));

        $User->save();

        $message = "Une Utilisateur a été créé avec succès";

        return redirect()->route('Users.index')->with('success', $message);

        // dd($request->input('new_user_email'));
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
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('danger', "vous n'avez pas accès à cette page");
        }
        $user = User::findOrFail($id);
        return view('Users-view.edit', [
            'User' => $user
        ]);
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
        // dd($request);
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('danger', "vous n'avez pas accès à cette page");
        }

        $this->validate($request, 
            ['password' => 'string|min:4||max:255|nullable'],
            ['password.max' =>'Mot de passe ne doit pas dépasser 200 caractères'],

            ['name' => 'bail|required|string|max:255', Rule::unique('users', 'name')->ignore($id)],
            ['name.required' => 'Le nom ne doit pas être vide',
             'name.unique' => 'Le nom existe déjà',
             'name.max' =>'le nom ne doit pas dépasser 200 caractères'],
            ['email' => 'bail|required|string|email|max:255'],
            ['email.required' => 'E-mail ne doit pas être vide',
            'email.unique' => 'E-mail existe déjà',
            'email.max' =>'E-mail ne doit pas dépasser 200 caractères'],
        );

        $user = User::findOrFail($id);

        // $user->name = $request->input('name');
        if ($request->input('name') != $user->name)
            $user->name = $request->input('name');

        if ($request->input('email') != $user->email)
            $user->email = $request->input('email');

        // $user->email = $request->input('email');
        if ($request->input('password') != "")
            $user->password = Hash::make($request->input('password'));
    
        $user->save();

        return redirect()->route('Users.index')
            ->with('success', "L'utilisateur : " . $user->name . " a été modifier avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('home')->with('danger', "vous n'avez pas accès à cette page");
        }
        User::findOrFail($id)->delete();
        return redirect()->route('Users.index')
            ->with('success', 'Un utilisateur a été supprimer avec succès');
    }
}
