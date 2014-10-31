<?php
	require_once 'dockingws.php'; // file tu sinh boi wsdl2php
	$mydockingws = new dockingws(); // Lop dockingws khai bao va cai dat trong dockingws.php
	$param = new getProjectInfoWaiting(1000); // Lop getProjectInfoWaiting dung de truyen tham so, o day la 1000
	$paramComplete = new getProjectInfoCompleted(1000); // Lop getProjectInfoWaiting dung de truyen tham so, o day la 1000
	$paramOutput = new getOutput(1000);
	$res = $mydockingws->getProjectInfoWaiting($param); // Goi ham getProjectInfoWaiting de chay webservice, ket qua tra ve res
	$resComplete = $mydockingws->getProjectInfoCompleted($paramComplete);
	$resOutput = $mydockingws->getOutput($paramOutput);
	// Luu y, res la doi tuong thuoc lop getProjectInfoWaitingResponse
	print ($resOutput->return); // In ket qua (hien tai tham so nao cung se tra ve ket qua gia la 10)
?>


