@extends('layouts.app')

@section('content')




<personal-index :user="{{ Auth::user() }}"></personal-index>


@endsection
