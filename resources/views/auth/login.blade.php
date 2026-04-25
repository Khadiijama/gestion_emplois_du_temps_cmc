<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-3 p-3 rounded-3" style="background:#f0fdf4; border:1px solid #bbf7d0; font-size:13px; color:#15803d;">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-msg">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label" for="email">
                <i class="bi bi-envelope me-1" style="color:#1797a7;"></i> Adresse Email
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control" required autofocus autocomplete="username"
                   placeholder="exemple@cmc.ma">
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label" for="password">
                <i class="bi bi-lock me-1" style="color:#1797a7;"></i> Mot de passe
            </label>
            <input id="password" type="password" name="password"
                   class="form-control" required autocomplete="current-password"
                   placeholder="••••••••">
        </div>

        <!-- Remember me + Forgot -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me" style="font-size:13px; color:#64748b;">
                    Se souvenir de moi
                </label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size:13px; color:#1797a7; text-decoration:none;">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <button type="submit" class="btn-login">
            <i class="bi bi-box-arrow-in-right me-2"></i> SE CONNECTER
        </button>
    </form>
</x-guest-layout>
