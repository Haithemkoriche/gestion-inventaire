@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>
        Sièges
        <a href="{{ route('admin.sieges.create') }}" class="btn btn-light btn-sm rounded-circle">
            <i class="fas fa-plus"></i>
        </a>
    </h1>
    <!-- Display a success message if available -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Table of sieges -->
    <table class="table w-50 table-bordered ms-auto me-auto">
        <!-- Column headers -->
        <thead>
            <tr>
                <th>Designation</th>
                <th>Address Siege</th>
                <th>Wilaya Sieges</th>
                <th>Action</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <!-- Loop to display sieges -->
            @foreach($sieges as $siege)
            <tr>
                <td>{{ $siege->designation }}</td>
                <td>{{ $siege->address_siege }}</td>
                <td>{{ $siege->wilaya_sieges }}</td>
                <td>
                    <a href="{{ route('admin.sieges.edit', $siege->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('admin.sieges.destroy', $siege->id) }}" method="POST" style="display:inline;">
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
