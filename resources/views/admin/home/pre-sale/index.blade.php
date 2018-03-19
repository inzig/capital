@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {!! str_unslug($contentType) !!} {!! str_unslug($stage) !!}
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($simpleContent, ['route' => [$contentType.'.store'], 'files' => true, 'method' => 'post']) !!}

                    @php($fieldsPartial = is_null($stage) ? 'admin.'.$contentType.'.fields' : 'admin.'.$contentType.'.'.$stage.'.fields')
                    @include($fieldsPartial, ['contentType' => $contentType, 'simpleContent' => $simpleContent])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection