<div class="form-group col-sm-6">
    {!! Form::label('actual_tokens', 'Actual Tokens:') !!}
    {!! Form::text('actual_tokens', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('is_approved', 'Status:') !!}
    {!! Form::select('is_approved', ['' => 'Pending', 1 => 'Approved', 0 => 'Disapproved'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transactions.index') !!}" class="btn btn-default">Cancel</a>
</div>
