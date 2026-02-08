
<!-- Main content -->
<section class="content">
<div class="card">
<div class="card-body">
<form action="" method="post" id="uploadRole">
<div class="row">
<div class="col-sm-4">
<label>Start Date</label>
<input type="date" class="form-control form-control-md" name="st" required="required">
</div>
<div class="col-sm-4">
<label>End Date</label>
<input type="date" class="form-control form-control-md" name="en" required="required">
</div>
<div class="col-sm-4">
<label style="font-size:13px">Analysis Type</label>
<select type="text" class="form-control form-control-md" name="type" required>
<option value="">Select Option</option>
<option value="1">Disbursement Analysis</option>
<option value="2">Collection Analysis</option>
<option value="3">Expenses Analysis</option>
</select>
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
url: "show_profit.php",
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


