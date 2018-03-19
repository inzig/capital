@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{!! str_unslug($contentType) !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row" style="margin-top: 15px;">
            <div class="col-md-12">

                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Page Details</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                    {!! Form::model($simpleContent, ['route' => [$contentType.'.title'], 'files' => true, 'method' => 'post']) !!}

                    <!-- Type Field -->
                    {!! Form::hidden('type', 'title.'.$contentType) !!}

                    <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                @php $count = 0; @endphp
                                @foreach(config('app.locales') as $locale => $label)
                                    <li @if($count == 0) class="active" @endif><a href="#tab_{!! $locale !!}" data-toggle="tab" @if($count == 0) aria-expanded="true" @endif>{!! $label !!}</a></li>
                                    @php ++$count; @endphp
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @php $count = 0; @endphp
                                @foreach(config('translatable')['locales'] as $locale)
                                    <div class="tab-pane @if($count == 0) active @endif" id="tab_{!! $locale !!}">
                                        <!-- Title Field -->
                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::label('translations['.$locale.'][title]', 'Page Title:') !!}
                                            {!! Form::text('translations['.$locale.'][title]', isset($simpleContent) ? $simpleContent->translateOrNew($locale)->title : null, ['class' => 'form-control', 'maxlength' => 60]) !!}
                                            <p class="help-block">To make text <span style="color: #c81471;">pink</span>, enclose it as &#x3C;span class="pink"&#x3E;Pink Text&#x3C;/span&#x3E;</p>
                                        </div>

                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::label('translations['.$locale.'][extra][chart_title]', 'Funds Allocation Title:') !!}
                                            {!! Form::text('translations['.$locale.'][extra][chart_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['chart_title']) ? $simpleContent->translateOrNew($locale)->extra['chart_title'] : null, ['class' => 'form-control', 'maxlength' => 20]) !!}
                                        </div>

                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::fileBox('translations['.$locale.'][extra][chart-private-sale]', 'Chart Image (Private Sale):', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['chart-private-sale']) ? $simpleContent->translateOrNew($locale)->extra['chart-private-sale'] : null) !!}
                                        </div>

                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::fileBox('translations['.$locale.'][extra][chart-pre-sale]', 'Chart Image (Pre Sale):', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['chart-pre-sale']) ? $simpleContent->translateOrNew($locale)->extra['chart-pre-sale'] : null) !!}
                                        </div>

                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::fileBox('translations['.$locale.'][extra][chart-main-sale]', 'Chart Image (Main Sale):', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['chart-main-sale']) ? $simpleContent->translateOrNew($locale)->extra['chart-main-sale'] : null) !!}
                                        </div>

                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::label('translations['.$locale.'][extra][details_title]', 'Token Distribution Title:') !!}
                                            {!! Form::text('translations['.$locale.'][extra][details_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['details_title']) ? $simpleContent->translateOrNew($locale)->extra['details_title'] : null, ['class' => 'form-control', 'maxlength' => 20]) !!}
                                        </div>

                                        <!-- Description Field -->
                                        <div class="form-group col-sm-12 col-lg-12">
                                            {!! Form::label('translations['.$locale.'][extra][details_description]', 'Token Distribution Description:') !!}
                                            {!! Form::textarea('translations['.$locale.'][extra][details_description]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['details_description']) ? $simpleContent->translateOrNew($locale)->extra['details_description'] : null, ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @php ++$count; @endphp
                                @endforeach
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <section class="content-header">
                    <h1 class="pull-right">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route($contentType.'.create') !!}">Add New</a>
                    </h1>
                </section>
                @include('admin.'.$contentType.'.table', ['contentType' => $contentType])
            </div>
        </div>
    </div>
@endsection

