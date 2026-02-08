<?php include_once 'head.php'; ?>
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
<h3 class="mb-sm-0">Financial Report</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Financial Report</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>

<div class="row">
<div class="col-sm-3">
<label style="font-size:13px">Select Report</label>
<select type="text" class="form-control form-control-md" name="type" required id="type" oninput="getReport()">
<option value="">Select Option</option>
<option value="1">Dibursement Report</option>
<option value="2">Profit & Loss Report</option>
</select>
</div>
</div>













<div class="modal" id="report" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" id="exampleModalLabel">FINANCIAL REPORT MODAL</h6>
<button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div id="results"></div>
</div>
<div class="modal-footer">
<a href="javascript:;" class="btn btn-danger btn-sm" id="close" data-bs-dismiss="modal">Close Report</a>
</div>
</div>
</div>
</div>
</div>



<script>
// to hide modal box
$(document).ready(function() {
$('#close').on('click', function() {
$("#report").modal('hide');
$('#type').val('');
});
});
</script>

<script type="text/javascript">
function getReport()  {
$("#please").modal('show');
var type = document.getElementById("type").value;
// ajax function start here
$.ajax({
method: "POST",
url: "financial_list.php",
dataType: "html",  
data: {
'type': type
},
success:function(data){
setTimeout(function(){
$("#please").modal('hide');
$("#report").modal('show');
$("#results").html(data);
}, 1000);
}
});
// ajax function ends here
}
</script>


<?php 
include_once '../footer.php'; 
?>