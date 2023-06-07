<?php
	//Grab FPDF Library
	require('../../ceptor-club/fpdf185/fpdf.php');
	//Grab Fonts
	require('../../ceptor-club/fpdf185/font/courier.php');
	require('../../ceptor-club/fpdf185/font/courierb.php');
	require('../../ceptor-club/fpdf185/font/courierbi.php');
	require('../../ceptor-club/fpdf185/font/courieri.php');
	
	//Grab Variables
	$characterName = $_POST["characterName"];
	$myAlignment = $_POST["myAlignment"];
	$myClass = $_POST["myClass"];
	$mySpecies = $_POST["mySpecies"];
	$myBackground = $_POST["myBackground"];
	$characterDescription = $_POST["characterDescription"];
	$myLvl = $_POST['myLvl'];
	$myXP = $_POST['myXP'];
	$myProficiencyBonus = $_POST['myProficiencyBonus'];
	$hitPoints = $_POST['hitPoints'];
	
	//Stats and Ability Modifiers
	$sStr = $_POST['sStr'];
	$sDex = $_POST['sDex'];
	$sCon = $_POST['sCon'];
	$sInt = $_POST['sInt'];
	$sWis = $_POST['sWis'];
	$sCha = $_POST['sCha'];
	$sStrAM = $_POST['sStrAM'];
	$sDexAM = $_POST['sDexAM'];
	$sConAM = $_POST['sConAM'];
	$sIntAM = $_POST['sIntAM'];
	$sWisAM = $_POST['sWisAM'];
	$sChaAM = $_POST['sChaAM'];
	
	$passiveWisdom = $sWis + $sWisAM;
	
	//Saving Throws
	$svThStr = $_POST['svThStr'];
	$svThDex = $_POST['svThDex'];
	$svThCon = $_POST['svThCon'];
	$svThInt = $_POST['svThInt'];
	$svThWis = $_POST['svThWis'];
	$svThCha = $_POST['svThCha'];
	
	//Skills
	$skAcro = $_POST['skAcro'];
	$skAnHn = $_POST['skAnHn'];
	$skArc = $_POST['skArc'];
	$skAth = $_POST['skAth'];
	$skDec = $_POST['skDec'];
	$skHis = $_POST['skHis'];
	$skIns = $_POST['skIns'];
	$skInti = $_POST['skInti'];
	$skInv = $_POST['skInv'];
	$skMed = $_POST['skMed'];
	$skNat = $_POST['skNat'];
	$skPer = $_POST['skPer'];
	$skPerf = $_POST['skPerf'];
	$skPers = $_POST['skPers'];
	$skRel = $_POST['skRel'];
	$skSli = $_POST['skSli'];
	$skSte = $_POST['skSte'];
	$skSur = $_POST['skSur'];
	
	
	

	$pdf = new FPDF('P','pt','A4');
	$pdf->AddPage();
	$pdf->Image("character-sheet-img.jpg" , 10, 10, 580);

	//$pdf->Text(360,72, 'Name: ' . $name);

	//Name
	$pdf->SetFont('Courier','B',12);
	$pdf->Text(62,116, $characterName);

	//Class
	$pdf->SetFont('Courier','B',11);
	$pdf->Text(202,86, $myClass);

	//Background
	$pdf->Text(290,86, $myBackground);

	//Race
	$pdf->Text(202,115, $mySpecies);

	//Alignment
	$pdf->Text(290,115, $myAlignment);
	
	//XP
	$pdf->Text(410,115, $myXP);
	
	//Stats
	$pdf->SetFont('Courier','B',14);
	$pdf->Text(43,200, $sStr);	
	$pdf->Text(43,270, $sDex);
	$pdf->Text(43,340, $sCon);
	$pdf->Text(43,415, $sInt);
	$pdf->Text(43,485, $sWis);
	$pdf->Text(43,555, $sCha);
	
	//Ability Modifiers
	$pdf->SetFont('Courier','B',12);
	$pdf->Text(47,222, $sStrAM);
	$pdf->Text(47,293, $sDexAM);
	$pdf->Text(47,365, $sConAM);
	$pdf->Text(47,437, $sIntAM);
	$pdf->Text(47,509, $sWisAM);
	$pdf->Text(47,580, $sChaAM);
	
	//Proficiency Bonus
	$pdf->Text(97,205, $myProficiencyBonus);
	//Passive Wisdom
	$pdf->Text(29,630, $passiveWisdom);
	
	//Saving THrows
	$pdf->SetFont('Courier','',10);
	$pdf->Text(111,237, $svThStr);
	$pdf->Text(111,251, $svThDex);
	$pdf->Text(111,265, $svThCon);
	$pdf->Text(111,278, $svThInt);
	$pdf->Text(111,291, $svThWis);
	$pdf->Text(111,304, $svThCha);
	
	//Skills
	$pdf->Text(111,352, $skAcro);
	$pdf->Text(111,366, $skAnHn);
	$pdf->Text(111,380, $skArc);
	$pdf->Text(111,394, $skAth);
	$pdf->Text(111,408, $skDec);
	$pdf->Text(111,421, $skHis);
	$pdf->Text(111,435, $skIns);
	$pdf->Text(111,448, $skInti);
	$pdf->Text(111,462, $skInv);
	$pdf->Text(111,475, $skMed);
	$pdf->Text(111,489, $skNat);
	$pdf->Text(111,502, $skPer);
	$pdf->Text(111,516, $skPerf);
	$pdf->Text(111,530, $skPers);
	$pdf->Text(111,543, $skRel);
	$pdf->Text(111,557, $skSli);
	$pdf->Text(111,570, $skSte);
	$pdf->Text(111,584, $skSur);

	//HP
	$pdf->SetFont('Courier','B',13);
	$pdf->Text(478,164, $hitPoints);
	
	//Character Description
	$pdf->SetXY(460, 416);
	$pdf->SetFont('Courier','',10);
	$pdf->MultiCell(118, 13, $characterDescription, ", ",0);
	
	$pdf->Output();
	

?>