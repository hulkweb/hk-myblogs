@extends('layouts.app')
@section('content')
    <div class="single-post">
        <div class="feature-img">
            <img class="img-fluid" src="/uploads/{{ $blog->image }}" alt="">
        </div>
        <div class="blog_details">
            <h1>{{ $blog->title }}
            </h1>
            <ul class="blog-info-link mt-3 mb-4">
                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
            </ul>
            <div class="p-2">
                {!! $blog->body !!}
            </div>


        </div>
    </div>
@endsection
