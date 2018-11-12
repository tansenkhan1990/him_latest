@extends('layouts.masterHomePage')

@section('content')



    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ Session::get('message') }}</strong>
            </div>

        @endif
        <h2>List of Register User</h2><br>

        @if(!empty($posts))

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>mobile</th>
            </tr>
            </thead>
            @foreach($posts as $post)
                <tbody>
                <tr>
                    <td>{{$post->firstname}}</td>
                    <td>{{$post->lastname}}</td>
                    <td>{{$post->email}}</td>
                    <td>{{$post->mobile}}</td>
                    <td><a href="{{ route('deleteUser',$post->id) }}" button type="button" class="btn btn-danger">delete</abutton></td>
                </tr>
                </tbody>
            @endforeach
        </table>
            @endif

    </div>

    <div class="footer">
        <p>@copyright by <I>Hausdorff center for Mathematics</I> </p>
    </div>


@endsection