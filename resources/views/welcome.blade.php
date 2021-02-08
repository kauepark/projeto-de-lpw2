<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To Do List</title>
        <style>
            html, body {
                background-color: rgb(250, 250, 250);
                color: rgb(128, 128, 128);
                font-family: 'Roboto', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .flex-centro {
                position: relative;
                align-items: center;
                display: flex;
                height: 100vh;
                justify-content: center;
            }

            .top-right {
                position: absolute;
                right: 12px;
                top: 17px;
            }

            .conteudo {
                text-align: center;
            }

            .titulo {
                font-size: 84px;
                margin-bottom: 30px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 27px;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div class="flex-centro">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ route('home') }}">Tarefas</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Criar conta</a>
                    @endif
                </div>
            @endif

            <div class="conteudo">
                <div class="titulo">
                    To Do List
                </div>
            </div>
        </div>
    </body>
</html>
