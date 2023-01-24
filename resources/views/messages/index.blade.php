@extends('contacts.layout')

@section('content')
<div class="card mt-5">
    <div class="card-header">
        Messages
    </div>
    <div class="card-body">
        @foreach ($contact as $item)
            @foreach ($item->message as $msgItem)
                <table class="table">
                    <tr>
                        <td>
                            <h4>{{ $msgItem->msg }}</h4>
                            {{ $item->name }} <br>
                            {{ $msgItem->created_at }} <br>
                        </td>
                    </tr>
                </table>
            @endforeach
        @endforeach
    </div>
</div>
@endsection
