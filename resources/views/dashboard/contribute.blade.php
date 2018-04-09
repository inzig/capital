@extends('layouts.app')

@section('css')
    <style>
        .margin-aligned {
            margin-right: 15px;
            margin-left: 15px;
        }
        .text-left {
            text-align: left!important;
        }
        .margin-bottom-field {
            margin-bottom: 0.65em;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Buy CALL Coins</h3>
            </div>
            <div class="box-body">
                @if($wallets->isNotEmpty())
                    @php(
                    $walletImages = [
                        'ethereum' => 'ETH.svg',
                        'bitcoin' => 'BTC.svg',
                        'litecoin' => 'LTC.svg',
                    ]
                    )

                    <div class="alert alert-error" id="error-box" style="display: none;">
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a class="tab_class"  data-toggle="tab_eth" aria-expanded="true">Ethereum</a>
                            </li>
                            <li>
                                <a href="#" class="tab_class" data-toggle="tab_btc" aria-expanded="true">Bitcoin</a>
                            </li>
                            <li>
                                <a href="#" class="tab_class" data-toggle="tab_ltc" aria-expanded="true">Litecoin</a>
                            </li>
                            <!-- <li>
                                <a href="#" class="tab_class" data-toggle="tab_cash" aria-expanded="true">Card</a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_eth">
                                @include('dashboard.contributes.eth', ['wallet' => $wallets['ethereum']])
                            </div>

                            <div class="tab-pane " id="tab_btc">
                                @include('dashboard.contributes.btc', ['wallet' => $wallets['bitcoin']])
                            </div>

                            <div class="tab-pane" id="tab_ltc">
                                @include('dashboard.contributes.ltc', ['wallet' => $wallets['litecoin']])
                            </div>

                            <div class="tab-pane" id="tab_cash">
                                @include('dashboard.contributes.cash')
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        var exchnage = {'ethereum': 0, 'bitcoin': 0, 'litecoin': 0, 'dashcoin': 0};
        var baseRate = {!! $tokenBaseRate->value or 0 !!};
        var discounts = @json($discountRates);

        $(function () {
            $('.buy-tokens').removeAttr('disabled');
            // $.ajax({
            //     url: 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,LTC,USD',
            //     method: 'GET',
            //     dataType: 'json',
            //     success: function (response) {
            //         exchnage.ethereum = baseRate;
            //         exchnage.bitcoin = response.BTC;
            //         exchnage.litecoin = response.LTC;
            //         exchnage.usd = response.USD;

            //         $('.buy-tokens').removeAttr('disabled');
            //     },
            //     error: function (error) {
            //         console.error(error);
            //     }
            // });

            $(".tab_class").click(function(){
                $('.active').removeClass('active');
                $(this).parent().addClass('active'); 
                var tab = $(this).attr('data-toggle');                                
                $("#"+tab).addClass('active');         
            });

            $('.center-block img').css('display', 'inline');
            
            // $('.buy-tokens').click(function (e) {
            //     var amount = $(this).parents('form').find('#amount').val();
            //     var ethereum_address = $(this).parents('form').find('#ethereum_wallet').val();
            //     var currency_address = $(this).parents('form').find('#currency_wallet').val();
            //     var currency = $(this).data('currency');
            //     var discount = $(this).parents('form').find('#discount').text();
            //     var estimate = $(this).parents('form').find('#tokens').text();

            //     if(typeof currency_address == 'undefined') {
            //         currency_address = ethereum_address;
            //     }

            //     if(amount == '') {
            //         $('#error-box').text('Please specify the coins you want to transfer').show();
            //         return false;
            //     }

            //     if(ethereum_address == '') {
            //         $('#error-box').text('Please specify the Ethereum wallet address').show();
            //         return false;
            //     }

            //     if(currency_address == '') {
            //         $('#error-box').text('Please specify the ' + currency + ' wallet address').show();
            //         return false;
            //     }

            //     $('#error-box').hide();

            //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            //     $.post('buy-tokens', {_token: CSRF_TOKEN, amount: amount, currency: currency, estimated_tokens: estimate, discount: discount, source_address: currency_address, destination_address: ethereum_address});
            // });

            // $('.amount').change(function () {
            //     var val = $(this).val();
            //     var coin = $(this).data('coin');                
                
            //     var discount = discounts[coin];
            //     var applicableDiscount = 0;

            //     for(var rateItem in discount) {
            //         if(val >= discount[rateItem].min_amount && val <= discount[rateItem].max_amount) {
            //             applicableDiscount = discount[rateItem].rate;
            //             break;
            //         }
            //     }

            //     var tokens =  (val / baseRate) * (1 + (applicableDiscount / 100)) ;
            //     $(this).parents('form').find('#discount').text(applicableDiscount);
            //     $(this).parents('form').find('#tokens').text(tokens.toFixed(4));
            //     $(this).parents('form').find('#estimated_tokens').text(tokens.toFixed(4));
            // });
        });

        copyToClipboard = function (element) {
            var $temp = $("<input style='width: 0; height: 0;' />");
            $(element).parent().append($temp);
            $temp.val($(element).text()).select();

            var result = false;
            try {
                result = document.execCommand("copy");
                $temp.remove();
                alert('Copied to clipboard');
            } catch (err) {
                $temp.remove();
                console.log("Copy error: " + err);
            }

            return result;
        }
    </script>
@endsection