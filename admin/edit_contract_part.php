<?php
session_start();
include "../conn.php";
if(!($_SESSION['username'] == "ADMIN")){
  echo '<script>window.location.href = "../log-in.php";</script>';
  exit();
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
    <link rel="icon" href="res../res/img/office.png">

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
         <a class="nav-link" href="a_change.php">
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

                    <!-- Topbar Search -->
                   


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

           <!-- Page Heading -->
           <h1 class="h3 mb-2 text-gray-800" align = "center">Contracts</h1>
           <!-- DataTales Example -->
           <div class="card shadow mb-4">
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">

                   <tbody>
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                       <tr>
                         <td>
                           <b><b>Please choose a tenant to change the contract information.</b></b>:
                         </td>
                         <td><select class='custom-select' name='tenant' id = 'values' style='width:200px;'>

                         </select>
                         <td>
                       </tr>
                     <tr>
                       <td>
                         Contract Duration:
                       </td>
                       <td>
                         <select class="custom-select" name="duration" style="width:300px;">
                           <option  value = "3">3 months</option>
                           <option value = "6">6 months</option>
                           <option value = "12">12 months</option>
                         </select>
                       </td>
                     </tr>
                     <tr>
                       <td>
                         Payment Terms:
                       </td>
                       <td>
                         <select class="custom-select" name="term" id="terms" style="width:300px;">
                         <option value = "1" id="1">1 term</option>
                         <option value = "2" id="2">2 terms</option>
                         <option value = "4" id="4">4 terms</option>
                         </select>
                       </td>
                     </tr>
                     <tr>
                     <td></td>
                     <td><input class='btn btn-success btn-user btn-lg' type='submit' name='submit' value='Edit'></td>
                     </form>
                     <tr>
                   </tbody>
                   <?php
                   if(isset($_POST["submit"])){
                     $id = $_POST['id'];
                     $house = (int)$_POST["house"];
                     $dur =  (int)$_POST['duration'];
                     $dur1 =  $dur - 1;
                     $term = (int)$_POST['term'];
                     $price = (int)$_POST['price'];
                     $stat = "Active";
                     $total_rent = $dur * $price;
                     $rent_term = $total_rent / $term;
                     $date_sign = date("Y-m-d H:i:s");
                     $contract = 'Occupied';
                     if(date('d')<27){
                       $end = date('Y-m-t', strtotime('+'.$dur1.' month'));
                     }else{
                       $end = date('Y-m-t', strtotime('+'.$dur1.' month'));
                     }
                     if((date('d')<27)){
                       $start = date('Y-m-01');
                     }else{
                       $start = date('Y-m-01', strtotime('+1 month'));
                     }


                     $query = "SELECT * FROM contract WHERE tenant_id = '$id' ";
                     $result = mysqli_query($con, $query);
                     $row = mysqli_fetch_assoc($result);
                     do{
                       $hid = $row['house_id'];

                       $row = mysqli_fetch_assoc($result);
                     }while ($row);

                     if($id != ""){
                       if ($dur == 3) {
                         if (!($term == 1)) {
                           echo "<script> alert('3 months cannot have more than 1 term.');</script>";
                         }else {
                           $sql = "UPDATE contract SET house_id = '$house', duration_month = '$dur', total_rent = '$total_rent', terms = '$term', rent_per_term = '$rent_term', start_day = '$start', end_day ='$end', date_contract_sign = '$date_sign' WHERE tenant_id = '$id' AND status = '$stat'";
                           if(mysqli_query($con, $sql)){
                             $sql1 = "UPDATE house SET status= 'Empty' WHERE house_id = '$hid'";
                             mysqli_query($con, $sql1);
                             $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
                             mysqli_query($con, $sql3);
                             mysqli_close($con);
                             echo "<script type='text/javascript'>alert('Updated Successfully!!!');</script>";
                             echo '<style>body{display:none;}</style>';
                             echo '<script>window.location.href = "contract_detail.php";</script>';
                             exit;
                         }
                       }
                       }elseif($dur == 6){
                           if ($term == 4) {
                             echo "<script type='text/javascript'>alert('6 months cannot have more than 2 term.');</script>";
                           }else {
                             $sql = "UPDATE contract SET house_id = '$house', duration_month = '$dur', total_rent = '$total_rent', terms = '$term', rent_per_term = '$rent_term', start_day = '$start', end_day ='$end', date_contract_sign = '$date_sign' WHERE tenant_id = '$id' AND status = '$stat'";
                             if(mysqli_query($con, $sql)){
                               $sql1 = "UPDATE house SET status= 'Empty' WHERE house_id = '$hid'";
                               mysqli_query($con, $sql1);
                               $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
                               mysqli_query($con, $sql3);
                               mysqli_close($con);
                               echo "<script type='text/javascript'>alert('Updated Successfully!!!');</script>";
                               echo '<style>body{display:none;}</style>';
                               echo '<script>window.location.href = "contract_detail.php";</script>';
                               exit;
                           }
                         }
                       }elseif ($dur == 12) {
                         $sql = "UPDATE contract SET house_id = '$house', duration_month = '$dur', total_rent = '$total_rent', terms = '$term', rent_per_term = '$rent_term', start_day = '$start', end_day ='$end', date_contract_sign = '$date_sign' WHERE tenant_id = '$id' AND status = '$stat'";
                         if(mysqli_query($con, $sql)){
                           $sql1 = "UPDATE house SET status= 'Empty' WHERE house_id = '$hid'";
                           mysqli_query($con, $sql1);
                           $sql3 = "UPDATE house SET status= '$contract' WHERE house_id = '$house'";
                           mysqli_query($con, $sql3);
                           mysqli_close($con);
                           echo "<script type='text/javascript'>alert('Updated Successfully!!!');</script>";
                           echo '<style>body{display:none;}</style>';
                           echo '<script>window.location.href = "contract_detail.php";</script>';
                           exit;
                         }
                       }
                     }else {
                       echo "<script type='text/javascript'>alert('Please choose a contract to change from the table showing contract information.');</script>";
                       echo '<style>body{display:none;}</style>';
                       echo '<script>window.location.href = "contract_detail.php";</script>';
                       exit;

                     }





                 }
                    ?>
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
<!-- End of Footer -->

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
   <script type="text/javascript">
       $(document).ready(function(){

         var out = "<?php
         $sql = "SELECT * FROM contract WHERE status = 'Active'";
         $query = mysqli_query($con, $sql);
         $row = mysqli_fetch_assoc($query);
         do {
           $id = $row['tenant_id'];
           $sql1 = "SELECT * FROM tenant WHERE tenant_id = '$id'";
           $query1 = mysqli_query($con, $sql1);
           $row1 = mysqli_fetch_assoc($query1);
           do {
             $fanme = $row1['fname'];
             $lname = $row1['lname'];
             $row1 = mysqli_fetch_assoc($query1);
           } while ($row1);
           echo "<option value ='".$id."' selected>".$fname." ".$lname."</option>";
           $row = mysqli_fetch_assoc($query);
         } while ($row);


         ?>";
         document.getElementById("values").innerHTML = out;



       });
   </script>

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
   <script src="js/jquery.min.js"></script>

   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Page level custom scripts -->
   <script src="js/demo/datatables-demo.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>
