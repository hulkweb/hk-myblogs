@extends('layouts.admin')
@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <div class="container container-sm">
        <h1>Create Blog</h1>

        <section>
            <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name"> Image</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="name"> Body</label>
                        <textarea id="editor" name="body" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-sm-6 text-center">
                        <button class="btn btn-primary">create</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor')).then(e => {
                console.log(e)
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
