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
            @if($b!=null)
            <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Responsible</th>
                <th>start</th>
                <th>end</th>

            </tr>
            </thead>

            <tbody>

            @foreach($b as $post)
                <tr>

                    <td>{{$post->title}}</td>
                    <td>{{$d[$post->type]}}</td>
                    <td>{{$post->name}}</td>
                    <td>@foreach($c as $dat)
                            @if($post->id==$dat->event)
                                {{$dat->datum}}


                            @endif
                        @endforeach
                    </td>
                    <td>@foreach($c as $dat)
                            @if($post->id==$dat->event)
                                {{$dat->poko}}


                            @endif
                        @endforeach
                    </td>
                    <td><a href="{{ route('showDetatilEvent', ['id' =>$post->id]) }}"
                           button type="button" class="btn btn-success">detail</abutton></td>




                </tr>

            @endforeach

             @endif
            </tbody>

        </table>
    </div>


    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Responsible</th>
                <th>start</th>
                <th>end</th>

            </tr>
            </thead>


            @if($users!=null)
            @foreach($users as $user)


            <tbody>
            <tr>
                <td>{{$user->title}}</td>
                <td>{{$typo[$user->type]}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @foreach($che as $ch)
                        @if($user->id==$ch->event)
                        {{$ch->datum}}
                        @endif
                        @endforeach
                </td>
                <td>
                    @foreach($che as $ch)
                        @if($user->id==$ch->event)
                            {{$ch->poko}}

                <td><a href="{{ route('showDetatilEvent', ['id' => $user->id]) }}"
                       button type="button" class="btn btn-success">detail</abutton></td>

                        @endif
                        @endforeach
                </td>
            </tr>

            </tbody>
                @endforeach
                @endif
    </table>
    </div>


@endsection