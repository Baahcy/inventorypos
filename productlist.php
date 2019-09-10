<?php
include_once'connectdb.php';
session_start();

include_once 'header.php';
error_reporting(0);

$id = $_GET['id'];

$delete=$pdo->prepare("delete from tbl_addproduct where id=".$id);

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

?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product list
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
        
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
             <table id="producttable" class="table table-striped">
                      <thead>
                          <tr>
                              <td><b>#</b></td>
                              <td><b>Product Name</b></td>
                              <td><b>Category</b></td>
                              <td><b>Purchase Price</b></td>
                              <td><b>Sales Price</b></td>
                              <td><b>Stock Price</b></td>
                              <td><b>Description </b></td>
                              <td><b>Image </b></td>
                              <td><b>View </b></td>
                              <td><b>Edit </b></td>
                              <td><b>Delete </b></td>
                          </tr>
                      </thead>
                      <tbody>
                      
                             <?php
                          $select = $pdo->prepare("select * from tbl_addproduct order by id asc");
                          
                          $select->execute();
                          
                           while($row=$select->fetch(PDO::FETCH_OBJ)){
                               echo'
                               <tr>
                                    <td>'.$row->id.'</td>
                                    <td>'.$row->product_name.'</td>
                                    <td>'.$row->category.'</td>
                                    <td>'.$row->purchase_price.'</td>
                                    <td>'.$row->sales_price.'</td>
                                    <td>'.$row->stock_price.'</td>
                                    <td>'.$row->description.'</td>
                                    <td><img src="upload/'.$row->image.'" class="img-rounded" width="30px" height="30px" /></td>
                                                                  
                                <td>
                                <a href="viewproduct.php?id='.$row->id.'" class="btn btn-success" role="button"><span class="glyphicon glyphicon-eye-open" title="View Product"></span></a>
                                </td>
                                <td>
                                <a href="editproduct.php?id='.$row->id.'" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-edit" title="Edit Product"></span></a>
                                </td>
                                <td>
                                <a href="productlist.php?id='.$row->id.'" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"  title="Delete Product"></span></a>
                                </td>
                               </tr>
                               ';
                           }
                          ?>
                 </tbody>
            </table>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
<?php
    include_once 'footer.php';
?>