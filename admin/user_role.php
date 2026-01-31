<?php include 'header.php'; ?>
<!-- Left Sidebar End -->
<div class="sidebar-backdrop" id="sidebar-backdrop"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
<div class="card border-0 mb-3 overflow-hidden bg-gray-800 text-white">
<div class="card-body">
<form action="" method="post" id="uploadRole">
<div class="row">
<div class="col-sm-4">
<label>User Role</label>
<input type="text" class="form-control form-control-md" required="required" name="rl" placeholder="Enter Role Title">
</div>
<div class="col-sm-4">
<label>Role Category</label>
<select type="text" class="form-control form-control-md" required="required" name="ro">
<option value="">Select Option</option>
<option value="Administrator">Administrator</option>
<option value="Field Operations">Field Operations</option>
<option value="Branch Operations">Branch Operations</option>
<option value="Managements">Managements</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="submit" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fa fa-plus"></i> Add Role</button>
</div>
</form>
</div>
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="button" data-bs-toggle="modal" data-bs-target="#roleModal" class="btn btn-outline-info btn-sm" style="font-size: 10px;"><i class="fa fa-list"></i> Role List</button>
</div>
</div>
<div class="col-sm-8">
<span style="display:none; color:red" id="exit"><i class="fa fa-exclamation-triangle"></i> User role already exist! please use another role name..</span>
</div>
</div>
<hr>
</div>
</div>



</div>






<div class="modal" id="roleModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" style="display:none; width:1000px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">USER ROLE TABLE</h5>
</div>
<div class="modal-body">
<form action="" method="post" id="uploadForm">
<div class="row">
<div class="col-sm-6">
<label>User Role</label>
<input type="hidden" class="form-control form-control-md" required="required" name="id" id="stid">
<input type="text" class="form-control form-control-md" required="required" name="rl" id="des" placeholder="Enter Role Title">
</div>
<div class="col-sm-6">
<label>Role Category</label>
<select class="form-control form-control-md" required="required" name="ro" id="cat">
<option value="">Select Option</option>
<option value="Field Operations">Field Operations</option>
<option value="Branch Operations">Branch Operations</option>
<option value="Other Operations">Other Operations</option>
<option value="Managements">Managements</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Update</button>
</div>
</form>
</div>
<div class="col-sm-10">
<span style="display:none;" id="rwait"><i><img src="../loader/loader.gif" style="height:15px"></i> Updating record.! Please wait...</span>
<span style="display:none; color:green" id="rupdate"><i class="fa fa-check"></i> User Role Updated Successfully..</span>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-9">
<label>Show Entries</label>
<select class="form-control form-control-sm" id="maxRows" style="width:50px;" oninput="getEntry()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-3">
<div>
<label>Search</label>
<input type="text" class="form-control form-control-sm" id="search" placeholder="Type here to search..." >
</div>
</div>
</div>
<br>
<div id="result"></div>
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
// ajax function start here
$('#loader').modal('show');
$.ajax({
method: "POST",
url: "role_analysis.php",
dataType: "html",  
success:function(data){
setTimeout(function(){
$('#loader').modal('hide');
$('#result').html(data);
}, 1000);
}
});
// ajax function ends here
});
</script>


<script type="text/javascript">
function getEntry()  {
$("#loader").modal('show');
$("result").hide();
var maxRows = document.getElementById("maxRows").value;
// ajax function start here
$.ajax({
method: "POST",
url: "role_analysis.php",
dataType: "html",  
data: {
'maxRows': maxRows
},
success:function(data){
$("result").show();
setTimeout(function(){
$("#loader").modal('hide');
$('#result').html(data);
}, 1000);
}
});
// ajax function ends here
}
</script>



<script type="text/javascript">
$(document).ready(function(){
$("#search").keydown(function(){
var search = document.getElementById("search").value;
// ajax function start here
$.ajax({
method: "POST",
url: "role_analysis.php",
dataType: "html",  
data: {
'search': search
},
success:function(data){
$('#result').html(data);
}
});
// ajax function ends here
});
});
</script>

<script type="text/javascript">
function load()  {
$.ajax({
method: "POST",
url: "role_analysis.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$('#result').html(data);
}, 1000);
}
});
}
</script> 

<script type="text/javascript">
$(document).ready(function (e){
$("#uploadRole").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to create a new user role..";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#please").modal('show');
$.ajax({
url: "create_role_bck.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#please").modal('show');
$("#uploadRole")[0].reset();
if(data == 1){
setTimeout(function(){
$("#please").modal('hide');
$("#exit").show();
}, 3000); 
setTimeout(function(){
$("#please").modal('hide');
$("#exit").hide();
}, 7000); 
}else if(data == 2){
setTimeout(function(){
$("#please").modal('hide');
ToastNotification.success('User Role Successfully Created');
load();
}, 3000);  
setTimeout(function(){
$("#please").modal('hide');
}, 6000);  
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