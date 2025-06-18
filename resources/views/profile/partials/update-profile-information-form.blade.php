<section>
    <header class="mb-4">
        <h2 class="h5 font-weight-bold text-primary mb-1">
            <i class="fas fa-user-edit mr-2"></i> Informations personnelles
        </h2>
        <p class="text-muted mb-0">
            Mettez à jour vos informations de profil et votre adresse email.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-3">
        @csrf
        @method('patch')

        <div class="form-group mb-3">
            <label for="name" class="font-weight-bold">Nom complet</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email" class="font-weight-bold">Adresse email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2 mb-0 py-2 px-3">
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    Votre adresse email n'est pas vérifiée.
                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">
                        Renvoyer l'email de vérification
                    </button>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2 mb-0 py-2 px-3">
                        Un nouveau lien de vérification a été envoyé à votre adresse email.
                    </div>
                @endif
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-save mr-1"></i> Enregistrer
            </button>
            @if (session('status') === 'profile-updated')
                <span class="text-success ml-3">
                    <i class="fas fa-check-circle"></i> Modifications enregistrées.
                </span>
            @endif
        </div>
    </form>
</section>
