<?php

namespace App\Http\Controllers;

use App\Models\wikbook;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class WikbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('dashboard.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:4',
        ],[
            'email.exists' => "This email doesn't exists"
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('index');
        }else{
            return redirect('/login')->with('fail', 'Gagal login, periksa dan coba lagi!');
        }
    }

    public function register()
    {
        return view('dashboard.register');
    }

    public function registerAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'name' => 'required',
            'password' => 'required|min:4',
            'name' => 'required|min:3',
            'address' => 'required',
            'no_hp' => 'required|min:11',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'address' => $request->address,
        ]);
        return redirect('/login')->with('success', 'Berhasil menambahkan akun! silahkan login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function show(wikbook $wikbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function edit(wikbook $wikbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wikbook $wikbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(wikbook $wikbook)
    {
        //
    }
}
