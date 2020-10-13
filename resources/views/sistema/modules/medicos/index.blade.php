@extends('principal.index')
@section('content')
@role('administrador')
@livewire('medicos')
@endrole
@role('medico')
@livewire('medicos')
@endrole
@role('paciente')
   Mi medico
@endrole
@endsection