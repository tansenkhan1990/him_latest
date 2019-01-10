@extends('layouts.masterHomePage')
@section('content')



    <div class="container center_div">
        <form class="navbar-form navbar-left"  action="{{route('searchEvent')}}">
            <div class="form-group">
                <input type="text" name="event" class="form-control" placeholder="search event
 with title" >
            </div>
            <button type="submit" class="btn btn-primary">search</button>
        </form>
    </div>



    <div class="container">
        <table class="table table-hover">

                <thead>
                <tr>
                    <th>Title</th>
                    <th>short_title</th>
                    <th>Type</th>
                    <th>start</th>
                    <th>end</th>

                </tr>
                </thead>

                <tbody>

                @foreach($c as $post)
                    <tr>

                        <td>{{$post->title}}</td>
                        <td>{{$post->short_title}}</td>
                        <td>{{$d[$post->type]}}</td>
                        <td>{{$post->datum}}</td>
                        <td>{{$post->poko}}</td>
                        <td><a href="{{ route('showDetatilEvent', ['id' =>$post->evnId]) }}"
                               button type="button" class="btn btn-success">detail</abutton></td>
                    @endforeach
                    </tbody>
        </table>
    </div>

@endsection
