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
                        {!! Form::label('translations['.$locale.'][extra][current_bonus_title]', 'Current Bonus Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][current_bonus_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['current_bonus_title']) ? $simpleContent->translateOrNew($locale)->extra['current_bonus_title'] : null, ['class' => 'form-control', 'maxlength' => 8]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][next_bonus_title]', 'Next Bonus Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][next_bonus_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['next_bonus_title']) ? $simpleContent->translateOrNew($locale)->extra['current_bonus_title'] : null, ['class' => 'form-control', 'maxlength' => 12]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][tokens_to_sell_title]', 'Tokens To Sell Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][tokens_to_sell_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['tokens_to_sell_title']) ? $simpleContent->translateOrNew($locale)->extra['tokens_to_sell_title'] : null, ['class' => 'form-control', 'maxlength' => 16]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][tokens_remaining_title]', 'Tokens Remaining Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][tokens_remaining_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['tokens_remaining_title']) ? $simpleContent->translateOrNew($locale)->extra['tokens_remaining_title'] : null, ['class' => 'form-control', 'maxlength' => 16]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][tokens_remaining_at_bonus_title]', 'Tokens Remaining At Bonus Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][tokens_remaining_at_bonus_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['tokens_remaining_at_bonus_title']) ? $simpleContent->translateOrNew($locale)->extra['tokens_remaining_at_bonus_title'] : null, ['class' => 'form-control', 'maxlength' => 30]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][buy_button_title]', 'Buy Button Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][buy_button_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['buy_button_title']) ? $simpleContent->translateOrNew($locale)->extra['buy_button_title'] : null, ['class' => 'form-control', 'maxlength' => 16]) !!}
                    </div>

                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][presale_ends_title]', 'Presale Ends Title:') !!}
                        {!! Form::text('translations['.$locale.'][extra][presale_ends_title]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['presale_ends_title']) ? $simpleContent->translateOrNew($locale)->extra['presale_ends_title'] : null, ['class' => 'form-control', 'maxlength' => 24]) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[current_bonus]', 'Current Bonus:') !!}
    {!! Form::text('base_extra[current_bonus]', isset($simpleContent) && isset($simpleContent->base_extra['current_bonus']) ? $simpleContent->base_extra['current_bonus'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[next_bonus]', 'Next Bonus:') !!}
    {!! Form::text('base_extra[next_bonus]', isset($simpleContent) && isset($simpleContent->base_extra['next_bonus']) ? $simpleContent->base_extra['next_bonus'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('base_extra[tokens_to_sell]', 'Tokens To Sell:') !!}
    {!! Form::text('base_extra[tokens_to_sell]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_to_sell']) ? $simpleContent->base_extra['tokens_to_sell'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('base_extra[tokens_remaining]', 'Tokens Remaining:') !!}
    {!! Form::text('base_extra[tokens_remaining]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_remaining']) ? $simpleContent->base_extra['tokens_remaining'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4 col-lg-4">
    {!! Form::label('base_extra[tokens_remaining_at_bonus]', 'Tokens Remaining At Bonus:') !!}
    {!! Form::text('base_extra[tokens_remaining_at_bonus]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_remaining_at_bonus']) ? $simpleContent->base_extra['tokens_remaining_at_bonus'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[tokens_sold]', 'Sold Tokens:') !!}
    {!! Form::text('base_extra[tokens_sold]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_sold']) ? $simpleContent->base_extra['tokens_sold'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[tokens_sold_usd]', 'Sold Tokens (USD):') !!}
    {!! Form::text('base_extra[tokens_sold_usd]', isset($simpleContent) && isset($simpleContent->base_extra['tokens_sold_usd']) ? $simpleContent->base_extra['tokens_sold_usd'] : null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[start_date]', 'Start Date (UTC):') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        {!! Form::text('base_extra[start_date]', isset($simpleContent) && isset($simpleContent->base_extra['start_date']) ? $simpleContent->base_extra['start_date'] : null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
    </div>
</div>

<!-- Time Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('base_extra[start_time]', 'Start Time (UTC):') !!}
    {!! Form::text('base_extra[start_time]', isset($simpleContent) && isset($simpleContent->base_extra['start_time']) ? $simpleContent->base_extra['start_time'] : null, ['class' => 'form-control', 'placeholder' => 'hh:mm:ss']) !!}
</div>

<!-- Logo image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::fileBox('base_extra[logo]', 'Logo Image:', isset($simpleContent) && isset($simpleContent->base_extra['logo']) ? $simpleContent->base_extra['logo'] : null, 'Max Dimensions: 200x62') !!}
</div>

<div class="col-md-12">
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-money"></i>
            <h3 class="box-title">Coins Collected</h3>
        </div>
        <div class="box-body">
            <div class="form-group col-sm-4 col-lg-4">
                {!! Form::label('base_extra[bitcoin]', 'Bitcoin:') !!}
                {!! Form::text('base_extra[bitcoin]', isset($simpleContent) && isset($simpleContent->base_extra['bitcoin']) ? $simpleContent->base_extra['bitcoin'] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-4 col-lg-4">
                {!! Form::label('base_extra[ethereum]', 'Ethereum:') !!}
                {!! Form::text('base_extra[ethereum]', isset($simpleContent) && isset($simpleContent->base_extra['ethereum']) ? $simpleContent->base_extra['ethereum'] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-4 col-lg-4">
                {!! Form::label('base_extra[litecoin]', 'Litecoin:') !!}
                {!! Form::text('base_extra[litecoin]', isset($simpleContent) && isset($simpleContent->base_extra['litecoin']) ? $simpleContent->base_extra['litecoin'] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-4 col-lg-4">
                {!! Form::label('base_extra[waves]', 'Waves:') !!}
                {!! Form::text('base_extra[waves]', isset($simpleContent) && isset($simpleContent->base_extra['waves']) ? $simpleContent->base_extra['waves'] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-4 col-lg-4">
                {!! Form::label('base_extra[time]', 'Time:') !!}
                {!! Form::text('base_extra[time]', isset($simpleContent) && isset($simpleContent->base_extra['time']) ? $simpleContent->base_extra['time'] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-4 col-lg-4">
                {!! Form::label('base_extra[salt]', 'Salt:') !!}
                {!! Form::text('base_extra[salt]', isset($simpleContent) && isset($simpleContent->base_extra['salt']) ? $simpleContent->base_extra['salt'] : null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

