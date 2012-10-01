<?php

class Deck{
	var $Cards;
	var $CardImageDir;
	var $Suits;
	var $Hand;
	var $IsDealt;
	
	public function __construct(){
		$this->Cards = array();
		for($i=1;$i<=52;$i++)
			$this->Cards[$i] = 0;
		
		$this->Hand = array();
		
		
		$this->CardImageDir = "./images";
		$this->Suits = array('0'=>'Diamonds','1'=>'Clubs','2'=>'Hearts','3'=>'Spades');
		$this->IsDealt = 0;		
	}
	
	private function GetSuit($val){
		return $this->Suits[floor($val/13)];
	}
	
	private function GetValue($val){
		return ($val%13)-1;
	}
	
	public function Deal($Number=5){
		for($count=0;$count < $Number;){
			$random = (rand()%52)+1;
			if(!$this->Cards[$random]){
				$this->Cards[$random]=1;
				$this->Hand[] = $random;
				$count++;
			}
		}
		$this->IsDealt = 1;
	}
	
	public function GetHand(){
		if($this->IsDealt){
			return $this->Hand;
		}
	}
	
	//Debugging purposes only
	private function PrintCard($val){
		echo"<img src={$this->CardImageDir}/{$val}.png>";
	}
	
	//Debugging purposes only
	public function PrintHand(){
		for($i=1;$i<=52;$i++){
			if($this->Cards[$i]==1)
				echo"<img src={$this->CardImageDir}/{$i}.png>";
		}
	}
	
	
}

