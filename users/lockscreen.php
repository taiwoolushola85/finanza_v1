<?php 
//find session
session_start();
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title data-rightjoin="">FINANZA || LOCKSCEEN</title>
<meta name="description" content="Digital Loan Tracking Management System">
<!-- Google Font Api KEY-->
<meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
<!-- Config Options -->
<meta name="setting_options" content='{&quot;saveLocal&quot;:&quot;sessionStorage&quot;,&quot;storeKey&quot;:&quot;huisetting-html&quot;,&quot;setting&quot;:{&quot;app_name&quot;:{&quot;value&quot;:&quot;Hope UI&quot;},&quot;theme_scheme_direction&quot;:{&quot;value&quot;:&quot;ltr&quot;},&quot;theme_scheme&quot;:{&quot;value&quot;:&quot;light&quot;},&quot;theme_style_appearance&quot;:{&quot;value&quot;:[&quot;theme-default&quot;]},&quot;theme_color&quot;:{&quot;colors&quot;:{&quot;--{{prefix}}primary&quot;:&quot;#3a57e8&quot;,&quot;--{{prefix}}info&quot;:&quot;#08B1BA&quot;},&quot;value&quot;:&quot;theme-color-default&quot;},&quot;theme_transition&quot;:{&quot;value&quot;:&quot;theme-with-animation&quot;},&quot;theme_font_size&quot;:{&quot;value&quot;:&quot;theme-fs-md&quot;},&quot;page_layout&quot;:{&quot;value&quot;:&quot;container-fluid&quot;},&quot;header_navbar&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;header_banner&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;sidebar_color&quot;:{&quot;value&quot;:&quot;sidebar-white&quot;},&quot;card_color&quot;:{&quot;value&quot;:&quot;card-default&quot;},&quot;sidebar_type&quot;:{&quot;value&quot;:[]},&quot;sidebar_menu_style&quot;:{&quot;value&quot;:&quot;left-bordered&quot;},&quot;footer&quot;:{&quot;value&quot;:&quot;default&quot;},&quot;body_font_family&quot;:{&quot;value&quot;:null},&quot;heading_font_family&quot;:{&quot;value&quot;:null}}}'>
<!-- Favicon -->
<link rel="shortcut icon" href="../assets/images/favicon.ico">
<!-- Library / Plugin Css Build -->
<link rel="stylesheet" href="../assets/css/core/libs.min.css">
<!-- Hope Ui Design System Css -->
<link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=2.2.0">
<link rel="stylesheet" href="../assets/css/pro.min.css?v=2.2.0">
<!-- Custom Css -->
<link rel="stylesheet" href="../assets/css/custom.min.css?v=2.2.0">
<!-- Dark Css -->
<link rel="stylesheet" href="../assets/css/dark.min.css?v=2.2.0">
<!-- Customizer Css -->
<link rel="stylesheet" href="../assets/css/customizer.min.css?v=2.2.0">
<!-- RTL Css -->
<link rel="stylesheet" href="../assets/css/rtl.min.css?v=2.2.0">
<script src="../js/jquery-2.2.0.min.js"></script>
<!-- Google Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
<link href="css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body class="">

<style>
/* Toast Container */
.toast-container {
    pointer-events: none;
}

.toast-container .toast {
    pointer-events: auto;
}

/* Custom Toast Styles */
.custom-toast {
    min-width: 320px;
    max-width: 400px;
    border: none;
    border-left: 4px solid #28a745;
    border-radius: 0.375rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    background-color: #fff;
    overflow: hidden;
}

.custom-toast .toast-header {
    background: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
    padding: 0.75rem 1rem;
    align-items: center;
}

.custom-toast .toast-body {
    padding: 1rem;
    font-size: 0.9375rem;
    color: #212529;
    word-wrap: break-word;
}

.toast-icon {
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* Toast Variants */
.toast-success {
    border-left-color: #28a745;
}
.toast-success .toast-icon {
    color: #28a745;
}

.toast-error {
    border-left-color: #dc3545;
}
.toast-error .toast-icon {
    color: #dc3545;
}

.toast-warning {
    border-left-color: #ffc107;
}
.toast-warning .toast-icon {
    color: #ffc107;
}

.toast-info {
    border-left-color: #17a2b8;
}
.toast-info .toast-icon {
    color: #17a2b8;
}

/* Animations */
.custom-toast.showing {
    animation: slideIn 0.3s ease-out forwards;
}

.custom-toast.hide {
    animation: slideOut 0.3s ease-in forwards;
}

@keyframes slideIn {
    from {
        transform: translateX(120%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(120%);
        opacity: 0;
    }
}

/* Responsive */
@media (max-width: 576px) {
    .toast-container {
        left: 0;
        right: 0;
        padding: 0.75rem;
    }
    
    .custom-toast {
        min-width: 100%;
        max-width: 100%;
    }
}
</style>

<script>
// Stable Toast Notification System
const ToastNotification = {
    // Configuration
    config: {
        defaultDuration: 3000,
        icons: {
            'success': 'fa fa-check-circle',
            'error': 'fa fa-times-circle',
            'warning': 'fa fa-exclamation-triangle',
            'info': 'fa fa-info-circle'
        }
    },

    // Current toast instance
    currentToast: null,

    // Show toast notification
    show: function(message, type = 'success', duration = null) {
        // Validate inputs
        if (!message || typeof message !== 'string') {
            console.error('Toast message must be a valid string');
            return;
        }

        // Get toast element
        const toastElement = document.getElementById('toast');
        if (!toastElement) {
            console.error('Toast element not found');
            return;
        }

        // Hide current toast if exists
        if (this.currentToast) {
            this.currentToast.hide();
        }

        // Reset classes
        toastElement.classList.remove('toast-success', 'toast-error', 'toast-warning', 'toast-info');

        // Get elements
        const toastBody = toastElement.querySelector('.toast-body');
        const toastIcon = toastElement.querySelector('.toast-icon');
        const toastTime = toastElement.querySelector('.toast-time');

        // Validate type
        const validTypes = ['success', 'error', 'warning', 'info'];
        if (!validTypes.includes(type)) {
            type = 'success';
        }

        // Set content
        if (toastBody) {
            toastBody.textContent = message;
        }

        // Set icon
        if (toastIcon) {
            toastIcon.className = 'toast-icon me-2 ' + this.config.icons[type];
        }

        // Set timestamp
        if (toastTime) {
            toastTime.textContent = 'just now';
        }

        // Add type class
        toastElement.classList.add('toast-' + type);

        // Create Bootstrap toast instance
        const bsToast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: duration || this.config.defaultDuration
        });

        // Store current instance
        this.currentToast = bsToast;

        // Show toast
        bsToast.show();

        // Clean up on hide
        toastElement.addEventListener('hidden.bs.toast', () => {
            this.currentToast = null;
        }, { once: true });

        return bsToast;
    },

    // Shorthand methods
    success: function(message, duration) {
        return this.show(message, 'success', duration);
    },

    error: function(message, duration) {
        return this.show(message, 'error', duration);
    },

    warning: function(message, duration) {
        return this.show(message, 'warning', duration);
    },

    info: function(message, duration) {
        return this.show(message, 'info', duration);
    }
};

// Legacy function for backwards compatibility
function showToast(message, type = 'success', duration) {
    return ToastNotification.show(message, type, duration);
}
</script>



<!-- loader Start -->
<div style="display: none;">
<?php
include '../config/db.php';
$user = $_GET['id'];
$bck = $_GET['resume'];// resume
$Query = "SELECT * FROM users WHERE Username='$user'";
$result = mysqli_query($con, $Query);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$User = $row['Username'];
$loc = $row['Location'];
$na = $row['Name'];
?>
</div>
<!-- loader END -->
<div class="wrapper">
<section class="login-content">
<div class="row m-0 align-items-center bg-white vh-100">
<div class="col-md-6 p-0">
<div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
<div class="card-body">
<a href="#" class="navbar-brand d-flex align-items-center mb-3">
<!--Logo start-->
<div class="logo-main">
<div class="logo-normal">
<svg class="text-primary icon-30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
<rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
<rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
<rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
</svg>
</div>
<div class="logo-mini">
<svg class="text-primary icon-30" viewbox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"></rect>
<rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"></rect>
<rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"></rect>
<rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"></rect>
</svg>
</div>
</div>
<!--logo End-->                           
<h4 class="logo-title ms-3 mb-0">FINANZA</h4>
</a>
<?php
$img = $loc ?? '';
$defaultImage = '../assets/no-image.png';
if (!empty($img)) {
// Check if path starts with ../
if (strpos($img, '../') === 0) {
$imgPath = $img;
} else {
$imgPath = '../' . $img;
}
} else {
$imgPath = $defaultImage;
}
?>
<img src="<?php echo $imgPath; ?>" class="rounded avatar-80 mb-3" alt="" onerror="this.src='../assets/no-image.png';">
<h2 class="mb-2">Hi ! <?php echo $na;?></h2>
<p>Enter your password to restore session</p>
<form action="" method="post" enctype="multipart/form-data" id="uploadForm">
<div class="row">
<div class="col-lg-12">
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="yp" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> Please enter your password</center>
</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="nf" style="display:none">
<center><i class="fa fa-exclamation-circle"></i> Incorrect password, Please try again</center>
</div>
<center>
<span style="color:green; display:none" id="vd"><img src="../loader/loader.gif" style="height:18px"> Please wait.. Restoring session</span>
</center>
<div class="floating-label form-group">
<input  class="form-control" hidden="hidden" required="required" name="id" value="<?php echo $id; ?>" required>
<input  class="form-control" hidden="hidden" required="required" name="us" value="<?php echo $User; ?>" required>
<input  class="form-control" hidden="hidden" required="required" name="bck" value="<?php echo $bck; ?>" required>
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" name = "ps" aria-describedby="password" placeholder="Enter Password">
</div>
</div>
</div>
<button type="submit" class="btn btn-primary w-100" onclick="data()" >Restore Session</button>
</form>
</div>
</div>
<div class="sign-bg">
<svg width="280" height="230" viewbox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
<g opacity="0.05">
<rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"></rect>
<rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"></rect>
<rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"></rect>
<rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"></rect>
</g>
</svg>
</div>
</div>
<div class="col-md-6 d-md-block d-none bg-primary p-0 vh-100 overflow-hidden">
<img src="../assets/images/auth/04.png" class="img-fluid gradient-main animated-scaleX" alt="images" loading="lazy">
</div>
</div>
</section>
</div>
<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){ e.preventDefault();
$.ajax({
url: "lock_login.php",
type: "POST",
data: new FormData(this),
contentType: false, 
cache: false, 
processData:false,
success: function(data){  
if (data == 1){
$("#yp").show();
$("#yp").fadeOut(3000);
}else if(data == 6){
$("#nf").show();
$("#nf").fadeOut(3000);
} else {
$("#vd").show();
ToastNotification.success('Your session has been restored. !!!');
setTimeout(function(){
$("#vd").hide();
window.location.href=data;
}, 2200);

}
},
error: function(){
}
});
}));
});
</script>
<?php 
include '../footer.php';
?>
