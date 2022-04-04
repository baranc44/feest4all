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
<div class="modal fade" id="schedule-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Your Schedule</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Schedule Name:</label>
                        <input type="text" class="form-control">
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Add Your Schedule</button>
            </div>
        </div>
    </div>
</div>
    <div class="container mt-5" style="max-width: 700px">
        <div class="row">
            <div class="col-12">
                <div class="col-md-11 offset-1 mt-5 mb-5">
                     <div id="calendar"></div>
                     <div id="dayPopup"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){       
            $('#calendar').fullCalendar({
                editable: true,
                header:{
                    right: 'prev,next'
                },
                events:'/planning',
                selectable:true,
                selectHelper: true,
                select:function(start, end, allday){
                    var title = prompt("Title:");
                    if(title){
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD h:mm:ss');
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD h:mm:ss');    
                        $.ajax({
                            url:"planning/action",
                            type:"POST",
                            data:{
                                 title: title,
                                 start: start,
                                 end: end
                            },
                            success:function(data){                              
                                $('#calendar').fullCalendar('refetchEvents');
                                alert("Gelukt! De taak is succesvol opgeslagen");
                                console.log(data);
                            }
                                                    
                        })
                    }                  
                }
            });          
        });        
    </script>
</body>
</html>