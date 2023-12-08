
<?php

$test=4;
$html='
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
	<style>
	*{text-align:center;}
	</style>
</head>
<body>	


	<h1>Generate HTML to PDF</h1>
	<table border="1" cellpadding="10" cellspacing="0" width="100%">
		<tr>
			<th>  </th>
			<th>Name</th>
			<th>Branch</th>
		</tr>
	</table>	
</body>
</html>';





require 'dompdf/autoload.inc.php';


use Dompdf\Dompdf;

$dompdf= new Dompdf();	



$tik ="
<p>  $test  </p>
";

$dompdf->loadHtml($tik );


$size = array(0,0,400,200);
// $dompdf->set_paper($size);
require_once 'mail/mail.php';  

 $dompdf->setPaper($size);

$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>0));


?>