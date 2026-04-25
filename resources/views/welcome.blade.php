<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Emplois du Temps — CMC Pôle Digital et IA</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cmc: #1797a7; --cmc-dark: #0f5f6b; --navy: #0f2942; }
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; margin: 0; min-height: 100vh; background: #f0f4f8; }

        /* ── Navbar ── */
        .navbar-cmc {
            background: var(--navy);
            padding: 0 32px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
            box-shadow: 0 2px 12px rgba(0,0,0,0.2);
        }
        .navbar-brand-area { display: flex; align-items: center; gap: 14px; }
        .navbar-brand-area img { height: 40px; object-fit: contain; background: white; border-radius: 6px; padding: 3px 7px; }
        .brand-sep { width: 1px; height: 32px; background: rgba(255,255,255,0.2); }
        .brand-text { color: white; }
        .brand-text strong { font-size: 15px; font-weight: 700; display: block; }
        .brand-text span { font-size: 11px; opacity: 0.6; }
        .btn-nav-login {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.25);
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            display: flex; align-items: center; gap: 8px;
        }
        .btn-nav-login:hover { background: rgba(255,255,255,0.2); color: white; }

        /* ── Hero ── */
        .hero {
            background: linear-gradient(135deg, var(--navy) 0%, var(--cmc-dark) 60%, var(--cmc) 100%);
            padding: 80px 24px 100px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.25);
            color: rgba(255,255,255,0.9);
            padding: 6px 16px; border-radius: 30px;
            font-size: 13px; font-weight: 600;
            margin-bottom: 24px;
        }
        .hero-title {
            color: white;
            font-size: clamp(28px, 5vw, 48px);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
        }
        .hero-title span { color: #7dd3fc; }
        .hero-subtitle {
            color: rgba(255,255,255,0.75);
            font-size: 17px;
            font-weight: 400;
            max-width: 560px;
            margin: 0 auto 40px;
        }
        .hero-logos { display: flex; align-items: center; justify-content: center; gap: 24px; margin-bottom: 40px; }
        .hero-logos img { height: 52px; object-fit: contain; background: white; border-radius: 8px; padding: 4px 10px; }
        .hero-logo-sep { width: 1px; height: 40px; background: rgba(255,255,255,0.3); }

        /* ── Cards section ── */
        .cards-section {
            margin-top: -60px;
            padding: 0 24px 60px;
            position: relative; z-index: 10;
        }
        .role-card {
            background: white;
            border-radius: 20px;
            padding: 36px 28px;
            height: 100%;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.25s, box-shadow 0.25s;
        }
        .role-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(0,0,0,0.12);
        }
        .role-icon {
            width: 72px; height: 72px;
            border-radius: 20px;
            display: flex; align-items: center; justify-content: center;
            font-size: 30px;
            margin-bottom: 20px;
            flex-shrink: 0;
        }
        .role-card h3 { font-size: 20px; font-weight: 800; color: #1e293b; margin-bottom: 10px; }
        .role-card p { font-size: 14px; color: #64748b; line-height: 1.7; flex-grow: 1; margin-bottom: 24px; }
        .btn-role {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            transition: opacity 0.2s, transform 0.1s;
        }
        .btn-role:hover { opacity: 0.88; transform: translateY(-1px); }

        /* ── Stats bar ── */
        .stats-bar {
            background: var(--navy);
            padding: 28px 40px;
            border-radius: 16px;
            margin: 0 auto;
            max-width: 900px;
        }
        .stat-item { text-align: center; }
        .stat-item .val { font-size: 36px; font-weight: 800; color: white; line-height: 1; }
        .stat-item .lbl { font-size: 12px; color: rgba(255,255,255,0.55); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 4px; }

        /* ── Footer ── */
        footer {
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 20px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #94a3b8;
            flex-wrap: wrap; gap: 8px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar-cmc">
        <div class="navbar-brand-area">
            <img src="{{ asset('images/logo2.png') }}" alt="OFPPT">
            <div class="brand-sep"></div>
            <img src="{{ asset('images/logo1.png') }}" alt="CMC">
            <div class="brand-sep"></div>
            <div class="brand-text">
                <strong>CMC Rabat-Salé-Kénitra</strong>
                <span>Pôle Digital et Intelligence Artificielle</span>
            </div>
        </div>
        @auth
            <a href="{{ url('/dashboard') }}" class="btn-nav-login">
                <i class="bi bi-speedometer2"></i> Mon Espace
            </a>
        @else
            <a href="{{ route('login') }}" class="btn-nav-login">
                <i class="bi bi-lock-fill"></i> Connexion
            </a>
        @endauth
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-logos">
            <img src="{{ asset('images/logo2.png') }}" alt="OFPPT">
            <div class="hero-logo-sep"></div>
            <img src="{{ asset('images/logo1.png') }}" alt="CMC">
        </div>
        <div class="hero-badge">
            <i class="bi bi-calendar3"></i> Gestion des Emplois du Temps
        </div>
        <h1 class="hero-title">
            Bienvenue sur la plateforme<br>
            <span>Pôle Digital et IA</span>
        </h1>
        <p class="hero-subtitle">
            Consultez, gérez et planifiez les emplois du temps des groupes de formation en toute simplicité.
        </p>

        <!-- Quick stats -->
        <div class="stats-bar">
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="val">4</div>
                        <div class="lbl">Séances / jour</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="val">6</div>
                        <div class="lbl">Jours / semaine</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="val">2h30</div>
                        <div class="lbl">Durée séance</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="val">3</div>
                        <div class="lbl">Rôles</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Role Cards -->
    <section class="cards-section">
        <div class="container" style="max-width: 1000px;">
            <div class="row g-4 justify-content-center">

                <!-- Stagiaire -->
                <div class="col-12 col-md-4">
                    <div class="role-card">
                        <div class="role-icon" style="background:#e0f2fe; color:#0284c7;">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h3>Espace Stagiaire</h3>
                        <p>Consultez l'emploi du temps de votre groupe facilement. Accès libre, sans authentification requise.</p>
                        <a href="{{ route('schedule.index') }}" class="btn-role" style="background:#0284c7; color:white;">
                            <i class="bi bi-calendar-week"></i> Voir mon planning
                        </a>
                    </div>
                </div>

                <!-- Formateur -->
                <div class="col-12 col-md-4">
                    <div class="role-card">
                        <div class="role-icon" style="background:#fef3c7; color:#d97706;">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <h3>Espace Formateur</h3>
                        <p>Accédez à votre emploi du temps personnel et consultez celui des groupes par filière.</p>
                        <a href="{{ route('login') }}" class="btn-role" style="background:#d97706; color:white;">
                            <i class="bi bi-box-arrow-in-right"></i> Se connecter
                        </a>
                    </div>
                </div>

                <!-- Admin -->
                <div class="col-12 col-md-4">
                    <div class="role-card">
                        <div class="role-icon" style="background:#fce7f3; color:#be185d;">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <h3>Administration</h3>
                        <p>Gestion complète : planification des séances, filières, formateurs, salles et statistiques.</p>
                        <a href="{{ route('login') }}" class="btn-role" style="background:#be185d; color:white;">
                            <i class="bi bi-lock-fill"></i> Espace Admin
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div>&copy; {{ date('Y') }} Cité des Métiers et des Compétences (CMC) Rabat-Salé-Kénitra</div>
        <div style="font-weight:600; color:#64748b;">Filière Développement Digital — Option Web Full Stack</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
