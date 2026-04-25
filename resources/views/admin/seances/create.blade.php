<x-app-layout>
    <x-slot name="header">Planifier une Séance</x-slot>

    @if(session('error'))
        <div class="alert-error-cmc mb-4">
            <i class="bi bi-exclamation-triangle-fill" style="font-size:18px;"></i>
            <div>
                <strong>Conflit détecté !</strong><br>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12 col-xl-8">
            <div class="content-card">
                <div class="content-card-header">
                    <h3 class="content-card-title">
                        <i class="bi bi-plus-circle-fill me-2" style="color:#1797a7;"></i>
                        Nouvelle Séance
                    </h3>
                    <a href="{{ route('admin.seances.index') }}" class="btn-outline-cmc" style="padding:7px 14px; font-size:13px;">
                        <i class="bi bi-arrow-left"></i> Retour à la liste
                    </a>
                </div>

                <div class="content-card-body">

                    <!-- Info box about time slots -->
                    <div class="mb-4 p-3 rounded-3" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                        <div style="font-size:13px; font-weight:600; color:#15803d; margin-bottom:8px;">
                            <i class="bi bi-info-circle-fill me-1"></i> Créneaux fixes de la journée :
                        </div>
                        <div class="row g-2">
                            @foreach([1=>'08:30 – 11:00', 2=>'11:00 – 13:30', 3=>'13:30 – 16:00', 4=>'16:00 – 18:30'] as $n => $h)
                            <div class="col-6 col-md-3">
                                <div style="background:white; border:1px solid #d1fae5; border-radius:8px; padding:8px; text-align:center;">
                                    <div style="font-size:11px; color:#94a3b8; font-weight:700;">SÉANCE {{ $n }}</div>
                                    <div style="font-size:13px; font-weight:700; color:#1e293b;">{{ $h }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <form action="{{ route('admin.seances.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            <!-- Groupe -->
                            <div class="col-12">
                                <label class="cmc-label" for="groupe_id">
                                    <i class="bi bi-people me-1" style="color:#1797a7;"></i> Groupe
                                </label>
                                <select id="groupe_id" name="groupe_id" class="cmc-select" required>
                                    <option value="" disabled selected>-- Choisir un groupe --</option>
                                    @foreach($groupes as $g)
                                        <option value="{{ $g->id }}" {{ old('groupe_id') == $g->id ? 'selected' : '' }}>
                                            {{ $g->code }}  —  {{ $g->filiere->nom }}{{ $g->filiere->option ? ' ('.$g->filiere->option.')' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Formateur -->
                            <div class="col-12 col-md-6">
                                <label class="cmc-label" for="formateur_id">
                                    <i class="bi bi-person-badge me-1" style="color:#1797a7;"></i> Formateur
                                </label>
                                <select id="formateur_id" name="formateur_id" class="cmc-select" required>
                                    <option value="" disabled selected>-- Choisir un formateur --</option>
                                    @foreach($formateurs as $f)
                                        <option value="{{ $f->id }}" {{ old('formateur_id') == $f->id ? 'selected' : '' }}>
                                            {{ $f->nom }} {{ $f->prenom }}{{ $f->specialite ? ' – '.$f->specialite : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Salle -->
                            <div class="col-12 col-md-6">
                                <label class="cmc-label" for="salle_id">
                                    <i class="bi bi-building me-1" style="color:#1797a7;"></i> Salle
                                </label>
                                <select id="salle_id" name="salle_id" class="cmc-select" required>
                                    <option value="" disabled selected>-- Choisir une salle --</option>
                                    @foreach($salles as $s)
                                        <option value="{{ $s->id }}" {{ old('salle_id') == $s->id ? 'selected' : '' }}>
                                            {{ $s->code }} — {{ $s->type }}{{ $s->capacite ? ' ('.$s->capacite.' places)' : '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Jour -->
                            <div class="col-12 col-md-6">
                                <label class="cmc-label" for="jour">
                                    <i class="bi bi-calendar3 me-1" style="color:#1797a7;"></i> Jour
                                </label>
                                <select id="jour" name="jour" class="cmc-select" required>
                                    <option value="" disabled selected>-- Sélectionner le jour --</option>
                                    @foreach(['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'] as $j)
                                        <option value="{{ $j }}" {{ old('jour') == $j ? 'selected' : '' }}>{{ $j }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Créneau -->
                            <div class="col-12 col-md-6">
                                <label class="cmc-label" for="creneau">
                                    <i class="bi bi-clock me-1" style="color:#1797a7;"></i> Créneau horaire
                                </label>
                                <select id="creneau" name="creneau" class="cmc-select" required>
                                    <option value="" disabled selected>-- Sélectionner le créneau --</option>
                                    <option value="1" {{ old('creneau') == 1 ? 'selected' : '' }}>Séance 1 — 08h30 à 11h00</option>
                                    <option value="2" {{ old('creneau') == 2 ? 'selected' : '' }}>Séance 2 — 11h00 à 13h30</option>
                                    <option value="3" {{ old('creneau') == 3 ? 'selected' : '' }}>Séance 3 — 13h30 à 16h00</option>
                                    <option value="4" {{ old('creneau') == 4 ? 'selected' : '' }}>Séance 4 — 16h00 à 18h30</option>
                                </select>
                            </div>
                        </div>

                        <!-- Conflict rules reminder -->
                        <div class="mt-4 p-3 rounded-3" style="background:#fff7ed; border:1px solid #fed7aa;">
                            <div style="font-size:12px; color:#c2410c; font-weight:700; margin-bottom:6px;">
                                <i class="bi bi-shield-check me-1"></i> Règles de non-conflit vérifiées automatiquement :
                            </div>
                            <div class="row g-1" style="font-size:12px; color:#9a3412;">
                                <div class="col-12 col-md-4"><i class="bi bi-check2 me-1"></i>Un groupe = 1 séance par créneau</div>
                                <div class="col-12 col-md-4"><i class="bi bi-check2 me-1"></i>Un formateur = 1 séance par créneau</div>
                                <div class="col-12 col-md-4"><i class="bi bi-check2 me-1"></i>Une salle = 1 séance par créneau</div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 justify-content-end mt-4">
                            <a href="{{ route('admin.seances.index') }}" class="btn-outline-cmc">
                                Annuler
                            </a>
                            <button type="submit" class="btn-cmc">
                                <i class="bi bi-check-lg"></i> Enregistrer la Séance
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
