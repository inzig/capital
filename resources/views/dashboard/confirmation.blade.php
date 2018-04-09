@extends('layouts.app')
@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Buy CALL Coins</h3>
            </div>
            <div class="box-body">
                <table style="width:100%">
                <tr>
                    <th>Key</th>
                    <th>Value</th>                    
                </tr>                
                      {{$transaction}}
               
                
                @if($transaction)
                    @foreach ($transaction as $key => $value)
                    <tr>
                    <td>{{$key}}</td>
                    <td>{{$value}}</td>                     
                    </tr>                       
                    @endforeach
                @endif
                
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    
@endsection