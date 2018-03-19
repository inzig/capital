<!-- Type Field -->
{!! Form::hidden('type', $contentType) !!}

<div class="col-md-12">
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
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][title]', ' Title:') !!}
                        {!! Form::text('translations['.$locale.'][title]', isset($simpleContent) ? $simpleContent->translateOrNew($locale)->title : null, ['class' => 'form-control', 'maxlength' => 128]) !!}
                    </div>

                    <!-- Description Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][description]', 'Meta Description:') !!}
                        {!! Form::textarea('translations['.$locale.'][description]', isset($simpleContent) ? $simpleContent->translateOrNew($locale)->description : null, ['class' => 'form-control no-wsyiwyg']) !!}
                    </div>

                    <!-- Keywords Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][extra][keywords]', 'Meta Keywords:') !!}
                        {!! Form::textarea('translations['.$locale.'][extra][keywords]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['keywords']) ? $simpleContent->translateOrNew($locale)->extra['keywords'] : null, ['class' => 'form-control no-wsyiwyg']) !!}
                        <p class="help-block">Comma separated list of keywords</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @php ++$count; @endphp
            @endforeach
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

