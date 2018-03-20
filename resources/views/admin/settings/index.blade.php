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

       <!-- <div class="row">
           <div class="col-md-12">
               {!! Form::model($settings, ['route' => ['settings.store'], 'method' => 'post']) !!}

               @include('admin.settings.fields', ['settings' => $settings])

               {!! Form::close() !!}

               <div class="box box-primary">
                   <div class="box-header with-border">
                       <h3 class="box-title">Newsletter Subscriptions</h3>
                   </div>
                   <div class="box-body">
                       <div class="form-group">
                           <a class="btn btn-primary" href="{!! route('newsletter-subscriptions') !!}">Export CSV</a>
                           <div class="clearfix"></div>
                       </div>
                   </div>
               </div>

           </div>
       </div> -->
   </div>
@endsection