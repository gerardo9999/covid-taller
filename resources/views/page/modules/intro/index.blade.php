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

<br>
<br>
<br>
    <section id="about">
        <div class="container-fluid">
        <div class="section-header">
            <h3 class="section-title">COVID -19</h3>
            <span class="section-divider"></span>
            <p class="section-description">
                La COVID-19 es la enfermedad infecciosa causada por el coronavirus que se ha descubierto más recientemente. 
                Tanto el nuevo virus como la enfermedad eran desconocidos antes de que estallara el brote en Wuhan (China) en diciembre de 2019.
            </p>
        </div>

            <div class="row">
                <div class="col-lg-6 about-img wow fadeInLeft foto" >
                  <style>
                    .foto{
                    padding: 80px;
                    } 
                  </style>
                <img src=" {{ asset('icon/covid19-coronavirus.jpg') }}" alt="">
            </div>

            <div class="col-lg-6 content wow fadeInRight">
            <h2>¿Cómo se propaga la COVID-19?</h2>
            <h3>Una persona puede contraer la COVID‑19 por contacto con otra que esté infectada por el virus. La enfermedad se propaga principalmente de persona a 
                persona a través de las gotículas que salen despedidas de la nariz o la boca de una persona infectada al toser, estornudar o hablar. Estas gotículas 
                son relativamente pesadas, no llegan muy lejos y caen rápidamente al suelo. Una persona puede contraer la COVID‑19 si inhala las gotículas procedentes 
                de una persona infectada por el virus. Por eso es importante mantenerse al menos a un metro de distancia de los demás. Estas gotículas pueden caer sobre
                los objetos y superficies que rodean a la persona, como mesas, pomos y barandillas, de modo que otras personas pueden infectarse si tocan esos objetos 
                o superficies y luego se 
                tocan los ojos, la nariz o la boca. Por ello es importante lavarse las manos frecuentemente con agua y jabón o con un desinfectante a base de alcohol.
            </h3>
            </div>
        </div>

        </div>
    </section><!-- #about -->

    <section id="more-features" class="section-bg">
        <div class="container">

          <div class="section-header">
              <h3 class="section-title">¿Cuándo debo acudir a recibir atención médica?</h3>
              <span class="section-divider"></span>
              <p class="section-description">Una persona debe sospechar de COVID-19 cuando presenta al menos dos de los siguientes síntomas:</p>
          </div>

          <div class="row">
              <div class="col-lg-6">
                <div class="box wow fadeInLeft">
                  <div class="icon"><img  style="width: 70px; height: 70px;" src="{{ asset('icon/fiebre.png') }}" alt=""></div>              
                  <h4 class="title"><a href="">Fiebre</a></h4>
          
                </div>
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInRight">
                  <div class="icon"><img  style="width: 75px; height: 75px;" src="{{ asset('icon/tos.png') }}" alt=""></div>
                  <h4 class="title"><a href="">Tos</a></h4>
                  
                </div>
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInLeft">
                  <div class="icon"><img  style="width: 70px; height: 70px;" src="{{ asset('icon/dolor-de-cabeza.png') }}" alt=""></div>       
                  <h4 class="title"><a href="">Dolor de cabeza</a></h4>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInRight">
                  <div class="icon"><img  style="width: 70px; height: 70px;" src="{{ asset('icon/dolor-de-garganta.png') }}" alt=""></div>
                  <h4 class="title"><a href="">Dolor de garganta</a></h4>
                </div>
              </div>

              <div class="col-lg-8 section-header">
                  <span class="section-divider"></span>
                  <p class="section-description text-center">Y que se acompaña de alguno de los siguientes:</p> 
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInLeft">
                  <div class="icon"><img  style="width: 75spx; height: 75px;" src="{{ asset('icon/aliento.png') }}" alt=""></div>
                  <h4 class="title"><a href="">Dificultad para respirar</a></h4>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInRight">
                  <div class="icon"><img  style="width: 75px; height: 75px;" src="{{ asset('icon/frio.png') }}" alt=""></div>
                  <h4 class="title"><a href="">Escurrimiento nasal</a></h4>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInLeft">
                  <div class="icon"><img  style="width: 75px; height: 75px;" src="{{ asset('icon/ojos-rojos.png') }}" alt=""></div>
                  <h4 class="title"><a href="">Ojos rojos</a></h4>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="box wow fadeInRight">
                  <div class="icon"><img  style="width: 75px; height: 75px;" src="{{ asset('icon/dolor-de-pecho.png') }}" alt=""></div>
                  <h4 class="title"><a href="">Dolores en músculos o articulaciones.</a></h4>
                </div>
              </div>
          </div>
        </div>

    </section>

    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Medidas Preventivas</h3>
          <span class="section-divider"></span>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img style="width: 180px; height: 180px;" src="icon/multitud.png" alt=""></div>
              <h4>Evitar contacto con personas contagiadas</h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img style="width: 180px; height: 180px;" src="icon/grifo-de-agua.png" alt=""></div>
              <h4>Lavarse las manos</h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img style="width: 180px; height: 180px;" src="icon/distanciamiento-social.png" alt=""></div>
              <h4>Distancia de 2 a 1 metro entre personas</h4>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img style="width: 180px; height: 180px;" src="icon/taparse-tos.png" alt=""></div>
              <h4>Cubrirse la boca y la nariz al tocer o estornudar</h4>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section id="faq" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Preguntas Frecuentes</h3>
          <span class="section-divider"></span>
        </div>
        <ul id="faq-list" class="wow fadeInUp">
            <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">¿Cómo se transmite? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
                <p>Los coronavirus humanos se transmiten de una persona infectada a otras:</p>
                <p>a través de las gotículas que expulsa un enfermo al toser y estornudar al tocar o estrechar la mano de una persona enferma, un objeto o superficie contaminada con el virus y luego llevarse las manos sucias a boca, nariz u ojos.</p>

            </div>
            </li>
            <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">¿Qué debo hacer si tengo síntomas de COVID-19 y cuándo he de buscar atención médica?<i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
                <p>Si tiene síntomas leves, como tos o fiebre leves, generalmente no es necesario que busque atención médica. Quédese en casa, aíslese y vigile sus síntomas. Siga las orientaciones nacionales sobre el autoaislamiento. Sin embargo, si vive en una zona con paludismo (malaria) o dengue, es importante que no ignore la fiebre. Busque ayuda médica. Cuando acuda al centro de salud lleve mascarilla si es posible, manténgase al menos a un metro de distancia de las demás personas y no toque las superficies con las manos. En caso de que el enfermo sea un niño, ayúdelo a seguir este consejo.</p>
                <p>Busque inmediatamente atención médica si tiene dificultad para respirar o siente dolor o presión en el pecho. Si es posible, llame a su dispensador de atención de la salud con antelación para que pueda dirigirlo hacia el centro de salud adecuado.</p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">¿Cómo podemos protegernos a nosotros mismos y a los demás si no sabemos quién está infectado?<i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
                <p>Practicar la higiene respiratoria y de las manos es importante en TODO momento y la mejor forma de protegerse a sí mismo y a los demás.</p>
                <p>Cuando sea posible, mantenga al menos un metro de distancia entre usted y los demás. Esto es especialmente importante si está al lado de alguien que esté tosiendo o estornudando. Dado que es posible que algunas personas infectadas aún no presenten síntomas o que sus síntomas sean leves, conviene que mantenga una distancia física con todas las personas si se encuentra en una zona donde circule el virus de la COVID‑19.</p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">¿Cuál es la diferencia entre aislamiento, cuarentena y distanciamiento?<i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
                <p>La cuarentena significa restringir las actividades o separar a las personas que no están enfermas pero que pueden haber estado expuestas a la COVID‑19. El objetivo es prevenir la propagación de la enfermedad en el momento en que las personas empiezan a presentar síntomas.</p>
                <p>El aislamiento significa separar a las personas que están enfermas con síntomas de COVID‑19 y pueden ser contagiosas para prevenir la propagación de la enfermedad.</p>
                <p>El distanciamiento físico significa estar físicamente separado. La OMS recomienda mantener una distancia de al menos un metro con los demás. Es una medida general que todas las personas deberían adoptar incluso si se encuentran bien y no han tenido una exposición conocida a la COVID‑19.</p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">¿Pueden los niños o los adolescentes contraer la COVID‑19?<i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
                <p>Las investigaciones indican que los niños y los adolescentes tienen las mismas probabilidades de infectarse que cualquier otro grupo de edad y pueden propagar la enfermedad. </p>
                <p>Las pruebas hasta la fecha sugieren que los niños y los adultos jóvenes tienen menos probabilidades de desarrollar una enfermedad grave, pero con todo se pueden dar casos graves en estos grupos de edad.</p>
                <p>Los niños y los adultos deben seguir las mismas pautas de cuarentena y aislamiento si existe el riesgo de que hayan estado expuestos o si presentan síntomas. Es particularmente importante que los niños eviten el contacto con personas mayores y con otras personas que corran el riesgo de contraer una enfermedad más grave.</p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">¿Existe alguna vacuna, medicamento o tratamiento contra la COVID‑19?<i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
                <p>Aunque algunas soluciones de la medicina occidental o tradicional o remedios caseros pueden resultar reconfortantes y aliviar los síntomas leves de la COVID-19, hasta ahora ningún medicamento ha demostrado prevenir o curar esta enfermedad. La OMS no recomienda automedicarse con ningún fármaco, incluidos los antibióticos, para prevenir o curar la COVID-19. Sin embargo, hay varios ensayos clínicos en marcha, tanto de medicamentos occidentales como tradicionales. La OMS está coordinando la labor de desarrollo de vacunas y medicamentos para prevenir y tratar la COVID-19 y seguirá proporcionando información actualizada a medida que se disponga de los resultados de las investigaciones.</p>
            </div>
            </li>

        </ul>
        

      </div>
    </section>

@endsection