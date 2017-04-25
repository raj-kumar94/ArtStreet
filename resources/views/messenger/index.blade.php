@extends('layouts.app')

@section('content')
<a href="/messages/create"><h1 class="text-center">Create new message</h1></a>
    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop