<?php
$command = escapeshellcmd('C:\Users\fahri\AppData\Local\Programs\Python\Python37 C:\AppServ\www\eticaret\heybebot\app.py');
$output = shell_exec($command);
echo $output;
?>