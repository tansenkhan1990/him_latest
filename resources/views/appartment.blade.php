@extends('layouts.masterHomePage')
@section('content')

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <div class="container">
        <h3>Calendar</h3>
        <hr>
        <div class="row">
        <div class="col-md-6">
            <h3>apt1</h3>
            <div id='calendar'></div>
        </div>
        <div class="col-md-6">
            <h3>apt2</h3>
            <div id='calendar2'></div>
        </div>
        </div>
        <hr>
        <h3>Calendar2</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h3>apt3</h3>
                <div id='calendar3'></div>
            </div>
        </div>
    </div>


    {{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                        @foreach($tasks as $task)
                    {
                        title : '{{ $task->strasse }}',
                        start : '{{ $task->von }}',
                        end   :'{{ $task->bis}}',
                        {{--url : '{{ route('#', $task->id) }}'--}}
                    },
                    @endforeach
                ]
            })
        });
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar2').fullCalendar({
                // put your options and callbacks here
                events : [
                        @foreach($tasks as $task)
                    {
                        title : '{{ $task->strasse }}',
                        start : '{{ $task->von }}',
                        end   :'{{ $task->bis}}',
                        {{--url : '{{ route('#', $task->id) }}'--}}
                    },
                    @endforeach
                ]
            })
        });
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar3').fullCalendar({
                // put your options and callbacks here
                events : [
                        @foreach($tasks as $task)
                    {
                        title : '{{ $task->strasse }}',
                        start : '{{ $task->von }}',
                        end   :'{{ $task->bis}}',
                        {{--url : '{{ route('#', $task->id) }}'--}}
                    },
                    @endforeach
                ]
            })
        });
    </script>
    {{--<div class="footer">--}}
        {{--<p>@copyright by <I>Hausdorff center for Mathematics</I> </p>--}}
    {{--</div>--}}
@endsection