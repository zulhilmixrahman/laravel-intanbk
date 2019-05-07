<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function profile($nama)
    {
        $array = ['Red', 'Blue', 'Black'];
        return view('profil', compact('nama', 'array'));
    }

    public function getForm()
    {
        return view('profile.form');
    }

    public function postForm(Request $request)
    {
        $no1 = $request->input('no1');
        $no2 = $request->input('no2');

        return view('profile.post', compact('no1', 'no2'));
    }

    public function index(){
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    // View create form
    public function create()
    {
        return view('profile.create');
    }

    // Store submited data to database
    public function store(Request $request)
    {

    }
}
