<?php

/* Handle CORS */

// Specify domains from which requests are allowed
header('Access-Control-Allow-Origin: *');

// Specify which request methods are allowed
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');

// Additional headers which may be sent along with the CORS request
header('Access-Control-Allow-Headers: X-Requested-With, Authorization, Content-Type');

// Set the age to 1 day to improve speed/caching.
header('Access-Control-Max-Age: 86400');

// Exit early so the page isn't fully loaded for options requests
if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
    exit();
}
	//PHP Code to Grab the Character Data from the URL that the JS and Index Files Send.

	if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    	// Handle preflight requests
    	header("HTTP/1.1 200 OK");
    	exit();
	}

	//Traits
	$characterName = $_GET['characterName'];
	$myAlignment = $_GET['characterAlignment'];
	$myClass = $_GET['characterClass'];
	$mySpecies = $_GET['species'];
	$mySpeciesAdj = strtolower($mySpecies);
	$myBackground = $_GET['myBackground'];
	
	if ($myBackground == "Royal Blood"){
		$myBackground = "Royal";
	}
	
	$myGender = $_GET['myGender'];
	$myGenderObj = $_GET['myGender'];
	$myGenderPos = $_GET['myGender'];
	
	
	//Stats
	$sStr = $_GET['sStr'];
	$sDex = $_GET['sDex'];
	$sCon = $_GET['sCon'];
	$sInt = $_GET['sInt'];
	$sWis = $_GET['sWis'];
	$sCha = $_GET['sCha'];
	$hitPoints = $_GET['hitPoints'];
	$myLvl = $_GET['myLvl'];
	$myXP = $_GET['myXP'];
	$myProficiencyBonus = $_GET['myProficiencyBonus'];
	
	//Ability Modifiers
	$sStrAM = $_GET['sStrAM'];
	$sDexAM = $_GET['sDexAM'];
	$sConAM = $_GET['sConAM'];
	$sIntAM = $_GET['sIntAM'];
	$sWisAM = $_GET['sWisAM'];
	$sChaAM = $_GET['sChaAM'];
	
	//Saving Throws
	$svThStr = $_GET['svThStr'];
	$svThDex = $_GET['svThDex'];
	$svThCon = $_GET['svThCon'];
	$svThInt = $_GET['svThInt'];
	$svThWis = $_GET['svThWis'];
	$svThCha = $_GET['svThCha'];
	
	//Skills
	$skAcro = $_GET['skAcro'];
	$skAnHn = $_GET['skAnHn'];
	$skArc = $_GET['skArc'];
	$skAth = $_GET['skAth'];
	$skDec = $_GET['skDec'];
	$skHis = $_GET['skHis'];
	$skIns = $_GET['skIns'];
	$skInti = $_GET['skInti'];
	$skInv = $_GET['skInv'];
	$skMed = $_GET['skMed'];
	$skNat = $_GET['skNat'];
	$skPer = $_GET['skPer'];
	$skPerf = $_GET['skPerf'];
	$skPers = $_GET['skPers'];
	$skRel = $_GET['skRel'];
	$skSli = $_GET['skSli'];
	$skSte = $_GET['skSte'];
	$skSur = $_GET['skSur'];
	
	//Used for the Character Description
	$trait['strength'] = $sStr;
	$trait['dexterity'] = $sDex;
	$trait['constitution'] = $sCon;
	$trait['intelligence'] = $sInt;
	$trait['wisdom'] = $sWis;
	$trait['charisma'] = $sCha;
	$highestTrait = array_search(max($trait),$trait);
	$lowestTrait = array_search(min($trait),$trait);
	$ltModifier = null;
	$htModifier = null;
	$partyPos = $_GET['partyPos'];
	$preferredWeapon = $_GET['preferredWeapon'];
	
	//Find High Trait
	if (max($trait) > 18){
		$htModifier = "astonishingly high";
	}
	else if (max($trait) > 14){
		$htModifier = "breath-taking";
	}
	else if (max($trait) > 11){
		$htModifier = "incredible";
	}
	else{
		$htModifier = "average";
	}
	//Find Low Trait
	if (min($trait) < 8){
		$ltModifier = "profoundly low";
	}
	else if (min($trait) < 10){
		$ltModifier = "very low";
	}
	else if (min($trait) < 14){
		$ltModifier = "only average";
	}
	else{
		$ltModifier = "actually quite high by normal standards";
	}
	
	//Species Data Used and Modified for the Character Description
	if ($mySpeciesAdj == "dwarf"){
		$mySpeciesAdj = "dwarven";
	}
	else if ($mySpeciesAdj == "elf"){
		$mySpeciesAdj = "elven";
	}
	else if ($mySpeciesAdj == "bugbear"){
		$mySpeciesAdj = "bugbearian";
	}
	else if ($mySpeciesAdj == "centaur"){
		$mySpeciesAdj = "centaurian";
	}
	
	if ($myGender == "He"){
		$myGenderObj = "him";
		$myGenderPos = "his";
	}
	else if ($myGender == "She"){
		$myGenderObj = "her";
		$myGenderPos = "her";
	}
	else if ($myGender == "They"){
		$myGenderObj = "them";
		$myGenderPos = "their";
	}
	
	if ($partyPos == "middle"){
		$partyPos = " fight in the middle of the fray.";
	}
	else if ($partyPos == "front"){
		$partyPos = " lead the attack.";
	}
	else if ($partyPos == "back"){
		$partyPos = " support " . $myGenderPos . " team from the back.";
	}
	
	//Character Description that will be used for the AI to generate images (also goes on PDF of Character Sheet)
	$characterDescription = $characterName . " is a level " . $myLvl . " " . $mySpeciesAdj . " " . $myClass . ". " . $myGender . " has a background as a " . strtolower($myBackground) . " and maintains a " . strtolower($myAlignment) . " alignment. " . $characterName . " is known for " . $myGenderPos . " ". $htModifier . " " . $highestTrait . " but is not well-regarded for " . $myGenderPos . " " . $lowestTrait . ", which is ". $ltModifier . ". " . $myGender . " prefers to use the " . strtolower($preferredWeapon)  . " in battle and likes to " . $partyPos;
?>

<head>
	<style>
        #avatar {
            max-width: 350px;
            max-height: 350px;
            display: none;
        }
    </style>
	<!-- Cool Google Web Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	
	<!-- Metadata -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title><?php echo $characterName ?></title>
	
	<!-- CSS -->
	<?php require 'css.php';?>
	
	<!-- Web 3 Stuff -->
	<?php require 'js-for-web3-activities.php';?>
	<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
	
</head>

<body>
	<div id='walletNum'></div>
	<h1><?php echo $characterName ?></h1>
	
	<div id="Character-Description">
		<?php echo $characterDescription ?> 
	</div>
	
	<div class='attributes' id="alignment-div">
		<div id ='Character-Alignment'>My Alignment: <?php echo $myAlignment ?></div>
	</div>
	<div class='attributes' id="Level-div">
		<div id ='Character-Level'>My Level: <?php echo $myLvl ?></div>
	</div>
	<div class='attributes' id="Hitpoints-div">
		<div id ='Character-Level'>Hit Points: <?php echo $hitPoints ?></div>
	</div>
	<div class='attributes' id="xp-div">
		<div id ='Character-XP'>Experience Points: <?php echo $myXP ?></div>
	</div>
	<div class='attributes' id="proficiency-div">
		<div id ='Character-Proficiency'>Proficiency Bonus: <?php echo $myProficiencyBonus ?></div>
	</div>
	<div class='attributes' id="class-div">
		<div id ='Character-Class'>My Class: <?php echo $myClass ?></div>
	</div>
	<div class='attributes' id="species-div">
		<div id ='Character-Species'>My Species: <?php echo $mySpecies ?></div>
	</div>
	<div class='attributes' id="background-div">
		<div id ='Character-Background'>My Background: <?php echo $myBackground ?></div>
	</div>
	<div class='attributes stats' id="background-div">
		<div id ='Character-Strength'>Strength / Ability Modifier: <?php echo $sStr ?> / <?php echo $sStrAM ?> </div>
	</div>
	<div class='attributes stats' id="background-div">
		<div id ='Character-Dexterity'>Dexterity / Ability Modifier: <?php echo $sDex ?> / <?php echo $sDexAM ?> </div>
	</div>
	<div class='attributes stats' id="background-div">
		<div id ='Character-Constitution'>Constitution / Ability Modifier: <?php echo $sCon ?> / <?php echo $sConAM ?> </div>
	</div>
	<div class='attributes stats' id="background-div">
		<div id ='Character-Intelligence'>Intelligence / Ability Modifier: <?php echo $sInt ?> / <?php echo $sIntAM ?> </div>
	</div>
	<div class='attributes stats' id="background-div">
		<div id ='Character-Wisdom'>Wisdom / Ability Modifier: <?php echo $sWis ?> / <?php echo $sWisAM ?> </div>
	</div>
	<div class='attributes stats' id="background-div">
		<div id ='Character-Charisma'>Charisma / Ability Modifier: <?php echo $sCha ?> / <?php echo $sChaAM ?> </div>
	</div>
	
	<!-- This form passes the character data to the character sheet PDF -->
	<form id='myCharacterSheet' target='_blank' action='/ceptor-club/fpdf185/character-sheet.php' method=POST>
		
		<!-- Traits -->
		<input type="hidden" name="characterName" id="characterName" value="<?php echo $characterName; ?>" />
		<input type="hidden" name="myAlignment" id="myAlignment" value="<?php echo $myAlignment; ?>" />
		<input type="hidden" name="myClass" id="myClass" value="<?php echo $myClass; ?>" />
		<input type="hidden" name="mySpecies" id="mySpecies" value="<?php echo $mySpecies; ?>" />
		<input type="hidden" name="myBackground" id="myBackground" value="<?php echo $myBackground; ?>" />
		<!-- Description -->
		<input type="hidden" name="characterDescription" id="characterDescription" value="<?php echo $characterDescription; ?>" />
		
		<!-- Stats and Ability Modifiers -->
		<input type="hidden" name="myLvl" id="myLvl" value="<?php echo $myLvl; ?>" />
		<input type="hidden" name="myXP" id="myXP" value="<?php echo $myXP; ?>" />
		<input type="hidden" name="hitPoints" id="hitPoints" value="<?php echo $hitPoints; ?>" />
		<input type="hidden" name="myProficiencyBonus" id="myProficiencyBonus" value="<?php echo $myProficiencyBonus; ?>" />
		
		<input type="hidden" name="sStr" id="sStr" value="<?php echo $sStr; ?>" />
		<input type="hidden" name="sDex" id="sDex" value="<?php echo $sDex; ?>" />
		<input type="hidden" name="sCon" id="sCon" value="<?php echo $sCon; ?>" />
		<input type="hidden" name="sInt" id="sInt" value="<?php echo $sInt; ?>" />
		<input type="hidden" name="sWis" id="sWis" value="<?php echo $sWis; ?>" />
		<input type="hidden" name="sCha" id="sCha" value="<?php echo $sCha; ?>" />
		<input type="hidden" name="sStrAM" id="sStrAM" value="<?php echo $sStrAM; ?>" />
		<input type="hidden" name="sDexAM" id="sDexAM" value="<?php echo $sDexAM; ?>" />
		<input type="hidden" name="sConAM" id="sConAM" value="<?php echo $sConAM; ?>" />
		<input type="hidden" name="sIntAM" id="sIntAM" value="<?php echo $sIntAM; ?>" />
		<input type="hidden" name="sWisAM" id="sWisAM" value="<?php echo $sWisAM; ?>" />
		<input type="hidden" name="sChaAM" id="sChaAM" value="<?php echo $sChaAM; ?>" />
		
		<!-- Saving Throws -->
		<input type="hidden" name="svThStr" id="svThStr" value="<?php echo $svThStr; ?>" />
		<input type="hidden" name="svThDex" id="svThDex" value="<?php echo $svThDex; ?>" />
		<input type="hidden" name="svThCon" id="svThCon" value="<?php echo $svThCon; ?>" />
		<input type="hidden" name="svThInt" id="svThInt" value="<?php echo $svThInt; ?>" />
		<input type="hidden" name="svThWis" id="svThWis" value="<?php echo $svThWis; ?>" />
		<input type="hidden" name="svThCha" id="svThCha" value="<?php echo $svThCha; ?>" />
		
		<!-- Skills -->
		<input type="hidden" name="skAcro" id="skAcro" value="<?php echo $skAcro; ?>" />
		<input type="hidden" name="skAnHn" id="skAnHn" value="<?php echo $skAnHn; ?>" />
		<input type="hidden" name="skArc" id="skArc" value="<?php echo $skArc; ?>" />
		<input type="hidden" name="skAth" id="skAth" value="<?php echo $skAth; ?>" />
		<input type="hidden" name="skDec" id="skDec" value="<?php echo $skDec; ?>" />
		<input type="hidden" name="skHis" id="skHis" value="<?php echo $skHis; ?>" />
		<input type="hidden" name="skIns" id="skIns" value="<?php echo $skIns; ?>" />
		<input type="hidden" name="skInti" id="skInti" value="<?php echo $skInti; ?>" />
		<input type="hidden" name="skInv" id="skInv" value="<?php echo $skInv; ?>" />
		<input type="hidden" name="skMed" id="skMed" value="<?php echo $skMed; ?>" />
		<input type="hidden" name="skNat" id="skNat" value="<?php echo $skNat; ?>" />
		<input type="hidden" name="skPer" id="skPer" value="<?php echo $skPer; ?>" />
		<input type="hidden" name="skPerf" id="skPerf" value="<?php echo $skPerf; ?>" />
		<input type="hidden" name="skPers" id="skPers" value="<?php echo $skPers; ?>" />
		<input type="hidden" name="skRel" id="skRel" value="<?php echo $skRel; ?>" />
		<input type="hidden" name="skSli" id="skSli" value="<?php echo $skSli; ?>" />
		<input type="hidden" name="skSte" id="skSte" value="<?php echo $skSte; ?>" />
		<input type="hidden" name="skSur" id="skSur" value="<?php echo $skSur; ?>" />

		<!--avatar url-->
		<input type="hidden" id="avatarUrl" name="avatarUrl" value="">
	</form>
	
	<button class='button' id="generate-button">Generate Avatar</button>
    <br><br><br><br>
	<img id="avatar" src="" alt="Avatar">
	<!-- <script>
        // JavaScript code to handle button click event
        document.getElementById("generate-button").addEventListener("click", async function() {
            try {
                const response = await fetch("https://g7mm3z0f7ky2nt-3000.proxy.runpod.net/sdapi/v1/txt2img", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
    					prompt: "HD Face, <?php echo $myGender; ?> DnDDragonbornGeneral, face looks like <?php echo $myClass; ?>, face expression like <?php echo $myBackground; ?>",
    					seed: -1,
    					batch_size: 1,
    					n_iter: 1,
    					steps: 52,
    					cfg_scale: 9,
    					width: 512,
    					height: 512,
    					sampler_index: "Euler a",
    					send_images: true,
    					// save_images: true,
                    })
                });

                const data = await response.json();
				console.log(data);

                if (data.images && data.images.length > 0) {
                    // Format images with 'data:image/png;base64,' at the front
                    data.images.forEach((image, i) => {
                        data.images[i] = "data:image/png;base64," + image;
                    });

                    // Set the image source of the avatar element
                    document.getElementById("avatar").src = data.images[0];
                    // Show the image element
                    document.getElementById("avatar").style.display = "block";
                }
            } catch (error) {
                console.log(error);
            }
        });
    </script> -->

	<script>
        // JavaScript code to handle button click event
        document.getElementById("generate-button").addEventListener("click", async function() {
            try {
                const response = await fetch("https://g7mm3z0f7ky2nt-3000.proxy.runpod.net/sdapi/v1/txt2img", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
    					prompt: "HD Face, <?php echo $myGender; ?> DnDDragonbornGeneral, face looks like <?php echo $myClass; ?>, face expression like <?php echo $myBackground; ?>",
    					seed: -1,
    					batch_size: 1,
    					n_iter: 1,
    					steps: 52,
    					cfg_scale: 9,
    					width: 512,
    					height: 512,
    					sampler_index: "Euler a",
    					send_images: true,
    					// save_images: true,
                    })
                });

                const data = await response.json();
				console.log(data);

                if (data.images && data.images.length > 0) {
                    // Format images with 'data:image/png;base64,' at the front
                    data.images.forEach((image, i) => {
                        data.images[i] = "data:image/png;base64," + image;
                    });

                    // Set the image source of the avatar element
                    document.getElementById("avatar").src = data.images[0];
                    // Set the image URL in the hidden input field
                    document.getElementById("avatarUrl").value = data.images[0];
					// console.log(avatarUrl);
                    // Show the image element
                    document.getElementById("avatar").style.display = "block";
                }
            } catch (error) {
                console.log(error);
            }
        });
    </script>

	<br><br>
	<button class='button' id='print-button' onclick = "printCharacter()" >Print Character Sheet</button>
	<div id='web3-button'>
		<button class='button' id='next-button' onclick = "connectWallet()" >Connect Wallet</button>
	</div>
</body>

<footer>
	<script>
		function printCharacter(){
			document.getElementById("myCharacterSheet").submit();
		}
		function handleWeb3Button(){
			if (window["userAccountNumber"]){
				setValuesForNFT();
				document.getElementById("web3-button").innerHTML = mintButton;
			}
		}
		handleWeb3Button();
	</script>
	
	<!-- ABI FOR WEB 3 STUFF -->
	<!-- ?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ceptor-club/abi1.php'); ? -->
	
</footer>