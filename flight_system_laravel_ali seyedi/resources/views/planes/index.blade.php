@extends('layout')
@section('content')
    <h2>Planes</h2>
    <p><a class="btn" href="{{ route('planes.create') }}">Add plane</a></p>
    <table>
        <tr><th>#</th><th>Model</th><th>Registration</th><th>Seats</th><th></th></tr>
        @forelse ($planes as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->model }}</td>
                <td>{{ $p->reg }}</td>
                <td>{{ $p->seats }}</td>
                <td>
                    <a class="btn" href="{{ route('planes.edit', $p) }}">Edit</a>
                    <form method="POST" action="{{ route('planes.destroy', $p) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="red">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No planes yet</td></tr>
        @endforelse
    </table>
@endsection
