
<!-- Main content -->
<section class="content">
<div class="card">
<div class="card-body">
<form action="" method="post" id="uploadRole">
<div class="row">
<div class="col-sm-6">
<label>Start Date</label>
<input type="date" class="form-control form-control-md" name="st" required="required">
</div>
<div class="col-sm-6">
<label>End Date</label>
<input type="date" class="form-control form-control-md" name="en" required="required">
</div>
</div>
<br>
<button class="btn btn-success btn-sm btn-flat" type="submit" onclick="data()">Run Report</button>
</form>
</div>
</div>

<i id="pls" style="display: none;"><img src="../loader/loader.gif" style="height:15px"> Loading Data ! Please wait...</i>
<div id="result"></div>





<script type="text/javascript">
$(document).ready(function (e){
$("#uploadRole").on('submit',(function(e){ e.preventDefault();
$("#result").hide();
$("#pls").show();
$.ajax({
url: "show_financial.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){
setTimeout(function(){
$("#pls").hide();
$("#result").show();
$('#result').html(data);
}, 3000);
},
error: function(){
}
});
}));
});
</script>


