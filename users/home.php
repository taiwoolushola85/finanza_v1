<?php include "head.php"; ?>

<?php 
if($ct == 'Field Operations' && $gr == 'Loan Officers'){

// loan officer dashboard
include_once 'loan_officer_dashboard.php';

}elseif ( $ct == 'Field Operations' && $gr == 'Credit Analysts'){
// team leader daashboard
include_once 'Analyst_Dashboard.php';

}elseif ( $ct == 'Branch Operations' && $gr == 'Team Leaders'){
// team leader daashboard
include_once 'team_lead_dashboard.php';

}elseif ( $ct == 'Field Operations' && $gr == 'Recovery'){
//Recovery dashboard
include_once 'Recovery_Dashboard.php';

}elseif ( $ct == 'Branch Operations' && $gr == 'Head Of Recovery'){
//Recovery dashboard
include_once 'head_of_recovery_dashboard.php';
}else{
// general dashboard
include_once 'General_Dashboard.php';
}
?>

<?php include "../footer.php"; ?>



