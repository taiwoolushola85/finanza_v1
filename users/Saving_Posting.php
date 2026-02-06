<?php include 'head.php'; ?>

<?php 
if($gr == 'Loan Officers'){
?>
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
<h3 class="mb-sm-0">Saving Posting</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Saving Posting</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>


<!-- GROUP SELECT -->
<div class="row">
<div class="col-md-3">
<label>Select Saving Type</label>
<div class="input-group mb-3">
<select class="form-control form-control-md" id="gr" required onchange="myFunction()">
<option value="">Select Option</option>
<option value="Express">Express Saving</option>
<option value="Flexi">Flexi Saving</option>
</select>
</div>
</div>
</div>


<p id="not">
<i class="fa fa-bell" style="color:red;"></i> Note: Please select the saving type you want to post savings for.
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
url: "load_saving_type.php",
data: { gr: gr },
dataType: "html",
success: function (response) {
$("#not").hide();
$("#result").html(response);
},
error: function (xhr, status, error) {
console.error("AJAX Error:", error);
$("#result").html("<div class='alert alert-danger'>Failed to load customers.</div>");
}
});
}
</script>



<?php 
}else if ($gr == 'Recovery'){
?>



<!-- MAIN CONTENT -->
<div class="main-content">
<div class="page-content">
<div class="container-fluid">
<div class="card">
<div class="card-body">
<h6><b style="text-transform: uppercase;"> 
<i class="fa fa-file"></i>
SAVING POSTING </b></h6>
</div>
</div>

<br>
<br>
<div class="card">
<div class="card-body">
<div id="results"></div>
</div>
</div>

</div>
</div>
</div> <!-- END MAIN CONTENT -->


<script type="text/javascript">
$(document).ready(function(){
$("#loader").show();
// ajax function start here
$.ajax({
method: "POST",
url: "load_recovery_list.php",
dataType: "html",  
success:function(data){
setTimeout(function(){
$("#loader").hide();
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
<br>
<br>
<?php include '../footer.php'; ?>
