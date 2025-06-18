<section>
    <header class="mb-4">
        <h2 class="h5 font-weight-bold text-primary mb-1">
            <i class="fas fa-key mr-2"></i> Modifier le mot de passe
        </h2>
        <p class="text-muted mb-0">
            Utilisez un mot de passe long et complexe pour sécuriser votre compte.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-3">
        @csrf
        @method('put')

        <div class="form-group mb-3">
            <label for="current_password" class="font-weight-bold">Mot de passe actuel</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" required>
            @error('current_password', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password" class="font-weight-bold">Nouveau mot de passe</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" required>
            @error('password', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation" class="font-weight-bold">Confirmer le nouveau mot de passe</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" required>
            @error('password_confirmation', 'updatePassword')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save mr-1"></i> Enregistrer
            </button>
            @if (session('status') === 'password-updated')
                <span class="text-success ml-3">
                    <i class="fas fa-check-circle"></i> Mot de passe modifié.
                </span>
            @endif
        </div>
    </form>
</section>
