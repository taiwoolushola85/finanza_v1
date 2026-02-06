<?php
include '../config/db.php';
include '../config/user_session.php';

// 1. Clean Group Name - Allow spaces but remove dangerous symbols
$gr = preg_replace('/[#\';\/@_$%%!`:.?,&]/', '', $_POST['gr']);
$gr = trim($gr); // Remove accidental leading/trailing spaces

if (empty($gr)) {
    echo "Invalid Group Name";
    exit();
}

$d = date('Y-m-d');

// 2. Optimized Mapping Check (Prepared Statement)
$stmt = mysqli_prepare($con, "SELECT Officer_id, Team_id, Officer_Name, Team_Name, Team_Leader FROM mapping WHERE Loan_Officer = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $User);
mysqli_stmt_execute($stmt);
$mapResult = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($mapResult)) {
    $off_id = $row['Officer_id'];
    $tm_id  = $row['Team_id'];
    $ofn    = $row['Officer_Name'];
    $tmn    = $row['Team_Name'];
    $tlm    = $row['Team_Leader'];
} else {
    echo "You are not mapped to your team lead, please contact IT Support.";
    exit();
}
mysqli_stmt_close($stmt);

// 3. Check if Group exists and Insert using ONE process (Prepared Statement)
// We check for duplicates using a prepared statement to prevent injection
$stmt = mysqli_prepare($con, "SELECT id FROM groups WHERE Name = ?");
mysqli_stmt_bind_param($stmt, "s", $gr);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo 1; // Group already exists
    exit();
}
mysqli_stmt_close($stmt);

// 4. Secure Insert
$status = 'Waiting For Approval';
$sql = "INSERT INTO groups (Name, Branch, User, Team_Leader, Officer_Name, Team_Name, Officer_id, Team_id, Branch_id, Date_Register, Status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$ins = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($ins, "ssssssiiiss", 
    $gr, $brss, $User, $tlm, $ofn, $tmn, $off_id, $tm_id, $brss_id, $d, $status
);

if (mysqli_stmt_execute($ins)) {
    echo 2; // Success
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($ins);
mysqli_close($con);
?>