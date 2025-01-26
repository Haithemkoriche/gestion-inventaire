@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Ajouter un Siège</h1>

    <form method="POST" action="{{ route('admin.sieges.store') }}">
        @csrf

        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
        </div>

        <div class="mb-3">
            <label for="address_siege" class="form-label">Adresse du Siège</label>
            <input type="text" class="form-control" id="address_siege" name="address_siege" required>
        </div>

        <div class="mb-3">
            <label for="wilaya_sieges" class="form-label">Wilaya du Siège</label>
            <input type="text" class="form-control" id="wilaya_sieges" name="wilaya_sieges" required>
        </div>

        <!-- Add other form fields for additional attributes of the siege if needed -->

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
