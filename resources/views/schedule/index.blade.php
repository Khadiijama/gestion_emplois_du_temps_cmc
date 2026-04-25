<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi du Temps — Espace Stagiaire | CMC</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { --cmc: #1797a7; --cmc-dark: #0f5f6b; --navy: #0f2942; }
        body { font-family: 'Inter', sans-serif; background: #f0f4f8; margin: 0; min-height: 100vh; display: flex; flex-direction: column; }

        /* ── Navbar ── */
        .top-nav {
            background: var(--navy);
            padding: 0 28px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            position: sticky; top: 0; z-index: 100;
        }
        .nav-brand { display: flex; align-items: center; gap: 12px; }
        .nav-brand img { height: 36px; object-fit: contain; background: white; border-radius: 6px; padding: 3px 6px; }
        .nav-brand-sep { width: 1px; height: 28px; background: rgba(255,255,255,0.2); }
        .nav-brand-text { color: white; font-size: 13px; font-weight: 700; line-height: 1.3; }
        .nav-brand-text small { display: block; font-weight: 400; opacity: 0.6; font-size: 11px; }
        .nav-actions { display: flex; align-items: center; gap: 10px; }
        .btn-nav {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 7px 16px; border-radius: 8px;
            font-size: 13px; font-weight: 600;
            text-decoration: none; border: none; cursor: pointer;
            transition: all 0.2s;
        }
        .btn-nav-outline { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); color: white; }
        .btn-nav-outline:hover { background: rgba(255,255,255,0.18); color: white; }
        .btn-nav-primary { background: var(--cmc); color: white; }
        .btn-nav-primary:hover { background: var(--cmc-dark); color: white; }
        .btn-nav-dark { background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.85); border: 1px solid rgba(255,255,255,0.15); }
        .btn-nav-dark:hover { background: rgba(255,255,255,0.15); color: white; }

        /* ── Hero banner ── */
        .hero-banner {
            background: linear-gradient(135deg, var(--navy) 0%, var(--cmc-dark) 100%);
            padding: 36px 28px 56px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-banner::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M0 40L40 0H20L0 20M40 40V20L20 40'/%3E%3C/g%3E%3C/svg%3E");
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
            color: rgba(255,255,255,0.9); padding: 5px 14px;
            border-radius: 20px; font-size: 12px; font-weight: 600;
            margin-bottom: 14px;
        }
        .hero-title { color: white; font-size: clamp(20px,4vw,32px); font-weight: 800; margin-bottom: 6px; }
        .hero-subtitle { color: rgba(255,255,255,0.65); font-size: 14px; }

        /* ── Search card (pulled up) ── */
        .search-card-wrap { margin-top: -30px; padding: 0 20px; position: relative; z-index: 10; }
        .search-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.1);
            padding: 28px 28px 24px;
            border: 1px solid #e5e7eb;
        }
        .search-card-title {
            font-size: 15px; font-weight: 700; color: #1e293b;
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 20px;
        }
        .cmc-label { font-size: 12px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px; display: block; }
        .cmc-select {
            border: 1.5px solid #d1d5db; border-radius: 10px;
            padding: 10px 14px; font-size: 14px; width: 100%;
            color: #1e293b; background: white;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none; appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
        }
        .cmc-select:focus { outline: none; border-color: var(--cmc); box-shadow: 0 0 0 3px rgba(23,151,167,0.12); }
        .btn-search {
            background: var(--cmc); color: white; border: none;
            padding: 10px 28px; border-radius: 10px; font-weight: 700;
            font-size: 14px; cursor: pointer; transition: all 0.2s;
            display: inline-flex; align-items: center; gap: 8px; white-space: nowrap;
        }
        .btn-search:hover { background: var(--cmc-dark); transform: translateY(-1px); }

        /* ── Timetable section ── */
        .timetable-section { padding: 24px 20px 40px; flex: 1; }
        .timetable-wrapper { max-width: 1100px; margin: 0 auto; }

        /* ── Timetable header card (logos + info) ── */
        .tt-header-card {
            background: white;
            border-radius: 12px 12px 0 0;
            border: 1px solid #d1d5db;
            border-bottom: none;
            overflow: hidden;
        }
        .tt-header-inner {
            display: flex;
            border-bottom: 1px solid #d1d5db;
        }
        .tt-logo-box {
            width: 180px; padding: 18px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .tt-logo-box img { max-height: 70px; object-fit: contain; }
        .tt-center {
            flex: 1; padding: 18px;
            text-align: center; border-left: 1px solid #d1d5db; border-right: 1px solid #d1d5db;
            display: flex; flex-direction: column; justify-content: center;
        }
        .tt-center h2 { margin: 0; font-size: 20px; color: #1e293b; font-weight: 800; }
        .tt-center h3 { margin: 6px 0 0; font-size: 13px; font-weight: 400; color: #64748b; }
        .tt-info-bar {
            display: flex; justify-content: space-around;
            padding: 10px 20px;
            font-size: 13px; font-weight: 700; color: #1e293b;
            background: #f8fafc;
        }

        /* ── The actual timetable grid (UNCHANGED styles) ── */
        .timetable-table-wrap {
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 0 0 12px 12px;
            overflow: hidden;
        }
        table { width: 100%; border-collapse: collapse; border: 1px solid #d1d5db; }
        th { background-color: #1797a7; color: white; padding: 12px; border: 1px solid #fff; font-size: 15px; }
        td { border: 1px solid #d1d5db; height: 55px; padding: 5px; text-align: center; }
        .jour-col { background-color: #f0f9ff; font-weight: 700; width: 18%; }
        .cell-occupied { background-color: #4b76c8; color: white; font-size: 11px; font-weight: 600; text-transform: uppercase; }
        .cell-empty { font-weight: bold; font-size: 20px; }

        /* ── Footer ── */
        footer {
            background: var(--navy); color: rgba(255,255,255,0.5);
            text-align: center; padding: 14px; font-size: 12px; margin-top: auto;
        }

        @media print {
            .top-nav, .hero-banner, .search-card-wrap, footer { display: none !important; }
            body { background: white; }
            .timetable-section { padding: 0; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="top-nav">
        <div class="nav-brand">
            <img src="{{ asset('images/logo2.png') }}" alt="OFPPT">
            <div class="nav-brand-sep"></div>
            <img src="{{ asset('images/logo1.png') }}" alt="CMC">
            <div class="nav-brand-sep d-none d-md-block"></div>
            <div class="nav-brand-text d-none d-md-block">
                CMC Rabat-Salé-Kénitra
                <small>Pôle Digital et IA</small>
            </div>
        </div>
        <div class="nav-actions">
            <a href="{{ route('home') }}" class="btn-nav btn-nav-outline">
                <i class="bi bi-house"></i>
                <span class="d-none d-sm-inline">Accueil</span>
            </a>
            <a href="{{ route('schedule.pdf', ['groupe_id' => request('groupe_id')]) }}" class="btn-nav btn-nav-dark">
                <i class="bi bi-file-earmark-pdf-fill" style="color: #ef4444;"></i>
                <span class="d-none d-sm-inline">Télécharger PDF</span>
            </a>
            @auth
                <a href="{{ route('dashboard') }}" class="btn-nav btn-nav-primary">
                    <i class="bi bi-speedometer2"></i>
                    <span class="d-none d-sm-inline">Mon Espace ({{ ucfirst(auth()->user()->role) }})</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn-nav btn-nav-dark">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="d-none d-sm-inline">Déconnexion</span>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-nav btn-nav-primary">
                    <i class="bi bi-lock-fill"></i>
                    <span class="d-none d-sm-inline">Espace Admin</span>
                </a>
            @endauth
        </div>
    </nav>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-badge">
            <i class="bi bi-mortarboard-fill"></i> Espace Stagiaire — Accès libre
        </div>
        <div class="hero-title">Consulter un Emploi du Temps</div>
        <div class="hero-subtitle">Sélectionnez votre filière et votre groupe pour afficher le planning hebdomadaire</div>
    </div>

    <!-- Search Card -->
    <div class="search-card-wrap">
        <div class="search-card" style="max-width: 1100px; margin: 0 auto;">
            <div class="search-card-title">
                <i class="bi bi-search" style="color: var(--cmc);"></i>
                Rechercher un planning
            </div>
            @if(session('error'))
                <div class="alert alert-danger" style="font-size: 14px; font-weight: 600; padding: 10px; border-radius: 8px;">
                    <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('schedule.index') }}" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-5">
                        <label class="cmc-label" for="filiere_id">
                            <i class="bi bi-diagram-3 me-1"></i> Filière
                        </label>
                        <select id="filiere_id" name="filiere_id" class="cmc-select">
                            <option value="">-- Choisir une filière --</option>
                            @foreach($filieres as $f)
                                <option value="{{ $f->id }}" {{ request('filiere_id') == $f->id ? 'selected' : '' }}>
                                    {{ $f->nom }}{{ $f->option ? ' – '.$f->option : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-5">
                        <label class="cmc-label" for="groupe_id">
                            <i class="bi bi-people me-1"></i> Groupe
                        </label>
                        <select id="groupe_id" name="groupe_id" class="cmc-select">
                            <option value="">-- Choisir le groupe --</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn-search w-100 justify-content-center">
                            <i class="bi bi-eye"></i> Afficher
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Timetable Section -->
    <div class="timetable-section">
        <div class="timetable-wrapper">
            @if($groupe)
                <!-- Header with logos (timetable style) -->
                <div class="tt-header-card">
                    <div class="tt-header-inner">
                        <div class="tt-logo-box">
                            <img src="{{ asset('images/logo2.png') }}" alt="OFPPT">
                        </div>
                        <div class="tt-center">
                            <h2>مكتب التكوين المهني و إنعاش الشغل</h2>
                            <h3>Office de la formation professionnelle et de la promotion du travail</h3>
                        </div>
                        <div class="tt-logo-box">
                            <img src="{{ asset('images/logo1.png') }}" alt="CMC">
                        </div>
                    </div>
                    <div class="tt-info-bar">
                        <div><i class="bi bi-people-fill me-1" style="color:var(--cmc);"></i>Groupe : {{ $groupe->code }}</div>
                        <div><i class="bi bi-clock me-1" style="color:var(--cmc);"></i>Masse Horaire Hebdomadaire : 30h</div>
                        <div><i class="bi bi-calendar me-1" style="color:var(--cmc);"></i>Année : {{ $groupe->annee }}</div>
                    </div>
                </div>

                <!-- The timetable grid (UNCHANGED) -->
                <div class="timetable-table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th style="background-color: #1797a7;">Jour / Horaire</th>
                                <th>08:30 <span style="float:right">11:00</span></th>
                                <th style="border-left: 1px solid white;">11:00 <span style="float:right">13:30</span></th>
                                <th style="border-left: 1px solid white;">13:30 <span style="float:right">16:00</span></th>
                                <th style="border-left: 1px solid white;">16:00 <span style="float:right">18:30</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jours as $jour)
                            <tr>
                                <td class="jour-col">{{ $jour }}</td>
                                @for($c=1; $c<=4; $c++)
                                    @php $seance = $matrix[$jour][$c] ?? null; @endphp
                                    @if($seance)
                                    <td class="cell-occupied">
                                        FORMATEUR : {{ $seance->formateur->nom }} {{ $seance->formateur->prenom }}<br>
                                        SALLE : {{ $seance->salle->code }}
                                    </td>
                                    @else
                                    <td class="cell-empty">.</td>
                                    @endif
                                @endfor
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <!-- Empty state -->
                <div class="text-center py-5 mt-3" style="color:#94a3b8;">
                    <div style="width:80px; height:80px; background:#e0f2fe; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:32px; color:var(--cmc);">
                        <i class="bi bi-calendar-week"></i>
                    </div>
                    <h5 style="color:#475569; font-weight:700;">Sélectionnez votre groupe</h5>
                    <p style="font-size:14px;">Choisissez une filière et un groupe dans le formulaire ci-dessus pour afficher l'emploi du temps.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; {{ date('Y') }} Cité des Métiers et des Compétences (CMC) Rabat-Salé-Kénitra — Pôle Digital et Intelligence Artificielle
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const filieres = @json($filieres);
        const filSelect = document.getElementById('filiere_id');
        const grSelect = document.getElementById('groupe_id');
        const curGr = '{{ request('groupe_id') }}';

        function upd() {
            const id = filSelect.value;
            grSelect.innerHTML = '<option value="">-- Choisir le groupe --</option>';
            const f = filieres.find(x => x.id == id);
            if(f && f.groupes) {
                f.groupes.forEach(g => {
                    const o = document.createElement('option');
                    o.value = g.id; o.textContent = g.code;
                    if(g.id == curGr) o.selected = true;
                    grSelect.appendChild(o);
                });
            }
        }
        filSelect.addEventListener('change', upd);
        if(filSelect.value) upd();
    </script>
</body>
</html>
