@extends('templates.pages')
@section('title', 'Dashboard')
@section('header')
<h1>Dashboard</h1>
@endsection
@section('content')
Lorem ipsum {{ auth()->user()->email }} dolor sit amet consectetur adipisicing elit. Architecto repudiandae corrupti laudantium assumenda adipisci, recusandae fugit? Blanditiis dolorem voluptates, eligendi suscipit animi recusandae consequatur, veritatis quo voluptatem nesciunt debitis similique?
@endsection