<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Ceptor Club Character Generator</title>
	
	<!-- CSS -->
	<?php require 'css.php';?>
	
	<!-- JS -->
	<?php require 'js.php';?>
	
	
</head>
<body>
	<div id='walletNum'></div>
	<h1>Ceptor Club Character Gen</h1>
	<h2 id='character-name'></h2>
	<!-- Name -->
	<div id='q1' class='visible'>
		<h3>What do you want to name your character?</h3>
		<div class='gen-field' id='pName-div'>
			<label for="pName">Character Name: </label>
			<input type="text" name="pName" value="Character Name" id="pName"/>
			<button class='button' id='random-name-button' onclick = "randomName()" >Random Name</button>
		</div>
		<div class='gen-field' id='pLevel-div'>
			<label for="pLvl">Starting Level:</label>
			<input type="number" id="pLvl" name="pLvl" min="1" max="20" value='1'>
		</div>
		<div class='gen-field' id='pGender-div'>
			<label for="pGender">Character Gender: </label>
			<input type="radio" name="pGender" value="He" id="He"  checked="checked">
			<label for="He">He / Him</label>
       		<input type="radio" name="pGender" value="She"  id="She">  
        	<label for="She">She / Her</label>  
        	<input type="radio" name="pGender" value="They"  id="They">  
        	<label for="They">They / Them</label>  
		</div>
	</div>
	<div id='q2' class='invisible'>
		<h3>You find yourself in the middle of a bar brawl. Which weapon would you prefer to brandish?</h3>
		<div class='gen-field' id='pWeapon-div'>
			<input type="radio" name="pWeapon" value="Two-Handed Sword" id="two-handed-sword"  checked="checked">
			<label for="two-handed-sword">Two-Handed Sword</label>
       		<input type="radio" name="pWeapon" value="Bastard Sword"  id="bastard-sword">  
        	<label for="bastard-sword">Bastard Sword</label>  
        	<input type="radio" name="pWeapon" value="Bo Staff"  id="bo-staff">  
        	<label for="bo-staff">Bo Staff</label>  
        	<input type="radio" name="pWeapon" value="Halbred"  id="halbred">  
        	<label for="halbred">Halbred</label>  
        	<input type="radio" name="pWeapon" value="Throwing Knives"  id="throwing-knives">  
        	<label for="throwing-knives">Throwing Knives</label>  
        	<input type="radio" name="pWeapon" value="Spiked Mace"  id="spiked-mace">  
        	<label for="spiked-mace">Spiked Mace</label>  
        	<input type="radio" name="pWeapon" value="Cross Bow"  id="cross-bow">  
        	<label for="cross-bow">Cross Bow</label>  
		</div>
	</div>
	<div id='q3' class='invisible'>
		<h3>Is it ok to steal from the rich to feed the poor?</h3>
		<div class='gen-field' id='alignment-div'>
			<input type="radio" name="alignment1" value="alignment1Yes"  id="alignment1Yes">  
			<label for="alignment1Yes">Yes</label> 
			<input type="radio" name="alignment1" value="alignment1No" id="alignment1No"  checked="checked">  
			<label for="alignment1No">No</label>  
			<input type="radio" name="alignment1" value="alignment1Maybe"  id="alignment1Maybe">  
			<label for="alignment1Maybe">Maybe a Little Bit...</label> 
		</div>
	</div>
	<div id='q4' class='invisible'>
		<h3>Which activity sounds like the most fun?</h3>
		<div class='gen-field' id='alignment-div'>
			<input type="radio" name="interest1" value="interest1str"  id="interest1str">  
			<label for="interest1str">Lifting Weights</label> 
			<input type="radio" name="interest1" value="interest1dex"  id="interest1dex" checked="checked">  
			<label for="interest1dex">Doing Yoga</label>  
			<input type="radio" name="interest1" value="interest1int"  id="interest1int">  
			<label for="interest1int">Reading a Book</label> 
			<input type="radio" name="interest1" value="interest1wis"  id="interest1wis">  
			<label for="interest1wis">Listening to Stories from an Elder</label> 
			<input type="radio" name="interest1" value="interest1char"  id="interest1char">  
			<label for="interest1char">Performing on Stage</label> 
		</div>
	</div>
	<div id='q5' class='invisible'>
		<h3>You and your party ambush a group of monsters. Where do you see yourself in this fight?</h3>
		<div class='gen-field' id='party-role-1-div'>
			<input type="radio" name="partyRole1" value="front"  id="partyRole1Front">  
			<label for="partyRole1Front">In the front leading the charge</label> 
			<input type="radio" name="partyRole1" value="middle" id="partyRole1Middle"  checked="checked">  
			<label for="partyRole1Middle">In the middle launching ranged attacks</label>  
			<input type="radio" name="partyRole1" value="back"  id="partyRole1Back">  
			<label for="partyRole1Back">In the back supporting your team</label> 
		</div>
	</div>
	<div id='q6' class='invisible'>
		<h3>Which quest seems the most worthy of your time?</h3>
		<div class='gen-field' id='alignment-div-02'>
			<input type="radio" name="alignment2" value="alignment2Good"  id="alignment2Good">  
			<label for="alignment2Good">Defending helpless villagers against a group of cruel raiders.</label> 
			<input type="radio" name="alignment2" value="alignment2Neutral" id="alignment2Neutral"  checked="checked">  
			<label for="alignment2Neutral">Slaying a vicious ogre and taking his gold.</label>  
			<input type="radio" name="alignment2" value="alignment2Evil"  id="alignment2Evil">  
			<label for="alignment2Evil">Recovering a cursed ring that will grant you the power to enslave others.</label> 
		</div>
	</div>
	<div id='q7' class='invisible'>
		<h3>Are you interested in playing a human or humanoid character or something more exotic?</h3>
		<div class='gen-field' id='species-1-div'>
			<input type="radio" name="humanoidOrNot" value="humanoidYes"  id="humanoidYes">  
			<label for="humanoidYes">Human or humanoid please...</label> 
			<input type="radio" name="humanoidOrNot" value="humanoidNo" id="humanoidNo"  checked="checked">  
			<label for="humanoidNo">Strange creature!</label>  
		</div>
	</div>
	<div id='q8' class='invisible'>
		<h3 id='species-header'>Which humanoid sounds coolest to you?</h3>
		<div class='gen-field' id='species-2-div'>
			<input type='radio' name='whichSpecies' value='chooseElf'  id='chooseElf' checked='checked'>  
			<label for='chooseElf'>Elf</label> 
			<input type='radio' name='whichSpecies' value='chooseDwarf'  id='chooseDwarf'>  
			<label for='chooseDwarf'>Dwarf</label> 
			<input type='radio' name='whichSpecies' value='chooseHalfling'  id='chooseHalfling'>  
			<label for='chooseHalfling'>Halfling</label> 
			<input type='radio' name='whichSpecies' value='chooseHuman'  id='chooseHuman'>  
			<label for='chooseHuman'>Regular Human Please!</label> 
			<!-- Alternate
				<input type='radio' name='whichSpecies' value='chooseBugBear'  id='chooseBugBear'>
				<label for='chooseBugBear'>Bugbear</label>
				<input type='radio' name='whichSpecies' value='chooseCentaur'  id='chooseCentaur' checked='checked'>
				<label for='chooseCentaur'>Centaur</label>
				<input type='radio' name='whichSpecies' value='chooseDragonborn'  id='chooseDragonborn'>
				<label for='chooseDragonborn'>Dragonborn</label>
				<input type='radio' name='whichSpecies' value='chooseHalforc'  id='chooseHalforc'>
				<label for='chooseHalforc'>Half-orc</label>
				<input type='radio' name='whichSpecies' value='chooseZombie'  id='chooseZombie'>
				<label for='chooseZombie'>Zombie</label>
			-->
		</div>
	</div>
	<div id='q9' class='invisible'>
		<h3>Which background sounds most interesting to you?</h3>
		<div class='gen-field' id='species-1-div'>
			<input type="radio" name="background" value="circus"  id="circus" checked='checked'>  
			<label for="circus">Circus Performer</label> 
			<input type="radio" name="background" value="royal"  id="royal">  
			<label for="royal">Royale blooded adventurer in disguise</label>
			<input type="radio" name="background" value="gladiator"  id="gladiator">  
			<label for="gladiator">Freed or escaped gladiator</label>
			<input type="radio" name="background" value="hermit"  id="hermit">  
			<label for="hermit">Hermit or recluse</label>
			<input type="radio" name="background" value="pirate"  id="pirate">  
			<label for="pirate">Pirate... argh!</label>
			<input type="radio" name="background" value="soldier"  id="soldier">  
			<label for="soldier">Soldier</label>
			<input type="radio" name="background" value="criminal"  id="criminal">  
			<label for="criminal">Criminal</label>
			<input type="radio" name="background" value="merchant"  id="merchant">  
			<label for="merchant">Merchant</label>
			<input type="radio" name="background" value="spy"  id="spy">  
			<label for="spy">Spy</label>
		</div>
	</div>
	<div id='next-button-div'>
		<button class='button' id='next-button' onclick = "next()" >Next</button>
	</div>
	<form name="myCharacter" action="my-character.php" method="get" id="myCharacter">
      		<input type="hidden" name="characterName" id="characterName" />
      		<input type="hidden" name="characterAlignment" id="characterAlignment" />
      		<input type="hidden" name="characterClass" id="characterClass" />
      		<input type="hidden" name="species" id="species" />
      		<input type="hidden" name="myBackground" id="myBackground" />
      		<input type="hidden" name="preferredWeapon" id="preferredWeapon" />
      		
      		<input type="hidden" name="myGender" id="myGender" />
      		<input type="hidden" name="partyPos" id="partyPos" />
      		<input type="hidden" name="myLvl" id="myLvl" />
      		<input type="hidden" name="myXP" id="myXP" />
			<input type="hidden" name="hitPoints" id="hitPoints" />
      		<input type="hidden" name="myProficiencyBonus" id="myProficiencyBonus" />
      		
      		<!-- Stats -->
      		<input type="hidden" name="sStr" id="sStr" />
      		<input type="hidden" name="sDex" id="sDex" />
      		<input type="hidden" name="sCon" id="sCon" />
      		<input type="hidden" name="sInt" id="sInt" />
      		<input type="hidden" name="sWis" id="sWis" />
      		<input type="hidden" name="sCha" id="sCha" />
      		<input type="hidden" name="sStrAM" id="sStrAM" />
      		<input type="hidden" name="sDexAM" id="sDexAM" />
      		<input type="hidden" name="sConAM" id="sConAM" />
      		<input type="hidden" name="sIntAM" id="sIntAM" />
      		<input type="hidden" name="sWisAM" id="sWisAM" />
      		<input type="hidden" name="sChaAM" id="sChaAM" />
      		<!-- Saving Throws -->
      		<input type="hidden" name="svThStr" id="svThStr" />
      		<input type="hidden" name="svThDex" id="svThDex" />
      		<input type="hidden" name="svThCon" id="svThCon" />
      		<input type="hidden" name="svThInt" id="svThInt" />
      		<input type="hidden" name="svThWis" id="svThWis" />
      		<input type="hidden" name="svThCha" id="svThCha" />
			
			<!-- Skills -->
			<input type="hidden" name="skAcro" id="skAcro" />
			<input type="hidden" name="skAnHn" id="skAnHn" />
			<input type="hidden" name="skArc" id="skArc" />
			<input type="hidden" name="skAth" id="skAth" />
			<input type="hidden" name="skDec" id="skDec" />
			<input type="hidden" name="skHis" id="skHis" />
			<input type="hidden" name="skIns" id="skIns" />
			<input type="hidden" name="skInti" id="skInti" />
			<input type="hidden" name="skInv" id="skInv" />
			<input type="hidden" name="skMed" id="skMed" />
			<input type="hidden" name="skNat" id="skNat" />
			<input type="hidden" name="skPer" id="skPer" />
			<input type="hidden" name="skPerf" id="skPerf" />
			<input type="hidden" name="skPers" id="skPers" />
			<input type="hidden" name="skRel" id="skRel" />
			<input type="hidden" name="skSli" id="skSli" />
			<input type="hidden" name="skSte" id="skSte" />
			<input type="hidden" name="skSur" id="skSur" />
     		   		
   	</form>
	
	
</body>
<footer>

</footer>
