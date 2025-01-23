@extends('layouts.app')

@section('content')
    <h1>All Projects</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->description }}</td>
                    <td>
                        <a href="{{ route(' . strtolower(Project) . 's.edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route(' . strtolower(Project) . 's.destroy', $record->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection