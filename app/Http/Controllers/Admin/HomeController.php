<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Hash;

use App\Models\Course;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users_list = User::all();
        return view('admin.home.users', [
            'users_list' => $users_list,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $cat_list = Category::all();
        return view('admin.home.categories', [
            'cat_list' => $cat_list
        ]);
    }

    public function create_user(Request $request){



        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $token = Str::random(60);
        $user = User::where('email','=', $validated['email'])->get();
        if(count($user)) return 'Пользователь с таким email уже существует!';

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'api_token' =>  hash('sha256', $token),
        ]);


        $user->assignRole('user');

        return redirect()->route('users_list');

    }

    public function create_category(Request $request){

        $cat_list = Category::all();

        $validated = $request->validate([
            'title' => 'required',
        ]);

        $category = Category::where('title','=', $validated['title'])->get();
        $warning = 'Category already exist';
        if(count($category)) return view('admin.home.categories', [
            'cat_list' => $cat_list,
            'warning' => $warning
        ]);

        Category::create([
            'title' => $validated['title'],
        ]);
       return redirect()->route('cats_list');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users_list');
    }

    public function destroy_cat($id)
    {
        $category = Category::find($id);

        $category->delete();

        // return $user;

        return redirect()->route('cats_list');
    }

    public function editcategory(Request $request, $category_id)
    {
        $category = Category::find($category_id);



        $category->update([
            'title' => $request['title'],
        ]);

        return redirect()->route('cats_list');

    }
    public function edituser(Request $request, $user_id)
    {
        $user = User::find($user_id);



        $user->update([
            'name' => $request['name'],
        ]);

        return redirect()->route('users_list');

    }


}
