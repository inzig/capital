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
		// USDtoEth();
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
	var cap = capContract.at('0x3a55a8b3760b85b1113433cd1514306bd87475c2');
	var capG = capContract.at('0x83021cda6268338ba3193b885e46d8a1f1aa6d9a');	
	getBalance(cap);
	getBalanceCapG(capG);
}

function getBalance(cap){
	cap.balanceOf(wallet, function(e, r){
		var val = r.valueOf();
		val = val / 1000000000000000000;
		$("#cap_coin_balance").html(val + "CALL");			
	});
}

function getBalanceCapG(cap){
	cap.balanceOf(wallet, function(e, r){        
		var val = r.valueOf();
		val = val / 1000000000000000000;
		$("#capG_coin_balance").html(val + " CALLG");			
	});
}

function USDtoEth() {
var abi_1 = [
  {
    "constant": true,
    "inputs": [],
    "name": "creator",
    "outputs": [
      {
        "name": "",
        "type": "address"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "name": "_id",
        "type": "uint256"
      }
    ],
    "name": "USD",
    "outputs": [
      {
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "name": "id",
        "type": "uint256"
      },
      {
        "name": "_token",
        "type": "string"
      },
      {
        "name": "eth",
        "type": "uint256"
      },
      {
        "name": "usd",
        "type": "uint256"
      },
      {
        "name": "eur",
        "type": "uint256"
      },
      {
        "name": "gbp",
        "type": "uint256"
      }
    ],
    "name": "update",
    "outputs": [],
    "payable": false,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "name": "",
        "type": "uint256"
      }
    ],
    "name": "tokens",
    "outputs": [
      {
        "name": "name",
        "type": "string"
      },
      {
        "name": "eth",
        "type": "uint256"
      },
      {
        "name": "usd",
        "type": "uint256"
      },
      {
        "name": "eur",
        "type": "uint256"
      },
      {
        "name": "gbp",
        "type": "uint256"
      },
      {
        "name": "block",
        "type": "uint256"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "name": "_id",
        "type": "uint256"
      }
    ],
    "name": "GBP",
    "outputs": [
      {
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "name": "id",
        "type": "uint256"
      }
    ],
    "name": "deleteToken",
    "outputs": [],
    "payable": false,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [],
    "name": "sender",
    "outputs": [
      {
        "name": "",
        "type": "address"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "name": "_id",
        "type": "uint256"
      }
    ],
    "name": "ETH",
    "outputs": [
      {
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "name": "_creator",
        "type": "address"
      }
    ],
    "name": "changeCreator",
    "outputs": [],
    "payable": false,
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "name": "_sender",
        "type": "address"
      }
    ],
    "name": "changeSender",
    "outputs": [],
    "payable": false,
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
        "name": "_value",
        "type": "uint256"
      },
      {
        "name": "_data",
        "type": "bytes"
      }
    ],
    "name": "execute",
    "outputs": [
      {
        "name": "_r",
        "type": "bytes32"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [
      {
        "name": "id",
        "type": "uint256"
      }
    ],
    "name": "requestUpdate",
    "outputs": [],
    "payable": true,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "name": "_id",
        "type": "uint256"
      }
    ],
    "name": "updatedAt",
    "outputs": [
      {
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": true,
    "inputs": [
      {
        "name": "_id",
        "type": "uint256"
      }
    ],
    "name": "EUR",
    "outputs": [
      {
        "name": "",
        "type": "uint256"
      }
    ],
    "payable": false,
    "type": "function"
  },
  {
    "constant": false,
    "inputs": [],
    "name": "donate",
    "outputs": [],
    "payable": true,
    "type": "function"
  },
  {
    "inputs": [],
    "payable": false,
    "type": "constructor"
  },
  {
    "payable": true,
    "type": "fallback"
  },
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "name": "id",
        "type": "uint256"
      },
      {
        "indexed": false,
        "name": "token",
        "type": "string"
      }
    ],
    "name": "NewPrice",
    "type": "event"
  },
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "name": "id",
        "type": "uint256"
      }
    ],
    "name": "DeletePrice",
    "type": "event"
  },
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "name": "id",
        "type": "uint256"
      }
    ],
    "name": "UpdatedPrice",
    "type": "event"
  },
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "name": "id",
        "type": "uint256"
      }
    ],
    "name": "RequestUpdate",
    "type": "event"
  },
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "name": "from",
        "type": "address"
      }
    ],
    "name": "Donation",
    "type": "event"
  }
];
	var fiatContract = web3.eth.contract(abi_1);
	var price = fiatContract.at("0x2CDe56E5c8235D6360CCbb0c57Ce248Ca9C80909");
	FetchUSD(price);
}

var toEth = 1;

function FetchUSD(price){
	price.USD(0, function(e, r){
		ethUSD = r.valueOf();
		toEth = web3.fromWei(ethUSD, 'ether');		
		// console.log(toEth);
	});
}

	

	function isNumber(n) {
		return !isNaN(parseFloat(n)) && isFinite(n);
	}

function CapitalTechCrowdsale() {
	var abi = [
		{
			"constant": true,
			"inputs": [
				{
					"name": "_amount",
					"type": "uint256"
				}
			],
			"name": "calculateRate",
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
		},
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
		}
	];
	var contract = web3.eth.contract(abi).at('0xa9979471b5175522ab2e77d4f893bdc8fc649dad');
	Rate(contract);
	}
	var ethTokens;
	var tokenInETH;
	function Rate(contract) {
		contract.calculateRate(1000000000000000000, function(e, r){
			var ethUSD = r.valueOf();			
			ethTokens = web3.fromWei(ethUSD, 'ether');
			tokenInETH = 1 / ethTokens;
			// console.log("token price: " + ethTokens);		
			// console.log("single token rate : " + tokenInETH);
			// console.log(rates);			
		});	
	}

	var rates = {"BTC":0,"LTC":0,"DASH":0 , "ZEC":0};
	$(function () {
		$.ajax({
			url: 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=BTC,LTC,DASH,ZEC',
			method: 'GET',
			dataType: 'json',
			success: function (response) {
				rates = response;
				$('#amount').removeAttr('disabled');
				$('#calculate').removeAttr('disabled');
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

			var eth = tokenInETH * amount;
			
			var btc = eth * rates.BTC;
			var ltc = eth * rates.LTC;
			var dash = eth * rates.DASH;
			var zec = eth * rates.ZEC;

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
				
				var tokens =  val / tokenInETH;
				if(coin == 'bitcoin'){
					tokens = tokens / rates.BTC;
				} else if(coin == 'litecoin'){
					tokens = tokens / rates.LTC;
				} else {

				}
				
				$(this).parents('form').find('#tokens').text(tokens.toFixed(0));
				// $(this).parents('form').find('#estimated_tokens').text(tokens.toFixed(4));
		});
	});
	