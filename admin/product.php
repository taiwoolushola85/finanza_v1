<?php include 'header.php'; ?>
<!-- Left Sidebar End -->
<div class="sidebar-backdrop" id="sidebar-backdrop"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
<div class="card border-0 mb-3 overflow-hidden bg-gray-800">
<div class="card-body">
<h6><b><b><i class="fa fa-star"></i> LOAN PRODUCT FORM</b></h6><hr>
<b>* Step 1</b>
<br><br>
<form action="" method="post" id="uploadProduct">
<div class="row">
<div class="col-12 col-sm-12 col-md-6">
<label style="font-size:11px">Product Name</label>
<input type="text" class="form-control form-control-md" placeholder="Product Name" name="name" >
</div>
<div class="col-12 col-sm-12 col-md-6">
<label style="font-size:11px">Repayment Frequency</label>
<select type="text" class="form-control form-control-md"  name="fre" required>
<option value="">Select Frequency</option>
<option value="Daily">Daily</option>
<option value="Weekly">Weekly</option>
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
</select>
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="submit" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fa fa-plus"></i> Create Product</button>
</div>
</form>
</div>
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="button" data-bs-toggle="modal" data-bs-target="#productModal" class="btn btn-outline-info btn-sm btn-block" style="font-size: 10px;"><i class="fa fa-list"></i> Product List</button>
</div>
</div>
<div class="col-sm-8">
<span style="display:none; color:red" id="exit"><i class="fa fa-exclamation-triangle"></i> Product name already exist! please use another name..</span>
<span style="display:none; color:green" id="update"><i class="fa fa-check"></i> Loan Product Updated Successfully..</span>
</div>
</div>
</div>
</div>



<div class="card border-0 mb-3 overflow-hidden bg-gray-800">
<div class="card-body">
<b><i class="fa fa-cog"></i> Product Configuration Setting</b><hr>
<b>* Step 2</b>
<br><br>
<form id="productConfig" name="form1" method="POST">
<div class="row">
<div class="col-12 col-sm-12 col-md-3">
<div id="product">
<label style="font-size:11px">Select Product</label>
<select type="text" class="form-control form-control-md"  name="pro" required>
<option value="">Select Loan Product</option>
<?php 
include '../config/db.php';
$Query = "SELECT  id, Product_Name FROM product WHERE Status = 'Activated' ORDER BY Product_Name ASC";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$pp= $rows['id']; // product id
$name= $rows['Product_Name'];
?>
<option value="<?php echo $pp; ?>"><?php echo $name; ?></option>
<?php
}
}
?>
</select>
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-12 col-sm-12 col-md-4">
<label style="font-size:11px">Tenure</label>
<input type="text" class="form-control form-control-md" placeholder="Tenure" name="ten" >
</div>
<div class="col-12 col-sm-12 col-md-4">
<label style="font-size:11px">Interest Rate %</label>
<input type="text" class="form-control form-control-md" placeholder="Interest Rate" name="int">
</div>
<div class="col-12 col-sm-12 col-md-4">
<label style="font-size:11px">Inssurance %</label>
<input type="text" class="form-control form-control-md" placeholder="Inssurance"name="ins">
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="submit" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fa fa-plus"></i> Create Product</button>
</div>
</form>
</div>
<div class="col-sm-10">
<span style="display:none;" id="wait">
<i><img src="../loader/loader.gif" style="height:15px"></i> Updating Record.! Please wait...</span>
<span style="display:none; color:red" id="exits"><i class="fa fa-exclamation-triangle"></i> Configuration setting already exist ! Please check product list..</span>
</div>
</div>



</div>


</div>

<div class="modal" id="productModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" style="display:none; width:1000px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">PRODUCT LIST TABLE</h5>
</div>
<div class="modal-body">
<form action="" method="post" id="uploadForm">
<div class="row">
<div class="col-sm-6">
<label>Product</label>
<input type="hidden" class="form-control form-control-sm" required="required" name="id" id="stid">
<input type="hidden" class="form-control form-control-sm" required="required" name="prid" id="stno">
<input type="text" class="form-control form-control-md" required="required" name="pr" id="name" placeholder="Enter Product Name">
</div>
<div class="col-sm-6">
<label>Tenure</label>
<input type="text" class="form-control form-control-md" required="required" name="ten" id="tenure" placeholder="Enter Tenure">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<label>Insurance</label>
<input type="text" class="form-control form-control-md" required="required" name="in" id="in" placeholder="Enter Insurance">
</div>
</div>
<div class="row">
<div class="col-sm-6">
<label>Rate</label><i style="color:red"> [ % ]</i>
<input type="text" class="form-control form-control-md" required="required" name="rt" id="rate" placeholder="Enter Rate">
</div>
<div class="col-sm-6">
<label>Frequency</label>
<select class="form-control form-control-md" name="fr" id="frequency" required="required">
<option value="">Select Option</option>
<option value="Daily">Daily</option>
<option value="Weekly">Weekly</option>
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-2">
<div class="d-grid gap-2 mb-2">
<button type="submit" class="btn btn-outline-info btn-sm"><i class="fa fa-plus"></i> Update</button>
</form>
</div>
</div>
<div class="col-sm-8">
<span style="display:none;" id="waits">
<i><img src="../loader/loader.gif" style="height:15px"></i> Updating Record.! Please wait...</span>
<span style="display:none; color:green" id="updatep"><i class="fa fa-check"></i> Loan Product Updated Successfully..</span>
</div>
</div>
</br>
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
$("#tst").hide();// hide toast
$("#tst1").hide();// hide toast
});
</script>


<script type="text/javascript">
$(document).ready(function(){
// ajax function start here
$('#loader').modal('show');
$.ajax({
method: "POST",
url: "load_product_json.php",
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
url: "load_product_json.php",
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
url: "load_product_json.php",
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
url: "load_product_json.php",
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
$("#uploadProduct").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to create a new loan product..";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#please").modal('show');
$.ajax({
url: "create_product.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#please").modal('show');
$("#uploadProduct")[0].reset();
if(data == 1){
setTimeout(function(){
$("#please").modal('hide');
$("#exit").show();
$('#product').load('product.php #product');// to reload zone without refreshing the page
}, 3000);
setTimeout(function(){
$("#please").modal('hide');
$("#exit").hide();
}, 7000);
}else if(data == 2){
setTimeout(function(){
$("#uploadProduct")[0].reset();
$("#please").modal('hide');
ToastNotification.success('Product Successfully Created');
$('#product').load('product.php #product');// to reload zone without refreshing the page
load();
}, 3000);
setTimeout(function(){
$("#please").modal('hide');
}, 7000);
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






<script type="text/javascript">
$(document).ready(function (e){
$("#productConfig").on('submit',(function(e){ e.preventDefault();
WRN_PROFILE_DELETE = "You are about to create a product configuration for this product..";
var checked = confirm(WRN_PROFILE_DELETE);
if(checked == true) {
$("#wait").show();
$.ajax({
url: "create_product_config.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
$("#wait").show();
//$("#productConfig")[0].reset();
if(data == 1){
setTimeout(function(){
$("#wait").hide();
$("#exits").show();
}, 3000);
setTimeout(function(){
$("#wait").hide();
$("#exits").hide();
}, 7000);
}else if(data == 2){
setTimeout(function(){
$("#productConfig")[0].reset();
$("#wait").hide();
ToastNotification.success('Product Successfully Configured');
load();
}, 3000);
}else{
$("#wait").hide();
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

<br>
<br>
<?php include '../footer.php'; ?>