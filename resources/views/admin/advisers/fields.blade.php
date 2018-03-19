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
                    <!-- Title Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][name]', 'Name:') !!}
                        {!! Form::text('translations['.$locale.'][name]', isset($team) ? $team->translateOrNew($locale)->name : null, ['class' => 'form-control', 'maxlength' => 40]) !!}
                    </div>

                    <!-- Designation Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][designation]', 'Designation:') !!}
                        {!! Form::text('translations['.$locale.'][designation]', isset($team) ? $team->translateOrNew($locale)->designation : null, ['class' => 'form-control', 'maxlength' => 60]) !!}
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

<!-- Image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::fileBox('image', 'Image:', isset($team) ? $team->image : null) !!}
</div>

<!-- Linkedin Field -->
<div class="form-group col-sm-4">
    {!! Form::label('linkedin', 'Linkedin:') !!}
    {!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-12">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($contentType.'.index') !!}" class="btn btn-default">Cancel</a>
</div>
