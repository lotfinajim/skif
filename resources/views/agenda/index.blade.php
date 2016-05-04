


@extends('layout')

@section('title')
Agenda - Skif
@stop

@section('content')


<div id="calendar"></div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titreModal">Modal title</h4>
            </div>
            <div class="modal-body" >
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-3 ">
                        {!! Form::label('name', 'Start :')!!}
                        {!! Form::text('start', null, ['class' => ' input-group date form-control contact','id'=>'start', 'readonly']) !!}
                    </div>
                    <div class="form-group col-xs-12 col-sm-3 col-sm-push-1">
                        {!! Form::label('name', 'End :')!!}
                        {!! Form::text('end', null, ['class' => 'input-group date form-control contact','id'=>'end', 'readonly']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        {!! Form::label('name', 'Adresse :')!!}
                        <iframe id="modalMap" src="" width="100%" height="300px"></iframe>
                    </div>
                </div>
               <div class="row">
                   <div id="modalContent"></div>
               </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function() {

        var m = moment();
        $('#calendar').fullCalendar({
            eventClick: function(calEvent, jsEvent, view) {
               var id= calEvent.id;
               jQuery.ajax({
                   url: "{!!URL::route('event')!!}",
                   data:'query=' + id,
                   dataType:'JSON',
                   async:true,
                   success:function(data){
                        //jQuery('#id').val(data.id);

                       jQuery('#myModal').modal('show');
                       jQuery('#modalMap').attr('src',data.map);
                        jQuery('#start').val(data.start).css('background-color','white');
                       jQuery('#end').val(data.end).css('background-color','white');
                       jQuery('#titreModal').html("<h2>"+data.titre+"</h2>").css('text-align','center');
                       jQuery('#modalContent').html(data.content).css('text-align','justify');
                   }
               });


            },
            buttonIcons:{
                prev: 'left-single-arrow',
                next: 'right-single-arrow',
                prevYear: 'left-double-arrow',
                nextYear: 'right-double-arrow'
            },
            header: {
                left: 'prev,next today update',
                center: 'prevYear title nextYear',
                right: 'month,agendaWeek,agendaDay'

            },
           eventDragStop: function(event, jsEvent, ui, view) {
                console.log(event);
                        $.ajax({
                            type: 'GET',
                            url: "{!!URL::route('token')!!}",
                            async: false,
                            context: this,
                            data: "",
                            timeout: this.url_check_timeout,
                            success: function (token) {
                                this.csrf_token = token;
                                var data = {
                                    id:event.id,
                                    newDate:event.start._d,
                                    token: this.csrf_token
                                }


                            }.bind(this),
                            error: function () {
                                this.lastError = NetError.invalidURL;
                            }.bind(this)
                        });
            },


            events : "{{route('calendar')}}",
            eventColor: '#4bc6cf',
            firstDay: 1,
            defaultView: 'month',
          //  editable: true,
            theme: false
        });
    });

</script>

@stop