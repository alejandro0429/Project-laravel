@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('')])

@section('content')
            <!--Enter code here -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>condomino once</title>
                <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
            </head>
            <body>
                <div class="card">
                    <div class="circle">
                        <div class="content">
                            <h2>Condominio 11</h2>
                            <p>Es importante regular la forma en que los copropietarios van a tomar las decisiones con respecto a la propiedad que tienen en común.
                                 A tal efecto, pueden darse relaciones de mancomunidad o de solidaridad. También es importante regular los casos de extinción de la
                                  copropiedad y disolución de la comunidad de bienes.</p>
                                 <a href="#">Bienvenido</a>
                        </div>
                        <img src="{{ asset('/img/can-red.png') }}">
                    </div>
                </div>




            </body>
            </html>
        </div>
    </div>
</div>
@endsection