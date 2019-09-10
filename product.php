<?php
include_once'connectdb.php';
session_start();

include_once 'header.php';
if(isset($_POST['btn_addproduct'])){
        $productname = $_POST['txt_productname'];
        $category = $_POST['txt_category'];
        $purchaseprice = $_POST['txt_purchaseprice'];
        $salesprice = $_POST['txt_salesprice'];
        $stock = $_POST['txt_stock'];
        $description = $_POST['txt_description'];
    
        // This is the code for Uploading an image
         $f_name = $_FILES['myfile']['name'];
        $f_tmp = $_FILES['myfile']['tmp_name'];
        $f_size = $_FILES['myfile']['size'];
        $f_extension = explode('.', $f_name);
        $f_extension = strtolower(end($f_extension));
        $f_newfile = uniqid(). '.'. $f_extension;
        $store = "upload/".$f_newfile;
    
    if($f_extension == 'jpg' || $f_extension == 'jpeg' || $f_extension == 'png'  || $f_extension == 'gif'){
        if($f_size >= 1000000){
            // echo ' Max file size should be 1MB';

            $error = '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Warning",
        text:"Max file size should be 1MB",
        icon: "error",
        button:"Try Again",
        });
        }
        
        );
        
        </script>
            ';
            echo $error;
            
        }else{
            if(move_uploaded_file($f_tmp,$store)){
                //echo 'Uploaded successfully';
                $upload = $f_newfile;
                
                  if(!isset($error)){
        $insert=$pdo->prepare("insert into tbl_addproduct(product_name, category, purchase_price, sales_price, stock_price, description, image) values (:product_name, :category, :purchase_price, :sales_price, :stock_price, :description, :image)");
        
        $insert->bindParam(':product_name', $productname); 
        $insert->bindParam(':category', $category);
        $insert->bindParam(':purchase_price', $purchaseprice);
        $insert->bindParam(':sales_price', $salesprice);
        $insert->bindParam(':stock_price', $stock);
        $insert->bindParam(':description', $description);
        $insert->bindParam(':image', $upload);

    if($insert->execute()){
        echo '
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Success",
        text:"Product added Successfully",
        icon: "success",
        button:"Ok",
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
        title:"Error",
        text:"Failed to Add Product",
        icon: "error",
        button:"Try Again",
        });
        }
        
        );
        
        </script>
        ';
    }
    }
            }
        }
    }else{
        //echo 'only .jpg .png and .gif can be uploaded';
        $error =  '
        <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Error",
        text:"only .jpg .png and .gif can be uploaded",
        icon: "error",
        button:"Try Again",
        });
        }
        
        );
        
        </script>
        ';
        echo $error;
    }
    
    
  
}

 


?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product
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
              <h3 class="box-title"><a href="productlist.php" class="btn btn-primary" role="button">Back to Product List</a></h3>
              </div>
              <!-- /.box-header -->
            <!-- form start --> 
     <form role="form" action="" method="post" enctype="multipart/form-data">
 
           <div class="box-body">
             
              
              <div class="col-md-6">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" placeholder="Product Name" name="txt_productname" >
                </div>
                
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="txt_category" >
                    <option value="" disabled selected>Select Category</option>
                    
                    <?php
                      $select = $pdo->prepare("select * from tbl_category order by id asc ");
                      $select->execute();
                      while($row= $select->fetch(PDO::FETCH_ASSOC)){
                          extract($row)
                              ?>
                              <option><?php echo $row['category'];?></option>
                              <?php
                      }
                      
                      ?>
                
                  </select>
                </div>
                
        
               
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Purchase Price</label>
                  <input type="number"  min='1' step="1" class="form-control"  placeholder="Purchase Price" name="txt_purchaseprice">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Sales Price</label>
                  <input type="number"  min='1' step="1" class="form-control" placeholder="Sales Price" name="txt_salesprice">
                </div>
        
              </div>
              
              
              <div class="col-md-6">
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Stock Price</label>
                  <input type="number"  min='1' step="1"  class="form-control" placeholder="Stock Price" name="txt_stock">
                </div>
                
                  <label >Description</label>
                <div class="form-group">
                  <textarea class="form-group"  name="txt_description" cols="70" rows="5"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Image</label>
                  <input type="file" class="imput-group" name="myfile" >
                  <p>upload image</p>

                </div>
                 
              
                  
              </div>
            <div class="box-footer">
               
               <button type="submit" class="btn btn-info" name="btn_addproduct">Add Product </button>
                               
           </div>
               
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