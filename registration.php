
<?php
include_once'connectdb.php';
session_start();

if($_SESSION['role']=="User"){
    header('location:dashboard.php');
}
include_once 'header.php';
error_reporting(0);

$id = $_GET['id'];

$delete=$pdo->prepare("delete from tbl_user where id=".$id);

if($delete->execute()){
    echo'
    <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"success",
        text:"Account is Deleted",
        icon: "success",
        button:"ok",
        });
        }
        
        );
        
        </script>
        ';
  
    
}else{
    echo'
    <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Error",
        text:"Not Deleted ",
        icon: "error",
        button:"Try Again",
        });
        }
        
        );
        
        </script>
        ';
}
    


if(isset($_POST['submit'])){
    
    $name = $_POST['txt_username'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];
    $role = $_POST['txt_selectoption'];
    
    //echo $email_txt ."-". $password_txt . "-". $role ;
    $insert=$pdo->prepare("insert into tbl_user(username, useremail, password, role) values (:name, :email, :password, :role)");
    
    $insert->bindParam(':name',$name);
    $insert->bindParam(':email',$email);
    $insert->bindParam(':password',$password);
    $insert->bindParam(':role',$role);
    
    $select = $pdo->prepare("select useremail from tbl_user where useremail='$email'");
    $select->execute();
        
    if($select->rowCount() > 0 ){
            echo '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Email already exist",
        text:"EMAIL ALERT",
        icon: "error",
        button:"Try Again",
        });
        }
        
        );
        
        </script>
        ';
            
            
        }else{
        if($name == "" OR $email == "" OR $password == "" OR $role == ""){
         echo '
               <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Fields Are Empty!!!",
        text:"Kindly Fill the Form",
        icon: "error",
        button:"Try Again",
        });
        }
        
        );
        
        </script>
        ';
        
    }else{
        $insert->execute();
                 echo '
               <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Success",
        text:"Registration Succesful",
        icon: "success",
        button:"ok",
        });
        }
        
        );
        
        </script>
        ';
        
    }
        
    }
   
    

  
   
   

}

?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration Panel
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
        <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#" method="post">
              <div class="col-md-4">
                  <div class="box-body">
                   <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="txt_username">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="txt_email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txt_password">
                </div>
                   <!-- select -->
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txt_selectoption">
                    <option>Admin</option>
                    <option>User</option>
                    
                  </select>
                </div>
                 <div class="box-footer">
                <button type="submit" class="btn btn-info" name="submit">Submit</button>
              </div>
       
              </div>
              </div>
              
              <div class="col-md-8">
                 
                  
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <td><b>#</b></td>
                              <td><b>NAME</b></td>
                              <td><b>EMAIL</b></td>
                              <td><b>PASSWORD</b></td>
                              <td><b>ROLE</b></td>
                              <td><b>DELETE</b></td>
                          </tr>
                      </thead>
                      <tbody>
                          
                          <?php
                          $select = $pdo->prepare("select * from tbl_user order by id desc");
                          
                          $select->execute();
                          
                          while($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo '
                              <tr>
                                <td>'.$row->id.'</td>
                                <td>'.$row->username.'</td>
                                <td>'.$row->useremail.'</td>
                                <td>'.$row->password.'</td>
                                <td>'.$row->role.'</td>
                                <td>
                                <a href="registration.php?id='.$row->id.'" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash" title="delete"></span></a>
                                </td>
                              </tr>
                              
                              
                              ';
                          }
                          
                          ?>
                        
                          
                      </tbody>
                      
                  </table>
                  
                  
              </div>
              

             
            </form>
          </div>
          <!-- /.box -->
   
   
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    include_once 'footer.php';
?>