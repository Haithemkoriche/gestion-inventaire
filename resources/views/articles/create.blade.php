@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Article</h1>

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf

        <!-- Barcode Scanner -->
        <div class="mb-3">
            <label for="code_bar" class="form-label">Code Bare</label>
            <input type="number" class="form-control" id="code_bar" name="code_bar" required>
            <button type="button" class="btn btn-primary" onclick="scanBarcode()">Scanner le code</button>
        </div>

        <!-- Existing Form Fields -->
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" required>
        </div>

        <!-- Dropdown for selecting a single office -->
        <div class="mb-3">
            <label for="office_id" class="form-label">Sélectionner un Bureau</label>
            <select class="form-control" id="office_id" name="office_id">
                @foreach($offices as $office)
                <option value="{{ $office->id }}">{{ $office->num_bureau }}</option>
                <!-- Replace 'name' with the office attribute you want to display -->
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <!-- JavaScript for Barcode Scanning -->
    <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
    <script>
    function scanBarcode() {
        Quagga.init({
            inputStream: {
                name: 'Live',
                type: 'LiveStream',
                target: document.querySelector('#code_bar'),
                constraints: {
                    width: 480,
                    height: 320,
                    facingMode: 'environment', // or user (for front camera)
                },
            },
            decoder: {
                readers: ['code_128_reader'],
            },
            locator: {
                patchSize: 'medium',
                halfSample: true,
            },
            numOfWorkers: navigator.hardwareConcurrency || 4,
            frequency: 10,
            locate: true,
        }, function(err) {
            if (err) {
                console.error(err);
                return;
            }

            Quagga.start();
        });

        Quagga.onDetected(function(result) {
            const barcode = result.codeResult.code;
            document.getElementById('code_bar').value = barcode;
            Quagga.stop();
        });
    }
    </script>
</div>
@endsection