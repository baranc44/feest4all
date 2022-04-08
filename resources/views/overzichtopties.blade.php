<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>
<body>
    <div id="schedule-calendar"></div>
<!-- Add Modal -->
<div class="container mt-5" style="max-width: 700px">
    <div class="col-12">
            <div id="calendar"></div>
            <div id="dayPopup"></div>
        <div style="position:relative; top:5px;">
            <table class="table table-striped">
            <tbody>
                @foreach($user as $user)
            <tr>
                <td>{{ $user->name }}</td>
            </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
    
    <script>
        $(document).ready(function(){       
            $('#calendar').fullCalendar({
                editable: true,
                header:{
                    right: 'prev,next',
                },
                events:'/planning'
            });          
        });        
    </script>
</body>
</html>