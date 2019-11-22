@extends('layouts.master')

@section('estilos')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
@endsection

@section ('Contenido')

<div class="box-body">

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active">

                <img src="images/slider/1.jpg" alt="First slide" class="slider">
                <div class="textoperso1 ">
                    <h1 > MERCADO FOREX </h1>


                   <span> <font size="2" > ¡Aprende cómo hacer trading! . </font> </span>
                </div>
                <div class="textoperso1 ">

                       {{-- <span> <font size="2" > ¡Aprende cómo hacer trading! . </font> </span> --}}
                </div>


                <div class="carousel-caption">

                    <div class=" animated zoomInUp bounce delay-0s textoperso6">
                        <p>  Forex, también conocido como mercado de divisas, FX o trading de divisas,
                            es un mercado dónde se operan o transan pares de monedas de cada pais. </p>
                    </div>


                </div>

            </div>
            {{-- fin cuadro slide 1 --}}
            <div class="item">
                <img src="images/slider/2.jpg" alt="Second slide" class="slider">

                <div class="carousel-caption">
                    <div class=" animated zoomInUp bounce delay-0s textoperso6">
                            <span class="textoperso5"> Unete a nuestro Blog </span>
                        <p>  Aquí encontraras analisis diarios, de las principales divisas o "Majors". </p>
                    </div>
                    <div class=" animated zoomInUp bounce delay-0s textoperso6">
                        <p>   No es un Blog de señales de trading, sólo compartimos analisis para todos aquellos que tienen
                            poco conocimiento. </p>
                    </div>
                </div>
            </div>

            <div class="item">

              <img src="images/slider/3.jpg" alt="third slide" class="slider">
                <div class="carousel-caption">
                        <span> <font size="5" > ¿Pero qué es lo que significa esto para usted? </font> </span>

                        <p class=" animated ligthSpeedIn bounce delay-0s textoperso6">
                            Aprenda conceptos básicos de forex y encontrará interesantes oportunidades de trading
                            así generará un ingreso extra y podrá construir una libertad financiera. </p>

                </div>

            </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
  </div>
  <!-- /.box-body -->


@endsection

@section('Contenido2')



@endsection

