<!-- loader END -->
<div class="wrapper">
<div class="iq-auth-page">
<nav class="navbar iq-auth-logo"> 
<div class="container-fluid">
<a href="index.php" class="iq-link d-flex align-items-center">
<img src="assets/images/favicon.ico" alt="logo" loading="lazy">
<h4  class="mb-0"><b>FINANZA</b></h4>
</a>
</div>
</nav>
<div class="iq-banner-logo d-none d-lg-block">
<img class="auth-image" src="assets/images/01.png" alt="logo-img" loading="lazy">
</div>
<div class="container-inside">
<div class="main-circle circle-small"></div>
<div class="main-circle circle-medium"></div>
<div class="main-circle circle-large"></div>
<div class="main-circle circle-xlarge"></div>
<div class="main-circle circle-xxlarge"></div>
</div>        <div class="row d-flex align-items-center iq-auth-container w-100">
<div class="col-10 col-xl-4 offset-xl-7 offset-1">
<div class="card">
<div class="card-body ">
<h3 class="text-center">FINANZA</h3>
<p class="text-center">Digital Loan Tracking Management System</p>
<div class="alert alert-info alert-dismissible fade show" role="alert" id="up" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> Please enter username & password</center>
</div>
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="yu" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> Please enter your username</center>
</div>
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="yp" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> Please enter your password</center>
</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="nf" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> User account not found</center>
</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="ba" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> Your account has been de-activated</center>
</div>
<form action="" method="post" enctype="multipart/form-data" id="uploadForm">
<div class="form-group">
<label class="form-label" for="email-id">Username</label>
<input type="text" class="form-control mb-0" id="email-id" name="user" placeholder="Enter Username">
</div>
<div class="form-group">
<label class="form-label" for="password">Password</label>
<input type="password" class="form-control mb-0" id="password" name="pass" placeholder="Enter Password">
</div>
<div class="d-flex justify-content-between align-items-center mb-3">
<div class="form-check d-inline-block pt-1 mb-0">
<input type="checkbox" class="form-check-input" id="customCheck11">
<label class="form-check-label" for="customCheck11">Remember Me</label>
</div>
</div>
<div class="text-center pb-3">
<button type="submit" class="btn btn-primary btn-block w-100" onclick="data()" id="login">
<span style="display:none" id="vd"> <img src="loader/loader.gif" style="height:16px"> Checking access ! Please wait..</span>  
<span id="vdd">Login</span>
</button>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="js/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
$.ajax({
url: "login.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){  
if (data == 1){
$("#up").show();
$("#up").fadeOut(5000);
$("#login").attr("disabled", false);
} else if (data == 2){
$("#yu").show();
$("#yu").fadeOut(5000);
$("#login").attr("disabled", false);
}else if (data == 3){
$("#yp").show();
$("#yp").fadeOut(5000);
$("#login").attr("disabled", false);
}else if (data == 4){
$("#ba").show();
$("#ba").fadeOut(5000);
$("#login").attr("disabled", false);
}else if (data == 5){
$("#nf").show();
$("#nf").fadeOut(5000);
$("#login").attr("disabled", false);
}else if (data == 6){
$("#nf").show();
$("#nf").fadeOut(5000);
$("#login").attr("disabled", false);
} else {
$("#vdd").hide();
$("#vd").show();
setTimeout(function(){
///alert("You have been authorized");
$("#vd").show();
window.location.href=data;
}, 3000);

}
},
error: function(){
}
});
}));
});
</script>

