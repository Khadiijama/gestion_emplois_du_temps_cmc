<x-app-layout>
    <x-slot name="header">Mon Profil</x-slot>

    <div class="row justify-content-center g-4">

        <!-- Left column: Avatar + Info card -->
        <div class="col-12 col-xl-4">
            <div class="content-card text-center" style="padding: 36px 24px;">
                <div style="width:90px; height:90px; border-radius:50%; background:linear-gradient(135deg,#1797a7,#0f2942); display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:36px; font-weight:800; color:white;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <h5 style="font-size:18px; font-weight:800; color:#1e293b; margin-bottom:4px;">{{ auth()->user()->name }}</h5>
                <div style="font-size:13px; color:#94a3b8; margin-bottom:16px;">{{ auth()->user()->email }}</div>

                <span style="background:linear-gradient(135deg,#1797a7,#0f5f6b); color:white; padding:5px 16px; border-radius:20px; font-size:12px; font-weight:700;">
                    <i class="bi bi-person-badge-fill me-1"></i>
                    {{ ucfirst(auth()->user()->role ?? 'Utilisateur') }}
                </span>

                @if(auth()->user()->formateur)
                <hr style="margin:24px 0;">
                <div style="text-align:left;">
                    <div class="mb-3">
                        <div style="font-size:11px; color:#94a3b8; font-weight:700; text-transform:uppercase; letter-spacing:0.05em;">Matricule</div>
                        <div style="font-size:14px; font-weight:600; color:#1e293b;">{{ auth()->user()->formateur->matricule }}</div>
                    </div>
                    @if(auth()->user()->formateur->specialite)
                    <div class="mb-3">
                        <div style="font-size:11px; color:#94a3b8; font-weight:700; text-transform:uppercase; letter-spacing:0.05em;">Spécialité</div>
                        <div style="font-size:14px; font-weight:600; color:#1e293b;">{{ auth()->user()->formateur->specialite }}</div>
                    </div>
                    @endif
                    @if(auth()->user()->formateur->telephone)
                    <div class="mb-3">
                        <div style="font-size:11px; color:#94a3b8; font-weight:700; text-transform:uppercase; letter-spacing:0.05em;">Téléphone</div>
                        <div style="font-size:14px; font-weight:600; color:#1e293b;">{{ auth()->user()->formateur->telephone }}</div>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>

        <!-- Right column: Forms -->
        <div class="col-12 col-xl-8">

            <!-- Update Profile Info -->
            <div class="content-card mb-4">
                <div class="content-card-header">
                    <h3 class="content-card-title">
                        <i class="bi bi-person-fill me-2" style="color:#1797a7;"></i> Informations du profil
                    </h3>
                </div>
                <div class="content-card-body">
                    @if(session('status') === 'profile-updated')
                        <div class="alert-success-cmc mb-3">
                            <i class="bi bi-check-circle-fill"></i> Profil mis à jour avec succès.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="cmc-label" for="name">
                                    <i class="bi bi-person me-1"></i> Nom complet
                                </label>
                                <input id="name" type="text" name="name"
                                       value="{{ old('name', auth()->user()->name) }}"
                                       class="cmc-input" required autocomplete="name">
                                @error('name')
                                    <div style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="cmc-label" for="email">
                                    <i class="bi bi-envelope me-1"></i> Adresse Email
                                </label>
                                <input id="email" type="email" name="email"
                                       value="{{ old('email', auth()->user()->email) }}"
                                       class="cmc-input" required autocomplete="username">
                                @error('email')
                                    <div style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn-cmc">
                                <i class="bi bi-check-lg"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password -->
            <div class="content-card mb-4">
                <div class="content-card-header">
                    <h3 class="content-card-title">
                        <i class="bi bi-lock-fill me-2" style="color:#d97706;"></i> Changer le mot de passe
                    </h3>
                </div>
                <div class="content-card-body">
                    @if(session('status') === 'password-updated')
                        <div class="alert-success-cmc mb-3">
                            <i class="bi bi-check-circle-fill"></i> Mot de passe mis à jour avec succès.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="cmc-label" for="current_password">
                                    <i class="bi bi-lock me-1"></i> Mot de passe actuel
                                </label>
                                <input id="current_password" type="password" name="current_password"
                                       class="cmc-input" autocomplete="current-password"
                                       placeholder="••••••••">
                                @error('current_password', 'updatePassword')
                                    <div style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="cmc-label" for="password">
                                    <i class="bi bi-lock-fill me-1"></i> Nouveau mot de passe
                                </label>
                                <input id="password" type="password" name="password"
                                       class="cmc-input" autocomplete="new-password"
                                       placeholder="••••••••">
                                @error('password', 'updatePassword')
                                    <div style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="cmc-label" for="password_confirmation">
                                    <i class="bi bi-lock-fill me-1"></i> Confirmer le mot de passe
                                </label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                       class="cmc-input" autocomplete="new-password"
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn-cmc" style="background:#d97706;">
                                <i class="bi bi-shield-check"></i> Mettre à jour le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Back link -->
            @if(auth()->user()->role === 'formateur')
            <div class="text-end">
                <a href="{{ route('formateur.dashboard') }}" class="btn-outline-cmc">
                    <i class="bi bi-arrow-left"></i> Retour à mon emploi du temps
                </a>
            </div>
            @elseif(auth()->user()->role === 'admin')
            <div class="text-end">
                <a href="{{ route('admin.dashboard') }}" class="btn-outline-cmc">
                    <i class="bi bi-arrow-left"></i> Retour au tableau de bord
                </a>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
