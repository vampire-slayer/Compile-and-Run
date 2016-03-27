<?php
include 'head.php';
if(isset($_POST['code']))
{ 
	$fh = fopen("c:/mingw/bin/1.c", 'w'); 
	fwrite($fh, $_POST['code']); 
	fclose($fh);
	$output=system("c:/mingw/bin/gcc.exe c:/mingw/bin/1.c 2>&1");
	if($output!="")
	{
		echo "<br><b>Errors detected!</b><br>";
		echo "$output";
	}
	else
	{
		echo "Congratulations! Compilation successful. No errors in code. Executing the code....<br>";
		system("c:/mingw/bin/gcc.exe c:/mingw/bin/1.c -o1.exe");
		$fg = fopen("inp.txt", 'w'); 
		fwrite($fg, $_POST['input']); 
		fclose($fg);
		system("1.exe <inp.txt >inp1.txt");
		$fk = fopen("inp1.txt", 'r'); 
		$pp=fread($fk,filesize("inp1.txt"));
		echo "<br><br><b><u>Output</u></b><br>";
		echo "$pp";
	}
}
else
{
	echo "Empty code.";
}
echo "<br><br><a href='home.html'>Click here to go back to the previous page!</a>";
?>