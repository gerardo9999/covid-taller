@extends('welcome')
@section('contenido')
<br>    
<br>    
<br>    
<br>    
<br>    
<br>    
<br>
<section id="faq">
    <div class="container">

    <div class="section-header">
        <h3 class="section-title">Cuestionario {{ $persona }}</h3>
        <span class="section-divider"></span>
        <p class="section-description">Responde las siguientes preguntas</p>
    </div>

    <ul id="faq-list" class=" fadeInUp">
        @foreach (@preguntas() as $pregunta)
            <div id="pregunta{{ $pregunta->id }}">
                <li>
                    <a data-toggle="collapse" class="collapsed" href="#faq1"> {{  @getPregunta($pregunta->id) }} </a>
                    <div class="container">
                        <button onclick="respuesta({{ $pregunta->id }},'si')"  class ="btn btn-success btn-sm">Si</button>
                        <button onclick="respuesta({{ $pregunta->id }},'no')"  class ="btn btn-danger btn-sm">No</button>
                    </div>
                <li>
            </div>
        @endforeach
        </ul>
    </div>
    <div id="alert">
    
    </div>
    <form action="{{ route('cuestionario.detalle', ['id'=>$persona->id]) }}" method="post">
        @csrf
        <div id="respuestas">

        </div>
        <div id="button">
            <button type="submit"  class="btn btn-success btn-block"> Guardar Respuestas</button>
        </div>
    </form> 
</div>

</section>
<script>


    var yes     = 0;
    var no      = 0;
    var total   = 0;

    document.getElementById('button').style.display="none"
    document.getElementById('pregunta2').style.display="none";
    document.getElementById('pregunta3').style.display="none";
    document.getElementById('pregunta4').style.display="none";
    document.getElementById('pregunta5').style.display="none";
    document.getElementById('pregunta6').style.display="none";
    document.getElementById('pregunta7').style.display="none";
    document.getElementById('pregunta8').style.display="none";
    document.getElementById('pregunta9').style.display="none";
    document.getElementById('pregunta10').style.display="none";
    document.getElementById('pregunta11').style.display="none";
    document.getElementById('pregunta12').style.display="none";

    function respuesta(id,condicion) {
        if (condicion=='si') {
             this.yes++;
             this.total++
        } else {
              this.no++;
              this.total++;
        }
        var fila = `
                    <input type="hidden" name="idPregunta[]" value="${id}">
                    <input type="hidden" name="respuesta[]" value="${condicion}" readonly class="form-control">
                    <input type="hidden" name="no" value="${this.no}" readonly class="form-control">
                    <input type="hidden" name="si" value="${this.si}" readonly class="form-control">
                `;
        $("#respuestas").append(fila);

        for (let index = 0; index < 12; index++) {
            if(id < 12){

                if((id) == index+1){
                    document.getElementById('pregunta'+id).style.display="none"

                }else{
                    document.getElementById('pregunta'+(id+1)).style.display="block"
                }
            }else{
                document.getElementById('pregunta'+id).style.display="none"
                document.getElementById('button').style.display="block";


                document.getElementById("alert").innerHTML = `      
                                                                            
                                                            `;
                
                
                if(this.yes < 3){
                    document.getElementById("alert").innerHTML = `      




                                                                        <div class="alert alert-info" role="alert">
                                                                            Baja Probabilidad
                                                                        </div>
                                                                        
                                                                        <div class="alert alert-success" role="alert">
                                                                                <h4 class="Hemos guardado tu informacion!</h4>
                                                                                <p> Puedes iniciar sesion con tu password y correo electronico, 
                                                                                    tus datos no seran publico tu seguridad es importante para nosotros
                                                                                </p>
                                                                                <hr>
                                                                                <p class="mb-0">Necesitamos que guardes tus respuestas del cuestionario para poder saber sobre tus probabilidades de ser portados o no del COVID-19</p>
                                                                                <p><strong>Guarda tus datos por favor !!</strong></p>
                                                                        </div>
                                                                        
                                                                        `
                                                                        
                                                                        
                                                                        ;
                }
                if(this.yes > 3 && this.yes < 6){
                    document.getElementById("alert").innerHTML = `      
                                                                      
                    
                                                                        <div class="alert alert-warning" role="alert">
                                                                            Media Probabilidad
                                                                        </div>
                                                                        <div class="alert alert-success" role="alert">
                                                                                <h4 class="Hemos guardado tu informacion!</h4>
                                                                                <p> Puedes iniciar sesion con tu password y correo electronico, 
                                                                                    tus datos no seran publico tu seguridad es importante para nosotros
                                                                                </p>
                                                                                <hr>
                                                                                <p class="mb-0">Necesitamos que guardes tus respuestas del cuestionario para poder saber sobre tus probabilidades de ser portados o no del COVID-19</p>
                                                                                <p><strong>Guarda tus datos por favor !!</strong></p>
                                                                        </div>
                                                                        
                                                                        
                                                                        `;
                }
                if(this.yes > 3 && this.yes >= 7){
                    document.getElementById("alert").innerHTML = `      

                                                                        <div class="alert alert-danger" role="alert">
                                                                            Alta Probabilidad
                                                                        </div>
                                                                        <div class="alert alert-success" role="alert">
                                                                                <h4 class="Hemos guardado tu informacion!</h4>
                                                                                <p> Puedes iniciar sesion con tu password y correo electronico, 
                                                                                    tus datos no seran publico tu seguridad es importante para nosotros
                                                                                </p>
                                                                                <hr>
                                                                                <p class="mb-0">Necesitamos que guardes tus respuestas del cuestionario para poder saber sobre tus probabilidades de ser portados o no del COVID-19</p>
                                                                                <p><strong>Guarda tus datos por favor !!</strong></p>
                                                                        </div>
                                                                        
                                                                        
                                                                        `;
                }
            }
        }
    }

</script>
@endsection