<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emploi du Temps - {{ $groupe->code }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin: 0; padding: 0; }
        .header { width: 100%; border: 1px solid #000; border-bottom: none; border-collapse: collapse; }
        .header td { padding: 10px; text-align: center; border: 1px solid #000; }
        .header-title { font-size: 16px; font-weight: bold; }
        .header-subtitle { font-size: 12px; color: #555; }
        
        .info-bar { width: 100%; border: 1px solid #000; border-bottom: none; border-collapse: collapse; background-color: #f0f0f0; }
        .info-bar td { padding: 8px; text-align: center; font-weight: bold; font-size: 13px; border: 1px solid #000; }
        
        .timetable { width: 100%; border-collapse: collapse; border: 1px solid #000; margin-bottom: 20px; }
        .timetable th { background-color: #1797a7; color: white; padding: 10px; border: 1px solid #000; font-size: 13px; }
        .timetable td { border: 1px solid #000; height: 60px; padding: 5px; text-align: center; vertical-align: middle; }
        .jour-col { background-color: #f0f9ff; font-weight: bold; width: 15%; font-size: 14px; }
        .cell-occupied { background-color: #e5e7eb; font-size: 11px; line-height: 1.4; }
        .formateur-name { font-weight: bold; display: block; margin-bottom: 4px; }
        .salle-name { color: #d97706; font-weight: bold; display: block; }
        .logo { max-height: 50px; }
    </style>
</head>
<body>

    <table class="header">
        <tr>
            <td style="width: 100%;">
                <div class="header-title">مكتب التكوين المهني و إنعاش الشغل</div>
                <div class="header-subtitle">Office de la formation professionnelle et de la promotion du travail</div>
                <div style="margin-top: 5px; font-weight: bold;">CMC Rabat-Salé-Kénitra</div>
            </td>
        </tr>
    </table>

    <table class="info-bar">
        <tr>
            <td style="width: 33%;">Groupe : {{ $groupe->code }}</td>
            <td style="width: 33%;">Filière : {{ $groupe->filiere->nom }}</td>
            <td style="width: 34%;">Année : {{ $groupe->annee }}</td>
        </tr>
    </table>

    <table class="timetable">
        <thead>
            <tr>
                <th>Jour / Horaire</th>
                <th>08:30 - 11:00</th>
                <th>11:00 - 13:30</th>
                <th>13:30 - 16:00</th>
                <th>16:00 - 18:30</th>
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
                        <span class="formateur-name">{{ $seance->formateur->nom }} {{ $seance->formateur->prenom }}</span>
                        <span class="salle-name">SALLE : {{ $seance->salle->code }}</span>
                    </td>
                    @else
                    <td></td>
                    @endif
                @endfor
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
