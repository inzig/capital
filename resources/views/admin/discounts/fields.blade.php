<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('discounts.index') !!}" class="btn btn-default">Cancel</a>
</div>

