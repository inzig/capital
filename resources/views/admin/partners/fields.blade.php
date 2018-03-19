<!-- Type Field -->
{!! Form::hidden('type', $contentType) !!}

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('base_extra[image]', 'Icon:') !!}
    {!! Form::fileBox('base_extra[image]', 'Image:', isset($sortableContent) && isset($sortableContent->base_extra['image']) ? $sortableContent->base_extra['image'] : null, 'Max height: 50px') !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route($contentType.'.index') !!}" class="btn btn-default">Cancel</a>
</div>

