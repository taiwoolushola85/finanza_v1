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
<h3 class="mb-sm-0">Reciept Posting</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Reciept Posting</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>


<?php 
if($gr == 'Loan Officers'){
?>

<!-- GROUP SELECT -->
<div class="row">
<div class="col-md-3">
<label>Select Group</label>
<div class="input-group mb-3">
<select class="form-control form-control-md" id="gr" required onchange="myFunction()">
<option value="">Select Option</option>
<?php 
include '../config/db.php';
// sanitize $user only AFTER it is available
$user_safe = mysqli_real_escape_string($con, $user); 
$Query = "SELECT id, Name FROM groups WHERE User = ? AND Status = 'Activated' ORDER BY Name ASC";
$stmt = mysqli_prepare($con, $Query);
mysqli_stmt_bind_param($stmt, "s", $user_safe);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
while ($rows = mysqli_fetch_assoc($result)) {
$grid = $rows['id'];
$name = htmlspecialchars($rows['Name']);
echo "<option value='$grid'>$name</option>";
}
mysqli_stmt_close($stmt);
?>
</select>
</div>
</div>
</div>


<p id="not">
<i class="fa fa-bell" style="color:red;"></i> Note: Please select the group you want to post repayment for.
</p>

<div id="result"></div>


</div>
</div>
</div> <!-- END MAIN CONTENT -->


<script>
function myFunction() {
var gr = $("#gr").val();
$.ajax({
method: "POST",
url: "load_customer_by_group.php",
data: { gr: gr },
dataType: "html",
success: function (response) {
$("#not").hide();
$("#result").html(response);
},
error: function (xhr, status, error) {
console.error("AJAX Error:", error);
$("#result").html(
"<div class='alert alert-danger'>Failed to load customers.</div>"
);
}
});
}
</script>



<?php 
}else if ($gr == 'Recovery'){
?>

<br>
<br>
<br>
<br>
<br>


<div id="results"></div>

 <!-- END MAIN CONTENT -->


<script type="text/javascript">
$(document).ready(function(){
$("#loader").modal('show');
// ajax function start here
$.ajax({
method: "POST",
url: "load_recovery_list.php",
dataType: "html",  
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#results').html(data);
}, 1000);
}
});
// ajax function ends here
});
</script>






<?php 
}else{

}
?>
<br><br>
<?php include '../footer.php'; ?>
