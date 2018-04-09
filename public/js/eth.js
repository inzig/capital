window.addEventListener('load', function() {
	web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/sLE5jxRI7tVRLdNNLqtW"));
	CapitalTechCrowdsale();
});
function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}
function initializeClock(endtime) {
	var d0 = document.getElementById('clk_days');
	var d1 = document.getElementById('clk_day');
	var da0 = document.getElementById('clk_days_up');
    var da1 = document.getElementById('clk_days_down');	
	var db0 = document.getElementById('clk_day_up');
	var db1 = document.getElementById('clk_day_down');
	
	var h0 = document.getElementById('clk_hours');
	var h1 = document.getElementById('clk_hour');
	var ha0 = document.getElementById('clk_hours_up');
    var ha1 = document.getElementById('clk_hours_down');	
	var hb0 = document.getElementById('clk_hour_up');
	var hb1 = document.getElementById('clk_hour_down');
	
	var m0 = document.getElementById('clk_minutes');
	var m1 = document.getElementById('clk_minute');
    var ma0 = document.getElementById('clk_minutes_up');
	var ma1 = document.getElementById('clk_minutes_down');	
	var mb0 = document.getElementById('clk_minute_up');
	var mb1 = document.getElementById('clk_minute_down');
	
	var s0 = document.getElementById('clk_seconds');
	var s1 = document.getElementById('clk_second');
	var sa0 = document.getElementById('clk_seconds_up');
	var sa1 = document.getElementById('clk_seconds_down');	
	var sb0 = document.getElementById('clk_second_up');
	var sb1 = document.getElementById('clk_second_down');
	
    function updateClock() {	
        var t = getTimeRemaining(endtime);
		d0.classList.remove("play");
		d1.classList.remove("before");
		m0.classList.remove("play");
		m1.classList.remove("before");
		h0.classList.remove("play");
		h1.classList.remove("before");
		s0.classList.remove("play");
		s1.classList.remove("before");	
		da0.innerHTML = ('0' + t.days).slice(-2);
		da1.innerHTML = ('0' + t.days).slice(-2);
		db0.innerHTML = ('0' + t.days).slice(-2);
		db1.innerHTML = ('0' + t.days).slice(-2);		
        ha0.innerHTML = ('0' + t.hours).slice(-2);
		ha1.innerHTML = ('0' + t.hours).slice(-2);
		hb0.innerHTML = ('0' + t.hours).slice(-2);
		hb1.innerHTML = ('0' + t.hours).slice(-2);
        ma0.innerHTML = ('0' + t.minutes).slice(-2);
		ma1.innerHTML = ('0' + t.minutes).slice(-2);
		mb0.innerHTML = ('0' + t.minutes).slice(-2);
		mb1.innerHTML = ('0' + t.minutes).slice(-2);	
		sa0.innerHTML = ('0' + t.seconds).slice(-2);
		sb0.innerHTML = ('0' + t.seconds).slice(-2);
		sa1.innerHTML = ('0' + t.seconds).slice(-2);
		sb1.innerHTML = ('0' + t.seconds).slice(-2);
		if(t.seconds == 0 ){
			flipminute();
			fliphour();
			flipday();
		}
		if (t.total <= 0) {
            clearInterval(timeinterval);
        }		
    }
	function flipday() {
		d0.classList.add("play");	
		d1.classList.add("before");
	}
	function fliphour() {
		h0.classList.add("play");	
		h1.classList.add("before");
	}
	function flipminute() {
		m0.classList.add("play");	
		m1.classList.add("before");
	}	
	function flipsecond() {
		s0.classList.add("play");	
		s1.classList.add("before");			
	}
    updateClock();
	var s = setInterval(flipsecond, 25);
    var timeinterval = setInterval(updateClock, 1000);
		
}
function CapitalTechCrowdsale() {
var abi = [
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "purchaser",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "beneficiary",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "value",
				"type": "uint256"
			},
			{
				"indexed": false,
				"name": "amount",
				"type": "uint256"
			}
		],
		"name": "TokenPurchase",
		"type": "event"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "beneficiary",
				"type": "address"
			}
		],
		"name": "buyTokens",
		"outputs": [],
		"payable": true,
		"stateMutability": "payable",
		"type": "function"
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
		"inputs": [],
		"name": "Finalized",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [],
		"name": "BurnedUnsold",
		"type": "event"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "claimRefund",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "finalize",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "powerUpContract",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
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
		"constant": false,
		"inputs": [
			{
				"name": "_to",
				"type": "address"
			},
			{
				"name": "amount",
				"type": "uint256"
			}
		],
		"name": "transferTokens",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [],
		"name": "withdrawFunds",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"payable": true,
		"stateMutability": "payable",
		"type": "fallback"
	},
	{
		"inputs": [
			{
				"name": "_wallet",
				"type": "address"
			},
			{
				"name": "_token_call",
				"type": "address"
			},
			{
				"name": "_token_callg",
				"type": "address"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
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
		"name": "fiat_contract",
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
		"name": "goalReached",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "hasEnded",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "maxContributionPerAddress",
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
		"name": "minInvestment",
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
		"name": "sale_period",
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
		"name": "sale_state",
		"outputs": [
			{
				"name": "",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "softCap",
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
	},
	{
		"constant": true,
		"inputs": [],
		"name": "token_call",
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
		"name": "token_callg",
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
		"name": "vault",
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
		"name": "weiRaised",
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
var contract = crowdsaleContract.at('0xa9979471b5175522ab2e77d4f893bdc8fc649dad');
initializeClock(new Date(JSON.parse(parseContract(contract)).preSale)); 
calculateRate(contract);
}
function parseContract(contract) {
	return '{"privateSale": "'+new Date(contract.startTime()*1000)+'","preSale": "'+new Date(new Date(contract.startTime()*1000).setDate(new Date(contract.startTime()*1000).getDate() + 15))+'","mainSale": "'+new Date(new Date(contract.startTime()*1000).setDate(new Date(contract.startTime()*1000).getDate() + 45))+'","mainSaleWeek1": "'+new Date(new Date(contract.startTime()*1000).setDate(new Date(contract.startTime()*1000).getDate() + 52))+'","mainSaleWeek2": "'+new Date(new Date(contract.startTime()*1000).setDate(new Date(contract.startTime()*1000).getDate() + 59))+'","mainSaleWeek3": "'+new Date(new Date(contract.startTime()*1000).setDate(new Date(contract.startTime()*1000).getDate() + 66))+'","mainSaleWeek4": "'+new Date(contract.endTime())+'","sale_state": '+contract.sale_state()+'}';
}
function calculateRate(contract) {
	contract.calculateRate(1000000000000000000, function(e, r){
		var ethUSD = r.valueOf();
		var toEth = web3.fromWei(ethUSD, 'ether');
		$("#calleth").html(toEth + " CALL & ");
		$("#callgeth").html(toEth*200 + " CALLG");
	});	
}














