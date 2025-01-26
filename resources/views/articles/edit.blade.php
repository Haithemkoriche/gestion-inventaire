@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Article</h1>

    <form method="POST" action="{{ route('articles.update', $article->id) }}">
        @csrf
        @method('PUT') <!-- Utilisez la méthode PUT pour la mise à jour -->

        <div class="mb-3">
            <label for="code_bar" class="form-label">Code bare</label>
            <input type="number" class="form-control" id="code_bar" name="code_bar" value="{{ $article->code_bar }}" required>
        </div>

        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{ $article->designation }}" required>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $article->quantite }}" required>
        </div>

        <!-- Dropdown for selecting an office -->
        <div class="mb-3">
            <label for="office_id" class="form-label">Sélectionner un Bureau</label>
            <select class="form-control" id="office_id" name="office_id">
                @foreach($offices as $office)
                    <option value="{{ $office->id }}" {{ $article->offices->contains($office->id) ? 'selected' : '' }}>
                        {{ $office->num_bureau }} <!-- Replace 'name' with the office attribute you want to display -->
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
