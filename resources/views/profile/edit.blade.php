@extends('layouts.dashboard')
@section('title', 'Mon profil')
@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-user-cog text-primary mr-2"></i> Mon profil</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Retour tableau de bord
            </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    {{-- <div class="card-header text-white">
                        <h4 class="mb-0"><i class="fas fa-user-edit mr-2"></i> Informations personnelles</h4>
                    </div> --}}
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form', ['user' => Auth::user()])
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    {{-- <div class="card-header text-white">
                        <h4 class="mb-0"><i class="fas fa-key mr-2"></i> Modifier le mot de passe</h4>
                    </div> --}}
                    <div class="card-body">
                        @include('profile.partials.update-password-form', ['user' => Auth::user()])
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    {{-- <div class="card-header text-white">
                        <h4 class="mb-0"><i class="fas fa-user-times mr-2"></i> Supprimer mon compte</h4>
                    </div> --}}
                    <div class="card-body">
                        @include('profile.partials.delete-user-form', ['user' => Auth::user()])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection