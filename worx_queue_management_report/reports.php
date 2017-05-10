<?php 

require 'classes/Connection.php';
require 'classes/ReportTypes.php';

$connection = Connection::make();

$tableToLoad;

if (isset($_GET['report_type'])) {
	$reportType = $_GET['report_type'];
	switch ($reportType) {
		case ReportTypes.PER_SERVICES:
			$tableToLoad = 'partials/report_tables/per_services.php';
			break;
		case ReportTypes.PER_COUNTER:
			$tableToLoad = 'partials/report_tables/per_counter.php';
			break;
		case ReportTypes.PER_CUSTOMER_CLASSIFICATION:
			$tableToLoad = 'partials/report_tables/per_customer_classification.php';
			break;
		default:
			$tableToLoad = 'partials/report_tables/per_services.php';
			break;
	}
}

$chartToLoad;

if (isset($_GET['report_type'])) {
	$reportType = $_GET['report_type'];
	switch ($reportType) {
		case ReportTypes.PER_SERVICES:
			$chartToLoad = 'partials/report_chart/per_services.php';
			break;
		case ReportTypes.PER_COUNTER:
			$chartToLoad = 'partials/report_chart/per_counter.php';
			break;
		case ReportTypes.PER_CUSTOMER_CLASSIFICATION:
			$chartToLoad = 'partials/report_chart/per_customer_classification.php';
			break;
		default:
			$chartToLoad = 'partials/report_chart/per_services.php';
			break;
	}
} else {
	require 'partials/report_chart/per_services.php';
}

require 'reports.view.php';