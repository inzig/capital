@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top: 1.5em;">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{!! config('app.token_name') !!} Calculator</h3>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="col-sm-11">
                        <input type="number" class="form-control" id="amount" placeholder="{!! config('app.token_name') !!}" disabled="disabled">
                        <input type="hidden" value="{!! $base_rate or '0' !!}" id="base_rate">
                        <input type="number" class="form-control" placeholder="CAPG" id="capG">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" id="calculate" class="btn btn-primary pull-right" disabled="disabled">Calculate</button>
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 2em;">
                    <div class="col-md-4 col-sm-12 col-xs-12" id="btc">
                        <div class="info-box">
                            <span class="info-box-icon purple-box"><img class="crypto-icon" src="{!! asset('crypto-icons/BTC.svg') !!}" alt="Bitcoin"></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Bitcoin</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12" id="eth">
                        <div class="info-box">
                            <span class="info-box-icon purple-box"><img class="crypto-icon" src="{!! asset('crypto-icons/ETH.svg') !!}" alt="Ethereum"></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Ethereum</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12" id="ltc">
                        <div class="info-box">
                            <span class="info-box-icon purple-box"><img class="crypto-icon" src="{!! asset('crypto-icons/LTC.svg') !!}" alt="Litecoin"></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Litecoin</span>
                                <span class="info-box-number"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(function () {
        $("#amount").on("keyup", function() {
            var cap = $("#amount").val();
            $("#capG").val(cap * 1000);            
        });
    });
        // $.getJSON('https://api-ropsten.etherscan.io/api?module=contract&action=getabi&address=0x3a55a8b3760b85b1113433cd1514306bd87475c2', function (data) {
        //     console.log(data);            
        //     var contractABI = "";
        //     contractABI = JSON.parse(data.result);
        //     if (contractABI != ''){
        //         var MyContract = web3.eth.contract(contractABI);
        //         var myContractInstance = MyContract.at("0xfb6916095ca1df60bb79ce92ce3ea74c37c5d359");
        //         var result = myContractInstance.memberId("0xfe8ad7dd2f564a877cc23feea6c0a9cc2e783715");
        //         console.log("result1 : " + result);            
        //         var result = myContractInstance.members(1);
        //         console.log("result2 : " + result);
        //     } else {
        //         console.log("Error" );
        //     }            
        // });

        
        // var rates = {"BTC":0,"LTC":0,"DASH":0};

        // function isNumber(n) {
        //     return !isNaN(parseFloat(n)) && isFinite(n);
        // }

        // $(function () {
        //     $.ajax({
        //         url: 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,LTC,DASH',
        //         method: 'GET',
        //         dataType: 'json',
        //         success: function (response) {
        //             rates = response;
        //             $('#amount').removeAttr('disabled');
        //             $('#calculate').removeAttr('disabled');
        //         },
        //         error: function (error) {
        //             console.error(error);
        //         }
        //     });

        //     $('#calculate').on('click', function () {
        //         var amount = $('#amount').val();

        //         if(!isNumber(amount)) {
        //             alert('Amount is not a number');
        //             return;
        //         }

        //         var base_rate = $('#base_rate').val();

        //         var eth = amount * base_rate;
        //         var btc = eth * rates.BTC;
        //         var ltc = eth * rates.LTC;
        //         var dash = eth * rates.DASH;

        //         $('#btc .info-box-number').text(parseFloat(btc).toFixed(4));
        //         $('#eth .info-box-number').text(parseFloat(eth).toFixed(4));
        //         $('#ltc .info-box-number').text(parseFloat(ltc).toFixed(4));
        //         $('#dash .info-box-number').text(parseFloat(dash).toFixed(4));
        //     });
        // });        
    </script>
@endsection