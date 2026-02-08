<?php
$type = $_POST['type'];
if($type == '1'){
include 'financial_report_page.php';
}else if($type == '2'){
include 'profit_analysis_report.php';
}
?>