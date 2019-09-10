<?php
include_once'connectdb.php';
session_start();
if($_SESSION['useremail']==""){
    header('location:index.php');
}

include_once 'header.php';



//    This is the btn_save section

if(isset($_POST['btn_save'])){
    $category = $_POST['txt_category'];
    
    
    
    if(empty($category)){
        $error  ='
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Fields are Empty",
        text:"Kindly fill the fields",
        icon: "error",
        button:"OK",
        });
        }
        
        );
        
        </script>
        
        ';
        echo $error;
    }
    
    if(!isset($error)){
        $insert = $pdo->prepare("insert into tbl_category(category) values(:category) ");
        
        $insert->bindParam(':category',$category);
        
        if($insert->execute()){
            echo'
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Good Job",
        text:"Add successfully",
        icon: "success",
        button:"OK",
        });
        }
        
        );
        
        </script>
            ';
        }
        
    }
}// End of btn_save


// This is the section of btn_update

if(isset($_POST['btn_update'])){
    $category = $_POST['txt_category'];
    $id = $_POST['txt_id'];
    
    if(empty($category)){
        $errorupdate = '
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Error",
        text:"Fields are Empty",
        icon: "error",
        button:"OK",
        });
        }
        
        );
        
        </script>';
        echo $errorupdate;
    }
    if(!isset($errorupdate)){
        $update = $pdo->prepare("update tbl_category set category='$category' where id=".$id);
        $update->bindParam(':category', $category);
        
        if($update->execute()){
            echo '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Success",
        text:"Category succesfully updated",
        icon: "success",
        button:"OK",
        });
        }
        
        );
        
        </script>
            ';
        }else{
                  echo '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"error",
        text:"Category update failed ",
        icon: "error",
        button:"Try again",
        });
        }
        
        );
        
        </script>
            ';
            
        }
    }
    
}


// This is the delete Section

if(isset($_POST['btn_delete'])){
    $delete = $pdo->prepare("delete from tbl_Category where id=".$_POST['btn_delete']);
    
    if($delete->execute()){
              echo '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Deleted",
        text:"Category deleted Succesfully ",
        icon: "success",
        button:"OK",
        });
        }
        
        );
        
        </script>
            ';
        
    }else{
              echo '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"error",
        text:"Category deletion failed ",
        icon: "error",
        button:"Try again",
        });
        }
        
        );
        
        </script>
            ';
        
    }
}
// This is the delete Section ends here


?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Category
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
              <h3 class="box-title">Category Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
            
             
             <?php
                if(isset($_POST['btn_edit'])){
                    $select = $pdo->prepare("select * from tbl_category where id=".$_POST['btn_edit']);
                    $select->execute();
                    
                    if($select){
                        $row = $select->fetch(PDO::FETCH_OBJ);
                            echo'
                <div class="col-md-4">
                  <div class="box-body">
                   <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" value="'.$row->id.'" name="txt_id">
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" value="'.$row->category.'" name="txt_category">
                </div>
               
                 <div class="box-footer">
                <button type="submit" class="btn btn-info" name="btn_update">Update</button>
              </div>
       
              </div>
              </div>
                    ';
                            
                        
                    }
                }else{
                    echo'
                    <div class="col-md-4">
                  <div class="box-body">
                   <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" name="txt_category">
                </div>
               
                 <div class="box-footer">
                <button type="submit" class="btn btn-info" name="btn_save">Save</button>
              </div>
       
              </div>
              </div>
                    ';
                    
                }
                
                ?>
                
             
         
              
              <div class="col-md-8">
                 
                  
                  <table id="categorytable" class="table table-striped">
                      <thead>
                          <tr>
                              <td><b>#</b></td>
                              <td><b>CATEGORY</b></td>
                              <td><b>EDIT</b></td>
                              <td><b>DELETE</b></td>
                          </tr>
                      </thead>
                      <tbody>
                      
                             <?php
                          $select = $pdo->prepare("select * from tbl_category order by id asc");
                          
                          $select->execute();
                         
                          // Add Datatables here
                          
                          
                          while($row=$select->fetch(PDO::FETCH_OBJ)){
                              echo '
                              <tr>
                                <td>'.$row->id.'</td>
                                <td>'.$row->category.'</td>
                                <td>
                                <button name="btn_edit" type="submit" class="btn btn-success" value="'.$row->id.'">EDIT</button>
                                </td> 
                                <td>
                                <button name="btn_delete" type="submit" class="btn btn-warning" value="'.$row->id.'">DELETE</button>
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