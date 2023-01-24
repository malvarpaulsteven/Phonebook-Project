@extends('contacts.layout')

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Contact Details</h2>
        </div>
        <div class="card-body">
            @if ($contacts->image)
                <img src="{{ asset($contacts->image) }}" alt="" height="100" id="contactImage">
            @else
               <p>No image available.</p>
            @endif
            <h4>{{ $contacts->name }}</h4>
            <span>Contact Number: {{ $contacts->number }}</span><br>
            <span>Contact Address: {{ $contacts->address }}</span>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            Messages
        </div>
        <div class="card-body">
            <table class="table">
                @if(count($messages) > 0 )
                @foreach ($messages as $item)
                    <tr>
                        <td>
                            <h5>{{ $item->msg }}</h5>
                            <small>Written on {{ $item->created_at }}</small>
                        </td>
                    </tr>
                @endforeach
                @else
                    <small>No messages to display</small>
                @endif
            </table>
        </div>
    </div>
@endsection
