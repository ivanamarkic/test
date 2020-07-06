 <head>
   <!-- Kalendar potrebni libary -->
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <link rel="stylesheet" href="css\Kalendar.scss">
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="js\kalendar.js"></script>
      <script>

function myFunction(){

  var select = document.getElementById("id_godina");
  var length = select.options.length;
  for (i = length-1; i >= 1; i--) {
  select.options[i] = null;
}


var select = document.getElementById('id_smijer');
var sgodina = document.getElementById('id_godina');

  if(select.value != 0){
    var godina = document.getElementById('id_godina').style.visibility='visible';
}else if(select.value == 0){
  var godina = document.getElementById('id_godina').style.visibility='hidden';
 } 
 @foreach($godina as $element)
            if (select.value == {{$element->fk_smijer}})
            sgodina.options[sgodina.options.length] = new Option({{$element->godina}}, {{$element->id_godina}});
    @endforeach 


    
}

function function_potvrdi(){
  var godinaid= document.getElementById('id_godina').value;
  var smijerid= document.getElementById('id_smijer').value;

                   $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                      });
             $.ajax({
               type:'GET',
               url:'/pseu/public/dodaj',
               data:{"godina": godinaid,"smijer": smijerid},
               dataType: 'json',
               success:function(dataResult) {              
                  var dataall = dataResult.data
                  
                var kalendar = document.getElementById('calendar').style.visibility='visible';

$('#external-events div.external-event').each(function() {
         var eventObject = {
           title: $.trim($(this).text())
         };
         $(this).data('eventObject', eventObject);
         $(this).draggable({
           zIndex: 999,
           revert: true, 
           revertDuration: 0 
         });
       });
       var calendar = $('#calendar').fullCalendar({
         header: {
           left: 'title',
           center: 'agendaDay,agendaWeek',
           right: 'prev,next today'
         },
         editable: true,
         firstDay: 0, 
         selectable: true,
         defaultView: 'agendaWeek',
         axisFormat: 'h:mm',
         columnFormat: {
           month: 'ddd', 
           week: 'ddd d', 
           day: 'dddd M/d',
           agendaDay: 'dddd d'
         },
         titleFormat: {
           month: 'MMMM yyyy', 
           week: "MMMM yyyy",
           day: 'MMMM yyyy' 
         },
         allDaySlot: false,
         selectHelper: true,
         droppable: false, 
         drop: function(date, allDay) {
           var originalEventObject = $(this).data('eventObject');
           var copiedEventObject = $.extend({}, originalEventObject);
           copiedEventObject.start = date;
           copiedEventObject.allDay = allDay;
           $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
           if ($('#drop-remove').is(':checked')) {
             $(this).remove();
           }
         },
         events: //dataall
         
             [{title: 'asd',
            start: new Date(2020, 6, 6, 12, 0),
            end: new Date(2020, 6, 6, 14, 0),
            allDay: false,
            className: 'important'}]
        });          


               }
            });

 
}

      </script>

     <style>
       body {
         margin-bottom: 40px;
         margin-top: 40px;
         text-align: center;
         font-size: 14px;
         font-family: "Open Sans", sans-serif;
         background: url(http://www.digiphotohub.com/wp-content/uploads/2015/09/bigstock-Abstract-Blurred-Background-Of-92820527.jpg);
       }
   
       #wrap {
         width: 1100px;
         margin: 0 auto;
       }
   
       #external-events {
         float: left;
         width: 150px;
         padding: 0 10px;
         text-align: left;
       }
   
       #external-events h4 {
         font-size: 16px;
         margin-top: 0;
         padding-top: 1em;
       }
   
       .external-event {
         /* try to mimick the look of a real event */
         margin: 10px 0;
         padding: 2px 4px;
         background: #3366CC;
         color: #fff;
         font-size: .85em;
         cursor: pointer;
       }
   
       #external-events p {
         margin: 1.5em 0;
         font-size: 11px;
         color: #666;
       }
   
       #external-events p input {
         margin: 0;
         vertical-align: middle;
       }
   
       #calendar {
         /* 		float: right; */
         margin: 0 auto;
         width: 900px;
         background-color: #FFFFFF;
         border-radius: 6px;
         box-shadow: 0 1px 2px #C3C3C3;
         -webkit-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
         -moz-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
         box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
       }
     </style>
   
   
</head>
<select  name="smijer" id="id_smijer" onchange="myFunction()">
  <option value="0">Molimo odaberite smijer</option>
  @foreach($smijer as $element)
          <option value="{{$element->id_smijer}}">{{$element->Ime}}</option>
  @endforeach
</select>

  <select  name="godina" id="id_godina" style='visibility:hidden'>
    <option value="0">Molimo odaberite godinu</option>
  </select>

  </select>
  <button type="submit" class="btn btn-primary"  name="btnPotvrdi" onclick="function_potvrdi()">Potvrdi</button>


 <div id='wrap'>

    <div id='calendar' style='visibility:hidden'></div>

    <div style='clear:both'></div>
  </div>