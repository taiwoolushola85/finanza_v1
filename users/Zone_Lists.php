
<?php include 'head.php'; ?>

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
<h3 class="mb-sm-0">Zone Lists</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Zone</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Zone</a></li>
<li class="breadcrumb-item active" aria-current="page">Zone List</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->




<br>
<br>
<div class="btn-group" style="float:right;">
<button class="btn btn-success"data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-plus"></i> Mapp Zone</button>
<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModals"><i class="fa fa-history"></i> Switch Zone</button>
</div>
<br><br>
<br>

<b><i class="fa fa-list"></i> Zone Branch List</b>
<div class="row">
<div class="col-sm-10" style="margin-top:10px">
<b style="font-size:10px">
+ Limit</b>
<select class="form-control search-input search form-control-sm" name="lmt" required style="width:50px" id="lmt" oninput="getGroup()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-2" style="margin-top:10px">
<b style="font-size:10px">
Search</b>
<form action="" method="post" id="uploadRole">
<div class="input-group mb-3">
<input type="search" class="form-control form-control-sm"  id="search" placeholder="search..." style="margin-top:10px">
<span class="input-group-append">
</span>
</div>
</form>
</div>
<br>
<div id="result"></div>
</div>




<div class="modal" id="updateModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="display:none; width:400px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">ZONE MAPPING FORM</h5>
</div>
<div class="modal-body">
<!-- Create form -->
<form action="" method="POST" enctype="multipart/form-data" id="uploadForm">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Staff Name</label>
<select  class="form-control form-control-md" name="sf" required="required">
<option value="">Select Option</option>
<?php 
include '../config/db.php';
$Query = "SELECT  id, Name FROM users WHERE User_Group = 'Underwriter' OR User_Group = 'Internal Controls' OR User_Group = 'Zonal Manager' OR User_Group = 'Super User' 
AND Status = 'Activate' ORDER BY id ASC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$idx= $rows['id'];
$name= $rows['Name'];
?>
<option value="<?php echo $idx; ?>" ><?php echo $name; ?></option>
<?php
}
}
?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Branch</label>
<select type="text" class="form-control form-control-md" id="exampleInputEmail1" name="br" required="required">
<option value="">Select Option</option>
<?php 
include '../config/db.php';
$Query = "SELECT id, Name FROM branch ORDER BY id ASC ";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$zid= $rows['id'];
$name= $rows['Name'];
?>
<option value="<?php echo $zid; ?>"><?php echo $name; ?></option>
<?php
}
}
?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12" style="margin-top:10px">
<button type="submit" class="btn btn-outline-primary btn-sm btn-block" name="mapping" onclick="data()"> Mapp Zone</button>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>



<div class="modal" id="updateModals" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="display:none; width:400px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">ZONE SWITCHING FORM</h5>
</div>
<div class="modal-body">
<!-- Create form -->
<form action="" method="POST" enctype="multipart/form-data" id="uploadForms">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Staff Name</label>
<select  class="form-control form-control-md" name="sf" required="required">
<option value="">Select Option</option>
<?php 
include '../config/db.php';
$Query = "SELECT  id, Name FROM users WHERE User_Group = 'Underwriter' OR User_Group = 'Internal Controls' OR User_Group = 'Zonal Manager'OR User_Group = 'Super User' 
ORDER BY id ASC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$idx= $rows['id'];
$name= $rows['Name'];
?>
<option value="<?php echo $idx; ?>"><?php echo $name; ?></option>
<?php
}
}
mysqli_close($con);
?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Branch</label>
<select type="text" class="form-control form-control-md" id="exampleInputEmail1" name="br" required="required">
<option value="">Select Option</option>
<?php 
include '../config/db.php';
$Query = "SELECT id, Name FROM branch ORDER BY id ASC ";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$zid= $rows['id'];
$name= $rows['Name'];
?>
<option value="<?php echo $zid; ?>"><?php echo $name; ?></option>
<?php
}
}
mysqli_close($con);
?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12" style="margin-top:10px">
<button type="submit" class="btn btn-outline-primary btn-sm btn-block" name="mapping" onclick="data()"> Switch Zone</button>
</div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$("#loader").modal('show');
$("result").hide();
var lmt = document.getElementById("lmt").value;
// ajax function start here
$.ajax({
method: "POST",
url: "zone_list.php",
dataType: "html",  
data: {
'lmt': 10
},
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#result').html(data);
}, 1000);
}
});
// ajax function ends here
});
</script>


<script type="text/javascript">
function getGroup()  {
$("#loader").modal('show');
$("#result").hide();
var lmt = document.getElementById("lmt").value;
// ajax function start here
$.ajax({
method: "POST",
url: "zone_list.php",
dataType: "html",  
data: {
'lmt': lmt
},
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$("#result").show();
$('#result').html(data);
}, 1000);
}
});
// ajax function ends here
}
</script>

<script type="text/javascript">
$(document).ready(function () {
$("#search").on("keyup", function () {
let search = $(this).val();
// add exactly one space at the end
if (search !== "") {
search = search.trim() + " ";
}
$.ajax({
method: "POST",
url: "zone_list.php",
dataType: "html",
data: {
search: search
},
success: function (data) {
$('#result').html(data);
}
});
});
});
</script>


<script type="text/javascript">
function loads()  {
$.ajax({
method: "POST",
url: "zone_list.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$('#result').html(data);
}, 10);
}
});
}
</script> 





<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to mapp this branch to this user role.?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#updateModal").modal('hide');
$("#please").modal('show');
$.ajax({
url: "zone_map.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
if(data==1){
setTimeout(function(){
$("#please").modal('hide');
loads();
ToastNotification.success('Zone Mapped Successfully');
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



<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForms").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to switch this branch to this user role.?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#updateModals").modal('hide');
$("#please").modal('show');
$.ajax({
url: "zone_swi.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
if(data==1){
setTimeout(function(){
$("#please").modal('hide');
loads();
ToastNotification.success('Zone Switched Successfully');
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
<br>
<br>

<?php include '../footer.php'; ?>