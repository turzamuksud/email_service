<?php
$send=mail('turza.muksud.cse@ulab.edu.bd','test','successful','From:turzamuksud@gmail.com');
if ($send) {
	echo "Done..";
}
else
{
	echo "Failed..";
}
?>