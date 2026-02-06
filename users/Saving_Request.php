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
<h3 class="mb-sm-0">Saving Request</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Saving Request</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>


<br>
<label>Select Request Type</label>
<select class="form-control form-control-md" id="types" style="width:250px;" oninput="getRequest()">
<option value="">Select Option</option>
<option value="Withdraw">Saving Withdrawal Request</option>
<option value="Repayment">Saving Repayment Request</option>
<option value="Flexi">Flexi Saving Withdrawal Request</option>
</select>
<br>
<br>


<div id="result"></div>






<div class="modal" id="updateModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="display:none; width:1000px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">CUSTOMER REQUEST PROFILE</h5>
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



<div class="modal" id="updateModals" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="display:none; width:1000px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">CUSTOMER REQUEST PROFILE</h5>
</div>
<div class="modal-body">
<div id="profiles"></div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
function getRequest()  {
$("#loader").modal('show');
$("#result").hide();
var types = document.getElementById("types").value;
// ajax function start here
$.ajax({
method: "GET",
url: "load_request_type.php?types=" + types,
dataType: "html",  
data: {
'types': types
},
success:function(data){
$("#result").show();
setTimeout(function(){
$("#loader").modal('hide');
$('#result').html(data);
}, 1000);
}
});
// ajax function ends here
}
</script>


<br>
<br>
<?php include '../footer.php'; ?>