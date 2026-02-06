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
<h3 class="mb-sm-0">Application</h3>
<nav aria-label="breadcrumb" class="page-title-right">
<ol class="breadcrumb border-0">
<li class="breadcrumb-item">
<a href="#!">
<i class="mdi mdi-home-outline fs-18 lh-1"></i>
<span class="visually-hidden">Home</span>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Applications</li>
</ol>
</nav>
</div>
</div>
</div>
<!-- end page title -->



<br><br>
<div class="row">
<div class="col-sm-3">
<form action="" method="post" id="uploadRole">
<span>Registration ID  <i style="color:red">*</i></span>
<div class="input-group">
<input type="text" class="form-control form-control-md" name="reg" id="reg" placeholder="Enter Registration ID" required="required">
<button class="btn btn-outline-secondary btn-sm" type="submit"><i class="fa fa-search"></i> Search</button>
</div>
</form>
</div>
</div>



<div id="result"></div>



<script type="text/javascript">
$(document).ready(function (e){
$("#uploadRole").on('submit',(function(e){ e.preventDefault();
$("#please").modal('show');
var id = document.getElementById('reg').value;
$.ajax({
url: "check_client.php?id=" + id,
type: "GET",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
setTimeout(function(){
$("#please").modal('hide');
$('#result').html(data);
}, 1000);
},
error: function(){
}
});
}));
});
</script>

<br><br>
<?php include '../footer.php'; ?>