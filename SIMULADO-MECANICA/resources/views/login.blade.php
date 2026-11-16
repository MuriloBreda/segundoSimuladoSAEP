<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar - Oficina Flux</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: grid;
            min-height: 100vh;
            margin: 0;
            place-items: center;
            padding: 1rem;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #1e293b;
            font: 16px/1.5 system-ui, sans-serif;
        }

        main {
            width: min(100%, 430px);
            padding: 2rem;
            background: white;
            border-radius: 14px;
            box-shadow: 0 18px 50px #02061755;
        }

        h1 {
            margin: 0;
            color: #1d4ed8;
        }

        h2 {
            margin-bottom: 0;
            color: #0f172a;
        }

        label {
            display: block;
            margin: 1rem 0 .35rem;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: .75rem;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font: inherit;
        }

        input:focus {
            outline: 2px solid #93c5fd;
            border-color: #2563eb;
        }

        button {
            width: 100%;
            margin-top: 1.25rem;
            padding: .75rem;
            border: 0;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        li {
            color: #b91c1c;
        }
    </style>
</head>
<body>
    <main>
        <h1>Oficina Flux</h1>
        <h2>Acesse sua conta</h2>
        <p>Entre com suas credenciais para continuar.</p>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{ route('login.store') }}">
            @csrf

            <div>
                <label for="email">E-mail</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div>
                <label for="password">Senha</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit">Entrar</button>
        </form>
    </main>
</body>
</html>
