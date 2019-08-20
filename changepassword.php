<?php
include_once'connectdb.php';
session_start();
if($_SESSION['useremail']==""){
    header('location:index.php');
}


include_once 'header.php';


if(isset($_POST['btnupdate'])){
    $oldpassword_txt = $_POST['txtoldpassword'];
    $newpassword_txt = $_POST['txtnewpassword'];
    $confirmpassword_txt = $_POST['txtconfirmpassword'];


$email = $_SESSION['useremail'];

$select = $pdo->prepare("select * from tbl_user where useremail='$email'");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$useremail_db = $row['useremail'];
$password_db = $row['password'];



if($oldpassword_txt == $password_db){
    if($newpassword_txt == $confirmpassword_txt){
        $update = $pdo->prepare("update tbl_user set password=:pass where useremail=:email");
        
        $update -> bindParam(':pass',$confirmpassword_txt);
        $update -> bindParam(':email',$email);
        
        if($update->execute()){
           //echo "password Updated Successfully";
           echo'
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"success",
        text:"Password Updated Successfully",
        icon: "success",
        button:"OK",
        });
        }
        
        );
        
        </script>';
        }else{
            //echo "Password Update Failed";
                     echo'
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Error",
        text:"Query Failed",
        icon: "error",
        button:"OK",
        });
        }
        
        );
        
        </script>';
            
        }
        
    }else{
        //echo "New And Confirmed Password Failed";
                 echo'
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Oops!!",
        text:"Your New Password and Confirmed Password Does Not Match",
        icon: "warning",
        button:"OK",
        });
        }
        
        );
        
        </script>';
    }
    
    
}else{
    //echo "Password Did not Match";
    echo'
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Warning",
        text:"Wrong Password Please Enter The Correct Passsword",
        icon: "warning",
        button:"OK",
        });
        }
        
        );
        
        </script>';
}
    
}
?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
            
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtoldpassword" required>
                </div>
                
                  <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtnewpassword" required>
                </div>
                
                  <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtconfirmpassword" required>
                </div>
             

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btnupdate">Update</button>
              </div>
            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    include_once 'footer.php';
?>