@extends('layouts.pages')

@section('title')
    {{ $title }}
@endsection

@section('body')
    @if($page->image)<img class="card-img-top img-blog-single" src="{!! asset($page->image) !!}">@endif
    <div class="card-body">
        <div class="card-text">{!! $page->description !!}</div>
    </div>
@endsection
