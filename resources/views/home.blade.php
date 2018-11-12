@extends('layouts.masterHomePage')

@section('content')

<div class="container">


    <br><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">welcome {{Auth::User()->firstname}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="footer">
        <p>@copyright by <I>Hausdorff center for Mathematics</I> </p>
    </div>
@endsection
