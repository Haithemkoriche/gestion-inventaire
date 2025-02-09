@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <h1>
            Articles
            <a href="{{ route('articles.create') }}" class="btn btn-light btn-sm rounded-circle">
                <i class="fas fa-plus"></i>
            </a>
        </h1> --}}

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and filter -->
        <div class="row mb-4">
            <div class="col-md-6">
                <form action="{{ route('admin.stock') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Rechercher par désignation..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('admin.stock') }}" method="GET">
                    <div class="input-group">
                        <select name="wilaya" class="form-control">
                            <option value="">Toutes les wilayas</option>
                            @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya }}" {{ request('wilaya') == $wilaya ? 'selected' : '' }}>
                                    {{ $wilaya }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mb-3">Total Articles: {{ $totalArticles }}</div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Code Barre</th>
                        <th>Designation</th>
                        <th>Quantité</th>
                        <th>Bureau</th>
                        <th>Siège</th>
                        <th>Wilaya</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->code_bar }}</td>
                            <td>{{ $article->designation }}</td>
                            <td>{{ $article->quantite }}</td>
                            <td>
                                {{ $article->offices->pluck('num_bureau')->implode(', ') ?: 'N/A' }}
                            </td>
                            <td>
                                {{ $article->offices->flatMap(function ($office) {
                                        return $office->sieges->pluck('designation');
                                    })->unique()->implode(', ') ?:
                                    'N/A' }}
                            </td>
                            <td>
                                {{ $article->offices->flatMap(function ($office) {
                                        return $office->sieges->pluck('wilaya_sieges');
                                    })->unique()->implode(', ') ?:
                                    'N/A' }}
                            </td>
                            <td>{{ $stockStatus[$article->id] ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group">
                                    <form method="POST" action="{{ route('changeStatus', ['id' => $article->id]) }}"
                                        class="me-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="status" value="en_stock"
                                            class="btn btn-primary btn-sm"
                                            onclick="return confirm('Êtes-vous sûr de vouloir mettre le statut en stock ?')">
                                            En stock
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('changeStatus', ['id' => $article->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="status" value="en_utilisation"
                                            class="btn btn-primary btn-sm"
                                            onclick="return confirm('Êtes-vous sûr de vouloir mettre le statut en utilisation ?')">
                                            En utilisation
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
