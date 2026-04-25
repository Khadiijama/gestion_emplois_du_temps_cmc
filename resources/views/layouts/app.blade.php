<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CMC') }} - Emplois du Temps</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --cmc-primary: #1797a7;
            --cmc-primary-dark: #137e8c;
            --cmc-sidebar-bg: #0f2942;
            --cmc-sidebar-hover: rgba(255,255,255,0.08);
        }
        body { font-family: 'Inter', sans-serif; background-color: #f0f4f8; }

        /* Sidebar */
        #sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--cmc-sidebar-bg);
            position: fixed;
            top: 0; left: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            padding: 20px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-brand img { height: 38px; object-fit: contain; background: white; border-radius: 6px; padding: 2px 6px; }
        .sidebar-brand-text { color: white; font-weight: 700; font-size: 13px; line-height: 1.4; }
        .sidebar-brand-text small { font-weight: 300; opacity: 0.7; font-size: 11px; display: block; }

        .sidebar-nav { padding: 12px 0; flex: 1; }
        .sidebar-section-title {
            color: rgba(255,255,255,0.4);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 16px 20px 6px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
        }
        .sidebar-link:hover {
            background: var(--cmc-sidebar-hover);
            color: white;
            border-left-color: var(--cmc-primary);
        }
        .sidebar-link.active {
            background: rgba(23,151,167,0.15);
            color: white;
            border-left-color: var(--cmc-primary);
        }
        .sidebar-link i { font-size: 16px; width: 20px; text-align: center; }
        .sidebar-footer {
            padding: 12px 16px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
        }
        .sidebar-avatar {
            width: 36px; height: 36px;
            background: var(--cmc-primary);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 700; font-size: 14px;
            flex-shrink: 0;
        }
        .sidebar-user-info { flex: 1; min-width: 0; }
        .sidebar-user-name { color: white; font-size: 13px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .sidebar-user-role { color: rgba(255,255,255,0.5); font-size: 11px; }
        .btn-logout { background: none; border: none; color: rgba(255,255,255,0.4); padding: 4px; cursor: pointer; transition: color 0.2s; }
        .btn-logout:hover { color: #ef4444; }

        /* Main content */
        #main-content {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .topbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 24px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .topbar-title { font-size: 18px; font-weight: 700; color: #1e293b; }
        .topbar-subtitle { font-size: 12px; color: #94a3b8; font-weight: 400; }

        /* Page body */
        .page-body { padding: 28px 28px; flex: 1; }

        /* Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            border: 1px solid #e5e7eb;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; }
        .stat-value { font-size: 32px; font-weight: 800; color: #1e293b; line-height: 1; }
        .stat-label { font-size: 13px; color: #64748b; font-weight: 500; margin-top: 4px; }

        /* Content card */
        .content-card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }
        .content-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .content-card-title { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0; }
        .content-card-body { padding: 24px; }

        /* Table */
        .cmc-table { width: 100%; border-collapse: collapse; }
        .cmc-table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }
        .cmc-table tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #374151;
            vertical-align: middle;
        }
        .cmc-table tbody tr:hover { background: #f8fafc; }
        .cmc-table tbody tr:last-child td { border-bottom: none; }

        /* Badges */
        .badge-creneau { background: #eff6ff; color: #2563eb; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-groupe { background: #f0fdf4; color: #16a34a; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-salle { background: #fef3c7; color: #d97706; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-jour { background: #faf5ff; color: #7c3aed; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }

        /* Alert messages */
        .alert-success-cmc { background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; border-radius: 10px; padding: 14px 18px; display: flex; align-items: center; gap: 10px; }
        .alert-error-cmc { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; border-radius: 10px; padding: 14px 18px; display: flex; align-items: center; gap: 10px; }

        /* Buttons */
        .btn-cmc { background: var(--cmc-primary); color: white; border: none; padding: 9px 20px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer; transition: background 0.2s, transform 0.1s; display: inline-flex; align-items: center; gap: 7px; text-decoration: none; }
        .btn-cmc:hover { background: var(--cmc-primary-dark); color: white; transform: translateY(-1px); }
        .btn-outline-cmc { background: transparent; color: var(--cmc-primary); border: 1.5px solid var(--cmc-primary); padding: 8px 18px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 7px; text-decoration: none; }
        .btn-outline-cmc:hover { background: var(--cmc-primary); color: white; }
        .btn-danger-sm { background: none; border: none; color: #ef4444; font-size: 13px; font-weight: 600; cursor: pointer; padding: 4px 8px; border-radius: 6px; transition: background 0.2s; }
        .btn-danger-sm:hover { background: #fee2e2; }

        /* Forms */
        .cmc-label { font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; display: block; }
        .cmc-input, .cmc-select { border: 1.5px solid #d1d5db; border-radius: 8px; padding: 9px 12px; font-size: 14px; width: 100%; color: #1e293b; transition: border-color 0.2s, box-shadow 0.2s; background: white; }
        .cmc-input:focus, .cmc-select:focus { outline: none; border-color: var(--cmc-primary); box-shadow: 0 0 0 3px rgba(23,151,167,0.12); }

        /* Empty state */
        .empty-state { text-align: center; padding: 48px; color: #94a3b8; }
        .empty-state i { font-size: 48px; display: block; margin-bottom: 12px; }
        .empty-state p { font-size: 15px; }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo2.png') }}" alt="CMC">
            <div class="sidebar-brand-text">
                CMC Rabat-Salé-Kénitra
                <small>Pôle Digital et IA</small>
            </div>
        </div>

        <nav class="sidebar-nav">
            @auth
                @if(auth()->user()->role === 'admin')
                    <div class="sidebar-section-title">Administration</div>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Tableau de bord
                    </a>
                    <a href="{{ route('admin.seances.index') }}" class="sidebar-link {{ request()->routeIs('admin.seances.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar3"></i> Séances
                    </a>
                    <a href="{{ route('admin.seances.create') }}" class="sidebar-link">
                        <i class="bi bi-plus-circle"></i> Planifier une séance
                    </a>
                    <div class="sidebar-section-title">Consultation</div>
                    <a href="{{ route('schedule.index') }}" class="sidebar-link" target="_blank">
                        <i class="bi bi-eye"></i> Vue Emplois du temps
                    </a>
                @elseif(auth()->user()->role === 'formateur')
                    <div class="sidebar-section-title">Formateur</div>
                    <a href="{{ route('formateur.dashboard') }}" class="sidebar-link {{ request()->routeIs('formateur.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-calendar-week"></i> Mon Emploi du temps
                    </a>
                    <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i> Mon Profil
                    </a>
                @endif

                <div class="sidebar-section-title">Général</div>
                <a href="{{ route('home') }}" class="sidebar-link">
                    <i class="bi bi-house"></i> Accueil
                </a>
            @endauth
        </nav>

        <div class="sidebar-footer">
            @auth
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">{{ ucfirst(auth()->user()->role ?? 'utilisateur') }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout" title="Déconnexion">
                        <i class="bi bi-box-arrow-right" style="font-size:18px;"></i>
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </div>

    <!-- Main -->
    <div id="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div>
                @if(isset($header))
                    <div class="topbar-title">{{ $header }}</div>
                @else
                    <div class="topbar-title">Tableau de bord</div>
                @endif
                <div class="topbar-subtitle">Gestion des Emplois du Temps — CMC</div>
            </div>
            <div class="d-flex align-items-center gap-3">
                @auth
                <span class="badge" style="background:#e0f2fe; color:#0369a1; font-size:12px; padding:6px 12px; border-radius:20px; font-weight:600;">
                    <i class="bi bi-person-fill me-1"></i>{{ auth()->user()->name }}
                </span>
                @endauth
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-body">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
