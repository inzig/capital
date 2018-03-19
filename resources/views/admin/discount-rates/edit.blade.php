@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Discount Rate
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($rate, ['route' => ['rates.update', 'id' => $rate->id, 'discountId' => $discountId], 'files' => true, 'method' => 'patch']) !!}

                    @include('admin.discount-rates.fields', ['rate' => $rate])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection