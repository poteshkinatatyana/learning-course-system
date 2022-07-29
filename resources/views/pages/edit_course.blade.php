@extends('layouts.menu')
@section('content')


<edit-course :coursedata="{{$course}}" :cats_list="{{$cats_list}}" :user="{{Auth::user()}}"> </edit-course>



@endsection
