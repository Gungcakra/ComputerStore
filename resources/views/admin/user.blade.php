@extends('layouts.adminmain')
@section('content')
    <div class="content-wrapper">
        <h1 class="text-center">{{ $title }}</h1>
        <div class="container">

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Address</th>
                        <th scope="col">User Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $no => $dt)
                    <tr>
                            
                        <td>{{ $no + $data->firstItem() }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->email }}</td>
                        <td>{{ $dt->password }}</td>
                        <td>{{ $dt->address }}</td>
                        <td>{{ $dt->is_admin == 1 ? 'Admin' : '' }}{{ $dt->is_admin == 0 ? 'User' : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection