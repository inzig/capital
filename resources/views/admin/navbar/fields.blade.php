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
                    <!-- Home Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][home]', 'Home:') !!}
                        {!! Form::text('translations['.$locale.'][extra][home]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['home']) ? $simpleContent->translateOrNew($locale)->extra['home'] : null, ['class' => 'form-control', 'maxlength' => 8]) !!}
                    </div>

                    <!-- About Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][about]', 'About:') !!}
                        {!! Form::text('translations['.$locale.'][extra][about]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['about']) ? $simpleContent->translateOrNew($locale)->extra['about'] : null, ['class' => 'form-control', 'maxlength' => 8]) !!}
                    </div>

                    <!-- Features Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][features]', 'Features:') !!}
                        {!! Form::text('translations['.$locale.'][extra][features]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['features']) ? $simpleContent->translateOrNew($locale)->extra['features'] : null, ['class' => 'form-control', 'maxlength' => 12]) !!}
                    </div>

                    <!-- Token Sale Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][token_sale]', 'Token Sale:') !!}
                        {!! Form::text('translations['.$locale.'][extra][token_sale]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['token_sale']) ? $simpleContent->translateOrNew($locale)->extra['token_sale'] : null, ['class' => 'form-control', 'maxlength' => 16]) !!}
                    </div>

                    <!-- Roadmap Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][roadmap]', 'Roadmap:') !!}
                        {!! Form::text('translations['.$locale.'][extra][roadmap]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['roadmap']) ? $simpleContent->translateOrNew($locale)->extra['roadmap'] : null, ['class' => 'form-control', 'maxlength' => 12]) !!}
                    </div>

                    <!-- Team Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][team]', 'Team:') !!}
                        {!! Form::text('translations['.$locale.'][extra][team]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['team']) ? $simpleContent->translateOrNew($locale)->extra['team'] : null, ['class' => 'form-control', 'maxlength' => 8]) !!}
                    </div>

                    <!-- Faq Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][faq]', 'Faq:') !!}
                        {!! Form::text('translations['.$locale.'][extra][faq]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['faq']) ? $simpleContent->translateOrNew($locale)->extra['faq'] : null, ['class' => 'form-control', 'maxlength' => 8]) !!}
                    </div>

                    <!-- Login Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][login]', 'Login:') !!}
                        {!! Form::text('translations['.$locale.'][extra][login]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['login']) ? $simpleContent->translateOrNew($locale)->extra['login'] : null, ['class' => 'form-control', 'maxlength' => 8]) !!}
                    </div>

                    <!-- Dashboard Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][dashboard]', 'Dashboard:') !!}
                        {!! Form::text('translations['.$locale.'][extra][dashboard]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['dashboard']) ? $simpleContent->translateOrNew($locale)->extra['dashboard'] : null, ['class' => 'form-control', 'maxlength' => 16]) !!}
                    </div>

                    <!-- Download wallet Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][download_wallet]', 'Download Wallet:') !!}
                        {!! Form::text('translations['.$locale.'][extra][download_wallet]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['download_wallet']) ? $simpleContent->translateOrNew($locale)->extra['download_wallet'] : null, ['class' => 'form-control', 'maxlength' => 24]) !!}
                    </div>

                    <!-- White paper Field -->
                    <div class="form-group col-sm-6 col-lg-6">
                        {!! Form::label('translations['.$locale.'][extra][white_paper]', 'White Paper:') !!}
                        {!! Form::text('translations['.$locale.'][extra][white_paper]', isset($simpleContent) && isset($simpleContent->translateOrNew($locale)->extra['white_paper']) ? $simpleContent->translateOrNew($locale)->extra['white_paper'] : null, ['class' => 'form-control', 'maxlength' => 16]) !!}
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

<!-- Logo image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::fileBox('base_extra[logo]', 'Logo Image:', isset($simpleContent) && isset($simpleContent->base_extra['logo']) ? $simpleContent->base_extra['logo'] : null, 'Max Dimensions: 200x62') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

