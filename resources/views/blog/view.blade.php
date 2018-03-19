@extends('layouts.pages')

@section('title')
    {{ $post->title }}
@endsection

@section('body')
    <div class="card-body">
        <div class="card-text">{!! $post->body !!}</div>
    </div>
@endsection
