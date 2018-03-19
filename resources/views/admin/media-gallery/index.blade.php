@extends('layouts.app')

@section('css')
    <style>
        .fixed-height {
            height: 15em;
            text-align: center;
            vertical-align: middle;
            background: #b9bbbe;
        }
        .overflow-hidden {
            height: 2em;
            overflow: hidden;
        }
        .overflow-scroll {
            height: 5em;
            overflow: scroll;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Media Gallery
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')

        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-head" style="padding-top: 20px;">
                {!! Form::open(['route' => ['media-gallery.store'], 'files' => true, 'method' => 'post']) !!}

                <!-- Image Field -->
                <div class="form-group col-sm-3 col-lg-3">
                    <label class="btn btn-default col-sm-12 col-lg-12">
                        <input name="image" type="file" hidden class="hidden" /> Image
                    </label>
                </div>

                <!-- Directory Field -->
                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::text('directory', '', ['class' => 'form-control', 'placeholder' => 'Directory']) !!}
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-3 col-lg-3">
                    {!! Form::submit('Add', ['class' => 'btn btn-primary col-sm-12 col-lg-12']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            @foreach($gallery as $directory => $files)
                            <li @if($loop->first) class="active" @endif><a href="#tab_{!! str_slug($directory) !!}" data-toggle="tab" @if($loop->first) aria-expanded="true" @endif>{!! !empty($directory) ? $directory : 'Root' !!}</a></li>
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach($gallery as $directory => $files)
                            <div class="tab-pane @if($loop->first) active @endif" id="tab_{!! str_slug($directory) !!}">
                                @foreach($files as $file)
                                <div class="col-md-3">
                                    <div class="box box-widget">
                                        <div class="box-header with-border">
                                            <div class="overflow-hidden">{!! $file !!}</div>
                                            <div class="box-tools">
                                                {!! Form::open(['route' => ['media-gallery.destroy', 'delete'], 'method' => 'delete']) !!}
                                                {!! Form::hidden('path', $file) !!}
                                                {!! Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-box-tool', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="box-body fixed-height">
                                            <img class="img-responsive pad" src="{!! asset('media-gallery/'.$file) !!}">
                                        </div>
                                        <div class="box-footer">
                                            <p class="help-block overflow-scroll">{!! asset('media-gallery/'.$file) !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
