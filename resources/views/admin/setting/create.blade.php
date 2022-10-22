@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Setting</li>
        </ol>
        <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
            <div class="box_general padding_bottom">
                @csrf

                <div class="row">
                    <div class="col-md-5">
                        <div class="header_box version_2">
                            <h2><i class="fa fa-file"></i> Add Setting</h2>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Setting Name </label>
                            <input type="text" name="property" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Setting Value </label>
                            <input type="text" name="value" class="form-control">
                        </div>

                        <p><button type="submit" class="btn_1 medium">Save</button></p>

                    </div>


                </div>

        </form>
    </div>
    <!-- /.container-fluid-->
@endsection
