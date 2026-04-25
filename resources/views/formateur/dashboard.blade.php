<x-app-layout>
    <x-slot name="header">Mon Emploi du temps — {{ $formateur->nom }} {{ $formateur->prenom }}</x-slot>

    <style>
        /* ===== TIMETABLE GRID (unchanged as requested) ===== */
        .timetable-card {
            background-color: white;
            border: 1px solid #d1d5db;
            padding: 10px;
        }
        .header-box {
            display: flex;
            border: 1px solid #d1d5db;
            margin-bottom: 20px;
        }
        .header-logo {
            width: 180px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header-title {
            flex: 1;
            padding: 15px;
            text-align: center;
        }
        .header-title h2 { margin: 0; font-size: 24px; color: #333; }
        .header-title h3 { margin: 8px 0 0 0; font-size: 16px; color: #555; font-weight: 400; }
        .oc-table { width: 100%; border-collapse: collapse; border: 1px solid #d1d5db; }
        .oc-table th { background-color: #1797a7 !important; color: white !important; padding: 12px; border: 1px solid #fff; text-align: center; }
        .oc-table td { border: 1px solid #d1d5db; height: 60px; text-align: center; vertical-align: middle; }
        .day-col { background-color: #f0f9ff; font-weight: 700; width: 150px; color: #333; }
        .cell-active { background-color: #4b76c8 !important; color: white !important; font-size: 11px; font-weight: 600; text-transform: uppercase; padding: 5px; }
        .cell-none { font-weight: bold; font-size: 20px; color: #333; }
        .oc-info { display: flex; justify-content: space-around; padding: 10px 0; font-weight: 700; color: #000; font-size: 14px; }
        /* ===== END TIMETABLE ===== */
    </style>

    <!-- Profile Info Bar -->
    <div class="content-card mb-4">
        <div class="content-card-body" style="padding: 16px 24px;">
            <div class="d-flex align-items-center gap-4 flex-wrap">
                <div style="width:56px; height:56px; background:linear-gradient(135deg,#1797a7,#0f5f6b); border-radius:50%; display:flex; align-items:center; justify-content:center; color:white; font-size:22px; font-weight:800; flex-shrink:0;">
                    {{ strtoupper(substr($formateur->nom, 0, 1)) }}
                </div>
                <div class="flex-grow-1">
                    <div style="font-size:18px; font-weight:800; color:#1e293b;">{{ $formateur->nom }} {{ $formateur->prenom }}</div>
                    <div style="font-size:13px; color:#64748b;">
                        <span class="me-3"><i class="bi bi-hash me-1"></i>{{ $formateur->matricule }}</span>
                        @if($formateur->specialite)
                            <span class="me-3"><i class="bi bi-book me-1"></i>{{ $formateur->specialite }}</span>
                        @endif
                        @if($formateur->email)
                            <span><i class="bi bi-envelope me-1"></i>{{ $formateur->email }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1 : Mon emploi du temps (timetable grid - UNCHANGED) -->
    <div class="content-card mb-4">
        <div class="content-card-header">
            <h3 class="content-card-title">
                <i class="bi bi-calendar-week me-2" style="color:#1797a7;"></i> Mon Emploi du temps Personnel
            </h3>
        </div>
        <div class="content-card-body">
            <div class="timetable-card">
                <div class="header-box">
                    <div class="header-logo border-end border-gray-300">
                        <img src="{{ asset('images/logo2.png') }}" style="max-height: 70px;" alt="OFPPT">
                    </div>
                    <div class="header-title">
                        <h2>مكتب التكوين المهني و إنعاش الشغل</h2>
                        <h3>Office de la formation professionnelle et de la promotion du travail</h3>
                    </div>
                    <div class="header-logo border-start border-gray-300">
                        <img src="{{ asset('images/logo1.png') }}" style="max-height: 70px;" alt="CMC">
                    </div>
                </div>

                <div class="oc-info">
                    <div>Formateur : {{ $formateur->nom }} {{ $formateur->prenom }}</div>
                    <div>Matricule : {{ $formateur->matricule }}</div>
                    <div>Spécialité : {{ $formateur->specialite }}</div>
                </div>

                <table class="oc-table">
                    <thead>
                        <tr>
                            <th>Jour / Horaire</th>
                            <th>08:30 <span style="float:right">11:00</span></th>
                            <th>11:00 <span style="float:right">13:30</span></th>
                            <th>13:30 <span style="float:right">16:00</span></th>
                            <th>16:00 <span style="float:right">18:30</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jours as $jour)
                        <tr>
                            <td class="day-col">{{ $jour }}</td>
                            @for ($c = 1; $c <= 4; $c++)
                                @php $seance = $personalMatrix[$jour][$c] ?? null; @endphp
                                @if ($seance)
                                    <td class="cell-active">
                                        {{ $seance->groupe->code }}<br>
                                        SALLE : {{ $seance->salle->code }}
                                    </td>
                                @else
                                    <td class="cell-none">.</td>
                                @endif
                            @endfor
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Section 2 : Consulter l'emploi du temps d'un groupe -->
    <div class="content-card">
        <div class="content-card-header">
            <h3 class="content-card-title">
                <i class="bi bi-search me-2" style="color:#1797a7;"></i> Consulter l'emploi du temps d'un Groupe
            </h3>
        </div>
        <div class="content-card-body">
            <form action="{{ route('formateur.dashboard') }}" method="GET">
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
                            <option value="">-- Choisir un groupe --</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn-cmc w-100 justify-content-center" style="padding: 10px;">
                            <i class="bi bi-eye"></i> Afficher
                        </button>
                    </div>
                </div>
            </form>

            @if($selectedGroupe)
                <div class="mt-4">
                    <div class="mb-3 p-2 px-3 rounded-3 d-flex align-items-center justify-content-between"
                         style="background:#eff6ff; border:1px solid #bfdbfe;">
                        <span style="font-size:14px; font-weight:700; color:#1e40af;">
                            <i class="bi bi-people-fill me-2"></i>Planning du Groupe : {{ $selectedGroupe->code }}
                        </span>
                        <span style="font-size:12px; color:#64748b;">{{ $selectedGroupe->filiere->nom }}</span>
                    </div>
                    <div class="timetable-card">
                        <table class="oc-table">
                            <thead>
                                <tr>
                                    <th>Jour</th>
                                    <th>08:30 <span style="float:right">11:00</span></th>
                                    <th>11:00 <span style="float:right">13:30</span></th>
                                    <th>13:30 <span style="float:right">16:00</span></th>
                                    <th>16:00 <span style="float:right">18:30</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jours as $jour)
                                <tr>
                                    <td class="day-col">{{ $jour }}</td>
                                    @for($c=1; $c<=4; $c++)
                                        @php $s = $searchMatrix[$jour][$c] ?? null; @endphp
                                        @if($s)
                                            <td class="cell-active">
                                                {{ $s->formateur->nom }}<br>
                                                {{ $s->salle->code }}
                                            </td>
                                        @else
                                            <td class="cell-none">.</td>
                                        @endif
                                    @endfor
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        const filieres = @json($filieres);
        const filSel = document.getElementById('filiere_id');
        const grSel = document.getElementById('groupe_id');
        const curGr = '{{ request('groupe_id') }}';

        function update() {
            const id = filSel.value;
            grSel.innerHTML = '<option value="">-- Choisir un groupe --</option>';
            const f = filieres.find(x => x.id == id);
            if(f && f.groupes) {
                f.groupes.forEach(g => {
                    const o = document.createElement('option');
                    o.value = g.id; o.textContent = g.code;
                    if(g.id == curGr) o.selected = true;
                    grSel.appendChild(o);
                });
            }
        }
        filSel.addEventListener('change', update);
        if(filSel.value) update();
    </script>
</x-app-layout>
