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
<h3 class="mb-sm-0">Saving Manager</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Manager</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Manager</a></li>
<li class="breadcrumb-item active" aria-current="page">Saving Manager</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>
<form action="" method="POST" enctype="multipart/form-data" id="uploadSaving">
<div class="row">
<div class="col-sm-3">
<label><i style="color:red">*</i> Enter Customer BVN No</label>
<div class="input-group mb-3">
<input type="number" class="form-control form-control-md"  id="bvn" placeholder="Enter 11 Digit Number" required>
<span class="input-group-append">
<button type="submit" class="btn btn-outline-primary btn-sm" onclick="data()"><i class="fa fa-search"></i> Search</button>
</span>
</div>
</form>
</div>
</div>
<br>
<br>


<div id="results"></div>



<div class="modal" id="updateModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="display:none; width:1000px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">CUSTOMER SAVING PROFILE</h5>
</div>
<div class="modal-body">
<div id="profile"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>



<script type="text/javascript">
$(document).ready(function (e){
$("#uploadSaving").on('submit',(function(e){ e.preventDefault();
$("#results").hide();
$("#please").modal('show');
var bvn = $("#bvn").val();
$.ajax({
url: 'saving_info_bck.php?bvn=' + bvn,
type: "GET",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
setTimeout(function(){
$("#results").show();
$("#please").modal('hide');
$('#results').html(data);
}, 3000);
},
error: function(){
}
});
}));
});
</script>




<?php include '../footer.php'; ?>