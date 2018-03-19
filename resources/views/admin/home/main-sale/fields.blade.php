<!-- Type Field -->
{!! Form::hidden('type', $contentType) !!}

<!-- Stage Field -->
{!! Form::hidden('stage', $stage) !!}

<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @foreach(config('app.locales') as $locale => $label)
                <li @if($loop->first) class="active" @endif><a href="#tab_{!! $locale !!}" data-toggle="tab" @if($loop->first) aria-expanded="true" @endif>{!! $label !!}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach(config('translatable')['locales'] as $locale)
                <div class="tab-pane @if($loop->first) active @endif" id="tab_{!! $locale !!}">
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][extra][current_bonus_title]', 'Current Bonus Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][current_bonus_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['current_bonus_title']) ? $simpleContent->translateOrNew($locale)->extra['current_bonus_title'] : null, ['class' => 'form-control', 'maxlength' => 12]) !!}
                    </div>

                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][extra][buy_button_title]', 'Buy Button Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][buy_button_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['buy_button_title']) ? $simpleContent->translateOrNew($locale)->extra['buy_button_title'] : null, ['class' => 'form-control', 'maxlength' => 24]) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[current_bonus]', 'Current Bonus:') !!}
    {!! Form::text('base_extra[current_bonus]', isset($simpleContent) && isset($simpleContent->base_extra['current_bonus']) ? $simpleContent->base_extra['current_bonus'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[tokens_sold]', 'Sold Tokens:') !!}
    {!! Form::text('base_extra[tokens_sold]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_sold']) ? $simpleContent->base_extra['tokens_sold'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[tokens_sold_usd]', 'Sold Tokens (USD):') !!}
    {!! Form::text('base_extra[tokens_sold_usd]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_sold_usd']) ? $simpleContent->base_extra['tokens_sold_usd'] : null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

