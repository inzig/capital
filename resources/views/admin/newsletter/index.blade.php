@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {!! str_unslug($contentType) !!}
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

                        @include('admin.'.$contentType.'.fields', ['contentType' => $contentType, 'simpleContent' => $simpleContent])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection