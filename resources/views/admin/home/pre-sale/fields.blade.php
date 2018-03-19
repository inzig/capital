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
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][tokens_to_sell_title]', 'Tokens To Sell Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][tokens_to_sell_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['tokens_to_sell_title']) ? $simpleContent->translateOrNew($locale)->extra['tokens_to_sell_title'] : null, ['class' => 'form-control', 'maxlength' => 30]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][tokens_remaining_title]', 'Tokens Remaining Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][tokens_remaining_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['tokens_remaining_title']) ? $simpleContent->translateOrNew($locale)->extra['tokens_remaining_title'] : null, ['class' => 'form-control', 'maxlength' => 30]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][tokens_remaining_at_bonus_title]', 'Tokens Remaining At Bonus Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][tokens_remaining_at_bonus_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['tokens_remaining_at_bonus_title']) ? $simpleContent->translateOrNew($locale)->extra['tokens_remaining_at_bonus_title'] : null, ['class' => 'form-control', 'maxlength' => 50]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][next_bonus_title]', 'Next Bonus Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][next_bonus_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['next_bonus_title']) ? $simpleContent->translateOrNew($locale)->extra['next_bonus_title'] : null, ['class' => 'form-control', 'maxlength' => 50]) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

<div class="form-group col-sm-3 col-lg-3">
    {!! Form::label('base_extra[tokens_to_sell]', 'Tokens To Sell:') !!}
    {!! Form::text('base_extra[tokens_to_sell]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_to_sell']) ? $simpleContent->base_extra['tokens_to_sell'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3 col-lg-3">
    {!! Form::label('base_extra[tokens_remaining]', 'Tokens Remaining:') !!}
    {!! Form::text('base_extra[tokens_remaining]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_remaining']) ? $simpleContent->base_extra['tokens_remaining'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3 col-lg-3">
    {!! Form::label('base_extra[tokens_remaining_at_bonus]', 'Tokens Remaining At Bonus:') !!}
    {!! Form::text('base_extra[tokens_remaining_at_bonus]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_remaining_at_bonus']) ? $simpleContent->base_extra['tokens_remaining_at_bonus'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3 col-lg-3">
    {!! Form::label('base_extra[next_bonus]', 'Next Bonus Rate:') !!}
    {!! Form::text('base_extra[next_bonus]', isset($simpleContent) && isset($simpleContent->base_extra['next_bonus']) ? $simpleContent->base_extra['next_bonus'] : null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

