@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>
            Utilisateurs
            <a href="{{ route('admin.users.create') }}" class="btn btn-light btn-sm rounded-circle">
                <i class="fas fa-plus"></i>
            </a>
        </h1>
        <!-- Display a success message if available -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Table of users -->
        <table class="table w-50 table-bordered ms-auto me-auto">
            <!-- Column headers -->
            <thead>
                <tr>
                    <th>Nom d'utilisateur</th>
                    <th>Siège</th>
                    <th>Wilaya</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <!-- Loop to display users -->
                @foreach ($siegeUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->designation }}</td>
                        <td>{{ $user->wilaya_sieges }}</td>
                        <td>
                            {{-- <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary"><i
                                    class="fa fa-edit"></i></a> --}}
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
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
