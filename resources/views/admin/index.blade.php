@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Recent blogs</h2>


        <table class="table portal-table section asd">
            <thead>
                <tr>
                    <th>
                        Num
                    </th>
                    <th>
                        title
                    </th>
                    <th>
                        <a href="#" class="" data-pjax>Action</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $i => $blog)
                    <tr>
                        <th>
                            {{ $i + 1 }}
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $blog->title }}</a>
                        </th>

                        <th>
                            <a href="/blogs/{{ $blog->id }}" class="btn btn-light btn-sm"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                            <a href="/admin/blogs/edit/{{ $blog->id }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="/admin/blogs/delete/{{ $blog->id }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="su" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
