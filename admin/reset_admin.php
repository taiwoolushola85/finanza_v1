<?php include 'header.php'; ?>


<!-- Left Sidebar End -->
<div class="sidebar-backdrop" id="sidebar-backdrop"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
<div class="card">
<div class="card-body">
<b>Reset Admin</b>
<center>
<?php
$img = $loc ?? '';
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
<img src="<?php echo $imgPath; ?>" width="90" height="90" class="rounded-circle d-flex" id="output">
<br>
<h4><b><?php echo $row['Name']?></b></h4>
</center>
<hr>

<form action="" method="post" id="resetPass">
<div style="margin: auto;">
<div class="row">   
<div class="col-sm-4">
<label>Username</label> 
<input type="text" class="form-control form-control-md" required="required" hidden name="id" value="<?php echo $row['id']; ?>">
<input type="text" class="form-control form-control-md" required="required" name="us" value="<?php echo $row['Username']; ?>" placeholder="Enter Username">

</div>
<div class="col-sm-4">
<label>Password</label> 
<input type="password" class="form-control form-control-md" required="required" name="pw" value="<?php echo $row['Password']; ?>" placeholder="Enter Password">
</div>
<div class="col-sm-4">
<label>Upload Image</label> 
<input type="file" class="form-control form-control-md" required="required" id="furl" name="Pic" onchange="loadFile(event)" placeholder="Enter Password">
</div>
</div>
<br>
<button type="submit" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fa fa-plus"></i> Reset Admin</button>
<button type="button" class="btn btn-outline-info btn-sm" style="font-size: 10px;" data-bs-toggle="modal" data-bs-target="#standard-modal"><i class="fa fa-key"></i> Set Authentication</button>
</form>
<hr>

</div>



</div>
</div>



<div class="row">
<div class="col-sm-6">
<div class="card">
<div class="card-body">
<b><i class="fa fa-star"></i> Info</b>
<hr>
<span> Name: <b><?php echo $row['Name']?></b></span><br>
<span> Username: <b><?php echo $row['Username']?></b></span><br>
<span> Role: <b><?php echo $row['User_Group']?></b></span><br>
<span> Branch: <b><?php echo $row['Branch']?></b></span><br>
<hr>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="card">
<div class="card-body">
<b><i class="fa fa-star"></i> Info</b>
<hr>
<span> Email: <b><?php echo $row['Email']?></b></span><br>
<span> Phone: <b><?php echo $row['Phone']?></b></span><br>
<span> Role Category: <b><?php echo $row['Role_Categorys']?></b></span><br>
<span> Status: <b><?php echo $row['Status']?></b></span><br>
<hr>
</div>
</div>
</div>
</div>







</div>




<div class="modal" id="standard-modal" tabindex="-1" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-dialog-centered modal-sm" style="display:none; width:400px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" style="font-size:12px; text-transform:uppercase"> Authentication</h6>
<button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form action="" method="post" id="setAuth">
<div style="margin: auto;">
<div class="row">   
<div class="col-sm-12"> 
<label>Authentication Pin</label> 
<input type="text" class="form-control form-control-md" value="<?php echo $row['id']; ?>" hidden required="required" name="id">
<input type="text" class="form-control form-control-md" value="<?php echo $row['Pin']; ?>" required="required" name="pin" placeholder="Enter Authentication Pin">
</div>
</div>
<br>
<button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-lock"></i> Set Pin</button>
</div>
</div>
</div>
</div>





<script>
var loadFile = function(event) {
var image = document.getElementById('output');
image.src = URL.createObjectURL(event.target.files[0]);
};
</script>








</div>




<script type="text/javascript">
$(document).ready(function (e){
$("#resetPass").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to about to reset admin account.?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#please").modal('show');
$.ajax({
url: "reset_admin_bck.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
if(data == 1){
setTimeout(function(){
$("#please").modal('hide');
ToastNotification.success('Admin Successfully Reset');
}, 3000);
setTimeout(function(){
window.location.href='../config/session.php';
}, 6000);
}else{
alert('🚫' + data);
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
$("#setAuth").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to about to set pin for admin account.?";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#standard-modal").modal('hide');
$("#please").modal('show');
$.ajax({
url: "set_pin.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
if(data == 1){
setTimeout(function(){
$("#please").modal('hide');
ToastNotification.success('Pin Successfully Created');
}, 3000);
//
}else{
alert('🚫' + data);
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