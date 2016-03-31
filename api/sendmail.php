<?php

	$strTo = "teerakorn.a@gmail.com";
	$strSubject = "Testing send mail";
	$strHeader = "From: mochu@teerakon.me";
	$strMessage = "Helloooo from Mochu";
	$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);
	if($flgSend) {
		echo "Mail sending.";
	}
	else {
		echo "Mail cannot send.";
	}


?>