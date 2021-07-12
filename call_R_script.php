<?php 

$input = "'W176564'";

$output = shell_exec("C:\Program Files\R\R-4.1.0\bin\x64\Rscript.exe api_base_historique.R {$input}");

echo $output;

?>