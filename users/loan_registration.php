<?php
// onboarding process
include '../config/db.php';
include '../config/user_session.php';
$bv = trim($_POST['bvn']);// client bvn
$fn = ucfirst(str_replace(array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ",", " "), '', $_POST['sn'])); // surname
$mn = ucfirst(str_replace(array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ",", " "), '', $_POST['fn'])); // firstname
$ln = ucfirst(str_replace(array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ",", " "), '', $_POST['ln'])); // lastname
$ad = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['ad']); // address
$union = $_POST['un'];// union
$education = $_POST['ed'];// education
$ph = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['ph']);// phone
$gn = $_POST['gn'];// gender
$age = $_POST['db']; //date of birth
$repday = $_POST['repday']; //repayment day
$ms = $_POST['ms']; //marital status
$pr = $_POST['pr'];// product id
$ten = $_POST['ten'];// tenure
$amt = $_POST['amt'];// loan amount
$bnk = $_POST['bn'];// bank
$an = $_POST['an'];// account no
$ann = $_POST['ann']; //account name
// client id type
///$doc = $_POST['doc'];
//$docn = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['docn']);
// contact info
$ct1 = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['cit']); // customer town
// business info
$bsn = ucfirst(str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['bsn'])); // bussiness name
$bt = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['bt']);// bussiness type
$st = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['st2']); // bussiness state
$sd = $_POST['sd']; // bussiness start date
$add = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['ad2']); // bussiness address
$sh = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['sh']);// shop ownership
$owner = ucfirst(str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['owner']));
//guarantor info
$nin = trim($_POST['nin']);// guarantor nin
$fn2 = ucfirst(str_replace(array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['surname2']));
$mn2 = ucfirst(str_replace(array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['firstname2']));
$ln2 = ucfirst(str_replace(array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['lastname2']));
$occupation = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['occupation']); // guarantor occupation
$ph2 = $_POST['phone2']; //guarantor phone
$ad2 = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['address3']);// guarantor addres
$re2 = $_POST['relationship'];// relationship
$gn2 = $_POST['gender3'];// guarantor gender
$id_no2 = str_replace( array("#", "'", ";", "/", "-", "@", "_", "$", "%", "!", "`", ":", ".", "?", ","), '', $_POST['idno']);// id card no
$id_type2 = $_POST['idtype'];// id card type
$date_month = date("M", strtotime($age));
$rand = rand();
// other info
$d = date('Y-m-d');// date
$s = date('h:m:sa');// time
$mth = date('M');// time
$yrs = date('Y');// time
//checking if all filed has been filled


$missing = [];
$fields = ['bvn'=>'Client BVN', 'sn'=>'Client Surname', 'fn'=>'Client Firstname', 'ln'=>'Client Lastname', 
           'ad'=>'Client Address', 'un'=>'Union', 'ed'=>'Education', 'ph'=>'Client Phone',
           'gn'=>'Gender', 'pr'=>'Product', 'ten'=>'Tenure', 'amt'=>'Loan Amount', 
           'bn'=>'Bank Name', 'an'=>'Account Number', 'ann'=>'Account Name', 'db'=>'Date of Birth', 'repday'=>'Repayment Day',
           'ms'=>'Marital Status', 'cit'=>'Town', 'bsn'=>'Business Name', 'bt'=>'Business Type', 'st2'=>'Business State', 'sd'=>'Start Date',
           'ad2'=>'Business Address', 'sh'=>'Shop Ownership', 'owner'=>'Owner', 'nin'=>'Guarantor NIN',
           'surname2'=>'Guarantor Surname', 'firstname2'=>'Guarantor First Name', 'lastname2'=>'Guarantor Last Name', 
           'occupation'=>'Gaurantor Occupation', 'phone2'=>'Guarantor Phone', 'address3'=>'Guarantor Address',
           'relationship'=>'Relationship', 'gender3'=>'Guarantor Gender'
          ];

foreach($fields as $key => $name) {
if(empty(trim($_POST[$key] ?? ''))) $missing[] = $name;
}

if($missing) {
echo "You missed the following filed: " . implode(', ', $missing);
exit();
}

// getting team leader info
$Query = "SELECT * FROM mapping WHERE Loan_Officer='$user'";
$result = mysqli_query($con, $Query);
if ($row = mysqli_fetch_array($result)) {
$map_id = $row['id'];
$off_id = $row['Officer_id'];
$tm_id = $row['Team_id'];
$ofn = $row['Officer_Name'];
$tmn = $row['Team_Name'];
$tlm = $row['Team_Leader'];
$br = $row['Branch'];
} else {
echo "You are required to be mapped to a team lead before you can can complete the registration..'";
mysqli_close($con);
exit();
}
$map_id = $row['id'];
$off_id = $row['Officer_id'];
$tm_id = $row['Team_id'];
$ofn = $row['Officer_Name'];
$tmn = $row['Team_Name'];
$tlm = $row['Team_Leader'];
$br = $row['Branch'];
$ffu = $fn ." ".  $mn ." ". $ln; // guarantor full name
// client full name
$fll = $fn." ".$mn." ".$ln; 
// getting union id for registration
$Query = "SELECT * FROM groups WHERE id='$union'";
$result = mysqli_query($con, $Query);
if ($row = mysqli_fetch_array($result)) {
$un_id = $row['id'];
$un_name = $row['Name'];
} else {
echo "You did not select group on the registration form";
mysqli_close($con);
exit();
}

// getting loan product for registration
$Query = "SELECT Product, Rate, Frequency, Inssurance, Tenure FROM product_list WHERE Product_id = '$pr' AND Tenure = '$ten'";
$result = mysqli_query($con, $Query);
$row = mysqli_fetch_array($result);
$pr_name = $row['Product'];
$rt = $row['Rate'];
$frq = $row['Frequency'];
$ins = $row['Inssurance'];
$tens = $row['Tenure'];


if($frq == 'Daily'){
$dd = $amt + 0; // the intererst is 0
$round_interest = 0; 
$int_per_repayment = 0;
$repayment_amount = $amt / $ten;// repayment amt
$round_repayment = round($repayment_amount);// rounding up repayment amt
// total loan balance
$total_loan = $amt + 0;
$round_total_loan = round($total_loan);// rounding up total loan
}else{
$rr = 100 / $rt;
$interest_amount = $amt / $rr;// interest amt
$round_interest = round($interest_amount); /// rounding up interest amount
// expected repayment
$expected_amount = $amt + $interest_amount; 
$repayment_amount = $expected_amount / $ten;// repayment amt
$round_repayment = round($repayment_amount);// rounding up repayment amt
// total loan balanceRepayment_Day
$total_loan = $amt + $interest_amount;
$round_total_loan = round($total_loan);// rounding up total loan
$int_per_repayment = round($round_interest/$ten);
}

// inserting the customer information
$sql = "INSERT INTO register (Firstname, Middlename, Lastname, Address, Education, Phone, Gender, Branch, Years, Birthday_Month, Maritial_Status,
Branch_id, State, Town, Location, Product, Product_id, Tenure, Frequency, Rate, Unions, Union_id, Loan_Amount, Bank, Account_Name, Account_No, BVN, Document,
Document_No, Business, Biz_Type, Biz_State, Start_Date, Cash_Flow, Biz_Address, Biz_Owner, Shop_Owner, Date_Reg, Time_Reg, Status, User, User_id, Team_Leader,
Team_id, Officer_Name, Team_Name, Map_id, Verification_Status, Interest_Amt, Monthly_Interest, Repayment_Amt, Total_Loan, Upfront, Inssurance, Form, Card,
Schedule_Status, Application_Status, Saving_Type, Repayment_Day, Loan_Status, Mapping_id, Months, Year_Booked) 
VALUES ('$fn', '$mn', '$ln', '$ad', '$education', '$ph', '$gn', '$brss', '$age', '$date_month', '$ms', '$brss_id', 'NA', 'NA', 'NA', '$pr_name',
'$pr', '$ten', '$frq', '$rt', '$un_name', '$un_id', '$amt', '$bnk', '$ann', '$an', '$bv', 'NA', 'NA', '$bsn', '$bt', '$st', '$sd', 'NA', '$add', 
'$owner', '$sh', '$d', '$s', 'Waiting For Verification', '$User', '$usd_id', '$tlm', '$tm_id', '$ofn', '$tmn', '$map_id', 'Waiting', 
'$round_interest', '$int_per_repayment', '$round_repayment', '$round_total_loan', '0', '0', '0', '0', 'Not Confirmed', 'Registered', 
'Express Savings', '$repday', 'New Client', '$map_id', '$mth', '$yrs')";
$result= mysqli_query($con, $sql);
$last_id = mysqli_insert_id($con);// last insert id
// gaurantor information
$sql = "INSERT INTO gaurantors (Firstname, Middlename, Lastname, Phone, Address, Relationship, Gender, Location, Date_Reg, Time_Reg, User, User_id,
Team_Leader, Officer_Name, Team_Name, Team_id, Status, Regis_id, ID_No, ID_Type, ID_Image, Client_BVN, Client_Name, Gaurantor_BVN, Occupation) 
VALUES ('$fn2', '$mn2', '$ln2', '$ph2', '$ad2', '$re2', '$gn2', 'NA', '$d', '$s', '$User', '$usd_id', '$tlm', '$ofn', '$tmn', '$tm_id', 'Active',
'$last_id', '$nin', 'National ID Card', 'NA', '$bv', '$fll', '$nin', '$occupation')";
$result= mysqli_query($con, $sql);
//
if($result == true){
echo 2;
}else{
echo("Error description: " . mysqli_error($con));
}
mysqli_close($con);
?>