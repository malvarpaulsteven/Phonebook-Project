@extends('contacts.layout')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            Edit Contact
        </div>
        <div class="card-body">
            <form action="{{ url('contact/' . $contacts->id) }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{ $contacts->id }}" class="form-control">
                <label for="">Name:</label>
                <input type="text" name="name" id="name" value="{{ $contacts->name }}" class="form-control">
                <label class="mt-3" for="">Number</label>
                <input type="text" name="number" id="number" value="{{ $contacts->number }}" class="form-control">
                <label class="mt-3" for="">Address</label>
                <input type="text" name="address" id="address" value="{{ $contacts->address }}" class="form-control">
                <label for="" class="mt-3">Contact Photo</label>
                <input type="file"  name="image" id="image" class="form-control"  accept="image/*">
                <input type="submit" value="Save" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
@endsection
