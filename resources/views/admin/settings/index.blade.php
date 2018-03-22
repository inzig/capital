@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Settings
        </h1>
   </section>
   <div class="content">
       <div class="clearfix"></div>
       @include('flash::message')

       @include('adminlte-templates::common.errors')

       <div class="row">
           <div class="col-md-12">
               {!! Form::model($settings, ['route' => ['settings.store'], 'method' => 'post']) !!}

               @include('admin.settings.fields', ['settings' => $settings])

               {!! Form::close() !!}           
                
           </div>
       </div>
   </div>
@endsection