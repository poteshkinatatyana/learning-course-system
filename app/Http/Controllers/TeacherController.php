<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users = User::all();
        return $all_users;
    }

    public function getUserData($user_id){

            $current_courses_user = Course::where('user_id', $user_id)->orderBy('created_at', 'DESC')->with('user')->with('category')->get();

            return  $current_courses_user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $token = Str::random(60);
        $user = User::where('email','=', $validated['email'])->get();
        if(count($user)) return 'User already exist';

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'api_token' =>  hash('sha256', $token),
        ]);


        $user->assignRole('user');

        return $user;
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email','=', $validated['email'])->first();
        // dd($user, Hash::make($validated['password']) , );
        if ($user) {
            if(Hash::check($validated['password'], $user->password)){
                $token = Str::random(60);
                $user->forceFill([
                    'api_token' => hash('sha256', $token),
                ])->save();
                return $user;
            }
        }
        return "Incorrect email or password";
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
        //
    }
}
