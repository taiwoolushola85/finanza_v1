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
<h3 class="mb-sm-0">Add Group</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Group</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>

<form action="" method="post" id="createGroup">
<div class="row">
<div class="col-sm-4">
<label>Group Name</label>
<input type="text" class="form-control form-control-md" required="required" name="gr" placeholder="Enter Group Name">
</div>
</div>
<br>
<span style="display:none; color:red" id="exit"><i class="fa fa-exclamation-triangle"></i> Group name already exist! please use another name..</span>
<div class="row">
<div class="col-sm-2">
<?php
if($mapped != 'No'){
?>
<button type="submit" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fa fa-plus"></i> Create Group</button>
<?php
}else{
?>
<br>
<button disabled class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fa fa-plus"></i> Create Group</button>
<?php
}
?>
</form>
</div>
<div class="col-sm-10">
<?php
if($mapped != 'No'){
?>

<?php
}else{
?>
<span style="color:red"><i class="fa fa-exclamation-triangle"></i> Your account need to be mapped to a team leader. please contact Administrator</span>
<?php
}
?>
</div>
</div>
<br>



<div id="not"></div>







</div>




<script type="text/javascript">
$(document).ready(function (e){
$.ajax({
method: "POST",
url: "load_group_notification_json.php",
dataType: "html",
success:function(data){
$('#not').html(data);
}
});
});
</script> 


<script type="text/javascript">
function loadNotification() {
$.ajax({
method: "POST",
url: "load_group_notification_json.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$('#not').html(data);
}, 100);
}
});
}
</script> 





<script type="text/javascript">
$(document).ready(function (e){
$("#createGroup").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to create group for repayments collection ..";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#please").show();
$.ajax({
url: "create_group_bck.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#please").modal('show');
$("#createGroup")[0].reset();
if(data == 1){
setTimeout(function(){
$("#please").modal('hide');
$("#exit").show();
}, 3000);
setTimeout(function(){
$("#please").modal('hide');
$("#exit").hide();
}, 6000);
}else if(data == 2){
setTimeout(function(){
$("#please").modal('hide');
loadNotification();
ToastNotification.success('Group Successfully Created');
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