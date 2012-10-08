<?php
session_start();

?>
<script>
function selectMe(id){
	document.getElementById("card"+id).value=1;
	document.getElementById("td"+id).style.backgroundColor='#eee';
	document.getElementById("discard"+id).style.background="background-image: url('./images/trash.png') no-repeat";	
}

function IncreaseBet(val){
    var total = parseFloat(document.getElementById('bet').value);
	total += val;
	document.getElementById('bet').value = total;
}
</script>

<?php

//diamonds,clubs,hearts,spades

//Modulo 13 to get a value from a card
//Div 13 to get the suit of a card

require("class.Deck.php");
require("class.Poker.php");

$MyDeck = new Deck();
$MyDeck->Deal(5);
$Hand = $MyDeck->GetHand();
$_SESSION['Hand'] = $Hand;

if(isset($_POST['deal'])){
	echo"<pre>";
	print_r($_POST);
	$_SESSION['bet'] = $_POST['bet'];
	$_SESSION['Hand'] = $_POST['Hand'];
	print_r($_SESSION);
}
	echo"<pre>";
	print_r($_SESSION);
?>
<body>
<form action="index.php" method="post">
	<table>
	<tr>
	<?php
		for($i=0;$i<sizeof($Hand);$i++){
			echo"<td align=center id=\"td{$i}\"><img src=./images/{$Hand[$i]}.png onclick=\"selectMe({$i})\"><br><input type=checkbox name=Hand[] value={$Hand[$i]} checked></td>\n";
		}
	?>
	<td>Bet: <input type="text" name="bet" id="bet" value="0" size=3></td>
	</tr>
	<tr>
	<?php
		for($i=0;$i<sizeof($Hand);$i++){
			echo"<td align=center id=\"discard{$i}\" style=\"height:25px\"></td>\n";
		}
	?>
	</tr>
	<td></td>
	</table>
	<?php
	for($i=0;$i<5;$i++)
		echo'<input type="hidden" name="cards['.$i.']" id="card'.$i.'" value="0">'."\n";
	?>
	<input type="submit" name="deal" value="Deal">
	<table>
		<tr>
		<td><img src=./images/1dollar.png width=64 onclick="IncreaseBet(1);"></td>
		<td><img src=./images/5dollar.png width=64 onclick="IncreaseBet(5);"></td>
		<td><img src=./images/25dollar.png width=64 onclick="IncreaseBet(25);"></td>
		<td><img src=./images/100dollar.png width=64 onclick="IncreaseBet(100);"></td>
		<td><img src=./images/500dollar.png width=64 onclick="IncreaseBet(500);"></td>		
		</tr>
	</table>
</form>
</body>

