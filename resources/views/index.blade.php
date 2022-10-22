@extends('layouts.app')
@section('content')
    <div class="blog_left_sidebar">
        @foreach ($blogs as $blog)
            <article class="blog_item">
                <div class="blog_item_img">
                    <img class="card-img rounded-0" src="uploads/{{ $blog->image }}" alt="">
                    <a href="#" class="blog_item_date">
                        <h3>{{ date('d', strtotime($blog->created_at)) }}</h3>
                        <p>{{ date('M', strtotime($blog->created_at)) }}</p>
                    </a>
                </div>

                <div class="blog_details">
                    <a class="d-inline-block" href="/blogs/{{ $blog->id }}">
                        <h1>{{ $blog->title }}</h1>
                    </a>
                    <p>{!! substr($blog->body, 0, 100) !!}...</p>
                    <ul class="blog-info-link">
                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> 0 Comments</a></li>
                    </ul>
                </div>
            </article>
        @endforeach




        <nav class="blog-pagination justify-content-center d-flex">
            {{ $blogs->links() }}
        </nav>
    </div>
@endsection
