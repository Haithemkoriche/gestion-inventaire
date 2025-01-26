@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <h1>
        Articles
        <a href="{{ route('articles.create') }}" class="btn btn-light btn-sm rounded-circle">
            <i class="fas fa-plus"></i>
        </a>
    </h1> -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="display-6">Total Articles: {{ $totalArticles }}</div>

    <table class="table w-50 table-bordered ms-auto me-auto">
        <thead class="">
            <tr>
                <th>Code Bare</th>
                <th>Designation</th>
                <th>Quantité</th>
                <th>Bureau</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
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
                    {{ $office->num_bureau }}
                    @if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>{{ $stockStatus[$article->id] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection