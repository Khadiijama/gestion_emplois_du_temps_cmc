<x-app-layout>
    <x-slot name="header">Tableau de bord Administrateur</x-slot>

    <!-- Stats Row -->
    <div class="row g-4 mb-4">
        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="stat-value text-primary">{{ $stats['groupes'] }}</div>
                        <div class="stat-label">Groupes</div>
                    </div>
                    <div class="stat-icon" style="background:#eff6ff; color:#2563eb;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="stat-value" style="color:#0d9488;">{{ $stats['formateurs'] }}</div>
                        <div class="stat-label">Formateurs</div>
                    </div>
                    <div class="stat-icon" style="background:#f0fdfa; color:#0d9488;">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="stat-value" style="color:#d97706;">{{ $stats['salles'] }}</div>
                        <div class="stat-label">Salles</div>
                    </div>
                    <div class="stat-icon" style="background:#fffbeb; color:#d97706;">
                        <i class="bi bi-building"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="stat-card">
                <div class="d-flex align-items-start justify-content-between">
                    <div>
                        <div class="stat-value" style="color:#1797a7;">{{ $stats['seances'] }}</div>
                        <div class="stat-label">Séances planifiées</div>
                    </div>
                    <div class="stat-icon" style="background:#ecfeff; color:#1797a7;">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="content-card">
        <div class="content-card-header">
            <h3 class="content-card-title"><i class="bi bi-lightning-fill me-2" style="color:#1797a7;"></i>Actions Rapides</h3>
        </div>
        <div class="content-card-body">
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <a href="{{ route('admin.seances.create') }}" class="btn-cmc w-100 justify-content-center" style="padding:14px;">
                        <i class="bi bi-plus-circle-fill"></i> Planifier une Séance
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ route('admin.seances.index') }}" class="btn-outline-cmc w-100 justify-content-center" style="padding:13px;">
                        <i class="bi bi-list-ul"></i> Gérer les Séances
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ route('schedule.index') }}" target="_blank" class="btn-outline-cmc w-100 justify-content-center" style="padding:13px; border-color:#7c3aed; color:#7c3aed;">
                        <i class="bi bi-eye-fill"></i> Vue Emploi du temps
                    </a>
                </div>
            </div>

            <!-- Info summary -->
            <div class="mt-4 p-3 rounded-3" style="background:#f8fafc; border:1px solid #e5e7eb;">
                <div class="row text-center g-2">
                    <div class="col-6 col-md-3">
                        <div style="font-size:12px; color:#64748b; font-weight:600;">Créneaux / Jour</div>
                        <div style="font-size:18px; font-weight:800; color:#1e293b;">4</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="font-size:12px; color:#64748b; font-weight:600;">Jours / Semaine</div>
                        <div style="font-size:18px; font-weight:800; color:#1e293b;">6</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="font-size:12px; color:#64748b; font-weight:600;">Durée / Séance</div>
                        <div style="font-size:18px; font-weight:800; color:#1e293b;">2h30</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div style="font-size:12px; color:#64748b; font-weight:600;">Max / Jour</div>
                        <div style="font-size:18px; font-weight:800; color:#1e293b;">10h</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
