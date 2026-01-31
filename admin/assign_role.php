
<!--  Modal content for the menu -->
<div class="modal" id="menu">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" id="myLargeModalLabel">Menu List</h6>
</div>
<div class="modal-body">
<div id="result"></div>
<div class="modal-footer">
<a href="javascript:;" class="btn btn-outline-danger btn-sm" id="close" data-bs-dismiss="modal">Close</a>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



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
<h6><b class="fa fa-cog"></b> USER MENU CONTROL PANEL</h6>
<hr>
<form action="" method="post" id="uploadRole">
<div class="row">
<div class="col-sm-4">
<label>User Role</label>
<select type="text" class="form-control form-control-md" required="required" name="lv">
<option value="">Select Option</option>
<?php
include_once '../config/db.php';
$Query = "SELECT  * FROM role ORDER BY Name ASC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$name= $rows['Name'];
?>
<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
<?php
}
}
mysqli_close($con);
?>
</select>
</div>
</div>
<hr>
<button type="submit" class="btn btn-outline-info btn-sm" style="font-size: 10px;"><i class="fa fa-eye"></i> View</button>
</form>
</div>
</div>




</div>



<script>
// to hide modal box
$(document).ready(function() {
$('#close').on('click', function() {
$("#menu").hide();
});
});
</script>


<script type="text/javascript">
$(document).ready(function (e){
$("#uploadRole").on('submit',(function(e){ e.preventDefault();
$("#please").modal('show');
$.ajax({
url: "all_role.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#please").modal('show');
setTimeout(function(){
$("#please").modal('hide');
$("#menu").modal('show');
$('#result').html(data);
}, 3000);
},
error: function(){
}
});
}));
});
</script>

<?php include '../footer.php'; ?>