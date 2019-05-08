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

    public function index()
    {
        // SELECT * FROM table WHERE deleted_at IS NULL
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
        //debug($request->all());
        //dd($request->all());

        $profile = new Profile();
        $profile->name = $request->input('name'); //$_POST['name']
        $profile->address = $request->input('address'); //$_POST['address']
        $profile->postcode = $request->input('postcode'); //$_POST['postcode']
        $profile->age = $request->input('age'); //$_POST['age']
        $profile->save();

        return redirect('profiles');
    }

    // View form edit
    public function edit($id)
    {
        $profile = Profile::find($id); // SELECT * FROM table_db WHERE primary_key = $id
        return view('profile.edit', compact('profile'));
    }

    // Process update query
    public function update(Request $request, $id)
    { 
        $profile = Profile::find($id);
        $profile->name = $request->input('name'); //$_POST['name']
        $profile->address = $request->input('address'); //$_POST['address']
        $profile->postcode = $request->input('postcode'); //$_POST['postcode']
        $profile->age = $request->input('age'); //$_POST['age']
        $profile->save();

        return redirect('profiles');
    }

    // Delete record
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        return redirect('profiles');
    }

    // with SoftDeletes: List all record including deleted
    public function index_all(){
        // SELECT * FORM table
        $profiles = Profile::withTrashed()->get();
        return view('profile.index', compact('profiles'));
    }

    // with SoftDeletes: List only deleted record
    public function trash_bin(){
        // SELECT * FROM table WHERE deleted_at IS NOT NULL
        $profiles = Profile::onlyTrashed()->get();
        return view('profile.index', compact('profiles'));
    }
}
