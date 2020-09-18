@extends('principal.index')
@section('content')
    @role('administrador')
        @include('admin.modules.consultas.consultaadministrador')
    @endrole
    @role('paciente')
    @include('admin.modules.consultas.consultapaciente')
    @endrole

    @role('medico')
    @include('admin.modules.consultas.consultamedico')
    @endrole
@endsection