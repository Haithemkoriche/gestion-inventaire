@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-3">
            <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Article</div>
                <div class="card-body">
                    <h5 class="card-title">Gérer les article</h5>
                    <p class="card-text"><a href="{{route ('articles.index')}}" class="btn btn-light">Ajouter</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Bureau</div>
                <div class="card-body">
                    <h5 class="card-title">Gérer les bureau</h5>
                    <p class="card-text"><a href="{{route('bureaux.index')}}" class="btn btn-light">Ajouter</a></p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Besoin</div>
                <div class="card-body">
                    <h5 class="card-title">Gérer les Besoins</h5>
                    <p class="card-text"><a href="{{route('bureaux.index')}}" class="btn btn-light">Ajouter</a></p>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-12 col-md-3">
                <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Siége</div>
                    <div class="card-body">
                        <h5 class="card-title">Gérer les Siéges</h5>
                        <p class="card-text"><a href="{{route('sieges.index')}}" class="btn btn-light">Ajouter</a></p>
    </div>
</div>
</div> --}}
<div class="col-sm-12 col-md-3">
    <div class="card text-bg-teritiary mb-3" style="max-width: 18rem;">
        <div class="card-header">Stock</div>
        <div class="card-body">
            <h5 class="card-title">Gérer les Stock</h5>
            <p class="card-text"><a href="{{route('stockes.index')}}" class="btn btn-outline-primary">Ajouter</a></p>
        </div>
    </div>
</div>
</div>
</div>
@endsection
