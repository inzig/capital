<!-- Type Field -->
{!! Form::hidden('type', $contentType) !!}

<div class="col-md-12">
    <!-- Date Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('dated_on', 'Date:') !!}
        <div class="input-group date">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
            {!! Form::text('dated_on', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
        </div>
    </div>

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
                        {!! Form::label('translations['.$locale.'][title]', 'Title:') !!}
                        {!! Form::text('translations['.$locale.'][title]', isset($datedContent) ? $datedContent->translateOrNew($locale)->title : null, ['class' => 'form-control', 'maxlength' => 60]) !!}
                    </div>

                    <!-- Description Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][description]', 'Description:') !!}
                        {!! Form::textarea('translations['.$locale.'][description]', isset($datedContent) ? $datedContent->translateOrNew($locale)->description : null, ['class' => 'form-control']) !!}
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
    {!! Form::fileBox('base_extra[image]', 'Thumbnail:', isset($datedContent) && isset($datedContent->base_extra['image']) ? $datedContent->base_extra['image'] : null, 'Max Dimensions: 35x22') !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('base_extra[quarter]', 'Quarter:') !!}
    {!! Form::text('base_extra[quarter]', null, ['class' => 'form-control', 'maxlength' => 2]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('base_extra[year]', 'Year:') !!}
    {!! Form::text('base_extra[year]', null, ['class' => 'form-control', 'maxlength' => 4]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($contentType.'.index') !!}" class="btn btn-default">Cancel</a>
</div>

