<?php
/*Color*/
$green = "\033[92m";
$red = "\033[91m";
$cyan = "\033[36m";
$yellow = "\033[93m";
$bold = "\033[5m";
$white = "\033[0m";
/*Form*/
$date   = date('d-M-Y H:i');
//system("clear");
echo $yellow . "
oooooooooo ooooo ooooo  oooooooo8  
 888    888 888   888  888         
 888oooo88  888ooo888   888oooooo  
 888    888 888   888          888 
o888ooo888 o888o o888o o88oooo888                                    
";
echo $red . "==================================";
echo $bold . $green . "\nCoder   : ./Mr.Java404
Team    : BlackHole Security
Code    : PHP
Version : 0.1.2.3
Greet'z : Cvar1984 < > v!3wstr1ng\n";
echo $bold . $green . "DMYH    : $date\n";
echo $red . "==================================\n";
echo $bold . $cyan . "Count      : ";
$count = trim(fgets(STDIN,1024));
echo $bold . $cyan . "Delay      : ";
$sleep = trim(fgets(STDIN,1024));
for($x = 0; $x < $count; $x++){
$str = file_get_contents("http://namegenerators.org/fake-name-generator-us/");
$var = '/<div class="col2">(.*?)<\/div>/s';
preg_match_all($var, $str, $matches);
echo $red . "\n===============INFO===============\n";
echo $bold . $cyan . "[name : ".str_replace("</span>", "", str_replace('<span class="name">', "", $matches[1][3]))."]".
		" [address : ".$matches[1][8]."]".
		" [phone : ".$matches[1][9]."]\n";
echo $red . "================CC================\n";
echo $bold . $cyan . "[email : ".$matches[1][10]."]".
		" [card number : ".str_replace(" ", "", $matches[1][14])."]".
		" [cvv : ".$matches[1][16]."]".
		" [exp-date : ".$matches[1][15]."]\n";
	sleep($sleep);
}
?>
