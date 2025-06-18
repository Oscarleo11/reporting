@extends('layouts.dashboard')

@section('title', 'Accueil')

@section('content')
<div class="section">
    <div class="section-header">
        <h1><i class="fas fa-chart-pie text-primary mr-2"></i> Tableau de bord</h1>
    </div>
    <div class="section-body">

        {{-- Statistiques principales --}}
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-2x text-primary mb-2"></i>
                        <h6 class="font-weight-bold mb-1">Utilisateurs</h6>
                        <div class="h3 mb-0">{{ $usersCount ?? '--' }}</div>
                        <small class="text-muted">Actifs ce mois : {{ $usersActiveMonth ?? '--' }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-exchange-alt fa-2x text-info mb-2"></i>
                        <h6 class="font-weight-bold mb-1">Opérations STRA</h6>
                        <div class="h3 mb-0">{{ $operationsCount ?? '--' }}</div>
                        <small class="text-muted">Ce mois : {{ $operationsMonth ?? '--' }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-user-secret fa-2x text-danger mb-2"></i>
                        <h6 class="font-weight-bold mb-1">Fraudes STRA</h6>
                        <div class="h3 mb-0">{{ $fraudesCount ?? '--' }}</div>
                        <small class="text-muted">Ce mois : {{ $fraudesMonth ?? '--' }}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                        <h6 class="font-weight-bold mb-1">Incidents STRA</h6>
                        <div class="h3 mb-0">{{ $incidentsCount ?? '--' }}</div>
                        <small class="text-muted">Ce mois : {{ $incidentsMonth ?? '--' }}</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Graphique d'évolution (exemple avec Chart.js) --}}
        <div class="row mb-4">
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white">
                        <i class="fas fa-chart-line text-primary mr-2"></i> Évolution des opérations STRA (12 derniers mois)
                    </div>
                    <div class="card-body">
                        <canvas id="operationsChart" height="90"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white">
                        <i class="fas fa-tasks text-info mr-2"></i> Répartition des fraudes/incidents
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bloc accès rapide --}}
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <i class="fas fa-bolt mr-2"></i> Accès rapide
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('operationstra.index') }}" class="btn btn-outline-info btn-block">
                                    <i class="fas fa-exchange-alt fa-lg"></i><br>Opérations STRA
                                </a>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('fraudestra.index') }}" class="btn btn-outline-danger btn-block">
                                    <i class="fas fa-user-secret fa-lg"></i><br>Fraudes STRA
                                </a>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('incidentstra.index') }}" class="btn btn-outline-warning btn-block">
                                    <i class="fas fa-exclamation-triangle fa-lg"></i><br>Incidents STRA
                                </a>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('reclamationstra.index') }}" class="btn btn-outline-primary btn-block">
                                    <i class="fas fa-exclamation-circle fa-lg"></i><br>Réclamations STRA
                                </a>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('ecosysteme.index') }}" class="btn btn-outline-success btn-block">
                                    <i class="fas fa-network-wired fa-lg"></i><br>Écosystème STRA
                                </a>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="{{ route('annuairestra.index') }}" class="btn btn-outline-secondary btn-block">
                                    <i class="fas fa-address-book fa-lg"></i><br>Annuaire STRA
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bloc message de bienvenue --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-info shadow-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    Bienvenue sur la plateforme de reporting STRA. Utilisez le menu ou les accès rapides pour naviguer dans les différentes fonctionnalités.
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Exemple de données dynamiques, à remplacer par vos vraies données côté contrôleur
    const operationsLabels = {!! json_encode($operationsLabels ?? []) !!};
    const operationsData = {!! json_encode($operationsData ?? []) !!};
    const pieLabels = {!! json_encode($pieLabels ?? ['Fraudes', 'Incidents']) !!};
    const pieData = {!! json_encode($pieData ?? [0, 0]) !!};

    // Courbe d'évolution
    const ctx = document.getElementById('operationsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: operationsLabels,
            datasets: [{
                label: 'Opérations STRA',
                data: operationsData,
                borderColor: '#007bff',
                backgroundColor: 'rgba(0,123,255,0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });

    // Pie chart
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: pieLabels,
            datasets: [{
                data: pieData,
                backgroundColor: ['#dc3545', '#ffc107'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection