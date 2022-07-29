<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_courses = Course::orderBy('created_at', 'DESC')->take(3)->with('user')->with('category')->get();
        $all_categories = Category::all();

        return [
            'all_courses' => $all_courses,
            'all_categories' => $all_categories,
        ];

    }

    public function indexall()
    {
        $all_courses = Course::orderBy('created_at', 'DESC')->with('user')->with('category')->get();


        return $all_courses;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'user_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'test' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('course_images'), $imageName);

        return Course::create([
            'category_id' => $request['category_id'],
            'user_id' => $request['user_id'],
            'image' => $imageName,
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
            'test' => $request['test']
        ]);
    }

    public function createCourse(){
        $categories = Category::all();

        return view('pages.create_course', [
            "categories" => $categories
        ]);
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $course_id)
    {
        $cats_list = Category::all();
        $course = Course::where('user_id', $user_id)->where('id', $course_id)->first();

        return view('pages.edit_course',[
            'course' => $course,
            'cats_list' => $cats_list,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('course_images'), $imageName);

        $course->update([
            'category_id' => $request['category_id'],
            'user_id' => $request['user_id'],
            'image' => $imageName,
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
            'test' => $request['test']
        ]);
        return  $course;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $res= Course::where('id',$id)->delete();
        return  $res;
    }

    public function filtration(Request $request)
    {
        $q = $request->query('q');
        $course = Course::where('title', 'like', '%'.$q.'%')->orderBy("created_at")
        ->get();
        return $course;

    }

    public function getCourseByCategory($id){
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('id', $id)->first();
        $courses = $current_category->courses;

        return [
            'courses' => $courses,
            'categories' => $categories
        ];
    }

    public function getCourse( $id_course){
        // $categories = Category::orderBy('title')->get();
        $course = Course::where('id', $id_course)->with('user')->with('category')->first();

        return  $course;
    }
    public function getCourseSingle( $id_course){
        // $categories = Category::orderBy('title')->get();
        $course = Course::where('id', $id_course)->with('user')->with('category')->first();

        return  view('pages.single', [
            'course' => $course
        ]);
    }
}

