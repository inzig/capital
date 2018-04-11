window.addEventListener('load', function () {
	 	wallet =  $("#ethereum_wallet_1").val();
    if (typeof web3 !== 'undefined') {
        console.log('Web3 Detected! ' + web3.currentProvider.constructor.name)
        window.web3 = new Web3(web3.currentProvider);
    } else {
        console.log('No Web3 Detected... using HTTP Provider')
        window.web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/sLE5jxRI7tVRLdNNLqtW"));		
		}	

		CallContract();		
		CapitalTechCrowdsale();
});
var wallet;
function CallContract() {
var abi = [
	{
		"constant": true,
		"inputs": [],
		"name": "name",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_spender",
				"type": "address"
			},
			{
				"name": "_amount",
				"type": "uint256"
			}
		],
		"name": "approve",
		"outputs": [
			{
				"name": "success",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "totalSupply",
		"outputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_from",
				"type": "address"
			},
			{
				"name": "_to",
				"type": "address"
			},
			{
				"name": "_amount",
				"type": "uint256"
			}
		],
		"name": "transferFrom",
		"outputs": [
			{
				"name": "success",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getTokenDetail",
		"outputs": [
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "string"
			},
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "decimals",
		"outputs": [
			{
				"name": "",
				"type": "uint8"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_value",
				"type": "uint256"
			}
		],
		"name": "burn",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_owner",
				"type": "address"
			}
		],
		"name": "balanceOf",
		"outputs": [
			{
				"name": "balance",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "owner",
		"outputs": [
			{
				"name": "",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "symbol",
		"outputs": [
			{
				"name": "",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_to",
				"type": "address"
			},
			{
				"name": "_amount",
				"type": "uint256"
			}
		],
		"name": "transfer",
		"outputs": [
			{
				"name": "success",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_owner",
				"type": "address"
			},
			{
				"name": "_spender",
				"type": "address"
			}
		],
		"name": "allowance",
		"outputs": [
			{
				"name": "remaining",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "newOwner",
				"type": "address"
			}
		],
		"name": "transferOwnership",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"name": "initialSupply",
				"type": "uint256"
			},
			{
				"name": "tokenName",
				"type": "string"
			},
			{
				"name": "tokenSymbol",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"payable": true,
		"stateMutability": "payable",
		"type": "fallback"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "burner",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "value",
				"type": "uint256"
			}
		],
		"name": "Burn",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "previousOwner",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "newOwner",
				"type": "address"
			}
		],
		"name": "OwnershipTransferred",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "owner",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "spender",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "value",
				"type": "uint256"
			}
		],
		"name": "Approval",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "from",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "to",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "value",
				"type": "uint256"
			}
		],
		"name": "Transfer",
		"type": "event"
	}
];
	var capContract = web3.eth.contract(abi);
	var cap = capContract.at('0xaa9695bdacc70dc849e3d96769649e9eb349ced5');
	var capG = capContract.at('0x53c3818f9b12c1a2ac86beaaa4d43b414e9a5682');	
	getBalance(cap);
	getBalanceCapG(capG);
}

function getBalance(cap){
	cap.balanceOf(wallet, function(e, r){
		var val = r.valueOf();
		val = val / 1000000000000000000;
		$("#cap_coin_balance").html(val + " CALL");			
	});
}

function getBalanceCapG(cap){
	cap.balanceOf(wallet, function(e, r){        
		var val = r.valueOf();
		val = val / 1000000000000000000;
		$("#capG_coin_balance").html(val + " CALLG");			
	});
}

	function isNumber(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}

	var rates = {"ETH":0,"BTC":0,"LTC":0,"DASH":0,"ZEC":0};
	$(function () {
		$.ajax({
			url: 'https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=ETH,BTC,LTC,DASH,ZEC',
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				rates = response;
				$('#amount').removeAttr('disabled');
				$('#calculate').removeAttr('disabled');
				// console.log(rates);				
			},
			error: function (error) {
				console.error(error);
			}
		});

		$('#calculate').on('click', function () {
			var amount = $('#amount').val();

			if(!isNumber(amount)) {
				alert('Amount is not a number');
				return;
			}
			amount = amount * 1.5;
			var eth = amount * rates.ETH;		
			var btc = amount * rates.BTC;
			var ltc = amount * rates.LTC;
			var dash = amount * rates.DASH;
			var zec = amount * rates.ZEC;

			$('#btc .info-box-number').text(parseFloat(btc).toFixed(4));
			$('#eth .info-box-number').text(parseFloat(eth).toFixed(4));
			$('#ltc .info-box-number').text(parseFloat(ltc).toFixed(4));
			$('#dash .info-box-number').text(parseFloat(dash).toFixed(4));
			$('#zec .info-box-number').text(parseFloat(zec).toFixed(4));
		});
		
		$('.amount').change(function () {
				var val = $(this).val();
				var coin = $(this).data('coin');                
				// console.log(coin);
				$('.buy-tokens').prop('disabled', false);

				// var tokens =  val / tokenInETH;
				var tokens;
				// console.log(tokenRate * rates.BTC);
				// console.log(val / (tokenRate * rates.BTC));

				
				if(coin == 'bitcoin'){
					tokens = val / (tokenRate * rates.BTC);
					if(val < 5000 * rates.BTC ){
						alert("minimum contribution is BTC : 0.7497713");
						$('.buy-tokens').prop("disabled" , true);	
					}
				} else if(coin == 'litecoin'){
					tokens = val / (tokenRate * rates.LTC);
					if(val < 5000 * rates.LTC ){
						alert("minimum contribution is LTC : 44");		
						$('.buy-tokens').prop("disabled" , true);										
					}
				} else if(coin == 'dash'){
					tokens = val / (tokenRate * rates.DASH);
					if(val < 5000 * rates.DASH ){
						alert("minimum contribution is DASH : 44");		
						$('.buy-tokens').prop("disabled" , true);											
					}
				} else if(coin == 'zcash'){
					tokens = val / (tokenRate * rates.ZEC);
					if(val < 5000 * rates.ZEC ){
						alert("minimum contribution is ZEC : 44");		
						$('.buy-tokens').prop("disabled" , true);											
					}
				} else {
					tokens = val / (tokenRate * rates.ETH);
					if(val < 5000 * rates.ETH ){
						$('.buy-tokens').prop('disabled', true);
						alert("minimum contribution is ETH : 12.75");
					}
				}
				var call = tokens.toFixed(0);
				var callg = call * 200;
				var tok = call + " CALL , " + callg + " CALLG";
				$(this).parents('form').find('#tokens').text(tok);
				// $(this).parents('form').find('#estimated_tokens').text(tokens.toFixed(4));
		});
	});
	
	function CapitalTechCrowdsale() {
	var abi = [
		{
			"constant": true,
			"inputs": [],
			"name": "startTime",
			"outputs": [
				{
					"name": "",
					"type": "uint256"
				}
			],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		},
		{
			"constant": true,
			"inputs": [],
			"name": "endTime",
			"outputs": [
				{
					"name": "",
					"type": "uint256"
				}
			],
			"payable": false,
			"stateMutability": "view",
			"type": "function"
		}
	];
	var crowdsaleContract = web3.eth.contract(abi);
	var contract = crowdsaleContract.at('0x75fcb62bc45acdb14cf2f37a2bdd30184249a1eb');
	var tokenRate;
	parseContract(contract)
	}
	function parseContract(contract) {
		var startDate;
		var endTime;
	  contract.startTime(function(e , r){
			if(r){				
				startDate = r * 1000;

				contract.endTime(function(e , r){
					if(r){				
						endTime = r * 1000;
						// console.log(startDate);
						// console.log(endTime);				
						var currentDate = new Date();
						var mainSaleW4 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 66)), new Date(endTime), 4);
						var mainSaleW3 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 59)), mainSaleW4[0], 3.6); 
						var mainSaleW2 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 52)), mainSaleW3[0], 3.3);
						var mainSaleW1 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 45)), mainSaleW2[0], 3);
						var preSale = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 15)), mainSaleW1[0], 2);
						var privateSale = new Array(new Date(startDate), preSale[0], 1.5);
						if (currentDate > mainSaleW4[1]) {
							console.log("ICO ENDED");
						} else if (currentDate.getTime() < mainSaleW4[1].getTime() && currentDate.getTime() > mainSaleW4[0].getTime()) {
							// console.log(mainSaleW4);
							tokenRate = mainSaleW4[2];
						} else if (currentDate.getTime() < mainSaleW3[1].getTime() && currentDate.getTime() > mainSaleW3[0].getTime()) {
							// console.log(mainSaleW3);
							tokenRate = mainSaleW3[2];
						} else if (currentDate.getTime() < mainSaleW2[1].getTime() && currentDate.getTime() > mainSaleW2[0].getTime()) {
							// console.log(mainSaleW2);
							tokenRate = mainSaleW2[2];
						} else if (currentDate.getTime() < mainSaleW1[1].getTime() && currentDate.getTime() > mainSaleW1[0].getTime()) {
							// console.log(mainSaleW1);
							tokenRate = mainSaleW1[2]
						} else if (currentDate.getTime() < preSale[1].getTime() && currentDate.getTime() > preSale[0].getTime()) {
							// console.log(preSale);
							tokenRate = preSale[2];
						} else if (currentDate.getTime() < privateSale[1].getTime() && currentDate.getTime() > privateSale[0].getTime()) {
							// console.log(privateSale[2]);
							tokenRate = privateSale[2];
						} else {
							console.log("INVALID RANGE");
						}
						// console.log(tokenRate);										
					}
				});

			}
		});
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	