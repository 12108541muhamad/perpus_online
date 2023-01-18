<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wikbook;
use App\Models\User;
use App\Models\category;
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
        $books = Wikbook::all();
        return view('index', compact('books'));
    }

    public function users()
    {
        $users = User::all();
        return view('dashboard.users', compact('users'));
    }

    public function admin()
    {
        $users = User::all();
        return view('dashboard.index', compact('users'));
    }

// login
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
            return redirect('/admin');
        }
        return redirect('/login')->with('fail', 'Gagal login, periksa dan coba lagi!');
    }

    // register
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

    // logout

    public function logout()
    {
        Auth::logout();
        return view('dashboard.login');
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
    
    // book create
    public function book()
    {
        $books = Wikbook::all();
        return view('dashboard.book', compact('books'));
    }

    public function createBook()
    {
        $categories = category::all();
        return view('dashboard.create_book', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'required',
            'synopsis' => 'required|min:10',
        ]);

        wikbook::create([
            'title' => $request->title,
            'writter' => $request->writter,
            'publisher' => $request->publisher,
            'isbn' => $request->isbn,
            'synopsis' => $request->synopsis,
            'cover_book' => $request->cover_book,
            'category_name' => $request->category_name,
        ]);
        return redirect('/book')->with('success', 'Berhasil menambahkan buku!'); 
    }

    // categories create
    public function categories()
    {
        $categories = category::all();
        return view('dashboard.categories', compact('categories'));
    }

    public function categoriesCreate(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);

        category::create([
            'category' => $request->category,
        ]);
        return redirect('/category')->with('success', 'Berhasil menambahkan category!');
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
