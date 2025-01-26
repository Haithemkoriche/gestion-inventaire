@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Bureau</h1>

    <form method="POST" action="{{ route('bureaux.update', $bureau->id) }}">
        @csrf
        @method('PUT') <!-- Utilisez la méthode PUT pour la mise à jour -->

        <div class="mb-3">
            <label for="num_bureau" class="form-label">Numero de bureau</label>
            <input type="number" class="form-control" id="num_bureau" name="num_bureau" value="{{ $bureau->num_bureau }}" required>
        </div>

        <div class="mb-3">
            <label for="etage" class="form-label">Numero d'Etage</label>
            <input type="number" class="form-control" id="etage" name="etage" value="{{ $bureau->etage }}" required>
        </div>

        {{-- <!-- Dropdown for selecting siege -->
        <div class="mb-3">
            <label for="siege_id" class="form-label">Sélectionner un Siège</label>
            <select class="form-control" id="siege_id" name="siege_id">
                @foreach($sieges as $siege)
                    <option value="{{ $siege->id }}" {{ $bureau->sieges->contains($siege->id) ? 'selected' : '' }}>
                        {{ $siege->designation }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
