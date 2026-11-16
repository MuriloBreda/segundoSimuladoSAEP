<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oficina Flux</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: grid;
            min-height: 100vh;
            margin: 0;
            place-items: center;
            padding: 1.5rem;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #1e293b;
            font: 16px/1.6 system-ui, sans-serif;
        }

        main {
            width: min(100%, 680px);
            padding: 3rem;
            text-align: center;
            background: white;
            border-radius: 16px;
            box-shadow: 0 18px 50px #02061755;
        }

        h1 {
            margin: 0;
            color: #1d4ed8;
            font-size: clamp(2rem, 7vw, 3.5rem);
        }

        p {
            color: #475569;
        }

        a {
            display: inline-block;
            margin-top: 1rem;
            padding: .75rem 1.5rem;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <main>
    <h1>Oficina Flux</h1>
    <p>Sistema de gestão de clientes, veículos e agendamentos.</p>
    <p><a href="{{ route('login') }}">Entrar</a></p>
    </main>
</body>
</html>
