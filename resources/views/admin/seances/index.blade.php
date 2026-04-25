<x-app-layout>
    <x-slot name="header">Liste des Séances planifiées</x-slot>

    @if(session('success'))
        <div class="alert-success-cmc mb-4">
            <i class="bi bi-check-circle-fill" style="font-size:18px;"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error-cmc mb-4">
            <i class="bi bi-exclamation-triangle-fill" style="font-size:18px;"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <div class="content-card">
        <div class="content-card-header">
            <h3 class="content-card-title">
                <i class="bi bi-calendar3 me-2" style="color:#1797a7;"></i>
                Toutes les Séances
                <span class="ms-2" style="background:#e0f2fe; color:#0369a1; font-size:12px; padding:3px 10px; border-radius:20px; font-weight:600;">
                    {{ $seances->count() }} séance(s)
                </span>
            </h3>
            <a href="{{ route('admin.seances.create') }}" class="btn-cmc">
                <i class="bi bi-plus-lg"></i> Nouvelle Séance
            </a>
        </div>

        <div style="overflow-x: auto;">
            <table class="cmc-table">
                <thead>
                    <tr>
                        <th><i class="bi bi-calendar me-1"></i>Jour</th>
                        <th><i class="bi bi-clock me-1"></i>Créneau</th>
                        <th><i class="bi bi-people me-1"></i>Groupe</th>
                        <th><i class="bi bi-person-badge me-1"></i>Formateur</th>
                        <th><i class="bi bi-building me-1"></i>Salle</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($seances as $seance)
                        <tr>
                            <td>
                                <span class="badge-jour">{{ $seance->jour }}</span>
                            </td>
                            <td>
                                @php
                                    $horaires = [1=>'08:30–11:00', 2=>'11:00–13:30', 3=>'13:30–16:00', 4=>'16:00–18:30'];
                                @endphp
                                <span class="badge-creneau">S{{ $seance->creneau }} &nbsp;{{ $horaires[$seance->creneau] ?? '' }}</span>
                            </td>
                            <td>
                                <span class="badge-groupe fw-bold">{{ $seance->groupe->code }}</span>
                            </td>
                            <td>
                                <div style="font-size:14px; font-weight:600; color:#1e293b;">
                                    {{ $seance->formateur->nom }} {{ $seance->formateur->prenom }}
                                </div>
                                @if($seance->formateur->specialite)
                                    <div style="font-size:12px; color:#94a3b8;">{{ $seance->formateur->specialite }}</div>
                                @endif
                            </td>
                            <td>
                                <span class="badge-salle">{{ $seance->salle->code }}</span>
                            </td>
                            <td class="text-end">
                                <form action="{{ route('admin.seances.destroy', $seance->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer cette séance ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger-sm">
                                        <i class="bi bi-trash3"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-calendar-x"></i>
                                    <p>Aucune séance planifiée pour le moment.</p>
                                    <a href="{{ route('admin.seances.create') }}" class="btn-cmc mt-2">
                                        <i class="bi bi-plus-lg"></i> Planifier la première séance
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
