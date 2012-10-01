<?php

$dir = scandir("./original");

array_shift($dir);
array_shift($dir);

$values = array('d'=>1,'c'=>2,'h'=>3,'s'=>4,'j'=>11,'q'=>12,'k'=>13,'10'=>10,
				'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9);


echo"<pre>";

$dcount = 1;
$ccount = 14;
$hcount = 27;
$scount = 40;

foreach($dir as $file){
	$path_parts = pathinfo("./original/$file");
	if(trim($path_parts['extension']) == "png"){
		$letter = substr($file,0,1);
		if(!key_exists($letter,$values) || $path_parts['filename'] == 'jb' || $path_parts['filename'] == 'jr')
			continue;
		$new_name = substr($path_parts['filename'],1,10);
		echo $new_name."<br>";
		echo $values[$new_name]."<br>";
		switch($letter){
		case 'd':
			$value = $values[$new_name]*1;
			break;
		case 'c':
			$value = $values[$new_name]+14;
			break;
		case 'h':
			$value = $values[$new_name]+27;
			break;
		case 's':
			$value = $values[$new_name]+40;
		}
		exec("cp ./original/{$file} ./{$value}.png");
		echo"cp ./original/{$file} ./{$value}.png<br>";
	}
}