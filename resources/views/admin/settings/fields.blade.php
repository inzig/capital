<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Wallet Addresses</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('ethereum', 'Ethereum Address:') !!}
                {!! Form::text('ethereum', isset($settings) && isset($settings['ethereum']) && !empty($settings['ethereum']->value) ? $settings['ethereum']->value : '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('bitcoin', 'Bitcoin Address:') !!}
                {!! Form::text('bitcoin', isset($settings) && isset($settings['bitcoin']) && !empty($settings['bitcoin']->value) ? $settings['bitcoin']->value : '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('litecoin', 'Litecoin Address:') !!}
                {!! Form::text('litecoin', isset($settings) && isset($settings['litecoin']) && !empty($settings['litecoin']->value) ? $settings['litecoin']->value : '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('sc_address', 'Smart Contract Address:') !!}
                {!! Form::text('sc_address', isset($settings) && isset($settings['sc_address']) && !empty($settings['sc_address']->value) ? $settings['sc_address']->value : '', ['class' => 'form-control']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="box-footer">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Other Settings</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('base_rate', 'VNG vs Ethereum:') !!}
                {!! Form::text('base_rate', isset($settings) && isset($settings['base_rate']) && !empty($settings['base_rate']->value) ? $settings['base_rate']->value : '', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('current_stage', 'Current Stage:') !!}
                {!! Form::select('current_stage', config('app.stages'), isset($settings) && isset($settings['current_stage']) && !empty($settings['current_stage']->value) ? $settings['current_stage']->value : '', ['class' => 'form-control']) !!}
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="box-footer">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
</div>
