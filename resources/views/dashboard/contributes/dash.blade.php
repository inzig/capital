
<div class="form-group">
    <form action={{ url('purchase') }} class="form-horizontal" id="contribute_form" method="post">
        {{ csrf_field() }}

        <div class="col-sm-12 margin-bottom-field has-feedback{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount" class="col-sm-3 control-label text-left">Amount: </label>
            <div class="col-sm-9">
                <input required type="text" class="form-control amount" data-coin="dash" name="amount" id="amount" value="{{ old('amount') }}" placeholder="Amount in DASH">
            </div>

            @if ($errors->has('amount'))
                <span class="help-block">
                    <strong>{{ $errors->first('amount') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-12 margin-bottom-field has-feedback{{ $errors->has('ethereum_wallet') ? ' has-error' : '' }}">
            <label for="ethereum_wallet" class="col-sm-3 control-label text-left">Ethereum Wallet Address: </label>
            <div class="col-sm-9">
                <input required type="text" class="form-control" name="ethereum_wallet" id="ethereum_wallet" value="{{ $userEthereumWallet->address or old('ethereum_wallet') }}" placeholder="Ethereum Wallet Address">
            </div>

            @if ($errors->has('ethereum_wallet'))
                <span class="help-block">
                    <strong>{{ $errors->first('ethereum_wallet') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-12 margin-bottom-field has-feedback{{ $errors->has('bitcoin_wallet') ? ' has-error' : '' }}">
            <label for="currency_wallet" class="col-sm-3 control-label text-left">DASH Wallet Address: </label>
            <div class="col-sm-9">
                <input required type="text" class="form-control" name="currency_wallet" id="currency_wallet" value="{{ old('currency_wallet') }}" placeholder="DASH Wallet Address">
            </div>

            @if ($errors->has('currency_wallet'))
                <span class="help-block">
                    <strong>{{ $errors->first('currency_wallet') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-12">
            <label class="col-sm-3 control-label text-left">Tokens: </label>
            <div class="col-sm-9">
                <p class="form-control"><span id="tokens">0</span> Tokens</p>
            </div>
            <p class="info pull-right margin-aligned">This is estimated amount of tokens you will receive.</p>
        </div>
        <input type="hidden" name="currency" value="DASH">
        <input type="hidden" name="single_rate" value="0.000285">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary pull-right margin-aligned buy-tokens" style="margin-bottom: 1em;" data-toggle="modal" >Continue</button>
        </div>    
        
    </form>
</div>