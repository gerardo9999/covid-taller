@extends('welcome')
@section('contenido')

<section id="intro">
    <div class="intro-text">
        <h2>Bienvenido</h2>
        <p>Realiza tu autoevaluación del Coronavirus COVID-19</p>
        <a href="{{ route('cuestionario.index') }}" class="btn-get-started scrollto">Ingresar</a>
    </div>
    <div class="product-screens">
        
    </div>
</section>

@endsection