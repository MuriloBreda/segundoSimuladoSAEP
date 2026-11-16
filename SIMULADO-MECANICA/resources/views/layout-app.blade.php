<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Oficina') - Oficina Flux</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f1f5f9;
            color: #1e293b;
            font: 16px/1.5 system-ui, sans-serif;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1rem max(1.25rem, calc((100% - 1100px) / 2));
            background: #0f172a;
            color: white;
        }

        header p {
            margin: 0;
        }

        header > p:first-child {
            font-size: 1.2rem;
            font-weight: 700;
        }

        header a {
            color: inherit;
            text-decoration: none;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        nav a:hover {
            color: #93c5fd;
        }

        main {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 18px #0f172a12;
        }

        h1 {
            margin-top: 0;
            color: #0f172a;
        }

        section {
            margin: 1.5rem 0;
            padding: 1.25rem;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        a {
            color: #1d4ed8;
        }

        main > p a,
        button {
            display: inline-block;
            padding: .65rem 1rem;
            border: 0;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font: inherit;
            cursor: pointer;
        }

        button:hover,
        main > p a:hover {
            background: #1d4ed8;
        }

        form {
            margin: 1rem 0;
        }

        form div {
            margin: 0 0 1rem;
        }

        label {
            display: block;
            margin-bottom: .35rem;
            font-weight: 600;
        }

        input,
        select {
            width: 100%;
            max-width: 560px;
            padding: .65rem .75rem;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font: inherit;
        }

        input:focus,
        select:focus {
            outline: 2px solid #93c5fd;
            border-color: #2563eb;
        }

        table {
            width: 100%;
            margin: 1rem 0;
            border-collapse: collapse;
        }

        th,
        td {
            padding: .75rem;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #f1f5f9;
            color: #334155;
        }

        tr:hover td {
            background: #f8fafc;
        }

        header button {
            background: #334155;
        }

        @media (max-width: 700px) {
            main {
                margin: 1rem;
                padding: 1rem;
                overflow-x: auto;
            }

            header {
                padding: 1rem;
            }

            table {
                min-width: 620px;
            }
        }
    </style>
</head>
<body>
    <header>
        <p><a href="{{ route('dashboard') }}">Oficina Flux</a></p>

        <nav aria-label="Navegação principal">
            <a href="{{ route('dashboard') }}">Painel</a>
            <a href="{{ route('clientes.index') }}">Clientes</a>
            <a href="{{ route('veiculos.index') }}">Veículos</a>
            <a href="{{ route('agendamentos.index') }}">Agendamentos</a>
        </nav>

        <p>Usuário: {{ auth()->user()->nome }}</p>

        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Sair</button>
        </form>
    </header>

    <main>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @yield('content')
    </main>
</body>
</html>
