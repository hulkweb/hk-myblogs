@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Users</h2>


        <table class="table portal-table section asd">
            <thead>
                <tr>
                    <th>
                        Num
                    </th>
                    <th>
                        Name
                    </th>


                    <th>
                        <a href="#" class="" data-pjax>Action</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i => $user)
                    <tr>
                        <th>
                            {{ $i + 1 }}
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $user->name }}</a>
                        </th>

                        <th>
                            <a href="/admin/user/{{ $user->block ? 'unblock' : 'block' }}/{{ $user->id }}"
                                class="btn btn-light btn-sm"><i class="fa fa-eye"
                                    aria-hidden="true"></i>{{ $user->block ? 'unblock' : 'block' }}</a>


                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
  <div class="text-center p-2">{{$users->links()}}</div>

    </div>
@endsection
