
<br>
<br>
<br>

<div>
<b><i class="fa fa-table"></i> Active Customer Table</b>
<br><br>

<div class="row">
<div class="col-sm-3">
<?php 
include '../config/db.php';
include '../config/user_session.php';
// Validate input
if (!isset($_POST['gr']) || empty($_POST['gr'])) {
echo "<div class='text-danger'>Group not selected.</div>";
exit;
}

$gr = $_POST['gr'];

$stmt = $con->prepare("SELECT COUNT(*) AS total FROM repayments WHERE Union_id = ? AND Status = 'Active' AND Recovery_Status = 'No'");

if ($stmt) {
$stmt->bind_param("s", $gr);
$stmt->execute();
$stmt->bind_result($total);
$stmt->fetch();
$stmt->close();
$count = (int)($total ?? 0);
} else {
error_log("Count query failed: " . $con->error);
$count = 0;
}
echo "Total Records: <span>{$count}</span>";
?>
</div>
</div>

<br>

<?php
// Create index (run once in database)
// CREATE INDEX idx_user_union_status ON repayments (User, Union_id, Status, Recovery_Status, Firstname);

$stmt = $con->prepare("
    SELECT 
        id, 
        CONCAT_WS(' ', Firstname, Middlename, Lastname) AS full_name,
        Unions, 
        Loan_Account_No, 
        Product, 
        Expected_Amount, 
        Paid, 
        Total_Loan, 
        Total_Bal, 
        Maturity_Date,
        CASE WHEN Maturity_Date < CURDATE() THEN 'Expired' ELSE 'Running' END AS loan_status,
        CASE WHEN Maturity_Date < CURDATE() THEN 'text-danger' ELSE 'text-success' END AS status_class
    FROM repayments 
    WHERE User = ? 
      AND Union_id = ? 
      AND Status = 'Active' 
      AND Recovery_Status = 'No' 
    ORDER BY Firstname ASC
    LIMIT 100
");

if (!$stmt) {
    error_log("Query failed: " . $con->error);
    echo "<div class='alert alert-danger'>Database error. Please contact support.</div>";
    exit;
}

$stmt->bind_param("ss", $User, $gr);
$stmt->execute();
$result = $stmt->get_result();
?>

<div id="table-container" style="height:330px;">
<table>
<thead>
<tr>
<th style="font-size:8px">LOAN ACCT NO</th> 
<th style="font-size:8px">ACCOUNT NAME</th> 
<th style="font-size:8px">GROUP</th> 
<th style="font-size:8px">PRODUCT</th> 
<th style="font-size:8px">TOTAL LOAN</th> 
<th style="font-size:8px">AMOUNT PAID</th> 
<th style="font-size:8px">EXPECTED AMT</th> 
<th style="font-size:8px">BALANCE</th> 
<th style="font-size:8px">EXPIRED DATE</th> 
<th style="font-size:8px">LOAN STATUS</th> 
</tr> 
</thead>
<tbody>

<!-- In your table loop: -->
<?php while ($member = $result->fetch_assoc()): ?>
    <tr style="font-size:8px" class="invks" data-bs-toggle="modal" data-bs-target="#updateModal" id="<?php echo $member['id']; ?>">
        <td><?= htmlspecialchars($member['Loan_Account_No']) ?></td>
        <td class="text-uppercase"><?= htmlspecialchars($member['full_name']) ?></td>
        <td><?= htmlspecialchars($member['Unions']) ?></td>
        <td><?= htmlspecialchars($member['Product']) ?></td>
        <td ><?= number_format($member['Total_Loan'], 2) ?></td>
        <td ><?= number_format($member['Paid'], 2) ?></td>
        <td ><?= number_format($member['Expected_Amount'], 2) ?></td>
        <td ><?= number_format($member['Total_Bal'], 2) ?></td>
        <td><?= date('d-M-Y', strtotime($member['Maturity_Date'])) ?></td>
        <td>
            <span class="<?= $member['status_class'] ?> fw-bold">
                <?= $member['loan_status'] ?>
            </span>
        </td>
    </tr>
<?php endwhile; ?>

<?php $stmt->close(); ?>
</tbody>

</table>
</div>

</div>


<div class="modal" id="updateModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-md" style="display:none; width:400px; display: flex !important; align-items: center; justify-content: center;">
<div class="modal-content">
<div class="modal-header">
<h6 class="modal-title" style="font-size:12px; text-transform:uppercase"> [ <span id="des"></span> ] Posting Form</h6>
<button class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<span id="man"></span>
<center>
<p><img src="" id="reciept" style="height: 350px; width:350px; border-radius:5px;" class="img-thumbnail"  /></p>
</center>
<form action="" method="POST" enctype="multipart/form-data" id="reciptUpload"> 
<div class="row">
<div class="col-sm-12" id="reciept" style="margin-top:10px">
<label style="font-size:13px"><i style="color:red">*</i> Upload Reciept</label>
<input type="file" class="form-control form-control-md" name="Pic" id="receiptFile" required="required" onchange="loadClient(event)" accept="image/*">
</div>
</div>
<div class="row">
<div class="col-sm-12">
<label class="form-label"><i style="color: red;">*</i> Enter Repayment</label>
<input type="text" name="id" class="form-control" id="stid" hidden required>
<input type="text" name="tba" class="form-control" id="tba" hidden required>
<input type="number" name="am" class="form-control" placeholder="Enter Repayment Amount">
</div>
<div class="col-sm-12">
<label class="form-label"><i style="color: red;">*</i> Enter Savings</label>
<input type="number" name="sa" class="form-control" placeholder="Enter Saving Amount">
</div>
</div>
<br>
<button type="submit" class="btn btn-outline-success btn-sm" style="float:left;">Post Repayment</button>
</form>
</div>
</div>
</div>
</div>

<script>
var loadClient = function(event) {
var image = document.getElementById('reciept');
if (event.target.files && event.target.files[0]) {
image.src = URL.createObjectURL(event.target.files[0]);
}
};
</script>


<script>
// to show data on a modal box
$(document).ready(function() {
$('.invks').on('click', function() {
var id = $(this).attr('id');
if(id) {
$.ajax({
url: 'rep_pick.php',
type: "POST",
data: {'id':id},
dataType: "json",
success:function(data) { 
$('#stid').val(data.cusId);
$('#des').text(data.cusName);
$('#tba').val(data.cusBal);
}
});
}else{
alert ("🚫" + data)
}
});
});
</script>




<script type="text/javascript">
$(document).ready(function(e) {
$("#reciptUpload").on('submit', function(e) {e.preventDefault();
const WRN_PROFILE_DELETE = "You are about to submit this repayment posting for approval..";
const checked = confirm(WRN_PROFILE_DELETE);
if (checked !== true) {
return false;
}
// Show loading modal
$("#updateModal").modal('hide');
$.ajax({
url: "repayment_posting_bck.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function(data) {
$("#please").modal('show');

// Clean response (remove whitespace)
const response = String(data).trim();
// Error messages mapping
const errorMessages = {
'1': '🚫 Do not put zero as an amount for repayments amount.',
'2': '🚫 Do not put zero as an amount for saving amount.',
'3': '🚫 Receipt size is more than 5MB. Please crop the image.',
'4': '🚫 You have posted repayment for this customer today. Please try again next day.',
'5': '🚫 This customer has a pending repayment posted waiting for approval. Please confirm from your lead.',
'6': '🚫 You have posted saving for this customer today. Please try again next day.',
'7': '🚫 This customer has a pending savings posted waiting for approval. Please confirm from your lead.',
'8': '🚫 The amount you entered is higher than the customer current loan balance.',
'9': '🚫 You are not allowed to post only savings for this customer. Please include the repayment amount.',
'22': '🚫 Please upload a valid receipt image.'
};
if (response === '10') {
setTimeout(function() {
 // Hide loading modal
$("#please").modal('hide');
// Success case
$('#reciept').attr('src', '');
$("#reciptUpload")[0].reset();
ToastNotification.success('Repayment Posted Successfully');
}, 2000);
} else if (errorMessages[response]) {
$("#please").modal('hide');
// Known error codes
alert(errorMessages[response]);
} else {
// Hide loading modal
$("#please").modal('hide');
// Unknown error - display server response
alert('🚫 ' + response);
}
},
error: function(xhr, status, error) {
$("#please").modal('hide');
console.error('AJAX Error:', {
status: status,
error: error,
response: xhr.responseText
});
// Hide loading modal
$("#please").modal('hide');
alert('🚫 An error occurred while processing your request. Please try again.');
}
});
});
});
</script>
