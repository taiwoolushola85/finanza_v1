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
<h3 class="mb-sm-0">New Registration</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">New Registration</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>



<div  id="first">
<div class="container">
<div class="position-relative m-4">
<div class="progress" style="height: 2px;">
<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-icon btn-primary rounded-pill">1</button>
<button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-icon btn-light rounded-pill">2</button>
<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-icon btn-light rounded-pill">3</button>
</div>
</div> <!-- end col-->
<br>
<i><b style="color:red">Note:</b> Only new client be register here. </i><br><br>

<form action="" method="POST" enctype="multipart/form-data" id="uploadForm">
<div style="margin: auto; width:250px">
<label style="font-size:13px"><i style="color:red">*</i> BVN</label> 
<input type="number" class="form-control form-control-md" placeholder="Enter BVN" id="bvn" name="bvn" >
<br>
<center>
<i id="check" style="margin-left:10px; display:none"><img src="../loader/loader.gif" style="height:18px"> Checking BVN.! Please wait...</i>
<i id="bvnerror" style="color:red; margin-left:10px; display:none">Invalid BVN !! Please Check...</i>
<h5 id="fullName"></h5>
</center>
</div>
<br>
<b><i class="fa fa-star"></i> Personal Information</b><br>
<div class="row" style="margin-top: 20px;">
<div class="col-sm-4">
<label style="font-size:13px;"><i style="color:red">*</i> Surname</label>
<input type="text" class="form-control form-control-md" placeholder="Surname" name="sn" id="firstName" style="text-transform: capitalize;" >
</div>
<div class="col-sm-4">
<label style="font-size:13px; "><i style="color:red">*</i> Firstname</label>
<input type="text" class="form-control form-control-md" placeholder="Firstname" name="fn" id="middleName" style="text-transform: capitalize;" >
</div>
<div class="col-sm-4">
<label style="font-size:13px;"><i style="color:red">*</i> Lastname</label>
<input type="text" class="form-control form-control-md" placeholder="Lastname" name="ln" id="lastName" style="text-transform: capitalize;" >
</div>
</div>


<div class="row" style="margin-top:20px;">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Education Level</label>
<select class="form-control form-control-md" name="ed" >
<option value="">Select Option</option>
<option value="Primary School">Primary School</option>
<option value="Secondary School">Secondary School</option>
<option value="Tertiary School">Tertiary School</option>
<option value="No Education">No Education</option>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Groups</label>
<select type="text" class="form-control form-control-md" name="un" >
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
<div class="col-sm-4">
<input type="text" class="form-control form-control-md" placeholder="Phone No" hidden name="ph" id="ph" >
<label style="font-size:13px"><i style="color:red">*</i> Repayment Day</label>
<select class="form-control form-control-md"  name="repday" >
<option value="">Select Option</option>
<option value="Mon">Monday</option>
<option value="Tue">Tuesday</option>
<option value="Wed">Wednesday</option>
<option value="Thu">Thursday</option>
<option value="Fri">Friday</option>
<option value="Daily">Everyday</option>
</select>
</div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-sm-4">
<label style="font-size:13px;"><i style="color:red">*</i> Gender</label>
<select class="form-control form-control-md"  name="gn" >
<option value="">Select Option</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
<div class="col-sm-4">
<label style="font-size:13px;"><i style="color:red">*</i> Date Of Birth</label>
<input type="date" class="form-control form-control-md" placeholder="Date Of Birth" name="db" id="dateOfBirth" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Maritial Status</label>
<select class="form-control form-control-md"  name="ms" >
<option value="">Select Option</option>
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="Divorce">Divorce</option>
<option value="Widow">Widow</option>
</select>
</div>
</div>
<br>
<b><i class="fa fa-star"></i> Contact Information</b><br>
<div class="row" style="margin-top: 20px;">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Phone No</label>
<input type="text" class="form-control form-control-md" placeholder="Phone No" name="ph" id="ph" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Address</label>
<input type="text" class="form-control form-control-md" name="ad" id="stateOfOrigin"  placeholder="State Of Origin" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Town/City</label>
<input type="text" class="form-control form-control-md" placeholder="Town/City" name="cit" style="text-transform: capitalize;" >
</div>
</div>
<br>
<b><i class="fa fa-star"></i> Loan Product Information</b><br><br>
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
<input type="text" class="form-control form-control-md" name="amt" placeholder="Principal Amount" required="required">
</div>
</div>
<hr>
<b><i class="fa fa-star"></i> Bank Details</b><br><br>
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
<?php 
// checking if loan officer has been mapped to a team lead
if($mapped == 'Mapped'){
?>
<button type="button"  class="btn btn-outline-primary btn-sm"  onclick="datas()" id="cli" style="float:right">Next >></button>
<br>
<?php 
}else{
?>
<button type="button" disabled class="btn btn-outline-primary btn-sm"  onclick="datas()" id="cli" style="float:right">Next >></button>
<br>
<marquee><span style="color:red">This user need's to be mapped to a team leader</span></marquee>
<?php 
}
?>

</div>

<br>






<div style="display:none" id="second">
<div class="container">
<div class="position-relative m-4">
<div class="progress" style="height: 2px;">
<div class="progress-bar" role="progressbar" style="width:50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-icon btn-primary rounded-pill">1</button>
<button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-icon btn-primary rounded-pill">2</button>
<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-icon btn-light rounded-pill">3</button>
</div>
</div> <!-- end col-->
<br>
<i><b style="color:red">Note:</b> All fields in red border are </i><br><br>
<b><i class="fa fa-star"></i> Business Information</b><br><br>
<div class="row" style="margin-top:20px;">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Business Name</label>
<input type="text" class="form-control form-control-md" placeholder="Business Name" name="bsn" style="text-transform: capitalize;" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Business Type</label>
<input type="text" class="form-control form-control-md" placeholder="Business Type" name="bt" style="text-transform: capitalize;" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> State</label>
<input type="text" class="form-control form-control-md" name="st2"  placeholder="State Of Origin" style="text-transform: capitalize;" >
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Start Date</label>
<input type="Date" class="form-control form-control-md" name="sd" >
</div>
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Address</label>
<input type="text" class="form-control form-control-md" placeholder="Address" name="ad2" >
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Business Owner Name</label>
<input type="text" class="form-control form-control-md" placeholder="Business Owner Name" name="owner" style="text-transform: capitalize;" >
</div>
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Shop Ownership</label>
<select type="text" class="form-control form-control-md" name="sh" >
<option value="">Select Option</option>
<option value="Rented">Rented</option>
<option value="Owned">Owned</option>
<option value="Leased">Leased</option>
<option value="No Shop">No Shop</option>
</select>
</div>
</div>
<br>
<button type="button" class="btn btn-outline-success btn-sm" onclick="sec()"  id="save" style="float:right">Next >></button>
<button type="button" class="btn btn-outline-primary btn-sm" onclick = "bck()" style="float:right; margin-right:10px"><< Back</button>
<br><br><br>




</div>





<div style="display:none" id="third">
<div class="container">
<div class="position-relative m-4">
<div class="progress" style="height: 2px;">
<div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-icon btn-primary rounded-pill">1</button>
<button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-icon btn-primary rounded-pill">2</button>
<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-icon btn-primary rounded-pill">3</button>
</div>
</div> <!-- end col-->
<br>
<br>
<div style="margin: auto; width:250px">
<label style="font-size:13px"><i style="color:red">*</i> NIN</label>
<input type="number" class="form-control form-control-md"  placeholder="Enter NIN" name="nin" oninput="validateNIN()" >
<br>
<center>
<i id="checks" style="margin-left:10px; display:none"><img src="../loader/loader.gif" style="height:18px"> Checking NIN.! Please wait...</i>
<i id="bvnerrors" style="color:red; margin-left:10px; display:none">Invalid NIN !! Please Check...</i>

<h5 id="fullNames"></h5>
</center>
</div>
<br>
<i><b style="color:red">Note:</b> All fields in red border are </i><br><br>
<b><i class="fa fa-star"></i> Gaurantor Information</b><br>

<div class="row" style="margin-top:20px;">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Surname</label>
<input type="text" class="form-control form-control-md" placeholder="Surname" name="surname2" id="sn" style="text-transform: capitalize;" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Firstname</label>
<input type="text" class="form-control form-control-md" placeholder="Firstname" name="firstname2" id="fn" style="text-transform: capitalize;" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Lastname</label>
<input type="text" class="form-control form-control-md" placeholder="Lastname" name="lastname2" id="ln" style="text-transform: capitalize;" >
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Phone No</label>
<input type="number" class="form-control form-control-md" placeholder="Phone No" name="phone2" id="ph" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Address</label>
<input type="text" class="form-control form-control-md" placeholder="Address" name="address3" >
</div>
<div class="col-sm-4">
<label style="font-size:13px"><i style="color:red">*</i> Occupation</label>
<input type="text" class="form-control form-control-md" placeholder="Occupation" name="occupation" style="text-transform: capitalize;" >
</div>
</div>
<div class="row" style="margin-top:20px;">
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> Relationship</label>
<select class="form-control form-control-md" name="relationship" >
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
<select class="form-control form-control-md" name="gender3" >
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="row" style="margin-top:20px; display:none">
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> ID Type</label>
<input type="text" class="form-control form-control-md" value="National ID Card" name="idtype" >
</div>
<div class="col-sm-6">
<label style="font-size:13px"><i style="color:red">*</i> ID Card No</label>
<input type="text" class="form-control form-control-md" placeholder="ID Number" name="idno" id="ninData" >
</div>
</div>
<br>
<button type="submit" class="btn btn-outline-success btn-sm" id="submit" style="float:right; ">Submit Application</button>
<button type="button" class="btn btn-outline-primary btn-sm" onclick = "bcks()" style="float:right; margin-right:10px"><< Back</button>
</form>
<br><br><br>



</div>







</div>




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
var loadFile = function(event) {
var image = document.getElementById('output');
image.src = URL.createObjectURL(event.target.files[0]);
};
var loads = function(event) {
var image = document.getElementById('outputs');
image.src = URL.createObjectURL(event.target.files[0]);
};
function datas(){
var x = document.getElementById("first");
var y = document.getElementById("second");
x.style.display = 'none';
y.style.display = 'block';
}

function bck(){
var x = document.getElementById("first");
var y = document.getElementById("second");
x.style.display = 'block';
y.style.display = 'none';
}

function sec(){
var x = document.getElementById("second");
var y = document.getElementById("third");
x.style.display = 'none';
y.style.display = 'block';
}

function bcks(){
var x = document.getElementById("second");
var y = document.getElementById("third");
x.style.display = 'block';
y.style.display = 'none';
}
</script>


<script type="text/javascript">
$(document).ready(function(){
$("#bvn").focusout(function(){
$("#fullName").hide();
$("#check").show();
var bvn = document.getElementById("bvn").value;
if($('#bvn').val().length != 11){
setTimeout(function(){
$("#check").hide();
$("#bvnerror").show();
$("#cli").attr("disabled", "disabled");
}, 3000);
setTimeout(function(){
$("#check").hide();
$("#bvnerror").hide();
}, 6000);
}else{
// validate bvn
$.ajax({
method: "POST",
url: "bvn_check_bck.php",
data: {'bvn': bvn},
success:function(data){
$("#check").hide();
if(data == 1){
alert("🚫 Customer application already submited for review.!! please check application list to confirm..");
$("#cli").attr("disabled", "disabled");
$("#check").hide();
}else if(data == 2){
alert("🚫 Customer already has a running active loan.!! please check..");
$("#cli").attr("disabled", "disabled");
$("#check").hide();
}else if(data == 3){
alert("🚫 Customer BVN has been blacklisted.!! please check..");
$("#cli").attr("disabled", "disabled");
$("#check").hide();
}else if(data == 4){
alert("🚫 Systen show that customer has been used as a gaurantor for another client having a runing loan.!! please check..");
$("#cli").attr("disabled", "disabled");
$("#check").hide();
}else if(data == 5){
alert("🚫 System show's that the customer is an existing customer. please go to create loan to proceed with the registration..");
$("#check").hide();
}else{
$("#check").hide();
$("#bvnerror").hide();
$("#fullName").show();
$("#cli").removeAttr('disabled');
verifyBVN(); // BVN validation
}
}
});
// conditional statement end here
}
});
});
</script>




<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to submit this application for review ..";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#please").modal('show');
$.ajax({
url: "loan_registration.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
if(data == 1){
alert("🚫 Please fill all required fields before submitting the application.!");
$("#please").modal('hide');
}else if(data == 2){
setTimeout(function(){
$("#uploadForm")[0].reset();
$("#please").modal('hide');
ToastNotification.success('Application submitted successfully');
}, 3000);
}else{
$("#please").modal('hide');
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


<?php include '../footer.php'; ?>