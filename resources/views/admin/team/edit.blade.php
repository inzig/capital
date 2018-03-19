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
                   {!! Form::model($team, ['route' => [$contentType.'.update', $team->id], 'files' => true, 'method' => 'patch']) !!}

                        @include('admin.'.$contentType.'.fields', ['contentType' => $contentType, 'team' => $team])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection