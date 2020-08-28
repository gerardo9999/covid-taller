@extends('welcome')
@section('contenido')
<br>
<br>
<br>
    <section id="about" class="section-bg">
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
            <div class="col-lg-6 about-img wow fadeInLeft">
            <img src="{{ asset('sistema-web/img/about-img.jpg') }}" alt="">
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

  {{-- Sintomas --}}
    <section id="more-features" class="section-bg">
        <div class="container">

        <div class="section-header">
            <h3 class="section-title">Sintomas del Covid-19</h3>
            <span class="section-divider"></span>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

            <div class="col-lg-6">
            <div class="box wow fadeInLeft">
                <div class="icon"><img  style="width: 50px; height: 50px;" src="{{ asset('sistema-web/icon/virus.png') }}" alt=""></div>
                <h4 class="title"><a href="">Fiebre</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="box wow fadeInRight">
                <div class="icon"><img  style="width: 50px; height: 50px;" src="{{ asset('sistema-web/icon/virus.png') }}" alt=""></div>
                <h4 class="title"><a href="">Tos</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="box wow fadeInLeft">
                <div class="icon"><img  style="width: 50px; height: 50px;" src="{{ asset('sistema-web/icon/virus.png') }}" alt=""></div>
                <h4 class="title"><a href="">Cansancio</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="box wow fadeInRight">
                <div class="icon"><img  style="width: 50px; height: 50px;" src="{{ asset('sistema-web/icon/virus.png') }}" alt=""></div>
                <h4 class="title"><a href="">Dolor de garganta</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
            </div>

        </div>
        </div>
    </section>

{{-- Preguntas frecuentes --}}
    <section id="faq">
        <div class="container">

        <div class="section-header">
            <h3 class="section-title">Preguntas Frecuentes</h3>
            <span class="section-divider"></span>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <ul id="faq-list" class="wow fadeInUp">
            <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
                <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
            </div>
            </li>
            <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
                <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
                <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
                <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
                <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                </p>
            </div>
            </li>

            <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
                <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </p>
            </div>
            </li>

        </ul>

        </div>
    </section>
@endsection

{{-- icono --}}
{{-- https://www.flaticon.es/icono-gratis/virus_2585189?term=covid-19&page=1&position=3 --}}

{{-- sintomas --}}
{{-- https://www.mayoclinic.org/es-es/diseases-conditions/coronavirus/symptoms-causes/syc-20479963 --}}

{{-- preguntas frecuentes --}}
{{-- https://www.google.com/search?q=covid+19+informacion&oq=covid+19+informacion&aqs=chrome..69i57j0l7.5496j0j1&sourceid=chrome&ie=UTF-8 --}}
