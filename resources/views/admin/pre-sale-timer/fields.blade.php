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
                        {!! Form::label('translations['.$locale.'][extra][presale_ends_title]', 'Presale Ends Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][presale_ends_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['presale_ends_title']) ? $simpleContent->translateOrNew($locale)->extra['presale_ends_title'] : null, ['class' => 'form-control', 'maxlength' => 24]) !!}
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

<!-- Date Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[start_date]', 'End Date (UTC):') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        {!! Form::text('base_extra[start_date]', isset($simpleContent) && isset($simpleContent->base_extra['start_date']) ? $simpleContent->base_extra['start_date'] : null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
    </div>
</div>

<!-- Time Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[start_time]', 'End Time (UTC):') !!}
    {!! Form::text('base_extra[start_time]', isset($simpleContent) && isset($simpleContent->base_extra['start_time']) ? $simpleContent->base_extra['start_time'] : null, ['class' => 'form-control', 'placeholder' => 'hh:mm:ss']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

