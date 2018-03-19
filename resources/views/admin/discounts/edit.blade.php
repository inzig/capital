@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Discount
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($discount, ['route' => ['discounts.update', $discount->id], 'files' => true, 'method' => 'patch']) !!}

                    @include('admin.discounts.fields', ['discount' => $discount])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection