@extends('layouts.app')
@section('title','Bienvenido a App Shop')
@section('body-class','landing-page')

@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        .row >[class*='col-']{
            display: flex;
            flex-direction: column;
        }

            .tt-query {
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
            color: #999
            }

            .tt-menu {    /* used to be tt-dropdown-menu in older versions */
            width: 422px;
            margin-top: 4px;
            padding: 4px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                    border-radius: 4px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                    box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {
            padding: 3px 20px;
            line-height: 24px;
            }

            .tt-suggestion.tt-cursor,.tt-suggestion:hover {
            color: #fff;
            background-color: #0097cf;

            }

            .tt-suggestion p {
            margin: 0;
            }

    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://scontent.flim15-2.fna.fbcdn.net/v/t31.0-8/11703466_474380999395827_7705652112672319349_o.jpg?_nc_cat=102&ccb=2&_nc_sid=9267fe&_nc_eui2=AeHYIwDU1RX2Muq2S_iAhV_6OI8h7b49ag44jyHtvj1qDne0Fr2AjgUrFXCkVT6wyUGhqdar7VAWpFIbYjcXoIcn&_nc_ohc=pcQ0dX9mMV8AX-a_ych&_nc_ht=scontent.flim15-2.fna&oh=6e95196f18968283519ccb8f40f525da&oe=5FBFC659');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a Biofoods Peru S.A.C</h1>
                <h4>Realiza pedidos en linea y te contactaremos para coordinar la entrega.</h4>
                <br />
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> ¿Cómo funciona?
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Por qué App Shop?</h2>
                    <h5 class="description">Puedes revisar nuestra relacion completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Atendemos tus dudas</h4>
                            <p>Atendemos rápidamente cualquier consulta que tengas via chat. No estas solo , sino que siempre estamos atentos a tus inquietudes.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Todo pedido que realices sera confirmado a través de una llamada. Si no confias en los pagos en linea puedes pagar contra entrega el valor acordado.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Información privada</h4>
                            <p>Los pedidos que realices solo los conoceras tú a través de tu panel de usuario. Nadie mas tiene acceso a esta Información.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Visita nuestras categorias</h2>

            <form class="form-inline" method="get" action="{{ url('/search') }}">
                <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search ">
                <button class="btn btn-primary btn-just-icon" type="submit" >
                    <i class="material-icons">search</i>
                </button>
            
            </form>




            <div class="team text-center">
                <div class="row">
                    @foreach($categories as $category)
                        
                    <div class="col-md-4">
                        <div class="team-player">
                          
                            <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoria {{ $category->name }}" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a> 
                            </h4>
                            <p class="description">{{ $category->description}}</p>
                            
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Work with us</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Name</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Your Messge</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        var product = new Bloodhound({
        datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.busca); },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: [
        { busca: 'prueba1' },
        { busca: 'prueba2' },
        { busca: 'hola 1' },
        { busca: 'hola 2' },
        { busca: 'abcde' }

        ]
        });
        
        // initialize the bloodhound suggestion engine
        product.initialize();
        
        // instantiate the typeahead UI
        $('input').typeahead(null, {
        displayKey: 'busca',
        source: product.ttAdapter()
        });

    </script>

@endsection
