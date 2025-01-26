@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
        Articles
        {{-- <a href="{{ route('articles.create') }}" class="btn btn-light btn-sm rounded-circle">
            <i class="fas fa-plus"></i>
        </a> --}}
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table w-50 table-bordered ms-auto me-auto">
        <thead>
            <tr>
                <th>Code Bare</th>
                <th>Designation</th>
                <th>Quantité</th>
                <th>Bureau</th> <!-- New header for office column -->
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->code_bar }}</td>
                <td>{{ $article->designation }}</td>
                <td>{{ $article->quantite }}</td>
                <td>
                    @foreach($article->offices as $office)
                        {{ $office->num_bureau }} <!-- Replace 'name' with the actual attribute -->
                        @if(!$loop->last), @endif <!-- Adds a comma separator for multiple offices -->
                    @endforeach
                </td>
                
                {{-- <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
