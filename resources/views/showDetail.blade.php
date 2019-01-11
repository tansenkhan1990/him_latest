@extends('layouts.masterHomePage')
@section('content')

    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ Session::get('message') }}</strong>
            </div>

        @endif

        @if(isset($posts))

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>university</th>
                    <th>Email</th>
                </thead>
                @foreach($posts as $post)
                    <tbody>
                    <tr>
                        <td>{{$post->vorname}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->university}}</td>
                        <td>@if($post->email1==null)
                                Not Given
                            @else
                            {{$post->email1}}
                                @endif
                        </td>

                        <td><a href=
                               "{{ route('PersonDetailInfo', ['id' =>$post->id]) }}"
                               button type="button" class="btn btn-primary">
                                Detail</button></td>

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