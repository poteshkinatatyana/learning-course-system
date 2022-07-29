@extends('layouts.menu')
@section('content')

<create-course  :cats_list="{{$categories}}" :user="{{Auth::user()}}"> </create-course>



@endsection
