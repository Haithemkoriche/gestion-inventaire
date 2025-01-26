@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>
            Bureaux
            <a href="{{ route('bureaux.create') }}" class="btn btn-light btn-sm rounded-circle">
                <i class="fas fa-plus"></i>
            </a>
        </h1>
        <!-- Display a success message if available -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Table of bureaux -->
        <table class="table w-50 table-bordered ms-auto me-auto">
            <!-- Column headers -->
            <thead>
                <tr>
                    <th>Numero de Bureau</th>
                    <th>Numero d'Etage</th>
                    <th>Siège</th> <!-- New column for displaying the associated siege -->
                    <th>Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <!-- Loop to display bureaux -->
                @foreach ($bureaux as $bureau)
                    <tr>
                        <td>{{ $bureau->num_bureau }}</td>
                        <td>{{ $bureau->etage }}</td>
                        <td>
                            @if ($bureau->sieges->isNotEmpty())
                                @foreach ($bureau->sieges as $siege)
                                    {{ $siege->designation }}
                                    @if (!$loop->last)
                                        , <!-- Add comma for separation -->
                                    @endif
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('bureaux.edit', $bureau->id) }}" class="btn btn-primary"><i
                                    class="fa fa-edit"></i></a>
                            <form action="{{ route('bureaux.destroy', $bureau->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
