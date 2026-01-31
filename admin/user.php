<?php include 'header.php'; ?>
<!-- Left Sidebar End -->
<div class="sidebar-backdrop" id="sidebar-backdrop"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
<div class="page-content">
<br>
<br>
<br>
<br>
<br>
<div class="row">
<div class="col-sm-10">
<label>Show Entries</label>
<select class="form-control form-control-sm" id="maxRows" style="width:50px;" oninput="getEntry()">
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>
</div>
<div class="col-sm-2">
<div>
<label>Search</label>
<input type="text" class="form-control form-control-sm" id="search" placeholder="Type here to search..." >
</div>
</div>
</div>
<br>
<div id="result"></div>


</div>






<script type="text/javascript">
$(document).ready(function(){
// Hide loader
$('#loader').modal('show');
$.ajax({
method: "POST",
url: "load_user_json.php",
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
url: "load_user_json.php",
dataType: "html",  
data: {
'maxRows': maxRows
},
success:function(data){
setTimeout(function(){
$("#loader").modal('hide');
$("result").show();
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
url: "load_user_json.php",
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
<br>
<br>
<?php include '../footer.php'; ?>