<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
        {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- Preguntas frecuentes --}}




    <section id="contact">
        <div class="container">


          <div class="row fadeInUp">
           
            {{ $paciente }}
           
          </div>
        </div>
      </section><!-- #contact -->
    {{-- <section id="faq">
        <div class="container">

        <div class="section-header">
            <h3 class="section-title">Preguntas Frecuentes</h3>
            <span class="section-divider"></span>
            <p class="section-description">Es necesario que responda todas las preguntas</p>
        </div>

        <ul id="faq-list" class="wow fadeInUp">
            <li>
                @foreach ($preguntas as $pregunta)
                <a data-toggle="collapse" class="collapsed" href="#faq1{{ $pregunta->id }}">{{ $pregunta->pregunta }} <i class="ion-android-remove"></i></a>
                <div id="faq1{{ $pregunta->id }}" class="collapse" data-parent="#faq-list">
                    <p>
                        <input type="checkbox" class="form-control"> 

                    </p>
                </div>
                @endforeach
            </li>
        </ul>
        </div>
    </section> --}}
</div>
