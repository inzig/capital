@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {!! str_unslug($contentType) !!}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => $contentType.'.store', 'files' => true]) !!}

                        @include('admin.'.$contentType.'.fields', ['contentType' => $contentType, 'categories' => $categories])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
