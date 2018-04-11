window.addEventListener('load', function() {

	web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/sLE5jxRI7tVRLdNNLqtW"));
	CapitalTechCrowdsale();

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
parseContract(contract)
}
function parseContract(contract) {
	var startDate = contract.startTime()*1000;
	var currentDate = new Date();
	var mainSaleW4 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 66)), new Date(contract.endTime()*1000), 4);
	var mainSaleW3 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 59)), mainSaleW4[0], 3.6); 
	var mainSaleW2 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 52)), mainSaleW3[0], 3.3);
	var mainSaleW1 = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 45)), mainSaleW2[0], 3);
	var preSale = new Array(new Date(new Date(startDate).setDate(new Date(startDate).getDate() + 15)), mainSaleW1[0], 2);
	var privateSale = new Array(new Date(startDate), preSale[0], 1.5);
	if (currentDate > mainSaleW4[1]) {
		console.log("ICO ENDED");
	} else if (currentDate.getTime() < mainSaleW4[1].getTime() && currentDate.getTime() > mainSaleW4[0].getTime()) {
		console.log(mainSaleW4);
	} else if (currentDate.getTime() < mainSaleW3[1].getTime() && currentDate.getTime() > mainSaleW3[0].getTime()) {
		console.log(mainSaleW3);
	} else if (currentDate.getTime() < mainSaleW2[1].getTime() && currentDate.getTime() > mainSaleW2[0].getTime()) {
		console.log(mainSaleW2);
	} else if (currentDate.getTime() < mainSaleW1[1].getTime() && currentDate.getTime() > mainSaleW1[0].getTime()) {
		console.log(mainSaleW1);
	} else if (currentDate.getTime() < preSale[1].getTime() && currentDate.getTime() > preSale[0].getTime()) {
		console.log(preSale);
	} else if (currentDate.getTime() < privateSale[1].getTime() && currentDate.getTime() > privateSale[0].getTime()) {
		console.log(privateSale);
	} else {
		console.log("INVALID RANGE");
	}
}














