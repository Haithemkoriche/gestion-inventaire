@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Bureau</h1>

    <form method="POST" action="{{ route('bureaux.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Numero de bureau</label>
            <input type="number" class="form-control" id="nom" name="num_bureau" required>
        </div>

        <div class="mb-3">
            <label for="etage" class="form-label">Numer d'Etage</label>
            <input type="number" class="form-control" id="etage" name="etage" required>
        </div>
        {{-- <div class="mb-3">
            <label for="siege_id" class="form-label">Sélectionner un Siège</label>
            <select class="form-control" id="siege_id" name="siege_id" required>
                @foreach($sieges as $siege)
                <option value="{{ $siege->id }}">{{ $siege->designation }}</option>
                @endforeach
            </select>
        </div> --}}
        

        <!-- Ajoutez d'autres champs du formulaire pour les attributs de l'agent au besoin -->

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection