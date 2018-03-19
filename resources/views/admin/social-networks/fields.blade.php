<!-- Type Field -->
{!! Form::hidden('type', $contentType) !!}

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[facebook]', 'Facebook:') !!}
    {!! Form::text('base_extra[facebook]', isset($simpleContent) && isset($simpleContent->base_extra['facebook']) ? $simpleContent->base_extra['facebook'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[twitter]', 'Twitter:') !!}
    {!! Form::text('base_extra[twitter]', isset($simpleContent) && isset($simpleContent->base_extra['twitter']) ? $simpleContent->base_extra['twitter'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[reddit]', 'Reddit:') !!}
    {!! Form::text('base_extra[reddit]', isset($simpleContent) && isset($simpleContent->base_extra['reddit']) ? $simpleContent->base_extra['reddit'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[github]', 'Github:') !!}
    {!! Form::text('base_extra[github]', isset($simpleContent) && isset($simpleContent->base_extra['github']) ? $simpleContent->base_extra['github'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[bitcoin_talk]', 'Bitcoin Talk:') !!}
    {!! Form::text('base_extra[bitcoin_talk]', isset($simpleContent) && isset($simpleContent->base_extra['bitcoin_talk']) ? $simpleContent->base_extra['bitcoin_talk'] : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('base_extra[telegram]', 'Telegram:') !!}
    {!! Form::text('base_extra[telegram]', isset($simpleContent) && isset($simpleContent->base_extra['telegram']) ? $simpleContent->base_extra['telegram'] : null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

