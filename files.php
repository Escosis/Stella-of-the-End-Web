<?php

function Crowl($directory)
{
	$currentDirectory = opendir($directory);

	for(;;){
		$fileName = readdir($currentDirectory);
		$filePath = $directory . "/" . $fileName;

		if($fileName === false) break;

		if(!is_file($filePath)){
			// ディレクトリ
			if(($fileName != ".") && ($fileName != "..")) Crowl($filePath);
			continue;
		}
		if($fileName == basename($_SERVER["PHP_SELF"])) continue;

		echo $filePath . "\n";
	}
}
Crowl(".");

?>
