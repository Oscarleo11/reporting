{{-- filepath: c:\laragon\www\reporting\resources\views\admin\users\create.blade.php --}}
@extends('layouts.dashboard')

@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-user-plus text-danger mr-2"></i> Ajouter un utilisateur</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ url()->previous() }}" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white" >
                        <h4 class="mb-0"><i class="fas fa-user-plus mr-2"></i> Formulaire de création</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" id="message">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger" id="message">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.users.store') }}">
                            @csrf
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirmer le mot de passe</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-save"></i> Créer l'utilisateur
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection