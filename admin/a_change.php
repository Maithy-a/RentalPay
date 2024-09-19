<?php
session_start();
include "../conn.php";

$user = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE u_name = '$user'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
do {
  $role = $row['role'];
  $row = mysqli_fetch_assoc($res);
} while ($row);
if(!$user && $role == 'Administrator'){
  echo '<script>window.location.href = "../log-in.php";</script>';
  exit();
}
function check($data){
  $data= trim($data);
  $data= htmlspecialchars($data);
  $data= stripslashes($data);
  return $data;
}

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Elsie Rental Management System</title>
   <link rel="icon" href="../res/img/office.png">

   <!-- Custom fonts for this template -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

   <!-- Custom styles for this template -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

   <!-- Custom styles for this page -->
   <link href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 </head>

 <body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-face-laugh-wink fa-beat-fade" href="admin_home.php"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Elsie Rental Management System<sup>Ex</sup></div>
      </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item">
         <a class="nav-link" href="admin_home.php">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
           <i class="fas fa-home fa-cog"></i>
           <span>House</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Details:</h6>
             <a class="collapse-item" href="house_detail.php">House Information</a>
             <a class="collapse-item" href="add_house.php">Add a House</a>
             <a class="collapse-item" href="change_cost.php">Change the Cost of the<br/>House</a>
             <a class="collapse-item" href="edit_house.php">Edit House Information</a>
           </div>
         </div>
       </li>
       <hr class="sidebar-divider">

       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
           <i class="fas fa-clipboard-list"></i>
           <span>Contract</span>
         </a>
         <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Details:</h6>
             <a class="collapse-item" href="contract_detail.php">Contract Information</a>
             <a class="collapse-item" href="edit_contract.php">Edit Contract Information<br/>(Full)</a>
             <a class="collapse-item" href="edit_contract_part.php">Edit Contract Information<br/>(Part)</a>
           </div>
         </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->


       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
           <i class="fas fa-user fa-cog"></i>
           <span>Tenants</span>
         </a>
         <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Details:</h6>
             <a class="collapse-item" href="tenant_detail.php">Tenant Information</a>
             <a class="collapse-item" href="tenant_contact.php">Tenants' Contact</a>
             <a class="collapse-item" href="admin_tenantIn.php">Tenant-In Details</a>
             <a class="collapse-item" href="admin_tenantOut.php">Tenant-Out Details</a>
             <a class="collapse-item" href="edit_tenant.php">Edit Tenant Information</a>
           </div>
         </div>
       </li>
       <hr class="sidebar-divider">

       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
           <i class="fas fa-dollar-sign fa-cog"></i>
           <span>Payment</span>
         </a>
         <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Details:</h6>
             <a class="collapse-item" href="payment_detail.php">Payment Information</a>
             <a class="collapse-item" href="edit_pay.php">Edit Payment</a>
           </div>
         </div>
       </li>
       <hr class="sidebar-divider">

       <!-- Nav Item - Charts -->
       <li class="nav-item">
         <a class="nav-link" href="form_out.php">
           <i class="fas fa-fw fa-clipboard-list"></i>
           <span>Tenant-Out form</span>
         </a>

       </li>

       <hr class="sidebar-divider">

       <!-- Nav Item - Charts -->
       <li class="nav-item">

         <a class="nav-link" href="send-sms.php">
           <i class="fas fa-fw fa-comments"></i>
           <span>Messaging</span></a>
       </li>
       <hr class="sidebar-divider">




       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link" href="Admin/a_change.php">
           <i class="fas fa-fw fa-exchange-alt"></i>
           <span>Change Password</span>
         </a>

       </li>
       <hr class="sidebar-divider">
       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link" href="a_register.php">
           <i class="fas fa-fw fa-user"></i>
           <span>Register</span>
         </a>

       </li>

       <!-- Nav Item - Tables -->

       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


           <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>


             <div class="topbar-divider d-none d-sm-block"></div>

             <!-- Nav Item - User Information -->
             <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php

                 include "../conn.php";
                 $uname = $_SESSION['username'];
                 echo "<b><b>".$uname."</b></b>";

                   ?></span>
                 <img class="img-profile rounded-circle" src="../res/img/user.png">
               </a>
               <!-- Dropdown - User Information -->
               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                   <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                   Logout
                 </a>

             </li>

           </ul>

         </nav>
         <!-- End of Topbar -->

         <!-- Begin Page Content -->
         <div class="container-fluid">
           <h1 class="h3 mb-2 text-gray-800">Change Password</h1>

           <div class="card shadow mb-4">
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                   <tbody>
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                     <tr>
                       <td>
                         Old Password:
                       </td>
                       <td><input type='text' class='form-control form-control-user' name='change'></td>
                     </tr>
                     <tr>
                       <td>
                         New Password:
                       </td>
                       <td><input type='password' class='form-control form-control-user' name='change1'></td>
                     </tr>
                     <tr>
                       <td>
                         Repeat the new Password:
                       </td>
                       <td><input type='password' class='form-control form-control-user' name='change2'></td>
                     </tr>
                     <tr>
                     <td></td>
                     <td><input class='btn btn-success btn-user btn-sm' type='submit' name='submit' value='Change Password'></td>
                     </form>
                     <tr>
                     <?php
                     if (isset($_POST['submit'])) {
                       $query = "SELECT * FROM user WHERE u_name = '$uname'";
                       $result1 = mysqli_query($con, $query);
                       $row=mysqli_fetch_assoc($result1);
                       do{
                         $id = $row['user_id'];
                         $pword = $row['pword'];
                         $row = mysqli_fetch_assoc($result1);
                       }while ($row);
                       $old = md5($_POST['change']);
                       $new = $_POST['change1'];
                       $rnew = $_POST['change2'];
                       if($old == $pword){
                           if(!($rnew == $new)){
                           echo "<script> alert('Password does not match.');</script>";
                           }else{
                               if((strlen($rnew) < 8) || (strlen($new) < 8)){
                                 echo "<script> alert('Password is too short.');</script>";
                               }elseif(!($rnew == '') || !($new == '')){
                                 $new = md5($new);
                                 $sql = "UPDATE user SET pword ='$new' WHERE user_id = '$id'";
                                 $result = mysqli_query($con, $sql);
                                 echo "<script> alert('Password has been changed successfully. New password will be effective upon new login.');</script>";
                                 echo '<style>body{display:none;}</style>';
                                 echo '<script>window.location.href = "a_change.php";</script>';
                                 exit;
                               }
                         }

                       }else{
                         echo "<script> alert('The old password is incorrect.');</script>";
                       }

                     }
                      ?>

                   </tbody>
                 </table>
               </div>
             </div>
           </div>
         </div>
         <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

     <!-- Footer -->
      <?php include '../footer.php'; ?>

     </div>
     <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
           </button>
         </div>
         <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
         <div class="modal-footer">
           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           <a class="btn btn-success" href="../logout.php">Logout</a>
         </div>
       </div>
     </div>
   </div>

   <script>
     if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
   </script>


   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="js/demo/datatables-demo.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>