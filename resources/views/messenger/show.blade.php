@extends('layouts.app')

@section('content')

    <div class="col-md-4 col-md-offset-4">
        <a href="/messages/create"><h1>Create New Message</h1></a>

        <h1>{{ $thread->subject }}</h1>
        @each('messenger.partials.messages', $thread->messages, 'message')

        @include('messenger.partials.form-message')
    </div>
@stop