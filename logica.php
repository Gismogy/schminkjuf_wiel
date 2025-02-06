<?php

require_once("./vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\IOFactory;

if (!isset($_SESSION["aNames"]) || file_exists("./files/reset.txt")) {

	$inputFileType = 'Xlsx';

// Facebook Data
	$inputFileName = './files/facebook.xlsx';
	$spreadsheet = IOFactory::load($inputFileName);
	$sheet = $spreadsheet->getActiveSheet();

	$i = 0;
	$facebookData = [];
	$facebookNames = [];
	$facebookDuplicants = [];

	foreach ($sheet->getRowIterator() as $key => $row) {
		if ($i === 0) {
			$i++;
			continue;
		} // Skip the first row (header)
		$rowData = [];

		foreach ($row->getCellIterator() as $keys => $cell) {
			$rowData[] = $cell->getValue();
		}

		if (!isset($facebookNames[$rowData[1]])) {
			$facebookNames[$rowData[1]] = $rowData[1];
		} else {
			$facebookDuplicants[] = htmlspecialchars($rowData[1]);
		}

		$facebookData[] = $rowData;
	}

// Instagram Data
	$inputFileName = './files/instagram.xlsx';
	$spreadsheet = IOFactory::load($inputFileName);
	$sheet = $spreadsheet->getActiveSheet();

	$i = 0;
	$instagramData = [];
	$instagramNames = [];
	$instagramDuplicants = [];

	foreach ($sheet->getRowIterator() as $key => $row) {
		if ($i === 0) {
			$i++;
			continue;
		} // Skip the first row (header)
		$rowData = [];

		foreach ($row->getCellIterator() as $keys => $cell) {
			$rowData[] = $cell->getValue();
		}

		if (!isset($instagramNames[$rowData[2]])) {
			$instagramNames[$rowData[2]] = $rowData[2];
		} else {
			$instagramDuplicants[] = htmlspecialchars($rowData[2]);
		}

		$instagramData[] = $rowData;

	}


// sessions
	$instagramData = [];
	$instagramNames = [];
	$instagramDuplicants = [];

	$_SESSION["iNames"] = $instagramNames;
	$_SESSION["fNames"] = $facebookNames;
	$_SESSION["aNames"] = array_merge($instagramNames, $facebookNames);
	if(file_exists("./files/reset.txt")){
		unlink("./files/reset.txt");
	}
}