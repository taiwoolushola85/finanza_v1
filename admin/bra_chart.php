<?php
include('../config/db.php');
include '../config/user_session.php';
$data[] = array('Name','Total');
$Query = "SELECT id, Name, 
(SELECT COALESCE(COUNT(*), 0) FROM repayments WHERE Branch= Name) AS `onb`
FROM branch WHERE Status='Active'";
$result = mysqli_query($con, $Query);
$Count = mysqli_num_rows($result);
if ($Count > 0) {
$Available = true;
for ($j=0 ; $j < $Count; $j++){
$rows = mysqli_fetch_array($result);
$id = $rows['id'];
$records = $rows['onb'];
$pr = $rows['Name'];
$data[] = array($pr,(int)$records);

}
}
///$data = array($data);			
echo json_encode($data);
?>