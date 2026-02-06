<?php include 'head.php'; ?>
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
<h3 class="mb-sm-0">Existing Registration</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Existing Registration</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>



<img src="" id="userPhoto" class="rounded-circle d-flex" style="height: 150px; width:150px; margin:auto">
<br>
<center>
<span id="name"></span>
</center>
<br>
<div style="margin: auto; width:250px">
<label style="font-size:13px"><i style="color:red">*</i> BVN</label> 
<input type="number" class="form-control form-control-md" placeholder="Enter BVN" id="bvn" required>
<br>
<center>
<h5 id="fullName"></h5>
</center>
<br>
<center>
<i id="check" style="margin-left:10px; display:none"><img src="../loader/loader.gif" style="height:18px"> Checking BVN.! Please wait...</i>
<i id="bvnerror" style="color:red; margin-left:10px; display:none">Invalid BVN !! Please Check...</i>
</center>
</div>
<br>
<br>
<form action="" method="POST" enctype="multipart/form-data" id="uploadEx">
<b><i class="fa fa-star"></i> Personal Information</b><br>
<div class="row">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Fee Type</label>
<input type="text" class="form-control form-control-md"  name="id" hidden id="reg" required>
<select type="text" class="form-control form-control-md" name="type" required="required">
<option value="">Select Option</option>
<option value="Deduction">Deduction</option>
<option value="Virtual Payment">Virtual Payment</option>
<option value="Monie Point Payment">Monie Point Payment</option>
<option value="Saving For Upfront">Saving For Upfront</option>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Repayment Day</label>
<select class="form-control form-control-md"  name="repday" required>
<option value="">Select Option</option>
<option value="Mon">Monday</option>
<option value="Tue">Tuesday</option>
<option value="Wed">Wednesday</option>
<option value="Thu">Thursday</option>
<option value="Fri">Friday</option>
<option value="Daily">Everyday</option>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Groups</label>
<select type="text" class="form-control form-control-md" name="un" required>
<option value="">Select Group</option>
<?php 
include '../config/db.php';
$Query = "SELECT id, Name FROM groups WHERE User='$User' AND Status = 'Activated' ORDER BY id DESC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$nx= $rows['id']; // union id
$name= $rows['Name'];
?>
<option value="<?php echo $nx; ?>"><?php echo $name; ?></option>
<?php
}
}
?>
</select>
</div>
</div>
<br>
<b>Loan Product Information</b><br><br>
<div class="row">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Loan Products</label>
<select type="text" class="form-control form-control-md" name="pr" id="prid" oninput="getProducts()" required="required">
<option value="">Select Loan Product</option>
<?php 
include '../config/db.php';
$Query = "SELECT id, Product_Name FROM product WHERE Status = 'Activated' ORDER BY id DESC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$pp= $rows['id']; // product id
$name= $rows['Product_Name'];// product
?>
<option value="<?php echo $pp; ?>"><?php echo $name; ?></option>
<?php
}
}
?>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Tenure</label>
<select type="text" class="form-control form-control-md" name="ten" id="heys" required="required">
<option value="">Select Option</option>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Principal Amount</label>
<input type="number" class="form-control form-control-md" name="lum" placeholder="Principal Amount" required="required">
</div>
</div>
<hr>
<b>Bank Details</b><br><br>
<div class="row">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Bank Name</label>
<select type="text" class="form-control form-control-md" name="bn" required="required">
<option value="">Select Bank</option>
<?php 
include '../config/db.php';
$Query = "SELECT id, Bank_Name FROM bank ORDER BY Bank_Name ASC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$pp= $rows['id']; // product id
$name= $rows['Bank_Name'];// product
?>
<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
<?php
}
}
?>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Account No</label>
<input type="number" class="form-control form-control-md" placeholder="Account No" name="an" required="required">
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Account Name</label>
<input type="text" class="form-control form-control-md" placeholder="Account Name" name="ann" required="required">
</div>
</div>
<br>
<br>
<b><i class="fa fa-star"></i> Gaurantor Information</b><br>
<div style="margin: auto; width:250px">
<label style="font-size:13px"><i style="color:red">*</i> NIN</label>
<input type="number" class="form-control form-control-md"  placeholder="Enter NIN" name="nin" oninput="validateNIN()" required>
</div>
<br>
<div class="row" style="margin-top:20px; display:none">
<div class="col-sm-3">
<label style="font-size:13px"><i style="color:red">*</i> Surname</label>
<input type="text" class="form-control form-control-md" hidden name="imgs" id="imgs" required>
<input type="text" class="form-control form-control-md" placeholder="Surname" hidden name="surname2" id="sn" required>
</div>
<div class="col-sm-3">
<label style="font-size:13px"><i style="color:red">*</i> Firstname</label>
<input type="text" class="form-control form-control-md" placeholder="Firstname" name="firstname2" hidden id="fn" required>
</div>
<div class="col-sm-3">
<label style="font-size:13px"><i style="color:red">*</i> Lastname</label>
<input type="text" class="form-control form-control-md" placeholder="Lastname" hidden name="lastname2" id="ln" required>
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Phone No</label>
<input type="number" class="form-control form-control-md" placeholder="Phone No" name="phone2" id="ph" required>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Address</label>
<input type="text" class="form-control form-control-md" placeholder="Address" name="address3" required>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Occupation</label>
<input type="text" class="form-control form-control-md" placeholder="Occupation" name="occupation" required>
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Relationship</label>
<select class="form-control form-control-md" name="relationship" required>
<option value="">Select Type</option>
<option value="Sister">Sister</option>
<option value="Brother">Brother</option>
<option value="Spouse">Spouse</option>
<option value="Father">Father</option>
<option value="Mother">Mother</option>
<option value="Daughter">Daughter</option>
<option value="Friend">Friend</option>
<option value="In-Law">In-Law</option>
<option value="Nephew">Nephew</option>
<option value="Niece">Niece</option>
<option value="Husband">Husband</option>
<option value="Wife">Wife</option>
<option value="Neighbor">Neighbor</option>
<option value="Other">Other</option>
</select>
</div>
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Gender</label>
<select class="form-control form-control-md" name="gender3" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="row" style="margin-top:20px; display:none">
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> ID Type</label>
<input type="text" class="form-control form-control-md" value="National ID Card" hidden name="idtype" required>
</div>
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> ID Card No</label>
<input type="text" class="form-control form-control-md" placeholder="ID Number" hidden name="idno" id="ninData" required>
</div>
</div>
<br>
<button type="submit" class="btn btn-outline-success btn-sm" id="submit"><i class="fa fa-plus"></i> Submit Application</button>
</form>





<script>
var loadFile = function(event) {
var image = document.getElementById('output');
image.src = URL.createObjectURL(event.target.files[0]);
};
</script>



<script type="text/javascript">
function getProducts()  {
var prid = document.getElementById("prid").value;
// ajax function start here
$.ajax({
method: "POST",
url: "load_product_tenure.php",
dataType: "html",  
data: {'prid': prid},
success:function(data){
setTimeout(function(){
$("#heys").html(data);
}, 100);
}
});
// ajax function ends here
}
</script>





<script>
$(document).ready(function() {
$("#bvn").on('keyup', function() {
var bvn = $(this).val().trim(); 
// Validate BVN is exactly 11 digits
if (bvn.length !== 11 || !/^\d{11}$/.test(bvn)) {
// Don't make AJAX call if BVN is not 11 digits
$("#bvnerror").hide();
$("#check").hide();
$("#submit").attr("disabled", "disabled");
$("#fullName").text('').hide();
$("#reg").val('');
return; // Exit early
}
// BVN is valid, proceed with AJAX
$("#bvnerror").hide();
$("#check").show();
$("#submit").attr("disabled", "disabled");
$.ajax({
method: "POST",
url: "validate_customer.php",
data: { 'bvn': bvn },
dataType: "json",
success: function(response) {
$("#check").hide();
$("#bvnerror").hide();
// 1. Check for errors or active loans
if (response.status == "1") {
alert("🚫 Customer still has a running active loan!");
$("#submit").attr("disabled", "disabled");
$("#fullName").text('').hide();
$("#reg").val('');
$('#userPhoto').attr('src', '');
} else if (response.status == "2") {
alert("🚫 Application already submitted for review.");
$("#submit").attr("disabled", "disabled");
$("#fullName").text('').hide();
$("#reg").val('');
$('#userPhoto').attr('src', '');
} else if (response.status == "success") {
// 2. SUCCESS: Display data
$("#bvnerror").hide();
// Injecting values into the fields
$("#fullName").text(response.full_name);
$("#reg").val(response.customer_id);
$('#userPhoto').attr('src', response.customer_img || 'default-avatar.png');
// Show the hidden div container
$("#fullName").fadeIn(); 
$("#submit").removeAttr('disabled');
} else {
alert("🚫 BVN not found in records.");
$("#submit").attr("disabled", "disabled");
$("#fullName").text('').hide();
$("#reg").val('');
$('#userPhoto').attr('src', '');
}
},
error: function() {
$("#check").hide();
alert("⚠️ System error. Could not validate BVN.");
$("#submit").attr("disabled", "disabled");
}
});
});
});
</script>




<script type="text/javascript">
$(document).ready(function (e){
$("#uploadEx").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to create a loan profile for this existing customer ..";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#existingForm").modal('hide');
$("#please").show();
$.ajax({
url: "create_existing_loan.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#uploadEx")[0].reset();
if(data == 1){
setTimeout(function(){
$("#please").hide();
$("#toast").css("display", "block");
$("#toast").show();
load();
}, 3000);
setTimeout(function(){
$("#please").hide();
$("#toast").hide();
window.location.reload();
}, 6000);
}else{
$("#please").hide();
alert ("🚫" + data)
}
},
error: function(){
}
});
}
}));
});
</script>



<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
$("#please").show();
$.ajax({
url: "existing_loan_registration.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#please").show();
$("#uploadForm")[0].reset();
setTimeout(function(){
$("#please").hide();
$("#renewForm").modal('show');
$('#form').html(data);
}, 3000);
},
error: function(){
}
});
}));
});
</script>


<br><br>
<?php include '../footer.php'; ?>