{!! Form::hidden('discount_id', $discountId) !!}

<div class="form-group col-sm-12">
    {!! Form::label('currency', 'Coin:') !!}
    {!! Form::select('currency', ['' => 'All', 'bitcoin' => 'Bitcoin', 'card' => 'Credit Card', 'ethereum' => 'Ethereum', 'litecoin' => 'Litecoin'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('min_amount', 'Minimum Amount:') !!}
    {!! Form::text('min_amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('max_amount', 'Maximum Amount:') !!}
    {!! Form::text('max_amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('rate', 'Discount:') !!}
    {!! Form::text('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('discounts.index') !!}" class="btn btn-default">Cancel</a>
</div>

