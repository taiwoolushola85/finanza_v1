<?php 
$st = $_POST['st'];
$en = $_POST['en'];
$type = $_POST['type'];
?>



<?php 
if($type == 1){
// disbursement profit
?>



<div class="bd-example">
<nav>

</div>
</nav>
<div class="tab-content iq-tab-fade-up" id="simple-tab-content">
<?php 
$st = $_POST['st'];
$en = $_POST['en'];
?>


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
$sql = "SELECT SUM(Loan_Amount) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
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
$sql = "SELECT SUM(Upfront) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Upfront Fee: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Inssurance) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Inssurance Fee: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Card) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Card Fee: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Form) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Form Fee: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT COUNT(*) AS overs FROM product WHERE Status = 'Activated'";
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
XLSX.writeFile(wb, "disbursement_profit_analysis_report.xlsx");
}
</script>
<br><br>
<?php
include '../config/db.php';
$result = mysqli_query($con, "SELECT id, Product_Name,
(SELECT COALESCE(SUM(Loan_Amount), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `principal`,
(SELECT COALESCE(SUM(Upfront), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en' ) AS `up`,
(SELECT COALESCE(SUM(Inssurance), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en' ) AS `in`,
(SELECT COALESCE(SUM(Form), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en' ) AS `card`,
(SELECT COALESCE(SUM(Card), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en' ) AS `form`,
(SELECT COALESCE(COUNT(*), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `Count`
FROM product WHERE Status = 'Activated' ORDER BY Product_Name ASC") or die("Bad Query.");
mysqli_close($con);

$results = array();
while($row = mysqli_fetch_assoc($result)){
    $results[] = $row; 
}
$fp = fopen('../data/product_analysis.json', 'w'); 
fwrite($fp, json_encode($results)); 
fclose($fp);
//echo json_encode($results);
?>
<div class="table-container" style="overflow: auto; height:300px">
<table  style="font-size:9px" id="demo1">
<thead>
<th scope="col">PRODUCT</th>
<th scope="col">PRINCIPAL AMT</th>
<th scope="col">UPFRONT FEE</th>
<th scope="col">INSSURANCE</th>
<th scope="col">CARD</th>
<th scope="col">FORM</th>
<th scope="col">COUNT</th>
<tbody>
<?php
$url = '../data/product_analysis.json';
$data = file_get_contents($url);
$json = json_decode($data);
foreach($json as $member){
?>
<tr>
<td class="sort border-top"><?php echo $member->Product_Name?></td>
<td class="sort border-top"><?php echo number_format($member->principal,2)?></td>
<td class="sort border-top"><?php echo number_format($member->up,2)?></td>
<td class="sort border-top"><?php echo number_format($member->in,2)?></td>
<td class="sort border-top"><?php echo number_format($member->card,2)?></td>
<td class="sort border-top"><?php echo number_format($member->form,2)?></td>
<td class="sort border-top "><?php echo $member->Count?></td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>






















<?php 
}else if($type == 2){
// repayment profit
?>


<div class="bd-example">
<nav>
<div class="mb-3 nav nav-tabs nav-iconly gap-3" id="nav-tab" role="tablist">
<button class="nav-link active" id="pro-nav-home-tab" data-bs-toggle="tab" data-bs-target="#pro-nav-home" type="button" role="tab" aria-controls="pro-nav-home" aria-selected="true">
Loan Profit Summary
</button>
<button class="nav-link" id="pro-nav-profile-tab" data-bs-toggle="tab" data-bs-target="#pro-nav-profile" type="button" role="tab" aria-controls="pro-nav-profile" aria-selected="false">
Flexi Profit Summary
</button>
</div>
</nav>
<div class="tab-content iq-tab-fade-up" id="simple-tab-content">
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
$sql = "SELECT SUM(Loan_Amount) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
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
$sql = "SELECT SUM(Interest_Amt) AS overs FROM register WHERE Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en'";
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
$sql = "SELECT SUM(Monthly_Interest) AS overs FROM history WHERE Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Earned Interest: <?php echo number_format($over,2); ?></b>
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
<b style="font-size:11px">Total Repayment Collections: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Amount) AS overs FROM flexi_history WHERE Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Flexi Saving Collections: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT COUNT(*) AS overs FROM product WHERE Status = 'Activated'";
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
XLSX.writeFile(wb, "repayment_profit_analysis_report.xlsx");
}
</script>
<br><br>
<?php
include '../config/db.php';
$result = mysqli_query($con, "SELECT id, Product_Name, Tenure,
(SELECT COALESCE(SUM(Loan_Amount), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `principal`,
(SELECT COALESCE(SUM(Interest_Amt), 0) FROM register WHERE Product = Product_Name AND Status != 'Cancelled' AND Date_Disbursed BETWEEN '$st' AND '$en' ) AS `int`,
(SELECT COALESCE(SUM(Monthly_Interest), 0) FROM history WHERE Loan_Type = Product_Name AND Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en' ) AS `month`,
(SELECT COALESCE(SUM(Savings), 0) FROM save WHERE Loan_Type = Product_Name AND Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en' ) AS `sav`,
(SELECT COALESCE(SUM(Amount), 0) FROM history WHERE Loan_Type = Product_Name AND Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en' ) AS `mandate`,
(SELECT COALESCE(SUM(Amount_Withdraw), 0) FROM withdraw WHERE Product = Product_Name AND Status = 'Paid' AND Date_Approved BETWEEN '$st' AND '$en' ) AS `wit`
FROM product WHERE Status = 'Activated'  ORDER BY Product_Name ASC") or die("Bad Query.");
mysqli_close($con);

$results = array();
while($row = mysqli_fetch_assoc($result)){
    $results[] = $row; 
}
$fp = fopen('../data/products_analysis.json', 'w'); 
fwrite($fp, json_encode($results)); 
fclose($fp);
//echo json_encode($results);
?>
<div class="table-container" style="overflow: auto; height:300px">
<table style="font-size:9px" id="demo1">
<thead>
<th scope="col">PRODUCT</th>
<th scope="col">PRINCIPAL AMT</th>
<th scope="col">EXPECTED INTEREST</th>
<th scope="col">INTEREST EARNED</th>
<th scope="col">REPAYMENT COLLECTION</th>
<th scope="col">SAVINGS COLLECTION</th>
<th scope="col">SAVINGS WITHRAWAL</th>
<tbody>
<?php
$url = '../data/products_analysis.json';
$data = file_get_contents($url);
$json = json_decode($data);
foreach($json as $member){
?>
<tr>
<td class="sort border-top"><?php echo $member->Product_Name?></td>
<td class="sort border-top"><?php echo number_format($member->principal,2)?></td>
<td class="sort border-top"><?php echo number_format($member->int,2)?></td>
<td class="sort border-top"><?php echo number_format($member->month,2)?></td>
<td class="sort border-top"><?php echo number_format($member->mandate,2)?></td>
<td class="sort border-top"><?php echo number_format($member->sav,2)?></td>
<td class="sort border-top"><?php echo number_format($member->wit,2)?></td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>

<div class="tab-pane" id="pro-nav-profile" role="tabpanel" aria-labelledby="pro-nav-profile-tab">
<br>
<button type="button" class="btn btn-info btn-sm btn-flat" onclick="exportTableToExcel()">Download Data</button>
<script type="text/javascript">
function exportTableToExcel() {
const table = document.getElementById('demo2');
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
XLSX.writeFile(wb, "flexi_profit_analysis_report.xlsx");
}
</script>
<br><br>


<?php
include '../config/db.php';
$result = mysqli_query($con, "SELECT id, Name, Duration,
(SELECT COALESCE(SUM(Deposit_Amt), 0) FROM flexi_account WHERE Plan = Name AND Date_Start BETWEEN '$st' AND '$en') AS `principal`,
(SELECT COALESCE(SUM(Withdraw_Amt), 0) FROM flexi_account WHERE Plan = Name AND Date_Start BETWEEN '$st' AND '$en') AS `wit`,
(SELECT COALESCE(SUM(Total_Bal), 0) FROM flexi_account WHERE Plan = Name AND Date_Start BETWEEN '$st' AND '$en') AS `bal`
FROM flexi WHERE Status = 'Activated' ORDER BY Name ASC") or die("Bad Query.");
mysqli_close($con);

$results = array();
while($row = mysqli_fetch_assoc($result)){
    $results[] = $row; 
}
$fp = fopen('../data/flexi_products_analysis.json', 'w'); 
fwrite($fp, json_encode($results)); 
fclose($fp);
//echo json_encode($results);
?>
<div class="table-container" style="overflow: auto; height:300px">
<table style="font-size:9px" id="demo2">
<thead>
<th scope="col">PRODUCT</th>
<th scope="col">DURATION</th>
<th scope="col">DEPOSIT AMT</th>
<th scope="col">WITHDRAW AMT</th>
<th scope="col">TOTAL BALANCE</th>
<tbody>
<?php
$url = '../data/flexi_products_analysis.json';
$data = file_get_contents($url);
$json = json_decode($data);
foreach($json as $member){
?>
<tr>
<td class="sort border-top"><?php echo $member->Name?></td>
<td class="sort border-top "><?php echo $member->Duration?></td>
<td class="sort border-top"><?php echo number_format($member->principal,2)?></td>
<td class="sort border-top"><?php echo number_format($member->wit,2)?></td>
<td class="sort border-top"><?php echo number_format($member->bal,2)?></td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>
















<?php 
}else{
// expenses profit
?>




<div class="bd-example">
<nav>
<div class="mb-3 nav nav-tabs nav-iconly gap-3" id="nav-tab" role="tablist">
<button class="nav-link active" id="pro-nav-home-tab" data-bs-toggle="tab" data-bs-target="#pro-nav-home" type="button" role="tab" aria-controls="pro-nav-home" aria-selected="true">
Income Summary
</button>
<button class="nav-link" id="pro-nav-profile-tab" data-bs-toggle="tab" data-bs-target="#pro-nav-profile" type="button" role="tab" aria-controls="pro-nav-profile" aria-selected="false">
Expenses Summary
</button>
</div>
</nav>
<div class="tab-content iq-tab-fade-up" id="simple-tab-content">
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
$sql = "SELECT SUM(Credit) AS overs FROM expense WHERE Exp_Date BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Income: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT SUM(Debit) AS overs FROM expense WHERE Exp_Date BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Expense: <?php echo number_format($over,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
// monthly loan interest
$sql = "SELECT SUM(Monthly_Interest) AS overs FROM history WHERE Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$monthly_int = $data['overs'];
//account maintenance fee
$sql = "SELECT SUM(Upfront) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$mandate = $data['overs'];
// management fee
$sql = "SELECT SUM(Inssurance) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$management_fee = $data['overs'];
//upfront fee
$sql = "SELECT SUM(Card) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$upfront = $data['overs'];
// sme loan upfront
$sql = "SELECT SUM(Form) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$sme_upfront = $data['overs'];
//
$total = $monthly_int + $mandate + $management_fee + $upfront + $sme_upfront;
?>
<b style="font-size:11px">Total Gross Profit: <?php echo number_format($total,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
// total expenses
$sql = "SELECT SUM(Debit) AS overs FROM expense WHERE Exp_Date BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$expenes = $data['overs'];
// monthly loan interest
$sql = "SELECT SUM(Monthly_Interest) AS overs FROM history WHERE Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$monthly_int = $data['overs'];
//account maintenance fee
$sql = "SELECT SUM(Upfront) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$mandate = $data['overs'];
// management fee
$sql = "SELECT SUM(Inssurance) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$management_fee = $data['overs'];
//upfront fee
$sql = "SELECT SUM(Card) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$upfront = $data['overs'];
// sme loan upfront
$sql = "SELECT SUM(Form) AS overs FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en'";
$result=mysqli_query($con, $sql);
$data=mysqli_fetch_assoc($result);
$sme_upfront = $data['overs'];
//
$total = $monthly_int + $mandate + $management_fee + $upfront + $sme_upfront;
$pl = $total - $expenes;
?>
<b style="font-size:11px">Profit/Loss: <?php echo number_format($pl,2); ?></b>
</div>
<div class="col-sm-3">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$sql = "SELECT COUNT(*) AS overs FROM expense_title";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
$over = $data['overs'];
?>
<b style="font-size:11px">Total Record: <?php echo $over; ?></b>
</div>
</div>
<br>
<div class="tab-pane show active" id="pro-nav-home" role="tabpanel" aria-labelledby="pro-nav-home-tab">

<br>
<button type="button" class="btn btn-info btn-sm btn-flat" onclick="exportTableToExcel()">Download Data</button>
<script type="text/javascript">
function exportTableToExcel() {
const table = document.getElementById('demo3');
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
XLSX.writeFile(wb, "profit_&_loss_analysis_report.xlsx");
}
</script>
<br><br>


<?php
include '../config/db.php';
$result = mysqli_query($con, "SELECT id, Title, GL_Code,
(SELECT COALESCE(SUM(Monthly_Interest), 0) FROM history WHERE Status = 'Paid' AND Date_Paid BETWEEN '$st' AND '$en') AS `amt`,
(SELECT COALESCE(SUM(Upfront), 0) FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `main`,
(SELECT COALESCE(SUM(Inssurance), 0) FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `man`,
(SELECT COALESCE(SUM(Card), 0) FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `upf`,
(SELECT COALESCE(SUM(Form), 0) FROM register WHERE Status = 'Disbursed' AND Date_Disbursed BETWEEN '$st' AND '$en') AS `sme_upf`
FROM expense_title ORDER BY Title ASC") or die("Bad Query.");
mysqli_close($con);

$results = array();
while($row = mysqli_fetch_assoc($result)){
    $results[] = $row; 
}
$fp = fopen('../data/analysis.json', 'w'); 
fwrite($fp, json_encode($results)); 
fclose($fp);
//echo json_encode($results);
?>

<div class="table-container" style="overflow: auto; height:300px">
<table style="font-size:9px" id="demo3">
<thead>
<th scope="col">LOAN INTEREST EARNED</th>
<th scope="col">UPFRONT FEE</th>
<th scope="col">INSSURANCE FEE</th>
<th scope="col">CARD</th>
<th scope="col">FORM</th>
<tbody>
<?php
$url = '../data/analysis.json';
$data = file_get_contents($url);
$json = json_decode($data);
foreach($json as $member){
?>
<tr>
<td class="sort border-top"><?php echo number_format($member->amt,2)?></td>
<td class="sort border-top "><?php echo number_format($member->main,2)?></td>
<td class="sort border-top "><?php echo number_format($member->man,2)?></td>
<td class="sort border-top"><?php echo number_format($member->upf,2)?></td>
<td class="sort border-top"><?php echo number_format($member->sme_upf,2)?></td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>
<div class="tab-pane" id="pro-nav-profile" role="tabpanel" aria-labelledby="pro-nav-profile-tab">
<br>
<button type="button" class="btn btn-info btn-sm btn-flat" onclick="exportTableToExcel()">Download Data</button>
<script type="text/javascript">
function exportTableToExcel() {
const table = document.getElementById('demo2');
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
XLSX.writeFile(wb, "expense_analysis_report.xlsx");
}
</script>
<br><br>


<?php
include '../config/db.php';
$result = mysqli_query($con, "SELECT id, Title, GL_Code,
(SELECT COALESCE(SUM(Debit), 0) FROM expense WHERE GL_No = GL_Code AND Exp_Date BETWEEN '$st' AND '$en') AS `amt`
FROM expense_title ORDER BY Title ASC") or die("Bad Query.");
mysqli_close($con);

$results = array();
while($row = mysqli_fetch_assoc($result)){
    $results[] = $row; 
}
$fp = fopen('../data/expense_analysis.json', 'w'); 
fwrite($fp, json_encode($results)); 
fclose($fp);
//echo json_encode($results);
?>
<div class="table-container" style="overflow: auto; height:300px">
<table class="table table-bordered table-sm" style="font-size:9px" id="demo2">
<thead>
<th scope="col">ID</th>
<th scope="col">GL CODE</th>
<th scope="col">EXPENSES TITLE</th>
<th scope="col">TOTAL AMOUNT</th>
<tbody>
<?php
$url = '../data/expense_analysis.json';
$data = file_get_contents($url);
$json = json_decode($data);
foreach($json as $member){
?>
<tr>
<td class="sort border-top"><?php echo $member->id?></td>
<td class="sort border-top "><?php echo $member->GL_Code?></td>
<td class="sort border-top "><?php echo $member->Title?></td>
<td class="sort border-top"><?php echo number_format($member->amt,2)?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>










<?php 
}
?>
