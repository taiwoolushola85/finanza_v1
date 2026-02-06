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
<div class="col-sm-4">
<div class="row">
<div class="col-sm-6">
<div class="card">
<div class="card-body">


<div class="dropdown float-end">


</div>
<div class="avatar avatar-sm avatar-label-info mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-users" style="font-size:24px;"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Active Clients</h6><br>
<p class=" mb-5" style="font-size:17px;"><b >Total:</b>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT COUNT(*) FROM repayments WHERE Status = 'Active' AND Team_Leader = '$User'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo $total;
?>
</p>
                                       

</div>
</div>
</div>
<div class="col-sm-6">
<div class="card">
<div class="card-body">


<div class="dropdown float-end">

</div>
<div class="avatar avatar-sm avatar-label-danger mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-exclamation-triangle" style="font-size:24px;"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Closed Clients</h6><br>
<p class=" mb-5" style="font-size:17px;"><b >Total:</b>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT COUNT(*) FROM repayments WHERE Status = 'Closed' AND Team_Leader = '$User'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo $total;
?>
</p>
                                       

</div>
</div>
</div>
</div>

<div class="card">
<div class="card-body">

<div class="dropdown float-end">


</div>
<div class="avatar avatar-sm avatar-label-warning mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-exclamation-triangle" style="font-size:24px;"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Expired Loan</h6><br>
<p class=" mb-5" style="font-size:17px;"><b >Total:</b>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE Team_Leader = '$User' AND Status = 'Active' AND $d > Maturity_Date
AND Recovery_Status = 'No'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
mysqli_close($con);
?>
</p>
                                       


</div>
</div>

<div class="card">
<div class="card-body">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-list" style="font-size:28px;"></i> 
</a>
Posting History
<div id="recent" ></div>



<script type="text/javascript">
$(document).ready(function(){
// ajax function start here
$.ajax({
method: "POST",
url: "load_team_lead_recent.php",
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
<div class="col-sm-8">
<div class="row">
<div class="col-sm-6">

<div class="card">
<div class="card-body">


<div class="dropdown float-end">


</div>
<div class="avatar avatar-sm avatar-label-primary mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-star" style="font-size:24px;"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Portfolio</h6><br>
<p class="mb-5" style="font-size:17px;"><b>Total:</b>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE Status != 'Cancelled' AND Team_Leader ='$User'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</p>
                                       

</div>
</div>


</div>
<div class="col-sm-6">
<div class="card">
<div class="card-body">


<div class="dropdown float-end">


</div>
<div class="avatar avatar-sm avatar-label-info mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-money" style="font-size:24px"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Portfolio Outstanding</h6><br>
<p class=" mb-5" style="font-size:17px;"><b >Total:</b>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE Team_Leader ='$User' AND Status = 'Active'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</p>
                                     

</div>
</div>


</div>
</div>





<div class="row">
<div class="col-sm-6">

<div class="card">
<div class="card-body">


<div class="dropdown float-end">


</div>
<div class="avatar avatar-sm avatar-label-success mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-money" style="font-size:24px;"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Repayments Collections</h6><br>
<p class=" mb-5" style="font-size:17px;"><b >Total:</b>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Amount) FROM history WHERE Team_Leader ='$User' AND Date_Paid = '$d' AND Post_Method = 'Basic Posting'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</p>
                                       

</div>
</div>


</div>
<div class="col-sm-6">
<div class="card">
<div class="card-body">


<div class="dropdown float-end">


</div>
<div class="avatar avatar-sm avatar-label-warning mb-6">
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<i class="fa fa-money" style="font-size:24px;"></i>
</a>
</div>
<h6 class="mb-1" style="font-size:14px;">Savings Collections</h6><br>
<p class=" mb-5" style="font-size:17px;"><b >Total:</b>
<?php 
$d = date('Y-m-d');
include '../config/db.php';
$result = mysqli_query($con, "SELECT SUM(Savings) FROM save WHERE Team_Leader ='$User' AND Date_Paid = '$d' AND Posting_Method != 'Initial Deposit' 
AND Posting_Method != 'System Posting'");
$row = mysqli_fetch_array($result);
$total1 = $row[0];
$result = mysqli_query($con, "SELECT SUM(Amount) FROM flexi_history WHERE Team_Leader ='$User' AND Date_Paid = '$d' AND  Posting_Method != 'System Posting'
AND Posting_Method != 'Initial Deposit'");
$row = mysqli_fetch_array($result);
$total2 = $row[0];
echo number_format($total1 + $total2,2);
mysqli_close($con);
?>
</p>
                                       

</div>
</div>


</div>
</div>


<div class="card">
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
// Ensure $User is defined (usually from session)
$User = $_SESSION['username'] ?? ''; 

// 1. Use a Prepared Statement (Prevents the 'bool given' error and SQL Injection)
$stmt = mysqli_prepare($con, "SELECT SUM(Sale_Target) AS total FROM users WHERE Team_Leader = ?");

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $User);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // 2. Fetch the data safely
    $row = mysqli_fetch_assoc($result);
    
    // 3. Use Null Coalescing (??) to default to 0 if no records exist
    $total1 = $row['total'] ?? 0;
    
    mysqli_stmt_close($stmt);
} else {
    // If the query itself fails (typo in table name, etc.)
    $total1 = 0;
}

// 4. Output the result
echo number_format((float)$total1, 2);
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
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE Team_Leader = '$User' AND Months = '$mth' AND Years = '$yrs'");
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
// Helper function to get sum safely and prevent code repetition
function get_sum_safely($con, $query, $param) {
$stmt = mysqli_prepare($con, $query);
if ($stmt) {
mysqli_stmt_bind_param($stmt, "s", $param);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_array($result);
mysqli_stmt_close($stmt);
return $row[0] ?? 0; // Return 0 if result is null
}
return 0; // Return 0 if query fails
}
// 1. Get Sale Target Sum
$total1 = get_sum_safely($con, "SELECT SUM(Sale_Target) FROM users WHERE Team_Leader = ?", $User);
// 2. Get Repayments Loan Amount Sum
$total2 = get_sum_safely($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE Team_Leader = ?", $User);
// 3. Perform calculation and format
$difference = $total1 - $total2;
echo number_format($difference, 2);
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



