<?php

//diamonds,clubs,hearts,spades

//Modulo 13 to get a value from a card
//Div 13 to get the suit of a card

require("class.Deck.php");

$MyDeck = new Deck();
$MyDeck->Deal(5);
$Hand = $MyDeck->GetHand();

if($_POST['deal']){
	echo"<pre>";
	print_r($_POST);
}

?>
<form action="index.php" method="post">
	<table>
	<?php
		for($i=0;$i<sizeof($Hand);$i++){
			echo"<td align=center><img src=./images/{$Hand[$i]}.png><br><input type=checkbox name=Hand[] value={$Hand[$i]} checked></td>";
		}
	?>
	</table>
	<input type="submit" name="deal" value="Deal">
</form>










print_r($Hand);

