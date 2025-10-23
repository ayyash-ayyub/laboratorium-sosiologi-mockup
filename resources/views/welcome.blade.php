<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk | {{ config('app.name', 'Sosiologi Demo App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: url('{{ asset('images/bgut.webp') }}') center/cover no-repeat;
            z-index: -2;
            transform: scale(1.03);
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 1.5rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.14);
            border-radius: 24px;
            padding: 2.5rem 2.25rem;
            box-shadow: 0 22px 44px rgba(15, 23, 42, 0.2);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(255, 255, 255, 0.22);
        }

        .logo {
            display: block;
            max-width: 200px;
            width: 60%;
            margin: 0 auto 1.5rem;
        }

        h1 {
            margin: 0 0 0.75rem;
            font-size: 1.9rem;
            font-weight: 600;
            color: #0f172a;
        }

        .intro {
            margin: 0 0 1.5rem;
            font-size: 0.95rem;
            color: #334155;
            line-height: 1.5;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            font-size: 0.9rem;
            color: #0f172a;
        }

        input {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1px solid rgba(15, 23, 42, 0.12);
            border-radius: 14px;
            font-size: 1rem;
            margin-bottom: 1.1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        button {
            width: 100%;
            padding: 0.95rem 1rem;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #2563eb, #0ea5e9);
            color: #f8fafc;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 32px rgba(37, 99, 235, 0.25);
        }

        .hint {
            margin-top: 1.3rem;
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.5;
        }

        .hint strong {
            color: #0f172a;
            font-weight: 600;
        }

        .alert {
            padding: 0.85rem 1rem;
            border-radius: 14px;
            font-size: 0.88rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
        }

        .alert-error {
            background: rgba(248, 113, 113, 0.14);
            color: #b91c1c;
            border: 1px solid rgba(248, 113, 113, 0.35);
        }

        .disclaimer {
            margin-top: 2rem;
            font-size: 0.78rem;
            color: rgba(15, 23, 42, 0.55);
            text-align: center;
        }
    </style>
</head>
<body>
<div class="login-wrapper">
    <div class="login-card">
        <img src="{{ asset('images/UT_Header.webp') }}" class="logo" alt="Universitas Terbuka">
        <h1>{{ $strings['welcomeHeadline'] ?? 'Laboratorium Digital Sosiologi' }}</h1>
        <p class="intro">{{ $strings['welcomeCopy'] ?? 'Masuk untuk memulai pengelolaan modul, materi, dan aktivitas pembelajaran.' }}</p>

        @if(!empty($error))
            <div class="alert alert-error">{{ $error }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.perform') }}">
            @csrf
            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" required>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <button type="submit">Masuk</button>
        </form>

        <p class="hint">
           Versi Prototype Laboratorium Sosiologi

        </p>
    </div>
    <p class="disclaimer">Prototype login – belum terhubung ke basis data.</p>
</div>
</body>
</html>
