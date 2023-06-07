<script>
		//Initiate Variables
		var pName = null
		var preferredWeapon = null;
		var alignment1 = null;
		var alignment2 = null;
		
		var interest1 = null;
		var partyRole1 = null;
		var species1 = null;
		var species2 = null;
		var background1 = null;
		
		var myAlignment = null;
		var myBackground = null;
		var myClass = null;
		var mySpecies = null;
		
		var sStr = null;
		var sDex = null;
		var sCon = null;
		var sInt = null;
		var sWis = null;
		var sCha = null;
		
		var sStrAM = null;
		var sDexAM = null;
		var sConAM = null;
		var sIntAM = null;
		var sWisAM = null;
		var sChaAM = null;
		
		var svThStr = null;
		var svThDex = null;
		var svThCon = null;
		var svThInt = null;
		var svThWis = null;
		var svThCha = null;
		
		var partyPos = null;
		
		var pLvl = null;
		var eXP = null;
		
		var proficencyBonus = null;
		
		var hitPoints = null;
		
		var pGender = null;
		
		var skAcro = null;
		var skAnHn = null;
		var skArc = null;
		var skAth = null;
		var skDec = null;
		var skHis = null;
		var skIns = null;
		var skInti = null;
		var skInv = null;
		var skMed = null;
		var skNat = null;
		var skPer = null;
		var skPerf = null;
		var skPers = null;
		var skRel = null;
		var skSli = null;
		var skSte = null;
		var skSur = null;
		
		var visibleDiv = 1;
		var lastQdiv = 9;
		
		
		function generateCharacter(){
			getData();
			//Sets generated values to the form on the Index page, which is then passed to the PHP page to create the character overview.
			document.getElementById("characterName").value = pName;
			document.getElementById("characterAlignment").value = myAlignment;
			document.getElementById("characterClass").value = myClass;
			document.getElementById("species").value = mySpecies;
			document.getElementById("myBackground").value = myBackground
			document.getElementById("preferredWeapon").value = preferredWeapon;
			document.getElementById("myLvl").value = pLvl;
			document.getElementById("myXP").value = eXP;
			document.getElementById("myProficiencyBonus").value = proficencyBonus;
			document.getElementById("partyPos").value = partyPos;
			document.getElementById("hitPoints").value = hitPoints;		
			document.getElementById("myGender").value = pGender;
			
			//Skills and Ability Modifiers
			document.getElementById("sStr").value = sStr;
			document.getElementById("sDex").value = sDex;
			document.getElementById("sCon").value = sCon;
			document.getElementById("sInt").value = sInt;
			document.getElementById("sWis").value = sWis;
			document.getElementById("sCha").value = sCha;
			document.getElementById("sStrAM").value = sStrAM;
			document.getElementById("sDexAM").value = sDexAM;
			document.getElementById("sConAM").value = sConAM;
			document.getElementById("sIntAM").value = sIntAM;
			document.getElementById("sWisAM").value = sWisAM;
			document.getElementById("sChaAM").value = sChaAM;	
			//Saving Throws
			document.getElementById("svThStr").value = svThStr;
			document.getElementById("svThDex").value = svThDex;
			document.getElementById("svThCon").value = svThCon;
			document.getElementById("svThInt").value = svThInt;
			document.getElementById("svThWis").value = svThWis;
			document.getElementById("svThCha").value = svThCha;
			//Skills
			document.getElementById("skAcro").value = skAcro;
			document.getElementById("skAnHn").value = skAnHn;
			document.getElementById("skArc").value = skArc;
			document.getElementById("skAth").value = skAth;
			document.getElementById("skDec").value = skDec;
			document.getElementById("skHis").value = skHis;
			document.getElementById("skIns").value = skIns;
			document.getElementById("skInti").value = skInti;
			document.getElementById("skInv").value = skInv;
			document.getElementById("skMed").value = skMed;
			document.getElementById("skNat").value = skNat;
			document.getElementById("skPer").value = skPer;
			document.getElementById("skPerf").value = skPerf;
			document.getElementById("skPers").value = skPers;
			document.getElementById("skRel").value = skRel;
			document.getElementById("skSli").value = skSli;
			document.getElementById("skSte").value = skSte;
			document.getElementById("skSur").value = skSur;
			//Submit form to PHP Page
			document.getElementById("myCharacter").submit();

		}
		function getData(){
			//Grabs data from the Index Page and processes it.
			pName = document.getElementById('pName').value;
			preferredWeapon = document.querySelector('input[name="pWeapon"]:checked').value;
			alignment1 = document.querySelector('input[name="alignment1"]:checked').value;
			alignment2 = document.querySelector('input[name="alignment2"]:checked').value;
			interest1 = document.querySelector('input[name="interest1"]:checked').value;
			partyPos = document.querySelector('input[name="partyRole1"]:checked').value;
			species1 = document.querySelector('input[name="humanoidOrNot"]:checked').value;
			species2 = document.querySelector('input[name="whichSpecies"]:checked').value;
			background1 = document.querySelector('input[name="background"]:checked').value;
			pGender = document.querySelector('input[name="pGender"]:checked').value;
			pLvl = document.getElementById('pLvl').value;
			setAlignment();
			setClass();
			setSpecies();
			setBackground();
			setAbilityScores();
			calcXP();
			setProficiencyBonus();
			calculateSavingThrows();
			calculateSkills();
			calculateHitPoint();
		}
		//Generates Stat Scores
		//Rolls 4 dice and discards the lowest roll - always modifies to 8 if lower.
		function rollAbilityScore(){
			var roll1 = Math.floor(Math.random() * 6) + 1;
			var roll2 = Math.floor(Math.random() * 6) + 1;
			var roll3 = Math.floor(Math.random() * 6) + 1;
			var roll4 = Math.floor(Math.random() * 6) + 1;
			
			var totalScore = null;
			
			var result = [roll1,roll2,roll3,roll4].sort().filter((_,i) => i);
			result.forEach(function(value) {
				totalScore += value;
			});
			//Always at least 8.
			if (totalScore < 8){
				totalScore = 8;
			}
			console.log(totalScore);
			return totalScore;
			
		}
		function setAbilityScores(){
			sStr = rollAbilityScore();
			sDex = rollAbilityScore();
			sCon = rollAbilityScore();
			sInt = rollAbilityScore();
			sWis = rollAbilityScore();
			sCha = rollAbilityScore();
			
			//Add to stat based on race, interest, and background responses.
			addInterestModifiers();
			addRaceModifiers();
			calculateAbilityModifiers();
		}
		//Add to stats based on quiz response.
		function addInterestModifiers(){
			if (interest1 == "interest1str"){
				sStr += 3;
			}
			else if (interest1 == "interest1dex"){
				sDex += 3;
			}
			else if (interest1 == "interest1int"){
				sInt += 3;
			}
			else if (interest1 == "interest1wis"){
				sWis += 3;
			}
			else if (interest1 == "interest1char"){
				sCha += 3;
			}
			
		}
		function addRaceModifiers(){
			if (mySpecies == "Elf"){
				sDex += 2;
				sWis += 2;
				sCha += 1;
			}
			else if (mySpecies == "Human"){
				sStr += 1;
				sWis += 1;
				sInt += 1;
				sCon += 1;
				sDex += 1;
				sCha += 1;
			}
			else if (mySpecies == "Halfling"){
				sDex += 1;
				sCha += 1;
			}
			else if (mySpecies == "Dragonborn"){
				sStr += 2;
				sCha += 1;
			}
			else if (mySpecies == "Dwarf"){
				sStr += 2;
				sCon += 2;
			}
			else if (mySpecies == "Bugbear"){
				sStr += 2;
				sDex += 1;
			}
			else if (mySpecies == "Half-orc"){
				sStr += 2;
				sCon += 1;
			}
			else if (mySpecies == "Centaur"){
				sStr += 2;
				sWis += 1;
			}
			else if (mySpecies == "Zombie"){
				sStr += 3;
				sWis -= 2;
				sInt -= 2;
			}
		}
		//Calculate ability modifiers based on stats.
		function calculateAbilityModifiers(){
			sStrAM = calculateAbilityScore(sStr);
			sDexAM = calculateAbilityScore(sDex);
			sConAM = calculateAbilityScore(sCon);
			sIntAM = calculateAbilityScore(sInt);
			sWisAM = calculateAbilityScore(sWis);
			sChaAM = calculateAbilityScore(sCha);
		}
		function calculateAbilityScore(value){
			
			var abilityScore = null;
			if (value < 2){
				abilityScore = -5;
			}
			else if (value < 4){
				abilityScore = -4;
			}
			else if (value < 6){
				abilityScore = -3;
			}
			else if (value < 8){
				abilityScore = -2;
			}
			else if (value < 10){
				abilityScore = -1;
			}
			else if (value < 12){
				abilityScore = 0;
			}
			else if (value < 14){
				abilityScore = 1;
			}
			else if (value < 16){
				abilityScore = 2;
			}
			else if (value < 18){
				abilityScore = 3;
			}
			else if (value < 20){
				abilityScore = 4;
			}
			else if (value < 22){
				abilityScore = 5;
			}
			else if (value < 24){
				abilityScore = 6;
			}
			else if (value < 26){
				abilityScore = 7;
			}
			else if (value < 28){
				abilityScore = 8;
			}
			else if (value < 30){
				abilityScore = 9;
			}
			else{
				abilityScore = 10;
			}
			return abilityScore;
		}
		
		function calculateSkills(){
			//Gets skill value by calling a function on every skill based on stat.
			skAcro = calculateSkill("dex");
			skAnHn = calculateSkill("wis");
			skArc = calculateSkill("int");
			skAth = calculateSkill("str");
			skDec = calculateSkill("cha");
			skHis = calculateSkill("int");
			skIns = calculateSkill("wis");
			skInti = calculateSkill("cha");
			skInv = calculateSkill("int");
			skMed = calculateSkill("wis");
			skNat = calculateSkill("int");
			skPer = calculateSkill("wis");
			skPerf = calculateSkill("cha");
			skPers = calculateSkill("cha");
			skRel = calculateSkill("int");
			skSli = calculateSkill("dex");
			skSte = calculateSkill("dex");
			skSur = calculateSkill("wis");
		}
		//Find skill score and add to it if class is proficient.
		function calculateSkill(trait){
			var returnValue = null;

			if (trait == "str"){
				returnValue += calculateAbilityScore(sStr);
				if (myClass == "Fighter" || myClass == "Barbarian" || myClass == "Paladin" ){
					returnValue += proficencyBonus;
				}
			}
			else if (trait == "dex"){
				returnValue += calculateAbilityScore(sDex);
				if (myClass == "Rogue" || myClass == "Ranger" ){
					returnValue += proficencyBonus;
				}
			}
			else if (trait == "int"){
				returnValue += calculateAbilityScore(sInt);
				if (myClass == "Sorcerer" || myClass == "Wizard" || myClass == "Warlock" ){
					returnValue += proficencyBonus;
				}
			}
			else if (trait == "wis"){
				returnValue += calculateAbilityScore(sWis);
				if (myClass == "Cleric" || myClass == "Druid" || myClass == "Monk" ){
					returnValue += proficencyBonus;
				}
			}
			else if (trait == "cha"){
				returnValue += calculateAbilityScore(sCha);
				if (myClass == "Bard" ){
					returnValue += proficencyBonus;
				}
			}
			return returnValue;
		}
		//Calculate Character Hit Points
		function calculateHitPoint(){
			hitPoints = 0;
			var constituationModifier = calculateAbilityScore(sCon);
			
			if (myClass == "Barbarian"){
				hitPoints = 12 + constituationModifier;
				hitPoints += addHpPerLevel(12);
			}
			else if (myClass == "Fighter" || myClass == "Paladin" || myClass == "Ranger"){
				hitPoints = 10 + constituationModifier;
				hitPoints += addHpPerLevel(10);
			}
			else if (myClass == "Bard" || myClass == "Cleric" || myClass == "Druid" || myClass == "Monk" || myClass == "Rogue" || myClass == "Warlock"){
				hitPoints = 8 + constituationModifier;
				hitPoints += addHpPerLevel(8);
			}
			else if (myClass == "Sorcerer" || myClass == "Wizard"){
				hitPoints = 6 + constituationModifier;
				hitPoints += addHpPerLevel(6);
			}
		}
		//Add additional hit points for each level. 
		function addHpPerLevel(die){
			var extraHealth = 0;
			var constituationModifier = calculateAbilityScore(sCon);
			if (pLvl > 1){
				var extraHealthRolls = pLvl - 1;
				var currentRolls = 0;
				while (currentRolls < extraHealthRolls) {
					extraHealth += Math.floor(Math.random() * die) + 1;
					extraHealth += constituationModifier;
					currentRolls++;
					console.log('extraHealth = ' + extraHealth);
				} 
			}
			return extraHealth;
		}
		//Set XP based on character level.
		function calcXP(){
			if (pLvl == 1){
				eXP = 0;
			}
			else if (pLvl == 2){
				eXP = 300;
			}
			else if (pLvl == 3){
				eXP = 900;
			}
			else if (pLvl == 4){
				eXP = 2700;
			}
			else if (pLvl == 5){
				eXP = 6500;
			}
			else if (pLvl == 6){
				eXP = 14000;
			}
			else if (pLvl == 7){
				eXP = 23000;
			}
			else if (pLvl == 8){
				eXP = 34000;
			}
			else if (pLvl == 9){
				eXP = 48000;
			}
			else if (pLvl == 10){
				eXP = 64000;
			}
			else if (pLvl == 11){
				eXP = 85000;
			}
			else if (pLvl == 12){
				eXP = 100000;
			}
			else if (pLvl == 13){
				eXP = 120000;
			}
			else if (pLvl == 14){
				eXP = 140000;
			}
			else if (pLvl == 15){
				eXP = 165000;
			}
			else if (pLvl == 16){
				eXP = 195000;
			}
			else if (pLvl == 17){
				eXP = 225000;
			}
			else if (pLvl == 18){
				eXP = 265000;
			}
			else if (pLvl == 19){
				eXP = 305000;
			}
			else if (pLvl == 20){
				eXP = 355000;
			}
		}
		//Determine Proficiency Bonus Score Based on Player Level
		function setProficiencyBonus(){
			if (pLvl < 5){
				proficencyBonus = 2;
			}
			else if (pLvl < 13){
				proficencyBonus = 4;
			}
			else if (pLvl < 17){
				proficencyBonus = 5;
			}
			else{
				proficencyBonus = 6;
			}
		}
		//Calculate Saving throws based on ability modifier and add proficiency bonuses based on class.
		function calculateSavingThrows(){
			svThStr = sStrAM;
			svThDex = sDexAM;
			svThCon = sConAM;
			svThInt = sIntAM;
			svThWis = sWisAM;
			svThCha = sChaAM;
			
			if (myClass == "Barbarian" || myClass == "Fighter" || "Paladin"){
				svThStr += proficencyBonus;
				svThCon += proficencyBonus;
			}
			else if (myClass == "Monk"){
				svThDex += proficencyBonus;
				svThWis += proficencyBonus;
			}
			else if (myClass == "Rogue" || myClass == "Ranger" || myClass == "Bard"){
				svThDex += proficencyBonus;
				svThCha += proficencyBonus;
			}
			else if (myClass == "Cleric" || myClass == "Druid"){
				svThWis += proficencyBonus;
				svThCon += proficencyBonus;
			}
			else if (myClass == "Wizard" || myClass == "Sorcerer" || myClass == "Warlock"){
				svThWis += proficencyBonus;
				svThCon += proficencyBonus;
			}

		}
		//Set Background Based on Quiz Answers.
		function setBackground(){
			
			if (background1 == "circus"){
				myBackground = "Circus Performer";
			}
			else if (background1 == "royal"){
				myBackground = "Royal Blood";
			}
			else if (background1 == "gladiator"){
				myBackground = "Gladiator";
			}
			else if (background1 == "hermit"){
				myBackground = "Hermit";
			}
			else if (background1 == "pirate"){
				myBackground = "Pirate";
			}
			else if (background1 == "soldier"){
				myBackground = "Soldier";
			}
			else if (background1 == "criminal"){
				myBackground = "Criminal";
			}
			else if (background1 == "merchant"){
				myBackground = "Merchant";
			}
			else if (background1 == "spy"){
				myBackground = "Spy";
			}
		}
		//Set Alignment Based on Quiz Answers
		function setAlignment(){
			if (alignment1 == "alignment1Yes"){
				myAlignment = "Chaotic ";
			}
			else if (alignment1 == "alignment1No"){
				myAlignment = "Lawful ";
			}
			else if (alignment1 == "alignment1Maybe"){
				myAlignment = "Neutral ";
			}
			
			if (alignment2 == "alignment2Good"){
				myAlignment += "Good";
			}
			else if (alignment2 == "alignment2Neutral"){
				if (myAlignment == "Neutral "){
					myAlignment = "True Neutral";
				}
				else{
					myAlignment += "Neutral";
				}
			}
			else if (alignment2 == "alignment2Evil"){
				myAlignment += "Evil";
			}
		}
		//Set Species Based on Quiz Answers
		function setSpecies(){
			if (species2 == "chooseElf"){
				mySpecies = "Elf"
			}
			else if (species2 == "chooseDwarf"){
				mySpecies = "Dwarf"
			}
			else if (species2 == "chooseHalfling"){
				mySpecies = "Halfling"
			}
			else if (species2 == "chooseHuman"){
				mySpecies = "Human"
			}
			else if (species2 == "chooseBugBear"){
				mySpecies = "Bugbear"
			}
			else if (species2 == "chooseCentaur"){
				mySpecies = "Centaur"
			}
			else if (species2 == "chooseDragonborn"){
				mySpecies = "Dragonborn"
			}
			else if (species2 == "chooseHalforc"){
				mySpecies = "Half-orc"
			}
			else if (species2 == "chooseZombie"){
				mySpecies = "Zombie"
			}

		}
		//Set Class Based on Interests and Preferred Weapon Types
		function setClass(){
			if (interest1 == "interest1str"){
				if (preferredWeapon == "Two-Handed Sword"){
					myClass = "Barbarian";
				}
				else if (preferredWeapon == "Bastard Sword"){
					myClass = "Fighter";
				}
				else if (preferredWeapon == "Bo Staff"){
					myClass = "Monk";
				}
				else if (preferredWeapon == "Halbred"){
					myClass = "Fighter";
				}
				else if (preferredWeapon == "Throwing Knives"){
					myClass = "Rogue";
				}
				else if (preferredWeapon == "Spiked Mace"){
					myClass = "Cleric";
				}
				else if (preferredWeapon == "Cross Bow"){
					myClass = "Ranger";
				}
			}
			else if (interest1 == "interest1dex"){
				if (preferredWeapon == "Two-Handed Sword"){
					myClass = "Ranger";
				}
				else if (preferredWeapon == "Bastard Sword"){
					myClass = "Rogue";
				}
				else if (preferredWeapon == "Bo Staff"){
					myClass = "Monk";
				}
				else if (preferredWeapon == "Halbred"){
					myClass = "Fighter";
				}
				else if (preferredWeapon == "Throwing Knives"){
					myClass = "Rogue";
				}
				else if (preferredWeapon == "Spiked Mace"){
					myClass = "Cleric";
				}
				else if (preferredWeapon == "Cross Bow"){
					myClass = "Ranger";
				}
			}
			else if (interest1 == "interest1int"){
				if (preferredWeapon == "Two-Handed Sword"){
					myClass = "Paladin";
				}
				else if (preferredWeapon == "Bastard Sword"){
					myClass = "Rogue";
				}
				else if (preferredWeapon == "Bo Staff"){
					myClass = "Sorcerer";
				}
				else if (preferredWeapon == "Halbred"){
					myClass = "Cleric";
				}
				else if (preferredWeapon == "Throwing Knives"){
					myClass = "Monk";
				}
				else if (preferredWeapon == "Spiked Mace"){
					myClass = "Druid";
				}
				else if (preferredWeapon == "Cross Bow"){
					myClass = "Rogue";
				}
			}
			else if (interest1 == "interest1wis"){
				if (preferredWeapon == "Two-Handed Sword"){
					myClass = "Paladin";
				}
				else if (preferredWeapon == "Bastard Sword"){
					myClass = "Ranger";
				}
				else if (preferredWeapon == "Bo Staff"){
					myClass = "Warlock";
				}
				else if (preferredWeapon == "Halbred"){
					myClass = "Fighter";
				}
				else if (preferredWeapon == "Throwing Knives"){
					myClass = "Wizard";
				}
				else if (preferredWeapon == "Spiked Mace"){
					myClass = "Druid";
				}
				else if (preferredWeapon == "Cross Bow"){
					myClass = "Sorcerer";
				}
			}
			else if (interest1 == "interest1char"){
				if (preferredWeapon == "Two-Handed Sword"){
					myClass = "Fighter";
				}
				else if (preferredWeapon == "Bastard Sword"){
					myClass = "Bard";
				}
				else if (preferredWeapon == "Bo Staff"){
					myClass = "Wizard";
				}
				else if (preferredWeapon == "Halbred"){
					myClass = "Barbarian";
				}
				else if (preferredWeapon == "Throwing Knives"){
					myClass = "Bard";
				}
				else if (preferredWeapon == "Spiked Mace"){
					myClass = "Cleric";
				}
				else if (preferredWeapon == "Cross Bow"){
					myClass = "Bard";
				}
			}
		}
		//Used for slick transitions.
		function makeDivAppear(eID){
			if (document.getElementById(eID)){
				document.getElementById(eID).className = "visible";
			}
		}
		function makeDivDisappear(eID){
			document.getElementById(eID).className = "invisible";
		}
		//This function progresses the quiz at the start of the process.
		function next(){
			var curDiv = "q" + visibleDiv;
			var nextDivNum = visibleDiv +1;
			var nextDiv = "q" + nextDivNum;
			
			//Set Name on First Input
			if (visibleDiv == 1){
				if (document.getElementById('pName').value == "Character Name"){
					randomName();
				}
				document.getElementById('character-name').innerHTML = document.getElementById('pName').value;
			}
			
			//Set Species Questions
			if (visibleDiv == 7){
				setSpeciesPartTwoQ();
			}
			
			if (visibleDiv < lastQdiv){
				makeDivDisappear(curDiv);
				makeDivAppear(nextDiv);
				visibleDiv++;
				console.log('visibleDiv = ' + visibleDiv + " and lastQdiv = " + lastQdiv);
			}
			else{
				generateCharacter();
			}
			//document.getElementById('character-name').scrollIntoView();
			document.getElementById('character-name').scrollIntoView({
  				behavior: 'smooth'
			});
		}
		//Used to Fork Quiz based on response.
		function setSpeciesPartTwoQ(){
			var whichWay = document.querySelector('input[name="humanoidOrNot"]:checked').value;
			if (whichWay == 'humanoidNo'){
				document.getElementById('species-2-div').innerHTML = "<input type='radio' name='whichSpecies' value='chooseBugBear'  id='chooseBugBear' checked='checked'><label for='chooseBugBear'>Bugbear</label><input type='radio' name='whichSpecies' value='chooseCentaur'  id='chooseCentaur'><label for='chooseCentaur'>Centaur</label><input type='radio' name='whichSpecies' value='chooseDragonborn'  id='chooseDragonborn'><label for='chooseDragonborn'>Dragonborn</label><input type='radio' name='whichSpecies' value='chooseHalforc'  id='chooseHalforc'><label for='chooseHalforc'>Half-orc</label><input type='radio' name='whichSpecies' value='chooseZombie'  id='chooseZombie'><label for='chooseZombie'>Zombie</label>"; 
			}
			
		}
		//Generate a Random Name
		function randomName(){
			var ranPart1 = Math.floor(Math.random() * 17) + 1;
			var ranPart2 = Math.floor(Math.random() * 9) + 1;
			var ranPart3 = Math.floor(Math.random() * 7) + 1;
			
			var part1 = "";
			var part2 = "";
			var part3 = "";
			
			//First Part of Name
			if (ranPart1 == 1){
				part1 = "Tom";
			}
			else if (ranPart1 == 2){
				part1 = "Gor";
			}
			else if (ranPart1 == 3){
				part1 = "Sam";
			}
			else if (ranPart1 == 3){
				part1 = "Dor";
			}
			else if (ranPart1 == 4){
				part1 = "Ban";
			}
			else if (ranPart1 == 5){
				part1 = "Ar";
			}
			else if (ranPart1 == 6){
				part1 = "Bong";
			}
			else if (ranPart1 == 7){
				part1 = "Ram";
			}
			else if (ranPart1 == 8){
				part1 = "Pang";
			}
			else if (ranPart1 == 9){
				part1 = "Zap";
			}
			else if (ranPart1 == 10){
				part1 = "Jay";
			}
			else if (ranPart1 == 11){
				part1 = "Gar";
			}
			else if (ranPart1 == 12){
				part1 = "Quar";
			}
			else if (ranPart1 == 13){
				part1 = "Qyn";
			}
			else if (ranPart1 == 14){
				part1 = "Foon";
			}
			else if (ranPart1 == 15){
				part1 = "Flyn";
			}
			else if (ranPart1 == 16){
				part1 = "Van";
			}
			else if (ranPart1 == 17){
				part1 = "Von";
			}
			//Second Part of Name
			if (ranPart2 == 1){
				part2 = "lin";
			}
			else if (ranPart2 == 2){
				part2 = "an";
			}
			else if (ranPart2 == 3){
				part2 = "ing";
			}
			else if (ranPart2 == 4){
				part2 = "un";
			}
			else if (ranPart2 == 5){
				part2 = "on";
			}
			else if (ranPart2 == 6){
				part2 = "ort";
			}
			else if (ranPart2 == 7){
				part2 = "art";
			}
			else if (ranPart2 == 8){
				part2 = "ar";
			}
			else if (ranPart2 == 9){
				part2 = "er";
			}
			//Third Part of Name
			if (ranPart3 == 1 || ranPart3 == 7 ){
				part3 = "";
			}
			else if (ranPart3 == 2){
				part3 = "eus";
			}
			else if (ranPart3 == 3){
				part3 = "o";
			}
			else if (ranPart3 == 4){
				part3 = "ite";
			}
			else if (ranPart3 == 5){
				part3 = "ing";
			}
			else if (ranPart3 == 6){
				part3 = "ang";
			}
			//Put it all together
			var randomName = part1 + part2 + part3
			document.getElementById('pName').value = randomName;
		}
	</script>