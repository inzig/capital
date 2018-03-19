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
                    {!! Form::open(['route' => ['rates.store', 'discountId' => $discountId], 'files' => true]) !!}

                        @include('admin.discount-rates.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
