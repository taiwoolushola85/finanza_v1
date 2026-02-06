<!-- Left Sidebar End -->
<div class="sidebar-backdrop" id="sidebar-backdrop"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
<div class="container-fluid">
<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-flex align-items-center justify-content-between">
<h3 class="mb-sm-0">Dashboard</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>



<div class="row">
<div class="col-sm-8">


<div class="row">
<div class="col-sm-6">

<div class="card shadow-sm border-0">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-6">
<div>
<h6 class="mb-3 text-primary" style="font-size:14px;">Active Clients</h6>
<br>
</div>
<div class="position-relative d-inline-block avatar-progress progress-100">
<svg class="position-absolute top-0 start-0 progress-svg">
</svg>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor" />
</svg>
</a>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT COUNT(*) FROM repayments WHERE Status = 'Active' AND User = '$User'");
$row = mysqli_fetch_array($result);
$total = $row[0];
?>
<h4 class="mb-0 fw-medium" style="font-size:17px;"><b>Total:</b> <span><?php echo $total; ?></span> 
</span></h4>
</div>
</div>
</div>


</div>
<div class="col-sm-6">

<div class="card shadow-sm border-0">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-6">
<div>
<h6 class="mb-3 text-primary" style="font-size:14px;">Portfolio</h6>
<br>
</div>
<div class="position-relative d-inline-block avatar-progress progress-75">
<svg class="position-absolute top-0 start-0 progress-svg">
</svg>
<div class="avatar size-11 avatar-label-info avatar-circle">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-star" style="font-size:28px;"></i>
</a>
</div>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE Status != 'Cancelled' AND User = '$User'");
$row = mysqli_fetch_array($result);
$totals = $row[0];
?>
<h4 class="mb-0 fw-medium"><b style="font-size:17px;"> Total:</b> <span><?php echo number_format($totals,2); ?></span></h4>
</div>
</div>
</div>


</div>
</div>


<div class="row">
<div class="col-sm-6">

<div class="card shadow-sm border-0">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-6">
<div>
<h6 class="mb-3 text-primary" style="font-size:14px;">Repayment Transactions</h6>
<br>
</div>
<div class="position-relative d-inline-block avatar-progress progress-75">
<svg class="position-absolute top-0 start-0 progress-svg">
</svg>
<div class="avatar size-11 avatar-label-primary avatar-circle">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-money" style="font-size:28px;"></i>
</a>
</div>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Amount) FROM history WHERE User = '$User' AND Date_Paid = '$d'");
$row = mysqli_fetch_array($result);
$total = $row[0];
?>
<h4 class="mb-0 fw-medium"><b style="font-size:17px;">Total:</b> <span><?php echo number_format($total,2);?></span></h4>
</div>
</div>
</div>


</div>
<div class="col-sm-6">

<div class="card shadow-sm border-0">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-6">
<div>
<h6 class="mb-3 text-primary" style="font-size:14px;">Saving Transactions</h6>
<br>
</div>
<div class="position-relative d-inline-block avatar-progress progress-75">
<svg class="position-absolute top-0 start-0 progress-svg">
</svg>
<div class="avatar size-11 avatar-label-warning avatar-circle">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-briefcase" style="font-size:28px;"></i>
</a>
</div>
</div>
</div>
<div class="d-flex justify-content-between align-items-center">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Savings) FROM save WHERE User ='$User' AND Date_Paid = '$d' AND Posting_Method != 'Initial Deposit' 
AND Posting_Method != 'System Posting'");
$row = mysqli_fetch_array($result);
$total1 = $row[0];
$result = mysqli_query($con, "SELECT SUM(Amount) FROM flexi_history WHERE User ='$User' AND Date_Paid = '$d' AND Posting_Method != 'System Posting'
AND Posting_Method != 'Initial Deposit'");
$row = mysqli_fetch_array($result);
$total2 = $row[0];
mysqli_close($con);
?>
<h4 class="mb-0 fw-medium"><b style="font-size:17px;">Total:</b> <span><?php  echo number_format($total1 + $total2,2); ?></span></h4>
</div>
</div>
</div>


</div>
</div>




<div class="card shadow-sm border-0">
<div class="card-body">
<div class="avatar avatar-sm avatar-label-success mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-bookmark" style="font-size:28px;"></i>
</a>
</div><h6 class="mb-2 text-primary">Disbursement Performance Progress</h6>
<div class="d-flex gap-4 flex-wrap justify-content-between align-items-start mb-8">
<div>
<p class="text-muted mb-0 lh-lg">You are monitoring monthly disbursement performance.</p>
</div>
<div class="d-flex gap-3">
<a href="#!" class="d-flex align-items-center gap-2 text-body"><span class="size-3 rounded-circle d-inline bg-primary bg-opacity-30"></span>Target</a>
<a href="#!" class="d-flex align-items-center gap-2 text-body"><span class="size-3 rounded-circle d-inline bg-primary bg-opacity-60"></span>Achieve</a>
<a href="#!" class="d-flex align-items-center gap-2 text-body"><span class="size-3 rounded-circle d-inline bg-primary bg-opacity-90"></span>Outstanding</a>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
<div class="w-100">
<span class="text-muted px-2 py-1 border rounded mb-3 d-inline-block text-primary">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Sale_Target) FROM users WHERE User= '$User'");
$row = mysqli_fetch_array($result);
$total1 = $row[0];
echo number_format($total1,2);
?>
<br>Monthly Target</span>
<div class="progress progress-md bg-primary bg-opacity-30 w-100">
<div class="progress-bar" role="progressbar" style="width: 0%;"></div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="w-100">
<span class="text-muted px-2 py-1 border rounded mb-3 d-inline-block text-success">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$mth = date('M');
$yrs = date('Y');
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE User = '$User' AND Months = '$mth' AND Years = '$yrs'");
$row = mysqli_fetch_array($result);
$total2 = $row[0];
echo number_format($total2,2);
?>
<br>Target Achieve</span>
<div class="progress progress-md bg-primary bg-opacity-30 w-100">
<div class="progress-bar" role="progressbar" style="width: 0%;"></div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="w-100">
<span class="text-muted px-2 py-1 border rounded mb-3 d-inline-block text-danger">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Sale_Target) FROM users WHERE User = '$User'");
$row = mysqli_fetch_array($result);
$total1 = $row[0];
//
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE User = '$User'");
$row = mysqli_fetch_array($result);
$total2 = $row[0];
echo number_format($total1 - $total2,2);
?>
<br>Target Outstanding</span>
<div class="progress progress-md bg-primary bg-opacity-30 w-100">
<div class="progress-bar" role="progressbar" style="width: 0%;"></div>
</div>
</div>
</div>

</div>




</div>
</div>



</div>
<div class="col-sm-4">

<div class="card shadow-sm border-0">
<div class="card-body">

<div class="row">
<div class="col-6">

<b class="text-primary">New Client</b>
<div class="mb-5">
<div class="d-flex flex-wrap align-items-center gap-2">
<?php
include '../config/db.php';
$Query = "SELECT Location FROM register WHERE User = '$User' AND Status != 'Disbursed' ORDER BY id DESC LIMIT 4";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$pix= $rows['Location'];
?>
<a href="#!" class="avatar avatar-sm avatar-circle">
<img src="<?php echo $pix; ?>" style="width:30px; height:30px; border-radius:50px" >
</a>
<?php
}
}
mysqli_close($con);
?>
</div>
</div>
</div>
<div class="col-6">
<h5 class="card-title mb-4 text-primary">Closed Loan :</h5>
<div class="d-flex align-items-start justify-content-between mb-5">
<div>
<h5 class="fw-medium mb-1">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT COUNT(*) FROM repayments WHERE Status = 'Closed' AND User = '$User'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo $total;
?>
</h5>
</div>
</div>
</div>

</div>

<div class="mb-8">

<div class="row">
<div class="col-6">
<h5 class="card-title mb-4 text-primary">Expired Loan :</h5>
<div class="d-flex align-items-start justify-content-between mb-5">
<div>
<h5 class="fw-medium mb-1">
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE User = '$User' AND Status = 'Active' AND '$d' > Maturity_Date
AND Recovery_Status = 'No'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
mysqli_close($con);
?>
</h5>
<p class="text-muted mb-0 text-primary">Runing Expired Loans</p>
</div>
</div>

</div>
<div class="col-6">
<h5 class="card-title mb-4 text-primary" text-primary>NPL [%] :</h5>
<div class="d-flex align-items-start justify-content-between mb-5">
<div>
<h5 class="fw-medium mb-1">0</h5>
<p class="text-muted mb-0">Non Performing Loan</p>
</div>
</div>
</div>
</div>
<div id="recent" ></div>

</div>




<script type="text/javascript">
$(document).ready(function(){
// ajax function start here
$.ajax({
method: "POST",
url: "load_recent_transaction.php",
dataType: "html",  
success:function(data){
setTimeout(function(){
$('#recent').html(data);
}, 100);
}
});
// ajax function ends here
});
</script>
</div>
</div>



</div>
</div>