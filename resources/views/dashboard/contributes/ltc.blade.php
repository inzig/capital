<div class="form-group">
    <form class="form-horizontal" id="contribute_form" method="post">
        {{ csrf_field() }}

        <div class="col-sm-12 margin-bottom-field has-feedback{{ $errors->has('amount') ? ' has-error' : '' }}">
            <label for="amount" class="col-sm-3 control-label text-left">Amount: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control amount" data-coin="bitcoin" name="amount" id="amount" value="{{ old('amount') }}" placeholder="Amount in LTC">
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
                <input type="text" class="form-control" name="ethereum_wallet" id="ethereum_wallet" value="{{ $userEthereumWallet->address or old('ethereum_wallet') }}" placeholder="Ethereum Wallet Address">
            </div>

            @if ($errors->has('ethereum_wallet'))
                <span class="help-block">
                    <strong>{{ $errors->first('ethereum_wallet') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-sm-12 margin-bottom-field has-feedback{{ $errors->has('litecoin_wallet') ? ' has-error' : '' }}">
            <label for="currency_wallet" class="col-sm-3 control-label text-left">Litecoin Wallet Address: </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="currency_wallet" id="currency_wallet" value="{{ old('currency_wallet') }}" placeholder="Litecoin Wallet Address">
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
                <p class="form-control">Including discount (<span id="discount">0</span>%) <span id="tokens">0</span> Tokens</p>
            </div>
            <p class="info pull-right margin-aligned">This is estimated amount of tokens you will receive.</p>
        </div>

        <div class="col-sm-12">
            <button disabled type="button" class="btn btn-primary pull-right margin-aligned buy-tokens" data-currency="{{ $wallet->type }}" style="margin-bottom: 1em;" data-toggle="modal" data-target="#qr_{{ $wallet->type }}">Continue</button>
        </div>

        <div class="modal fade" id="qr_{{ $wallet->type }}" tabindex="-1" role="dialog" aria-labelledby="{{ ucwords($wallet->type) }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ ucwords($wallet->type) }}</h4>
                        <div class="card-title">
                            <p>Please deposit to the {{ ucwords($wallet->type) }} Wallet.</p>
                            <p>We will deposit your {!! config('app.token_name') !!} once approved.</p>
                            <p>Estimated tokens you will receive: <span id="estimated_tokens"></span> {!! config('app.token_name') !!}</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="center-block">
                            <qr-code text="{{ $wallet->address }}" error-level="L"></qr-code>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <code class="form-control" id="address_{{ $wallet->type }}">{{ $wallet->address }}</code>
                        <div class="text-center" style="margin-top: 0.25em;">
                            <a class="btn btn-primary" onclick="copyToClipboard('#address_{{ $wallet->type }}')"><i class="fa fa-copy"></i> Copy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>