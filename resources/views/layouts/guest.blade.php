<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion — CMC Emplois du Temps</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cmc: #1797a7; --cmc-dark: #0f5f6b; }
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #0f2942 0%, #1797a7 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-wrapper { width: 100%; max-width: 460px; padding: 16px; }
        .login-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,0.25); }
        .login-header { background: linear-gradient(135deg, #0f2942, #1797a7); padding: 32px; text-align: center; }
        .login-header img { height: 44px; object-fit: contain; background: white; border-radius: 7px; padding: 3px 8px; margin: 0 8px; }
        .login-header h1 { color: white; font-size: 18px; font-weight: 700; margin: 16px 0 4px; }
        .login-header p { color: rgba(255,255,255,0.7); font-size: 13px; margin: 0; }
        .login-body { padding: 32px; }
        .form-label { font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-control { border: 1.5px solid #d1d5db; border-radius: 10px; padding: 10px 14px; font-size: 14px; transition: all 0.2s; }
        .form-control:focus { border-color: var(--cmc); box-shadow: 0 0 0 3px rgba(23,151,167,0.12); }
        .btn-login { background: linear-gradient(135deg, #1797a7, #0f5f6b); color: white; border: none; padding: 12px; border-radius: 10px; font-weight: 700; font-size: 15px; width: 100%; transition: opacity 0.2s, transform 0.1s; }
        .btn-login:hover { opacity: 0.9; transform: translateY(-1px); color: white; }
        .form-check-input:checked { background-color: var(--cmc); border-color: var(--cmc); }
        .divider { height: 1px; background: #e5e7eb; margin: 20px 0; }
        .back-link { display: flex; align-items: center; justify-content: center; gap: 6px; color: #64748b; font-size: 13px; text-decoration: none; margin-top: 16px; }
        .back-link:hover { color: var(--cmc); }
        .error-msg { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; border-radius: 10px; padding: 10px 14px; font-size: 13px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <img src="{{ asset('images/logo2.png') }}" alt="OFPPT">
                    <img src="{{ asset('images/logo1.png') }}" alt="CMC">
                </div>
                <h1>Gestion des Emplois du Temps</h1>
                <p>CMC Rabat-Salé-Kénitra — Pôle Digital et IA</p>
            </div>
            <div class="login-body">
                <h2 class="mb-1" style="font-size:20px; font-weight:800; color:#1e293b;">Connexion</h2>
                <p class="mb-4" style="font-size:13px; color:#64748b;">Entrez vos identifiants pour accéder à votre espace.</p>

                {{ $slot }}

                <div class="divider"></div>
                <a href="{{ route('home') }}" class="back-link">
                    <i class="bi bi-arrow-left"></i> Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</body>
</html>
