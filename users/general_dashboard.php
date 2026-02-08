<?php 
include_once 'head.php';
?>
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
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>ACTIVE <br>CUSTOMERS</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
// PUBLIC SECTOR
$result = mysqli_query($con, "SELECT COUNT(*) FROM repayments WHERE Status = 'Active'");
$rows = mysqli_fetch_array($result);
$total = $rows[0];
echo $total;
?>
</h4>
<small>[ Total customer count portfolio ]</small>
<p></p>
</div>
<div>
</div>

</div>
</div>
</div>

<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>PRINCIPAL LOAN PORTFOLIO DISBURSED</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
//public sector
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) AS overs FROM repayments WHERE Status != 'Cancelled'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total principal loan disbursed ]</small>
</div>
<div>
</div>

</div>
</div>
</div>

<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>LOAN OUTSTANDING <br> PRINCIPAL & INTEREST</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
//PUBLIC SECTOR
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE Status = 'Active' ");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total loan outstanding ]</small>
</div>
<div>
</div>

</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-body">

<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>TOTAL <br>EXPIRED OUTSTANDING</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$dt = date('Y-m-d');
// public sector
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE '$dt' > Maturity_Date AND  Status = 'Active'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total expired loans outstanding ]</small>
</div>
<div>
</div>

</div>
</div>
</div>

<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>TOTAL FLEXI<br> SAVING BALANCE</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$yrs = date('Y');
$mt = date('M');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM flexi_account");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total flexi saving balance ]</small>
</div>
<div>
</div>
</div>
</div>
</div>

<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>TOTAL EXPRESS<br> SAVINGS BALANCE</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT SUM(Balance) FROM savings WHERE Status = 'Active'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total express saving balance ]</small>
</div>
<div>
</div>
</div>
</div>
</div>
</div>




<div class="row">
<div class="col-sm-4">
<div class="card">
<div class="card-body">

<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>DISBURSED LOAN <br> MONTHLY</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$m = date('M');
$y = date('Y');
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE Months = '$m' AND Years = '$y' AND Status !='Cancelled'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Principal amount disbursed per month ]</small>
</div>

</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>DISBURSEMENT YEAR <br> TO DATE</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$m = date('M');
$y = date('Y');
$result = mysqli_query($con, "SELECT SUM(Loan_Amount) FROM repayments WHERE Years = '$y' AND Status !='Cancelled'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total Disbursement in a year ]</small>
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<span class="text-dark"><b>EXPIRED LOAN <br> YEAR TO DATE</b></span>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.7689 8.3818H22C22 4.98459 19.9644 3 16.5156 3H7.48444C4.03556 3 2 4.98459 2 8.33847V15.6615C2 19.0154 4.03556 21 7.48444 21H16.5156C19.9644 21 22 19.0154 22 15.6615V15.3495H17.7689C15.8052 15.3495 14.2133 13.7975 14.2133 11.883C14.2133 9.96849 15.8052 8.41647 17.7689 8.41647V8.3818ZM17.7689 9.87241H21.2533C21.6657 9.87241 22 10.1983 22 10.6004V13.131C21.9952 13.5311 21.6637 13.8543 21.2533 13.8589H17.8489C16.8548 13.872 15.9855 13.2084 15.76 12.2643C15.6471 11.6783 15.8056 11.0736 16.1931 10.6122C16.5805 10.1509 17.1573 9.88007 17.7689 9.87241ZM17.92 12.533H18.2489C18.6711 12.533 19.0133 12.1993 19.0133 11.7877C19.0133 11.3761 18.6711 11.0424 18.2489 11.0424H17.92C17.7181 11.0401 17.5236 11.1166 17.38 11.255C17.2364 11.3934 17.1555 11.5821 17.1556 11.779C17.1555 12.1921 17.4964 12.5282 17.92 12.533ZM6.73778 8.3818H12.3822C12.8044 8.3818 13.1467 8.04812 13.1467 7.63649C13.1467 7.22487 12.8044 6.89119 12.3822 6.89119H6.73778C6.31903 6.89116 5.9782 7.2196 5.97333 7.62783C5.97331 8.04087 6.31415 8.37705 6.73778 8.3818Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$dt = date('Y-m-d');
$yrs = date('Y');
// public sector
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE '$dt' > Maturity_Date AND Status = 'Active' AND Years = 'yrs'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
?>
</h4>
<small>[ Total overall other income ]</small>
</div>


</div>
</div>
</div>

</div>


<div class="row">
<div class="col-sm-6">
<div class="card">
<div class="card-body">
<?php include 'gen_chart.php';?>
</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-body">
<?php include 'gen_line.php';?>
</div>
</div>
</div>

</div>


</div>
<div class="col-sm-4">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12 mb-5 mb-md-0">
<div class="mb-5">
<div class="d-flex justify-content-between align-items-center mb-3">
<span class="text-dark">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z" fill="currentColor" />
</svg>
<b>Staff Gallery</b></span>
<a href="#" class="badge rounded-pill bg-soft-primary">
Registered User
</a>
</div>
<br>
<div class="d-flex align-items-center iq-slider mb-4 gap-2">
<div>
<?php
include '../config/db.php';
$Query = "SELECT  * FROM users WHERE Active = 'Online' ORDER BY id DESC LIMIT 10";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$pix= $rows['Location'];
?>
<?php
$img = $pix ?? '';
$defaultImage = '../assets/no-image.png';
if (!empty($img)) {
// Check if path starts with ../
if (strpos($img, '../') === 0) {
$imgPath = $img;
} else {
$imgPath = '../' . $img;
}
} else {
$imgPath = $defaultImage;
}
?>
<img class="rounded-circle bg-soft-primary img-fluid avatar-40 mb-2" src="<?php echo $imgPath; ?>" alt="" loading="lazy">
<?php
}
}
mysqli_close($con);
?>
</div>
</div>
</div>
<br>
<div>
<div class="d-flex align-items-center gap-3 mb-3">
<div class="bg-soft-primary avatar-60 rounded">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.3264 2.20966C12.4861 2.06632 12.6973 1.99119 12.9135 2.00082C17.4843 2.13765 21.3044 5.4558 21.9967 9.89063C22.0011 9.91711 22.0011 9.94411 21.9967 9.97059C22.0116 10.1804 21.9407 10.3874 21.7996 10.5458C21.6586 10.7043 21.459 10.801 21.2451 10.8147L13.5656 11.3211C13.3116 11.3436 13.0597 11.26 12.8718 11.0909C12.6839 10.9218 12.5774 10.6828 12.5785 10.4326L12.0623 2.88932V2.76493C12.0717 2.55278 12.1667 2.353 12.3264 2.20966ZM11.7997 13.2936L18.4558 12.8671L18.5011 12.8848C18.7869 12.8895 19.0591 13.0054 19.2579 13.207C19.4566 13.4087 19.5655 13.6795 19.5606 13.9599C19.2984 17.782 16.4962 20.9755 12.6828 21.7982C8.86938 22.621 4.96017 20.8754 3.08778 17.5139C2.53722 16.5457 2.1893 15.4794 2.06445 14.3775C2.01603 14.051 1.99483 13.7212 2.00106 13.3913C2.01368 9.32706 4.90728 5.81907 8.95607 4.9595C9.4462 4.86776 9.93762 5.11248 10.1515 5.55479C10.2047 5.63505 10.2473 5.72164 10.2782 5.81245C10.3541 6.98405 10.4329 8.14455 10.5113 9.30015C10.5732 10.2128 10.6349 11.1223 10.6948 12.0319C10.6917 12.2462 10.7254 12.4594 10.7944 12.6627C10.9569 13.0627 11.3614 13.3165 11.7997 13.2936Z" fill="currentColor" />
</svg>
</div>
<div style="width: 100%;">
<div class="d-flex justify-content-between">
<h6><b>TOTAL NPL [%]</b></h6>
<h6 class="text-body"> 
<?php 
include '../config/db.php';
$dt = date('Y-m-d');

/** * OPTIMIZED: 
 * We get both sums in one trip to the database to save time.
 */
$query = "SELECT 
            SUM(CASE WHEN Status != 'Cancelled' THEN Loan_Amount ELSE 0 END) AS total_disbursed,
            SUM(CASE WHEN Status = 'Active' AND Maturity_Date < ? THEN Total_Bal ELSE 0 END) AS total_overdue
          FROM repayments";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $dt);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

$disbursement = $row['total_disbursed'] ?? 0;
$overdue = $row['total_overdue'] ?? 0;

// SAFETY: Check if disbursement is greater than 0 to avoid "Division by zero" error
if ($disbursement > 0) {
    $npl = ($overdue / $disbursement) * 100;
} else {
    $npl = 0;
}

echo round($npl);
?>%
</h6>
</div>
<div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
<div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo round($npl, 2); ?>%;" 
aria-valuenow="<?php echo round($npl, 2); ?>" aria-valuemin="0" aria-valuemax="100" title="NPL: <?php echo number_format($npl, 2); ?>%"></div>
</div>
</div> 
</div>
<div class="d-flex align-items-center gap-3 mb-3">
<div class="bg-soft-primary avatar-60 rounded">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.33049 2.00049H16.6695C20.0705 2.00049 21.9905 3.92949 22.0005 7.33049V16.6705C22.0005 20.0705 20.0705 22.0005 16.6695 22.0005H7.33049C3.92949 22.0005 2.00049 20.0705 2.00049 16.6705V7.33049C2.00049 3.92949 3.92949 2.00049 7.33049 2.00049ZM12.0495 17.8605C12.4805 17.8605 12.8395 17.5405 12.8795 17.1105V6.92049C12.9195 6.61049 12.7705 6.29949 12.5005 6.13049C12.2195 5.96049 11.8795 5.96049 11.6105 6.13049C11.3395 6.29949 11.1905 6.61049 11.2195 6.92049V17.1105C11.2705 17.5405 11.6295 17.8605 12.0495 17.8605ZM16.6505 17.8605C17.0705 17.8605 17.4295 17.5405 17.4805 17.1105V13.8305C17.5095 13.5095 17.3605 13.2105 17.0895 13.0405C16.8205 12.8705 16.4805 12.8705 16.2005 13.0405C15.9295 13.2105 15.7805 13.5095 15.8205 13.8305V17.1105C15.8605 17.5405 16.2195 17.8605 16.6505 17.8605ZM8.21949 17.1105C8.17949 17.5405 7.82049 17.8605 7.38949 17.8605C6.95949 17.8605 6.59949 17.5405 6.56049 17.1105V10.2005C6.53049 9.88949 6.67949 9.58049 6.95049 9.41049C7.21949 9.24049 7.56049 9.24049 7.83049 9.41049C8.09949 9.58049 8.25049 9.88949 8.21949 10.2005V17.1105Z" fill="currentColor" />
</svg>
</div>
<div style="width: 100%;">
<div class="d-flex justify-content-between  ">
<h6><b>DAILY LOANS <br> OUTSTANDING</b></h6>
<h6 class="text-body"> 
<?php 
include '../config/db.php';
$mth = date('M');
$year = date('Y');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE Status = 'Active' AND Frequency = 'Daily'");
$row = mysqli_fetch_array($result);
$total = $row[0];
//
$result = mysqli_query($con, "SELECT SUM(Total_Loan) FROM repayments WHERE Status = 'Active' AND Frequency = 'Daily'");
$row = mysqli_fetch_array($result);
$total_loan = $row[0];
echo number_format($total,2);
// Calculate percentage for progress bar
$percentage = ($total_loan > 0) ? ($total / $total_loan) * 100 : 0;
$percentage = min(100, max(0, $percentage)); // Clamp between 0-100
?>
</h6>
</div>
<div class="progress bg-soft-success shadow-none w-100" style="height: 6px">
<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($percentage, 2); ?>%;" aria-valuenow="<?php echo round($total, 2); ?>" 
aria-valuemin="0" aria-valuemax="<?php echo round($total_loan, 2); ?>">
<span class="sr-only"><?php echo round($percentage, 1); ?>% Complete</span>
</div>
</div>
</div> 
</div>
<div class="d-flex align-items-center gap-3">
<div class="bg-soft-primary avatar-60 rounded">     
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path d="M17.9184 14.32C17.6594 14.571 17.5404 14.934 17.5994 15.29L18.4884 20.21C18.5634 20.627 18.3874 21.049 18.0384 21.29C17.6964 21.54 17.2414 21.57 16.8684 21.37L12.4394 19.06C12.2854 18.978 12.1144 18.934 11.9394 18.929H11.6684C11.5744 18.943 11.4824 18.973 11.3984 19.019L6.96839 21.34C6.74939 21.45 6.50139 21.489 6.25839 21.45C5.66639 21.338 5.27139 20.774 5.36839 20.179L6.25839 15.259C6.31739 14.9 6.19839 14.535 5.93939 14.28L2.32839 10.78C2.02639 10.487 1.92139 10.047 2.05939 9.65C2.19339 9.254 2.53539 8.965 2.94839 8.9L7.91839 8.179C8.29639 8.14 8.62839 7.91 8.79839 7.57L10.9884 3.08C11.0404 2.98 11.1074 2.888 11.1884 2.81L11.2784 2.74C11.3254 2.688 11.3794 2.645 11.4394 2.61L11.5484 2.57L11.7184 2.5H12.1394C12.5154 2.539 12.8464 2.764 13.0194 3.1L15.2384 7.57C15.3984 7.897 15.7094 8.124 16.0684 8.179L21.0384 8.9C21.4584 8.96 21.8094 9.25 21.9484 9.65C22.0794 10.051 21.9664 10.491 21.6584 10.78L17.9184 14.32Z" fill="currentColor" />
</svg>
</div>
<div style="width: 100%;">
<div class="d-flex justify-content-between  ">
<h6><b>WEELKY LOANS <br> OUTSTANDING</b></h6>
<h6 class="text-body">
<?php 
include '../config/db.php';
$mth = date('M');
$year = date('Y');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE Status = 'Active' AND Frequency = 'Weekly'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
//
$result = mysqli_query($con, "SELECT SUM(Total_Loan) FROM repayments WHERE Status = 'Active' AND Frequency = 'Weekly'");
$row = mysqli_fetch_array($result);
$total_loan = $row[0];
echo number_format($total,2);
// Calculate percentage for progress bar
$percentage = ($total_loan > 0) ? ($total / $total_loan) * 100 : 0;
$percentage = min(100, max(0, $percentage)); // Clamp between 0-100
?>

</h6>
</div>
<div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
<div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($percentage, 2); ?>%;" aria-valuenow="<?php echo round($total, 2); ?>" 
aria-valuemin="0" aria-valuemax="<?php echo round($total_loan, 2); ?>">
<span class="sr-only"><?php echo round($percentage, 1); ?>% Complete</span>
</div>
</div>
</div>
</div>
<br>

<div class="d-flex align-items-center gap-3">
<div class="bg-soft-primary avatar-60 rounded">     
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.4" d="M4.29415 14.6675L14.9349 2.63879C15.075 2.48048 15.3329 2.61934 15.2778 2.82341L13.1395 10.7479C13.1052 10.875 13.2009 11 13.3326 11H19.0266C19.2034 11 19.2933 11.2126 19.17 11.3394L8.40053 22.4166C8.2548 22.5665 8.0058 22.4205 8.06544 22.2201L10.1378 15.2571C10.1759 15.1288 10.0799 15 9.94609 15H4.44395C4.2716 15 4.17996 14.7966 4.29415 14.6675Z" fill="currentColor" />
<path d="M8.06541 22.2201L10.1378 15.2571C10.1759 15.1288 10.0799 15 9.94607 15H4.5H4.41655C4.17104 15 4.1415 14.6431 4.38367 14.6027L5 14.5L19 11H19.0266C19.2034 11 19.2933 11.2126 19.17 11.3394L8.4005 22.4166C8.25477 22.5665 8.00578 22.4205 8.06541 22.2201Z" fill="currentColor" />
</svg>
</div>
<div style="width: 100%;">
<div class="d-flex justify-content-between  ">
<h6><b>MONTHLY LOANS <br> OUTSTANDING</b></h6>
<h6 class="text-body">
<?php 
include '../config/db.php';
$mth = date('M');
$year = date('Y');
$result = mysqli_query($con, "SELECT SUM(Total_Bal) FROM repayments WHERE Status = 'Active' AND Frequency = 'Monthly'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo number_format($total,2);
//
$result = mysqli_query($con, "SELECT SUM(Total_Loan) FROM repayments WHERE Status = 'Active' AND Frequency = 'Daily'");
$row = mysqli_fetch_array($result);
$total_loan = $row[0];
echo number_format($total,2);
// Calculate percentage for progress bar
$percentage = ($total_loan > 0) ? ($total / $total_loan) * 100 : 0;
$percentage = min(100, max(0, $percentage)); // Clamp between 0-100
?>
</h6>
</div>
<div class="progress bg-soft-warning shadow-none w-100" style="height: 6px">
<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo round($percentage, 2); ?>%;" aria-valuenow="<?php echo round($total, 2); ?>" 
aria-valuemin="0" aria-valuemax="<?php echo round($total_loan, 2); ?>">
<span class="sr-only"><?php echo round($percentage, 1); ?>% Complete</span>
</div>
</div>
</div>
</div>
</div>
<br>


</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="card">
<div class="card-body">

<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>PENDING <br> LOAN</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.379 22 7.919V16.089C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.089V7.919C2 4.379 4.28 2 7.67 2ZM15.58 15.81C15.83 15.81 16.08 15.68 16.22 15.44C16.44 15.089 16.32 14.629 15.96 14.41L12.4 12.29V7.669C12.4 7.26 12.07 6.919 11.65 6.919C11.24 6.919 10.9 7.26 10.9 7.669V12.72C10.9 12.98 11.04 13.23 11.27 13.36L15.19 15.7C15.31 15.78 15.45 15.81 15.58 15.81Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4><?php 
include '../config/db.php';
$d = date('Y-m-d');
// public sector
$result = mysqli_query($con, "SELECT COUNT(*) FROM register WHERE Status != 'Disbursed' AND Status != 'Loan Closed'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo $total;
?>
</h4>
<small>[ Pending loan application ]</small>
</div>
<div>
</div>

</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-body">

<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>CLOSED <br> LOAN</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.09C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.09V7.92C2 4.38 4.28 2 7.67 2ZM7.52 13.2C6.86 13.2 6.32 12.66 6.32 12C6.32 11.34 6.86 10.801 7.52 10.801C8.18 10.801 8.72 11.34 8.72 12C8.72 12.66 8.18 13.2 7.52 13.2ZM10.8 12C10.8 12.66 11.34 13.2 12 13.2C12.66 13.2 13.2 12.66 13.2 12C13.2 11.34 12.66 10.801 12 10.801C11.34 10.801 10.8 11.34 10.8 12ZM15.28 12C15.28 12.66 15.82 13.2 16.48 13.2C17.14 13.2 17.67 12.66 17.67 12C17.67 11.34 17.14 10.801 16.48 10.801C15.82 10.801 15.28 11.34 15.28 12Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
// public sector
$result = mysqli_query($con, "SELECT COUNT(*) FROM repayments WHERE Status = 'Closed'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo $total;
?>
</h4>
<small>[ Customer closed loan ]</small>
</div>
<div>
</div>

</div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-2">
<p class="mb-0 text-dark"><b>CANCELLED LOANS</b></p>
<a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">
<svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.09C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.09V7.92C2 4.38 4.28 2 7.67 2ZM7.52 13.2C6.86 13.2 6.32 12.66 6.32 12C6.32 11.34 6.86 10.801 7.52 10.801C8.18 10.801 8.72 11.34 8.72 12C8.72 12.66 8.18 13.2 7.52 13.2ZM10.8 12C10.8 12.66 11.34 13.2 12 13.2C12.66 13.2 13.2 12.66 13.2 12C13.2 11.34 12.66 10.801 12 10.801C11.34 10.801 10.8 11.34 10.8 12ZM15.28 12C15.28 12.66 15.82 13.2 16.48 13.2C17.14 13.2 17.67 12.66 17.67 12C17.67 11.34 17.14 10.801 16.48 10.801C15.82 10.801 15.28 11.34 15.28 12Z" fill="currentColor" />
</svg>
</a>
</div>
<div class="mb-3">
<h4>
<?php 
include '../config/db.php';
$d = date('Y-m-d');
$result = mysqli_query($con, "SELECT COUNT(*) FROM register WHERE Status = 'Cancelled'");
$row = mysqli_fetch_array($result);
$total = $row[0];
echo $total;
?>
</h4>
<small>[ Total cancelled loan app ]</small>
</div>
<div>
</div>

</div>
</div>
</div>

</div>
</div>
</div>
</div>



</div>
</div>      