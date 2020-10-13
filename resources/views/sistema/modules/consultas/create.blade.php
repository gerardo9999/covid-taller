@extends('principal.index')
@section('content')
@role('administrador')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Consulta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Hospital</a></li>
                <li class="breadcrumb-item active">Crear Consulta</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div>
        <form action="{{ route('consulta.store') }}" method="post">
            @csrf
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Informacion Consulta</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="">Medico</label>   
                            <div class="input-group-prepend">
                                <select name="medico" id="medico" class='select-nacionalidad form-control form-control-sm'  >
                                    <option value="" >Seleccionar Medico</option>
                                    @foreach ($medicos as $medico)
                                    <option  value="{{ $medico->id }}">{{ $medico->nombre }} {{ $medico->apellidos }}</option>
                                    @endforeach
                                </select>
                                <button  class="btn btn-info btn-sm" type="button"><i class="fas fa-search" wire:click="mostrarLista_medico()"></i></button>
                                @error('medico')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                            </div>

                    </div>

                    <div class="form-group col-6">
                        <label for="">Paciente</label>
                        
                            <div class="input-group-prepend">
                                <select name="paciente" id="paciente" class='select-nacionalidad form-control form-control-sm'  >
                                    <option value="" >Seleccionar Paciente</option>
                                    @foreach ($pacientes as $paciente)
                                    <option  value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellidos }}</option>
                                    @endforeach
                                </select>
                                <button  class="btn btn-info btn-sm" type="button"><i class="fas fa-search" wire:click="mostrarLista_paciente()"></i></button>
                            </div>
                        
                    </div>                      
                </div>
                
                <div class="row">
                    <div class="form-group col-6">
                        <label>Fecha de Programada</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" data-target="#reservationdate" class="form-control form-control-sm date-fecha @error('fecha_programada') is-invalid @enderror " name="fecha_programada" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                            @error('fecha_programada')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                    </div>
                    <div class="col-6">
                        <label for="apellidos">Motivo Consulta</label> 
                        <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control form-control-sm @error('motivo_consulta') is-invalid @enderror" placeholder="Escriba motivo de la consulta">
                            @error('motivo_consulta')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                    </div>
                </div>

            </div>
        </div> 
        <div class="card">
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Guardar Registro</button>
            </div>
        </div>
        </form>

    </div> 
@endrole
@role('medico')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Consulta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Hospital</a></li>
                <li class="breadcrumb-item active">Crear Consulta</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
        <form action="{{ route('consulta.store.medico') }}" method="post">
            @csrf
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Informacion Consulta</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-6">
                            <label for="">Paciente</label>
                            
                            <div class="input-group-prepend">
                                <select name="paciente" id="paciente" class='select-nacionalidad form-control form-control-sm'  >
                                    <option value="" >Seleccionar Paciente</option>
                                    @foreach ($pacientes as $paciente)
                                    <option  value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellidos }}</option>
                                    @endforeach
                                </select>
                                <button  class="btn btn-info btn-sm" type="button"><i class="fas fa-search" wire:click="mostrarLista_paciente()"></i></button>
                            </div>
                        </div>    
                        <div class="form-group col-6">
                            <label for="">Hora Programada</label>
                            
                            <label class="col-md-3 form-control-label" for="text-input">Hora</label>
                                <input type="time" name="hora_programada" class="form-control" placeholder="Hora de Reserva">                                        
                            @error('hora_programada')
                                <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                            @enderror
                        </div>                      
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Fecha de Programada</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" data-target="#reservationdate" class="form-control form-control-sm date-fecha @error('fecha_programada') is-invalid @enderror " name="fecha_programada" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                                @error('fecha_programada')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                        </div>
                        <div class="col-6">
                            <label for="apellidos">Motivo Consulta</label> 
                            <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control form-control-sm @error('motivo_consulta') is-invalid @enderror" placeholder="Escriba motivo de la consulta">
                                @error('motivo_consulta')
                                    <small><strong><p style="color: red">{{ $message }}</p></strong></small>
                                @enderror
                        </div>
                    </div>

                </div>
            </div> 
            {{-- <div class=" card card-success">
                <div id='calendar'></div>
            </div> --}}
            <div class="card">
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Guardar Registro</button>
                    <a href="{{ route('consulta.index') }}" class="btn btn-danger btn-sm">Cancelar Registro</a>

                </div>
            </div>
        </form>
@endrole
@endsection
@section('full-calendar-js')

    {{-- <script src='{{ asset('fullcalendar/main.js') }}'></script> --}}
    {{-- <script>

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'local',
            // initialDate: '2018-06-01' ,  //inicializacion de la fecha
            initialView: 'dayGridMonth'
        });
        calendar.setOption('locale','Es');   // para el idioma español del calendario
        calendar.render();
      });
      
    </script> --}}


    {{-- <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
      
          var calendar = new FullCalendar.Calendar(calendarEl, {
            
            headerToolbar: {
              left: 'prev,next today MiBoton',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            // initialDate: '2020-09-12',
           customButtons : {
               Miboton :{
                   text:"Boton",
                   click:function () { 
                       alert("Hola")
                    }
               }
           }
          });
          calendar.setOption('locale','Es');
          calendar.render();
        });
      
    </script> --}}
@endsection


{{-- navLinks: true, // can click day/week names to navigate views
selectable: true,
selectMirror: true,
select: function(arg) {
  var title = prompt('Event Title:');
  if (title) {
    calendar.addEvent({
      title: title,
      start: arg.start,
      end: arg.end,
      allDay: arg.allDay
    })
  }
  calendar.unselect()
},
eventClick: function(arg) {
  if (confirm('Are you sure you want to delete this event?')) {
    
    arg.event.remove()
  }
},
editable: true,
dayMaxEvents: true, // allow "more" link when too many events
events: [
  {
    title: 'All Day Event',
    start: '2020-09-01'
  },
  {
    title: 'Long Event',
    start: '2020-09-07',
    end: '2020-09-10'
  },
  {
    groupId: 999,
    title: 'Repeating Event',
    start: '2020-09-09T16:00:00'
  },
  {
    groupId: 999,
    title: 'Repeating Event',
    start: '2020-09-16T16:00:00'
  },
  {
    title: 'Conference',
    start: '2020-09-11',
    end: '2020-09-13'
  },
  {
    title: 'Meeting',
    start: '2020-09-12T10:30:00',
    end: '2020-09-12T12:30:00'
  },
  {
    title: 'Lunch',
    start: '2020-09-12T12:00:00'
  },
  {
    title: 'Meeting',
    start: '2020-09-12T14:30:00'
  },
  {
    title: 'Happy Hour',
    start: '2020-09-12T17:30:00'
  },
  {
    title: 'Dinner',
    start: '2020-09-12T20:00:00'
  },
  {
    title: 'Birthday Party',
    start: '2020-09-13T07:00:00'
  },
  {
    title: 'Click for Google',
    url: 'http://google.com/',
    start: '2020-09-28'
  }
] --}}