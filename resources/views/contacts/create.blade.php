@extends('contacts.layout')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h3>Add New Contact</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('contact') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
                <label for="" class="mt-3">Number</label>
                <input type="text" name="number" id="name" class="form-control" required>
                <label for="" class="mt-3">Address</label>
                <input type="text"  name="address" id="address" class="form-control" required>
                <label for="" class="mt-3">Contact Photo</label>
                <input type="file"  name="image" id="image" class="form-control"  accept="image/*">
                <input type="submit" value="Add Contact" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
@endsection
