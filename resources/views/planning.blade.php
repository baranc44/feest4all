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
    <div class="container mt-5" style="max-width: 700px">
        <div class="row">
            <div class="col-12">
                <div class="col-md-11 offset-1 mt-5 mb-5">
                     <div id="calendar">

                     </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){       
            $('#calendar').fullCalendar({
                editable: true,
                header:{
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month, agendaDay'
                },
                buttonText:{
                    today: 'Vandaag',
                    month: 'Maand',
                    agendaDay: 'Dag'
                },
                events:'/planning'
                selectable:true,
                selectHelper: true,
                select:function(start, end, allday){
                    var title = prompt('Title:');
                    if(title){
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url:"/planning/action",
                            type:"POST",
                            data:{
                                 title: title,
                                 start: start,
                                 end: end,
                                 type: 'add'
                            },
                            success:function(data){
                                calendar.fullCalendar('refetchEvents');
                                alert("Gelukt! De taak is succesvol opgeslagen");
                            }
                        })
                    }
                }
            });          
        });        
    </script>
</body>
</html>