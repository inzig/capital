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
                    <!-- Title Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][title]', 'Title:') !!}
                        {!! Form::text('translations['.$locale.'][title]', isset($post) ? $post->translateOrNew($locale)->title : null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Body Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][body]', 'Body:') !!}
                        {!! Form::textarea('translations['.$locale.'][body]', isset($post) ? $post->translateOrNew($locale)->body : null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Description Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('translations['.$locale.'][excerpt]', 'Excerpt:') !!}
                        {!! Form::textarea('translations['.$locale.'][excerpt]', isset($post) ? $post->translateOrNew($locale)->excerpt : null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Image Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::fileBox('translations['.$locale.'][image]', 'Image:', isset($post) ? $post->translateOrNew($locale)->image : null) !!}
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

<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('published_at', 'Published At:') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        {!! Form::text('published_at', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) !!}
    </div>
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', [0 => 'Draft', 1 => 'Published'], null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default">Cancel</a>
</div>
