@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="container">
                    <h4 class="text-dark text-center">Forum List</h4>
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">Image</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                   <a class="btn btn-success float-right" href="{{ route('forums.create') }}">Add New Data</a>

                            </tr>
                        @foreach($forums as $forum)
                        <tr>
                            <td>{{ $forum->id }}</td>
                            <td>{{ $forum->name }}</td>
                            <td>{{ $forum->mobile }}</td>
                            <td>{{ $forum->occupation }}</td>
                            <td><img src="{{ asset("uploads/$forum->photo") }}" height="40px" width="80px;" alt=""></td>
                            <td>{{ $forum->address }}</td>
                            <td>
                            <a class="btn btn-sm btn-info" href="{{ route('forums.edit', $forum->id) }}">Edit</a>
                            <a class="btn btn-sm btn-dark" href="{{ route('forums.show', $forum->id) }}">Show</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['forums.destroy', $forum->id] ]) !!}
                            {!! Form::submit('Delete',['class' =>'btn btn-sm btn-danger d-custom-btn pull-right ']) !!}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
    </div>
</div>
@endsection
