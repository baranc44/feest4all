<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> 
</head>
<body>
<div id="calendar" style="width: 120vh; margin-left: auto; margin-right: auto;">
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
</div>
<!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltitle">Taak Plannen</h5>
        </div>
        <div id="data" class="modal-body">
        <table id="table">
          <label for="date">Datum:</label><br>
          <input type="date" id="date" disabled type="text"><br><br>
          <label for="selectUser">Werknemer:</label><br>
          <select id="selectUser" style="width:100%;">
            <option style="display:none"></option>
            @foreach($werknemer as $werknemer)
              <option id="werknemer" value="{{ $werknemer->id }}">{{ $werknemer->name }}</option>
            @endforeach
          <br><br></select><br><br>         
          <label for="selectProject">Project:</label><br>
          <select id="selectProject" style="width:100%;">
            <option style="display:none"></option>
            @foreach($project as $project)
              <option id="project" value="{{ $project->id }}">{{ $project->naam }}</option>
            @endforeach
          <br><br></select><br><br>
          <label for="uren">Aantal uren:</label><br>
          <input type="number" id="uren"><br><br>
          <label for="opmerking">Opmerkingen:</label><br>
          <input type="text" id="opmerking"><br><br>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="save(); hide();" id="btn" class="btn btn-primary">Opslaan</button>
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
          var planning = @json($events);
          var modal = document.getElementById('modal');    
          modal.addEventListener('hidden.bs.modal', function (event) {
            // Clear modal data
            $("#modal :input").val("");
          });
            $('#calendar').fullCalendar({
                editable: true,
                header:{
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month, agendaDay'
                },   
                events: [
                {
                  id: 'a',
                  title: 'asdf',
                  start: '2022-04-12'
                }
              ],
                url:'/planning',
                selectable:true,
                selectHelper: true,
                select:function(date){
                    var modal = new bootstrap.Modal(document.getElementById('modal'));
                    modal.show();  
                    var date = date.format();
                    $('#date').val(date);                                                                                                             
                }      
            });                    
        });      

        function hide(){
          var id = document.getElementById('modal');
          $('#modal').modal('hide');
        }
        function save(){     
        var date = document.getElementById('date').value;
        var project = document.getElementById('selectProject').value;
        var werknemer = document.getElementById('selectUser').value;
        var uren = document.getElementById('uren').value;
        var opmerking = document.getElementById('opmerking').value;
          $.ajax({
          type: "POST",
          url: "planning/action",
          data:{
            uren: uren,
            opmerking: opmerking,
            project: project,
            werknemer: werknemer,
            date: date
          }
        }).done(function(response){
          response = JSON.parse(response)
          console.log(response)
        })          
      }
    </script>
</body>
</html>
