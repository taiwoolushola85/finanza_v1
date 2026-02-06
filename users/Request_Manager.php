
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
<h3 class="mb-sm-0">Request Manager</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Request</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Request</a></li>
<li class="breadcrumb-item active" aria-current="page">Request Manager</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->
<br>
<br>







<div class="bd-example">
<nav class="tab-bottom-bordered mb-3">
<div class="mb-0 nav nav-tabs" id="nav-tab1" role="tablist">
<button class="nav-link active" id="nav-home-11-tab" data-bs-toggle="tab" data-bs-target="#nav-home-11" type="button" role="tab" aria-controls="nav-home-11" aria-selected="true">
<i class="fa fa-money"></i> Withdrawal Request</button>
<button class="nav-link" id="nav-profile-11-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-11" type="button" role="tab" aria-controls="nav-profile-11" aria-selected="false">
<i class="fa fa-plus"></i> Savings Repayment Request</button>
<button class="nav-link" id="nav-contact-11-tab" data-bs-toggle="tab" data-bs-target="#nav-contact-11" type="button" role="tab" aria-controls="nav-contact-11" aria-selected="false">
<i class="fa fa-star"></i> Flexi Withdrawal Request</button>
<button class="nav-link" id="nav-contact-12-tab" data-bs-toggle="tab" data-bs-target="#nav-contact-12" type="button" role="tab" aria-controls="nav-contact-12" aria-selected="false">
<i class="fa fa-cog"></i> Loan Write-Off Request</button>
</div>
</nav>
<div class="tab-content iq-tab-fade-up" id="nav-tabContent">
<div class="tab-pane show active" id="nav-home-11" role="tabpanel" aria-labelledby="nav-home-11-tab">

<div class="row">
<div class="col-sm-10" style="margin-top: 10px;">
<label>Show Entries</label>
<select class="form-control form-control-sm" id="maxRows" style="width:50px;" oninput="getEntry()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-2" style="margin-top: 10px;">
<input type="search" class="form-control form-control-sm" hidden  id="search" placeholder="search..." style="margin-top:10px">
</div>
</div>
<br>
<div id="result"></div>


</div>
<div class="tab-pane" id="nav-profile-11" role="tabpanel" aria-labelledby="nav-profile-11-tab">

<div class="row">
<div class="col-sm-10" style="margin-top: 10px;">
<label>Show Entries</label>
<select class="form-control form-control-sm" id="maxRows" style="width:50px;" oninput="getEntry()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-2" style="margin-top: 10px;">
<input type="search" class="form-control form-control-sm" hidden id="search" placeholder="search..." style="margin-top:10px">
</div>
</div>
<br>
<div id="results"></div>


</div>
<div class="tab-pane" id="nav-contact-11" role="tabpanel" aria-labelledby="nav-contact-11-tab">
<div class="row">
<div class="col-sm-10" style="margin-top: 10px;">
<label>Show Entries</label>
<select class="form-control form-control-sm" id="maxRows" style="width:50px;" oninput="getEntry()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-2" style="margin-top: 10px;">
<input type="search" class="form-control form-control-sm" hidden id="search" placeholder="search..." style="margin-top:10px">
</div>
</div>
<br>
<div id="writeoff"></div>
</div>
<div class="tab-pane" id="nav-contact-12" role="tabpanel" aria-labelledby="nav-contact-12-tab">
<div class="row">
<div class="col-sm-10" style="margin-top: 10px;">
<label>Show Entries</label>
<select class="form-control form-control-sm" id="maxRows" style="width:50px;" oninput="getEntry()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-2" style="margin-top: 10px;">
<input type="search" class="form-control form-control-sm" hidden id="search" placeholder="search..." style="margin-top:10px">
</div>
</div>
<br>
<div id="flexi"></div>


</div>
</div>
</div>




<div class="modal" id="updatePage" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" style="display:none; width:1200px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">CUSTOMER REQUEST PROFILE</h5>
</div>
<div class="modal-body">
<div id="page"></div>
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
//setInterval(function(){
// ajax function start here to load table data
$("#loader").modal('show');
$.ajax({
method: "POST",
url: "load_withdrawal.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#result').html(data);
}, 1000);
}
});
///}, 1000);
// ajax function ends here
});
</script>


<script type="text/javascript">
$(document).ready(function(){
//setInterval(function(){
// ajax function start here to load table data
$("#loader").modal('show');
$.ajax({
method: "POST",
url: "load_saving_repayment_request.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#results').html(data);
}, 1000);
}
});
///}, 1000);
// ajax function ends here
});
</script>


<script type="text/javascript">
$(document).ready(function(){
//setInterval(function(){
// ajax function start here to load table data
$("#loader").modal('show');
$.ajax({
method: "POST",
url: "load_writeoff_list.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#writeoff').html(data);
}, 1000);
}
});
///}, 1000);
// ajax function ends here
});
</script>

<script type="text/javascript">
$(document).ready(function(){
//setInterval(function(){
// ajax function start here to load table data
$("#loader").modal('show');
$.ajax({
method: "POST",
url: "load_flexi_request_list.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#flexi').html(data);
}, 1000);
}
});
///}, 1000);
// ajax function ends here
});
</script>

<script type="text/javascript">
$(document).ready(function(){
//setInterval(function(){
// ajax function start here to load table data
$("#loader").modal('show');
$.ajax({
method: "POST",
url: "load_writeoff_list.php",
dataType: "html",
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$('#schedule').html(data);
}, 1000);
}
});
///}, 1000);
// ajax function ends here
});
</script>





<br>
<br>
<?php include '../footer.php'; ?>