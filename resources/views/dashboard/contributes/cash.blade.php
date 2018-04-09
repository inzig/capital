<div class="form-group">
    <script src="https://js.stripe.com/v3/"></script>

    <form method="post" id="payment-form" action="{!! route('stripe-pay') !!}">
        {{ csrf_field() }}
        <div class="form-row">
            <label for="card-element" class="subscription-font-weight credit-card--title-margin">
                Credit or debit card
            </label>
            <div id="card-element">
                <!-- a Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display Element errors -->
            <div id="card-errors"></div>
        </div>

        <div class='form-row' style="margin-top: 15px;">
            <label for="amount" class="col-sm-3 control-label">Ethereum Wallet Address: </label>
            <div class='col-sm-9 form-group'>
                <input type="text" class="form-control" name="ethereum_wallet" id="ethereum_wallet" value="{{ $userEthereumWallet->address or old('ethereum_wallet') }}" placeholder="Ethereum Wallet Address">
            </div>
        </div>

        <div class='form-row' style="margin-top: 15px;">
            <label for="amount" class="col-sm-3 control-label">Amount: </label>
            <div class='col-sm-9 form-group'>
                <input type="text" id="amount" name="amount" data-coin="usd" class="form-control amount"/>
            </div>
        </div>

        <div class='form-row' style="margin-top: 15px;">
            <label class="col-sm-3 control-label text-left">Tokens: </label>
            <div class="col-sm-9">
                <p class="form-control"><span id="tokens">0</span> Tokens</p>
            </div>
            <p class="info pull-right margin-aligned">This is estimated amount of tokens you will receive.</p>
            <div class="clearfix"></div>
        </div>
        <!-- <input type="hidden" name="currency" value="DASH"> -->
        <div class='form-row'>
            <div class='col-md-3 form-group pull-right'>
                <button  class='form-control btn btn-primary submit-button' type='submit'>Continue</button>
            </div>
        </div>
    </form>
</div>

<script>
    window.addEventListener('load',function(){
        var stripe = Stripe("{{ $stripe_key }}");
        var elements = stripe.elements();

        var style = {
            base: {
                fontSize: '16px',
                lineHeight: '24px'
            }
        };

        var card = elements.create('card', {style: style});
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Create a token or display an error when the form is submitted.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the customer that there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });
    });


    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        addTransaction(token, form);
        // Submit the form
        //form.submit();
    }

    function addTransaction(token, form) {
        var currency = 'usd';
        var amount = $('#payment-form').find('#amount').val();
        var discount = $('#payment-form').find('#discount').text();
        var estimate = $('#payment-form').find('#tokens').text();
        var ethereum_address = $('#payment-form').find('#ethereum_wallet').val();
        var currency_address = token.id;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.post('buy-tokens', {_token: CSRF_TOKEN, amount: amount, currency: currency, estimated_tokens: estimate, discount: discount, source_address: currency_address, destination_address: ethereum_address}, function(){ form.submit(); });
    }
</script>