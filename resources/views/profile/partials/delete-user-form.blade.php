<section>
    <header class="mb-4">
        <h2 class="h5 font-weight-bold text-primary mb-1">
            <i class="fas fa-user-times mr-2"></i> Supprimer mon compte
        </h2>
        <p class="text-muted mb-0">
            Une fois votre compte supprimé, toutes vos données seront définitivement effacées. Veuillez sauvegarder ce que vous souhaitez conserver avant de continuer.
        </p>
    </header>

    <!-- Bouton pour ouvrir la modale -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmDeleteModal">
        <i class="fas fa-trash-alt mr-1"></i> Supprimer mon compte
    </button>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="confirmDeleteModalLabel">
                        <i class="fas fa-exclamation-triangle mr-2"></i> Confirmer la suppression
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Êtes-vous sûr de vouloir supprimer votre compte ?<br>
                        Cette action est <strong>irréversible</strong>.<br>
                        Veuillez saisir votre mot de passe pour confirmer.
                    </p>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Mot de passe</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Mot de passe" required>
                        @if ($errors->userDeletion->has('password'))
                            <div class="text-danger small mt-1">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt mr-1"></i> Supprimer définitivement
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
