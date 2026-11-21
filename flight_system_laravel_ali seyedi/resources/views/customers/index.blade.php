@extends('layout')
@section('content')
    <h2>Customers</h2>
    <p><a class="btn" href="{{ route('customers.create') }}">Add customer</a></p>
    <table>
        <tr><th>#</th><th>Name</th><th>Phone</th><th></th></tr>
        @forelse ($customers as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->phone }}</td>
                <td>
                    <a class="btn" href="{{ route('customers.edit', $c) }}">Edit</a>
                    <form method="POST" action="{{ route('customers.destroy', $c) }}" style="display:inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="red">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No customers yet</td></tr>
        @endforelse
    </table>
@endsection
