<?php
session_start();
if( !isset( $_SESSION['Username'] ))
{
$user = $_SESSION['Username'];
header("Location:../index.php");
}else{
$user = $_SESSION['Username'];
//show rest of the page and all other content
}
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title data-rightjoin="">FINANZA || HOME</title>
<meta name="description" content="Digital Loan Tracking Management System">
<!-- Google Font Api KEY-->
<meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
<!-- Config Options -->
<meta name="setting_options" content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting-html&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;Hope UI&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#3a57e8&quot;,&quot;--{{prefix}}info&quot;:&quot;#08B1BA&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
<!-- Favicon -->
<link rel="stylesheet" href="../path/to/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" href="../assets/images/favicon.ico">
<script src="../js/jquerys.min.js"></script>
<!-- jQuery Library -->
<link rel="stylesheet" href="../assets/bootstrap.min.css" >
<!-- Library / Plugin Css Build -->
<link rel="stylesheet" href="../assets/css/core/libs.min.css">
<!-- Hope Ui Design System Css -->
<link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=2.2.0">
<link rel="stylesheet" href="../assets/css/pro.min.css?v=2.2.0">
<!-- Custom Css -->
<link rel="stylesheet" href="../assets/css/custom.min.css?v=2.2.0">
<!-- Dark Css -->
<link rel="stylesheet" href="../assets/css/dark.min.css?v=2.2.0">
<!-- Customizer Css -->
<link rel="stylesheet" href="../assets/css/customizer.min.css?v=2.2.0">
<link rel="stylesheet" href="../assets/css/bs-stepper.min.css">
<script src="....../session.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- RTL Css -->
<link rel="stylesheet" href="../assets/css/rtl.min.css?v=2.2.0">
<script src="../js/sweetalert.min.js"></script>
<!-- my jquery -->
<script src="../js/jquery-2.2.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<style>
/* Container for the table */
.table-container {
    width: 100%;
    height: 350px;
    max-width: 100%;
    overflow-x: auto; /* horizontal scroll on mobile */
    border: 1px solid #ddd;
      border-radius: 8px;
}

#table-container {
    width: 100%;
    height: 350px;
    max-width: 100%;
    overflow-x: auto; /* horizontal scroll on mobile */
    border: 1px solid #ddd;
      border-radius: 8px;
}
/* Table base styles */
table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #dee2e6;
  font-family: Arial, sans-serif;
  font-size: 14px;
}

/* Fixed table header */
thead {
  position: sticky;
  top: 0;
  z-index: 10;
  background-color: #2c3e50;
  color: white;
}

thead th {
  padding: 9px;
  text-align: left;
  font-weight: 600;
  white-space: nowrap;
  background: #e1e5e8ff;
  color: black;
}

/* Table body styles */
tbody td {
  padding: 7px;
  white-space: nowrap;
  font-size: 9px;
  color: black;
}

/* Striped rows */
tbody tr:nth-child(odd) {
  background-color: #f8f9fa;
}

tbody tr:nth-child(even) {
  background-color: #ffffff;
}

/* Hover effect */
tbody tr:hover {
  background-color: #e9ecef;
  transition: background-color 0.2s ease;
}

/* Status styling */
tbody td:last-child {
  font-weight: 500;
}



    /* Modal backdrop overlay */
#modal {
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 1050;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
}


/* When modal is active/shown */
.modal.show {
  display: block;
}

/* Modal dialog positioning */
.modal-dialog {
  position: relative;
  margin: 1.75rem auto;
  max-width: 800px;
  pointer-events: none;
}

.modal-dialog-centered {
  display: flex;
  align-items: center;
  min-height: calc(100% - 3.5rem);
}

.modal-lg {
  max-width: 800px;
}

/* Modal content styling */
.modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 0.3rem;
  outline: 0;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

/* Fade-in animation */
.modal.fade {
  opacity: 0;
  transition: opacity 0.15s linear;
}

.modal.fade.show {
  opacity: 1;
}


/* For a custom modal */
.my-custom-modal-dialog {
  width: 90%; /* Sets the width to 80% of its parent container */
  max-width: 1000px; /* Ensures the modal doesn't exceed 1000px */
}

/* For a Bootstrap modal (overriding default styles) */
.modal-dialog {
  max-width: 90%; /* Sets a maximum width of 90% */
  width: auto; /* Allows the width to adjust based on content up to max-width */
}

/* For a full-width modal */
.modal-dialog.full-width {
  max-width: 100vw; /* Sets the maximum width to 100% of the viewport width */
  width: 100%; /* Sets the width to 100% of its parent container */
}

</style>
</head>
<body class="">

<!-- logout function start-->
<script>
$(document).ready(function() { 

function redirect(){
    document.location = "lock.php?id=<?php echo $user; ?>&&resume=<?php echo $_SERVER["REQUEST_URI"];?>"
}
setInterval(function(){
    redirect();
}, 25 * 60 * 1000);
});

</script>

<!-- logout function end-->

<?php
include '../config/db.php';
if (isset($_SESSION['Username'])) {
$user = $_SESSION['Username'];
// Use prepared statements to prevent SQL injection
$stmt = mysqli_prepare($con, "SELECT id, Username, Location, Name, Password, Email, Branch, Checks, User_Group, Phone, Role_Categorys, Status,
Pin FROM users WHERE Username = ?");
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($result)) {
$User = $row['Username'];
$loc = $row['Location'];
$na = $row['Name'];
$psw = $row['Password'];
$em = $row['Email'];
$brss = $row['Branch'];
$usd_id = $row['id'];
$gr = $row['User_Group'];
}
mysqli_stmt_close($stmt);
}
?>
<!-- Loader -->








<aside class="sidebar sidebar-base " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
<div class="sidebar-header d-flex align-items-center justify-content-start">
<a href="Dashboard.php" class="navbar-brand">
<!--Logo start-->
<div class="logo-main">
<div class="logo-normal">
<svg class=" icon-30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
<rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
<rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
<rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
</svg>
</div>
<div class="logo-mini">
<svg class=" icon-30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
<rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
<rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
<rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
</svg>
</div>
</div>
<!--logo End-->            
<h4 class="logo-title"><b>FINANZA</b></h4>
</a>
<div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
<i class="icon">
<svg class="icon-20" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</i>
</div>
</div>
<div class="sidebar-body pt-0 data-scrollbar">
<div class="sidebar-list">
<!-- Sidebar Menu Start -->
<ul class="navbar-nav iq-main-menu" id="sidebar-menu">
<li class="nav-item static-item">
<a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
<span class="default-icon">Home</span>
<span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="index.php">
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">Home</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link " aria-current="page" href="assign_role.php">
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left: 14px;">Assign Role</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="Branch.php" >
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">Branch</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="user_role.php" >
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">User Role</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="product.php" >
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">Product</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="role.php" >
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">Role Maintenance</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="user.php" >
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">User Account</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" aria-current="page" href="reset_admin.php" >
<i class="fa fa-square" style="font-size:14px;"></i>
<span class="item-name" style="margin-left:14px;">Reset Admin</span>
</a>
</li>
</ul>
</li>
<!-- Sidebar Menu End -->        
</div>
</div>


<div class="sidebar-footer"></div>
</aside>      
  
<main class="main-content">
<div class="position-relative ">
    
<!--Nav Start-->
<nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu left-border">
<div class="container-fluid navbar-inner">
<a href="index.html" class="navbar-brand">
<!--Logo start-->
<div class="logo-main">
<div class="logo-normal">
<svg class="text-primary icon-30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
<rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
<rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
<rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
</svg>
</div>
<div class="logo-mini">
<svg class="text-primary icon-30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
<rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
<rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
<rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
</svg>
</div>
</div>
<!--logo End-->         
<h4 class="logo-title d-block d-xl-none"><b>FINANZA</b></h4>
</a>
<div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
<i class="icon d-flex">
<svg class="icon-20" width="20" viewbox="0 0 24 24">
<path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
</svg>
</i>
</div>
<div class="d-flex align-items-center justify-content-between product-offcanvas">
<div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
<small class="mb-0 text-capitalize">Home</small>
</div>
<div class="offcanvas offcanvas-end shadow-none iq-product-menu-responsive" tabindex="-1" id="offcanvasBottom">
<div class="offcanvas-body">
<ul class="iq-nav-menu list-unstyled">
<li class="nav-item active">
<a  href="lock.php?id=<?php echo $User; ?>&&resume=<?php echo $_SERVER["REQUEST_URI"];?>" class="nav-link menu-arrow justify-content-start" >
<svg class="icon-32" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z" fill="currentColor"></path>
<path opacity="0.4" d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z" fill="currentColor"></path>
</svg>
<span class="nav-text ms-2">Lock Screen</span>
</a>
</li>
</ul>
</div>
</div>
</div>
<div class="d-flex align-items-center">
<button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon">
<span class="navbar-toggler-bar bar1 mt-1"></span>
<span class="navbar-toggler-bar bar2"></span>
<span class="navbar-toggler-bar bar3"></span>
</span>
</button>
</div>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
<li class="nav-item dropdown me-0 me-xl-3">
<div class="d-flex align-items-center mr-2 iq-font-style" role="group" aria-label="First group" data-setting="radio">
<input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-sm" id="font-size-sm">
<label for="font-size-sm" class="btn btn-border border-0 btn-icon btn-sm" data-bs-toggle="tooltip" title="Font size 14px" data-bs-placement="bottom">
<span class="mb-0 h6" style="color: inherit !important;">A</span>
</label>
<input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-md" id="font-size-md">
<label for="font-size-md" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip" title="Font size 16px" data-bs-placement="bottom">
<span class="mb-0 h4" style="color: inherit !important;">A</span>
</label>
<input type="radio" class="btn-check" name="theme_font_size" value="theme-fs-lg" id="font-size-lg">
<label for="font-size-lg" class="btn btn-border border-0 btn-icon" data-bs-toggle="tooltip" title="Font size 18px" data-bs-placement="bottom">
<span class="mb-0 h2" style="color: inherit !important;">A</span>
</label>
</div>
</li>

<li class="nav-item dropdown" id="itemdropdown1">
<a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
<div class="btn btn-primary btn-icon btn-sm rounded-pill">
<span class="btn-inner">
<svg class="icon-32" width="32" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
<path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
</svg>
</span>
</div>
</a>
<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
<li>
<a class="dropdown-item" href="session.php">Logout</a>
</li>
</ul>
</li>
<li class="nav-item iq-full-screen d-none d-xl-block" id="fullscreen-item">
<a href="#" class="nav-link" id="btnFullscreen" data-bs-toggle="dropdown">
<div class="btn btn-primary btn-icon btn-sm rounded-pill">
<span class="btn-inner">
<svg class="normal-screen icon-24" width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.5528 5.99656L13.8595 10.8961" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M5.8574 18.896L10.5507 13.9964" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
<svg class="full-normal-screen d-none icon-24" width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.7542 10.1932L18.1867 5.79319" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M10.4224 13.5726L5.82149 18.1398" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
<path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</span>
</div>
</a>
</li>
</ul>
</div>
</div>
</nav>    
        
<!--Nav End-->
</div>

<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="d-flex justify-content-between align-items-center flex-wrap mb-4 gap-3">
<div class="d-flex flex-column">
<p3>
<script type="text/javascript">
document.write("<center>");
var day = new Date();
var hr = day.getHours();
if (hr >= 0 && hr < 12) {
document.write("Good Morning!: <?php echo $na; ?>");
} else if (hr == 12) {
document.write("Good Noon!: <?php echo $na; ?>");
} else if (hr >= 12 && hr <= 17) {
document.write("Good Afternoon!: <?php echo $na; ?>");
} else {
document.write("Good Evening!: <?php echo $na; ?>");
}document.write("</font></center>");
</script></p3>

</div>
<div class="d-flex justify-content-between align-items-center rounded flex-wrap gap-3">
<div class="form-check form-switch mb-0 iq-status-switch">
<input class="form-check-input iq-status" type="checkbox" id="iq-switch" checked="">
<label class="form-check-label iq-reset-status" for="iq-switch">
Online
</label>
</div>
<div class="form-group mb-0">
<input type="text" name="start" class="form-control range_flatpicker flatpickr-input active" placeholder="Date: <?php echo date('Y-M-d'); ?>" readonly="readonly">
</div>
</div>
</div>






<div class="modal" id="loader" tabindex="-1" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-sm" style="display:none; width:250px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-body">
<center>
<i>
<img src="../loader/loader.gif" style="height:20px"> Loading Data ! Please wait...
</i>
</center>
</div>
</div>
</div>
</div>





<div class="modal" id="please" tabindex="-1" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-sm" style="display:none; width:300px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-body">
<center>
<i>
<img src="../loader/loader.gif" style="height:20px"> Waiting For Response ! Please wait...
</i>
</center>
</div>
</div>
</div>
</div>


<!-- Toast Container - Fixed positioning -->
<div aria-live="polite" aria-atomic="true" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
<div class="toast custom-toast" role="alert" id="toast" aria-live="assertive" aria-atomic="true">
<div class="toast-header">
<i class="toast-icon fa fa-check-circle me-2"></i>
<strong class="me-auto">Finanza</strong>
<small class=" toast-time">just now</small>
<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body" style="color:green">
<!-- Message will be inserted here -->
</div>
</div>
</div>

<style>
/* Toast Container */
.toast-container {
    pointer-events: none;
}

.toast-container .toast {
    pointer-events: auto;
}

/* Custom Toast Styles */
.custom-toast {
    min-width: 320px;
    max-width: 400px;
    border: none;
    border-left: 4px solid #28a745;
    border-radius: 0.375rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    background-color: #fff;
    overflow: hidden;
}

.custom-toast .toast-header {
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    padding: 0.75rem 1rem;
    align-items: center;
}

.custom-toast .toast-body {
    padding: 1rem;
    font-size: 0.9375rem;
    color: #212529;
    word-wrap: break-word;
}

.toast-icon {
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* Toast Variants */
.toast-success {
    border-left-color: #28a745;
}
.toast-success .toast-icon {
    color: #28a745;
}

.toast-error {
    border-left-color: #dc3545;
}
.toast-error .toast-icon {
    color: #dc3545;
}

.toast-warning {
    border-left-color: #ffc107;
}
.toast-warning .toast-icon {
    color: #ffc107;
}

.toast-info {
    border-left-color: #17a2b8;
}
.toast-info .toast-icon {
    color: #17a2b8;
}

/* Animations */
.custom-toast.showing {
    animation: slideIn 0.3s ease-out forwards;
}

.custom-toast.hide {
    animation: slideOut 0.3s ease-in forwards;
}

@keyframes slideIn {
    from {
        transform: translateX(120%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(120%);
        opacity: 0;
    }
}

/* Responsive */
@media (max-width: 576px) {
    .toast-container {
        left: 0;
        right: 0;
        padding: 0.75rem;
    }
    
    .custom-toast {
        min-width: 100%;
        max-width: 100%;
    }
}
</style>

<script>
// Stable Toast Notification System
const ToastNotification = {
    // Configuration
    config: {
        defaultDuration: 3000,
        icons: {
            'success': 'fa fa-check-circle',
            'error': 'fa fa-times-circle',
            'warning': 'fa fa-exclamation-triangle',
            'info': 'fa fa-info-circle'
        }
    },

    // Current toast instance
    currentToast: null,

    // Show toast notification
    show: function(message, type = 'success', duration = null) {
        // Validate inputs
        if (!message || typeof message !== 'string') {
            console.error('Toast message must be a valid string');
            return;
        }

        // Get toast element
        const toastElement = document.getElementById('toast');
        if (!toastElement) {
            console.error('Toast element not found');
            return;
        }

        // Hide current toast if exists
        if (this.currentToast) {
            this.currentToast.hide();
        }

        // Reset classes
        toastElement.classList.remove('toast-success', 'toast-error', 'toast-warning', 'toast-info');

        // Get elements
        const toastBody = toastElement.querySelector('.toast-body');
        const toastIcon = toastElement.querySelector('.toast-icon');
        const toastTime = toastElement.querySelector('.toast-time');

        // Validate type
        const validTypes = ['success', 'error', 'warning', 'info'];
        if (!validTypes.includes(type)) {
            type = 'success';
        }

        // Set content
        if (toastBody) {
            toastBody.textContent = message;
        }

        // Set icon
        if (toastIcon) {
            toastIcon.className = 'toast-icon me-2 ' + this.config.icons[type];
        }

        // Set timestamp
        if (toastTime) {
            toastTime.textContent = 'just now';
        }

        // Add type class
        toastElement.classList.add('toast-' + type);

        // Create Bootstrap toast instance
        const bsToast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: duration || this.config.defaultDuration
        });

        // Store current instance
        this.currentToast = bsToast;

        // Show toast
        bsToast.show();

        // Clean up on hide
        toastElement.addEventListener('hidden.bs.toast', () => {
            this.currentToast = null;
        }, { once: true });

        return bsToast;
    },

    // Shorthand methods
    success: function(message, duration) {
        return this.show(message, 'success', duration);
    },

    error: function(message, duration) {
        return this.show(message, 'error', duration);
    },

    warning: function(message, duration) {
        return this.show(message, 'warning', duration);
    },

    info: function(message, duration) {
        return this.show(message, 'info', duration);
    }
};

// Legacy function for backwards compatibility
function showToast(message, type = 'success', duration) {
    return ToastNotification.show(message, type, duration);
}
</script>