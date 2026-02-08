<?php 
$st = $_POST['st'];
$en = $_POST['en'];
?>



<br>
<div class="row">
<div class="col-sm-3">
<b style="font-size:11px">Start Date: <?php echo $st; ?></b>
</div>
<div class="col-sm-3">
<b style="font-size:11px">End Date: <?php echo $en; ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Loan_Amount) AS overs FROM repayments WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Principal: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Interest_Amt) AS overs FROM repayments WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Interest: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Total_Bal) AS overs FROM repayments WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Outstanding: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Amount) AS overs FROM history WHERE Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Repayment Collection: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT COUNT(*) AS overs FROM repayments WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Record: <?php echo $over; ?></b>
</div>
</div>
<div class="tab-pane show active" id="pro-nav-home" role="tabpanel" aria-labelledby="pro-nav-home-tab">

<br>
<button type="button" class="btn btn-info btn-sm btn-flat" onclick="exportTableToExcel()">Download Data</button>
<script type="text/javascript">
function exportTableToExcel() {
const table = document.getElementById('demo1');
const rows = table.querySelectorAll('tr');
const data = [];
// Extract data from table
rows.forEach(row => {
const rowData = [];
const cells = row.querySelectorAll('th, td');
cells.forEach(cell => rowData.push(cell.textContent.trim()));
data.push(rowData);
});
// Create workbook and worksheet
const wb = XLSX.utils.book_new();
const ws = XLSX.utils.aoa_to_sheet(data);
XLSX.utils.book_append_sheet(wb, ws, "Data");
// Download
XLSX.writeFile(wb, "financial_report.xlsx");
}
</script>
<br><br>
<?php
include '../config/db.php';
$result = mysqli_query($con, "SELECT id, Loan_Account_No, BVN, Firstname, Middlename, Lastname, Gender, Branch, Loan_Amount, Interest_Amt, Monthly_Interest,
Expected_Amount, Total_Loan, Product, Duration, Paid, Total_Bal, Savings_Bal, Frequency, Team_Name,
(SELECT COALESCE(SUM(Amount), 0) FROM history WHERE Repayment_id = id AND Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en') AS `Rep`,
Officer_Name, Date_Disbursed, Maturity_Date FROM repayments 
WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en' ORDER BY Firstname ASC") or die("Bad Query.");
mysqli_close($con);

$results = array();
while($row = mysqli_fetch_assoc($result))
{
    $results[] = $row; 
}
$fp = fopen('../data/financial_report.json', 'w'); 
fwrite($fp, json_encode($results)); 
fclose($fp);
//echo json_encode($results);
?>
<div class="table-container" style="overflow: auto; height:300px">
<table style="font-size:9px" id="demo1">
<thead>
<th scope="col">LOAN ACCOUNT</th>
<th scope="col">BVN</th>
<th scope="col">NAME</th>
<th scope="col">GENDER</th>
<th scope="col">BRANCH</th>
<th scope="col">PRODUCT</th>
<th scope="col">PRINCIPAL AMT</th>
<th scope="col">INTEREST</th>
<th scope="col">TOTAL INTEREST</th>
<th scope="col">TOTAL LOAN</th>
<th scope="col">AMOUNT RECIEVED</th>
<th scope="col">LOAN OUTSTANDING</th>
<th scope="col">SAVING OUTSTANDING</th>
<th scope="col">EXPECTED REPAYMENT AMT</th>
<th scope="col">REPAYMENT %</th>
<th scope="col">TENURE</th>
<th scope="col">FREQUENCY</th>
<th scope="col">CREDIT OFFICER</th>
<th scope="col">TEAM LEADER</th>
<th scope="col">DATE DISBURSED</th>
<th scope="col">DATE DUE</th>
<tbody>
<?php
$url = '../data/financial_report.json';
$data = file_get_contents($url);
$json = json_decode($data);
foreach($json as $member){
?>
<tr>
<td class="sort border-top border-translucent ps-3"  ><?php echo $member->Loan_Account_No?></td>
<td class="sort border-top"><?php echo $member->BVN?></td>
<td class="sort border-top " style="text-transform:capitalize"><?php echo $member->Firstname." ".$member->Middlename." ".$member->Lastname?></td>
<td class="sort border-top "><?php echo $member->Gender?></td>
<td class="sort border-top "><?php echo $member->Branch?></td>
<td class="sort border-top"><?php echo $member->Product?></td>
<td class="sort border-top"><?php echo number_format($member->Loan_Amount,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Monthly_Interest,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Interest_Amt,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Total_Loan,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Paid,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Total_Bal,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Savings_Bal,2)?></td>
<td class="sort border-top"><?php echo number_format($member->Expected_Amount,2)?></td>
<td class="sort border-top"><?php echo round(($member->Paid/$member->Total_Loan) * 100) ?>%</td>
<td class="sort border-top"><?php echo $member->Duration?></td>
<td class="sort border-top"><?php echo $member->Frequency?></td>
<td class="sort border-top"><?php echo $member->Officer_Name?></td>
<td class="sort border-top"><?php echo $member->Team_Name?></td>
<td class="sort border-top"><?php echo $member->Date_Disbursed?></td>
<td class="sort border-top"><?php echo $member->Maturity_Date?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>







