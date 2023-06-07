<script>
		var mintButton = "<button class='button' id='next-button' onclick = 'mintIt(nftCharName, nftClass, nftSpecies, nftBackground, nftAlignment, nftDescr, nftStr, nftDex, nftInt, nftWis, nftCon, nftChar, nftPageLink, nftIMGURL)'>Mint It</button>";
		
		var nftCharName = null;
		var nftClass = null;
		var nftSpecies = null;
		var nftBackground = null;
		var nftAlignment = null;
		var nftDescr = null;
		var nftStr = null;
		var nftDex = null;
		var nftInt = null;
		var nftWis = null;
		var nftCon = null;
		var nftChar = null;
		//var nft = null;
		
		function setValuesForNFT(){
			console.log('setting values for NFT JS variables');
			nftCharName = document.getElementById('characterName').value;
			nftClass = document.getElementById('myClass').value;
			nftSpecies = document.getElementById('mySpecies').value;
			nftBackground = document.getElementById('myBackground').value;
			nftAlignment = document.getElementById('myAlignment').value;
			nftDescr = document.getElementById('characterDescription').value;
			nftStr = document.getElementById('sStr').value;
			nftDex = document.getElementById('sDex').value;
			nftInt = document.getElementById('sInt').value;
			nftWis = document.getElementById('sWis').value;
			nftCon = document.getElementById('sCon').value;
			nftChar = document.getElementById('sCha').value;
			nftPageLink = window.location.href;
			//Hard coded right now - Hope to update with dynamic, machine learning IMG.
			nftIMGURL = "https://doncodes.com/ceptor-club/images/character-img-0001.png";
		}
		/*
		//function mintIt(characterClass, race, background, imgURL, str, dex, intel, wis, con, charis){
		*/
		async function mintIt(cName, cClass, cSpecies, cBackground, cAlignment, cDescr, cStr, cDex, cInt, cWis, cCon, cChar, cPageLink, cIMGURL){
	
			let web3 = new Web3(Web3.givenProvider);
			var nftMakerContractAddress = '0x5cb20e9d9D5841B767A8e42BE607c7FedcCf698a';	
			var contract = new web3.eth.Contract(abi1, nftMakerContractAddress, {});
			await contract.methods.setValuesAndMint(cName, cClass, cSpecies, cBackground, cAlignment, cDescr, cPageLink, cIMGURL).send({
				from: window['userAccountNumber'],
				//value: web3.utils.toWei(sendEth, "ether"),
				//value: web3.utils.toWei("0.02", "ether"), //this one worked but were not sending eth here.
				gas: 1500000,
				maxPriorityFeePerGas:5000000000
			
			}).on('receipt', function(receipt){
				/*waitForOracle2();
			
				ig.game.txtBoxTxt = "I have created your ITEM. But it's too hot to hold right now. .";
				ig.game.textBoxTicker = true;*/
				alert('nft minted');
			});
		}
		
		async function connectWallet() {
			
			try {
				await ethereum.request({ method: 'eth_requestAccounts' });
			}
			catch(error){
				alert('somethings wrong with your wallet.');
			}
			
			const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
			const account = accounts[0];
			
			//watchToken();
		
			if (account){
				window['userAccountNumber'] = account;
				//storeAccountInDB();
				//ig.game.checkIfUserHasOre();
				document.getElementById("walletNum").innerHTML = window['userAccountNumber'];
				document.getElementById("web3-button").innerHTML = mintButton;
				setValuesForNFT();
			}
			else{
				console.log('no account num.')
			}
			
			//Create Web3 Object
			let web3 = new Web3(Web3.givenProvider);
									
			//Get Provider
			web3.eth.net.getId().then(
				function(value) {
					provider = value;
					if (provider){
	  					console.log('initial provider: ' + provider);
	  					reportProvider();
	  				}		
  				}	
  			);			
		}
		function reportProvider(){
			
			//Get chainId
			if (window.ethereum){
				chainId = window.ethereum.chainId;
			}
			
			//Get networkName		
			if (chainId == "0x5" || provider == 5){
  				networkName = "Goerli";
  			}
			else if (chainId == "0xa86a" || provider == 43114){
				console.log('User is on Avalanche C-Chain.');
			}
			else if (chainId == "0x1" || provider == 1){
  				networkName = "ethereum";
  			}
  			else if (chainId == "0x2a" || provider == 42){
  				networkName = "kovan";
  			}
  			else if (chainId == "0x89" || provider == 137){
  				networkName = "polygon";
  			}
  			else if (chainId == "0x4" || provider == 4){
  				networkName = "rinkeby";
  			}
  			else if (chainId == "0xa4b1" || provider == 42161){
  				networkName = "arbitrum";
  			}
  			else if (window.ethereum) {
  		 		chainId = window.ethereum.chainId;
  		 		networkName = "Ethereum?";
			}
  			else{
  				networkName = "unhandled network";
  			}
  			
  			console.log('User is on ' + networkName + ' with ID number ' + provider + ' and chainid ' + chainId + '.');
  			
  			if (chainId == "0x5" && provider == 5){
  				getOreBalance();
				ig.game.startGame();
			}	
  			else{
  				//Get on Goerli
  				switchNetwork(7);
  			}
  			
  			
		}
		async function switchNetwork(which){
			//Polygon
			var theChainID = '0x89';
			var theRPCURL = 'https://polygon-rpc.com';
			var nn = false;
			
			if (which == 1){
				//AVAX
				theChainID = '0xa86a';
				theRPCURL = 'https://api.avax.network/ext/bc/C/rpc';
				nn = "avalanche";
			}
			else if (which == 2){
				//Polygon
				theChainID = '0x89';
				theRPCURL = 'https://polygon-rpc.com';
				nn = "polygon";
			}
			else if (which == 3){
				//Mainnet
				theChainID = '0x1';
				theRPCURL = 'https://main-light.eth.linkpool.io/';
				nn = "ethereum";
			}
			else if (which == 4){
				//Kovan
				theChainID = '0x2a';
				theRPCURL = 'https://kovan.infura.io';
				nn = "kovan";
			}
			else if (which == 5){
				//Rinkeby
				theChainID = '0x4';
				theRPCURL = 'https://rinkeby-light.eth.linkpool.io/';
				nn = "rinkeby";
			}
			else if (which == 6){
				//Arbitrum
				theChainID = '0xa4b1';
				theRPCURL = 'https://arb1.arbitrum.io/rpc';
				nn = 'arbitrum';
			}
			else if (which == 7){
				//Goerli
				theChainID = '0x5';
				theRPCURL = 'https://goerli.infura.io/v3/';
				nn = 'goerli';
			}
			
			try {
					await window.ethereum.request({
						method: 'wallet_switchEthereumChain',
						params: [{ chainId: theChainID }],
					});
					getOreBalance();
					ig.game.startGame();
				} catch (switchError) {
  				// This error code indicates that the chain has not been added to MetaMask.
				if (switchError.code === 4902) {
					try {
						await window.ethereum.request({
							method: 'wallet_addEthereumChain',
							params: [{ chainId: theChainID, rpcUrl: theRPCURL}],
						});
						getOreBalance();
						ig.game.startGame();
					}
					catch (addError) {
						switchNetwork(which)
					}
				}
			}
		}
	</script>