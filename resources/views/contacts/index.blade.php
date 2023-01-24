@extends('contacts.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Contacts</h3>
                <a href="{{ url('/contact/create') }}" class="btn btn-success">Add New Contacts</a>
            </div>
            <div class="card-body ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- $item is considered ne record from the table/db --}}
                        @foreach ($contacts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <a href="{{ url('/contact/' . $item->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ url('/contact/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">Update</a>

                                    <form action="{{ url('/contact/' . $item->id) }}" method="post" style="display: inline">
                                        {{ method_field('DELETE') }}
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete contact?')">Delete</button>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $contacts->links() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
