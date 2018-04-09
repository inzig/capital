@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        <div class="clearfix"></div>
        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <!-- <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Discounts</h3>
            </div>
            <div class="box-body">
                <table class="table table-hover table-striped table-responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">From</th>
                            <th class="text-center">To</th>
                            <th class="text-center">Min. Amount</th>
                            <th class="text-center">Max. Amount</th>
                            <th class="text-center">Discount (%)</th>
                        </tr>
                        @foreach($discounts as $discount)
                            <tr>
                                <td>{!! $discount->title or '' !!}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($discount->start_date)->format('d/m/Y')}}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($discount->end_date)->format('d/m/Y')}}</td>
                                <td class="text-center">{!! $discount->discount_rates[0]->min_amount or '' !!} Coins</td>
                                <td class="text-center">{!! $discount->discount_rates[0]->max_amount or '' !!} Coins</td>
                                <td class="text-center">{!! $discount->discount_rates[0]->rate or '' !!}</td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div> -->

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Current State</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="panel-heading">Total Invested</p>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box dark-purple-box-border">
                                <span class="info-box-icon dark-purple-box"><i class="fa fa-star"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Coins</span>
                                    <!-- <span class="info-box-number" id="invested_total">0.0</span> -->
                                    <span class="info-box-number" >0.0</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box dark-purple-box-border">
                                <span class="info-box-icon dark-purple-box"><i class="fa fa-usd"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">USD</span>
                                    <!-- <span class="info-box-number" id="invested_usd">0.0</span> -->
                                    <span class="info-box-number" >0.0</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box dark-purple-box-border">
                                <span class="info-box-icon dark-purple-box"><i class="fa fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Participants</span>
                                    <span class="info-box-number">{!! $usersCount or '' !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <p class="panel-heading">Invested</p>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple-box"><img class="crypto-icon" src="{!! asset('crypto-icons/BTC.svg') !!}" alt="Bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Bitcoin</span>
                                    <!-- <span class="info-box-number" id="invested_btc">0.0</span> -->
                                    <span class="info-box-number" >0.0</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple-box"><img class="crypto-icon" src="{!! asset('crypto-icons/ETH.svg') !!}" alt="Bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Ethereum</span>
                                    <!-- <span class="info-box-number" id="invested_eth">0.0</span> -->
                                    <span class="info-box-number" >0.0</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon purple-box"><img class="crypto-icon" src="{!! asset('crypto-icons/LTC.svg') !!}" alt="Bitcoin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Litecoin</span>
                                    <!-- <span class="info-box-number" id="invested_ltc">0.0</span> -->
                                    <span class="info-box-number" >0.0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">My Wallets</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <p class="panel-heading">Enter your Ethereum address below to receive {!! config('app.token_name') !!} Coin:</p>
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <label for="ethereum_wallet" class="col-sm-3 control-label">Ethereum Wallet Address: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" id="ethereum_wallet" value="@if(isset($wallets['ethereum'])){{ $wallets['ethereum']->address }}@endif" placeholder="Ethereum Wallet Address">
                            <input type="hidden" name="type" value="ethereum">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="box-footer">
                <div class="row margin-top-50">
                    <ul class="line-height-dash">
                        <li>Ethereum address must be <a href="https://theethereum.wiki/w/index.php/ERC20_Token_Standard" target="_blank">ERC20 compatible.</a></li>
                        <li>Please do not use a wallet from exchanges such as Bittrex, Coinbase or Poloniex.</li>
                        <li>If you do not have any Ethereum address then please create it on <a href="https://www.myetherwallet.com" target="_blank">MyEtherWallet</a>.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var unitRate = 0;

        @if(isset($adminWallets['ethereum']) && !empty($adminWallets['ethereum']->address))
        $.ajax({
            url: "https://api.ethplorer.io/getAddressInfo/{!! $adminWallets['ethereum']->address or '' !!}?apiKey=freekey",
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#invested_eth').text(data.ETH.balance);
                $('#invested_total').text(parseFloat($('#invested_total').text()) + data.ETH.balance);
                $('#invested_usd').text(parseFloat($('#invested_total').text()) * unitRate);
            },
            error: function (error) {
                console.log(error);
            }
        });
        @endif

        @if(isset($adminWallets['bitcoin']) && !empty($adminWallets['bitcoin']->address))
        $.ajax({
            url: "https://api.blockcypher.com/v1/btc/main/addrs/{!! $adminWallets['bitcoin']->address or '' !!}/balance",
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#invested_btc').text(data.balance);
                $('#invested_total').text(parseFloat($('#invested_total').text()) + data.balance);
                $('#invested_usd').text(parseFloat($('#invested_total').text()) * unitRate);
            },
            error: function (error) {
                console.log(error);
            }
        });
        @endif

        @if(isset($adminWallets['litecoin']) && !empty($adminWallets['litecoin']->address))
        $.ajax({
            url: "https://api.blockcypher.com/v1/ltc/main/addrs/{!! $adminWallets['litecoin']->address or '' !!}/balance",
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#invested_ltc').text(data.balance);
                $('#invested_total').text(parseFloat($('#invested_total').text()) + data.balance);
                $('#invested_usd').text(parseFloat($('#invested_total').text()) * unitRate);
            },
            error: function (error) {
                console.log(error);
            }
        });
        @endif

        @if(isset($adminWallets['dashcoin']) && !empty($adminWallets['dashcoin']->address))
        $.ajax({
            url: "https://api.blockcypher.com/v1/dash/main/addrs/{!! $adminWallets['dashcoin']->address or '' !!}/balance",
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#invested_dash').text(data.balance);
                $('#invested_total').text(parseFloat($('#invested_total').text()) + data.balance);
                $('#invested_usd').text(parseFloat($('#invested_total').text()) * unitRate);
            },
            error: function (error) {
                console.log(error);
            }
        });
        @endif

        $(function () {
            $.ajax({
                url: 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD',
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    unitRate = response.USD * {!! $tokenBaseRate->value or 0 !!};
                    $('#invested_usd').text(parseFloat($('#invested_total').text()) * unitRate);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection