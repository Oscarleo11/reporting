@extends('layouts.dashboard')
@section('title', 'Liste des fichiers XML générés')
@section('content')
    <div class="section">
        <div class="section-header">
            <h1><i class="fas fa-list text-primary mr-2"></i> Fichiers XML générés</h1>
        </div>
        <div class="section-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        {{-- <th>N°</th> --}}
                        <th>Type</th>
                        <th>Période</th>
                        <th>Fichier</th>
                        <th>Statut</th>
                        <th>Motif refus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exports as $index => $export)
                        <tr>
                            {{-- <td>{{ $index + 1 }}</td> --}}
                            <td>{{ $export->type }}</td>
                            <td>
                                {{ $export->debut_periode }} au {{ $export->fin_periode }}
                            </td>
                            <td style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <a href="{{ asset('exports/' . $export->filename) }}" download
                                    style="display: inline-block; max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $export->filename }}
                                </a>
                            </td>
                            <td style="max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                @if ($export->status === 'valide')
                                    <span class="badge badge-success">Validé</span>
                                @elseif($export->status === 'non_valide')
                                    <span class="badge badge-danger">Non validé</span>
                                @else
                                    <span class="badge badge-secondary">En attente</span>
                                @endif
                            </td>
                            <td>{{ $export->motif_refus }}</td>
                            <td>
                                <form method="POST" action="{{ route('xml_exports.updateStatus', $export) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="en_attente" @selected($export->status === 'en_attente')>En attente</option>
                                        <option value="valide" @selected($export->status === 'valide')>Validé</option>
                                        <option value="non_valide" @selected($export->status === 'non_valide')>Non validé</option>
                                    </select>
                                    @if ($export->status === 'non_valide')
                                        <input type="text" name="motif_refus" class="form-control mt-2"
                                            placeholder="Motif du refus" value="{{ $export->motif_refus }}">
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
