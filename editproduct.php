<?php
include_once'connectdb.php';
session_start();

include_once 'header.php';

$id = $_GET['id'];
$select=$pdo->prepare("select * from tbl_addproduct where id=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['id'];
$productname_db = $row['product_name'];
$category_db = $row['category'];
$purchase_db = $row['purchase_price'];
$salesprice_db = $row['sales_price'];
$stockprice_db = $row['stock_price'];
$description_db = $row['description'];
$productimage_db = $row['image'];



if(isset($_POST['btn_updateproduct'])){
        $productname_txt = $_POST['txt_productname'];
        $category_txt = $_POST['txt_category'];
        $purchaseprice_txt = $_POST['txt_purchaseprice'];
        $salesprice_txt = $_POST['txt_salesprice'];
        $stock_txt = $_POST['txt_stock'];
        $description_txt = $_POST['txt_description'];
        $f_name_txt = $_FILES['myfile']['name'];
    
    if(!empty($f_name)){
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
               $f_newfile;
                
                  if(!isset($error)){
         $update=$pdo->prepare("update tbl_addproduct set product_name=:product_name, category=:category, purchase_price=:purchase_price, sales_price=:sales_price, stock_price=:stock_price, description=:description, image=:image where id = $id");
        
        $update->bindParam(':product_name', $productname_txt); 
        $update->bindParam(':category', $category_txt);
        $update->bindParam(':purchase_price', $purchaseprice_txt);
        $update->bindParam(':sales_price', $salesprice_txt);
        $update->bindParam(':stock_price', $stock_txt);
        $update->bindParam(':description', $description_txt);
        $update->bindParam(':image', $f_newfile);

    if($update->execute()){
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
        
    }else{
        $update=$pdo->prepare("update tbl_addproduct set product_name=:product_name, category=:category, purchase_price=:purchase_price, sales_price=:sales_price, stock_price=:stock_price, description=:description, image=:image where id = $id");
        
        $update->bindParam(':product_name', $productname_txt); 
        $update->bindParam(':category', $category_txt);
        $update->bindParam(':purchase_price', $purchaseprice_txt);
        $update->bindParam(':sales_price', $salesprice_txt);
        $update->bindParam(':stock_price', $stock_txt);
        $update->bindParam(':description', $description_txt);
        $update->bindParam(':image', $productimage_db);
        
        if($update->execute()){
             $error = '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Success",
        text:"Product Succesfully Updated",
        icon: "success",
        button:"Ok",
        });
        }
        
        );
        
        </script>
            ';
            echo $error;
            
        }else{
             $error = '
            <script type="text/javascript">
        jQuery(function validation(){
        
        swal({
        title:"Error",
        text:"Failed to Update Prduct",
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
    
}
$select=$pdo->prepare("select * from tbl_addproduct where id=$id");
$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$id_db = $row['id'];
$productname_db = $row['product_name'];
$category_db = $row['category'];
$purchase_db = $row['purchase_price'];
$salesprice_db = $row['sales_price'];
$stockprice_db = $row['stock_price'];
$description_db = $row['description'];
$productimage_db = $row['image'];






?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Product
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
              <h3 class="box-title">Product Update Form</h3>
              </div>
              
              
        <form role="form" action="" method="post" enctype="multipart/form-data">
        
        <div class="box-body">
             
              
              <div class="col-md-6">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" placeholder="Product Name" value="<?php echo $productname_db;?>" name="txt_productname" >
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
                              <option <?php if($row['category'] == $category_db){?>
                              
                                  selected = "selected"
                              
                              <?php } ?> >
                             
                                  <?php echo $row['category'];?></option>
                              <?php
                      }
                      
                      ?>
                
                  </select>
                </div>
                
        
               
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Purchase Price</label>
                  <input type="number"  min='1' step="1" class="form-control" value = "<?php echo $purchase_db;?>"  placeholder="Purchase Price" name="txt_purchaseprice">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Sales Price</label>
                  <input type="number"  min='1' step="1" class="form-control" placeholder="Sales Price" value="<?php echo $salesprice_db; ?>" name="txt_salesprice">
                </div>
        
              </div>
              
              
              <div class="col-md-6">
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Stock Price</label>
                  <input type="number"  min='1' step="1"  class="form-control" placeholder="Stock Price" value="<?php echo $stockprice_db; ?>" name="txt_stock">
                </div>
                
                  <label >Description</label>
                <div class="form-group">
                  <textarea class="form-group"  name="txt_description" cols="70" rows="5"><?php echo $description_db; ?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Image</label>
                  <img src="upload/<?php echo $productimage_db; ?>" class="img-rounded" width="30px" height="30px" />
                  <input type="file" class="imput-group" name="myfile" >
                  <p>upload image</p>

                </div>
                 
              
                  
              </div>
            <div class="box-footer">
               
               <button type="submit" class="btn btn-info" name="btn_updateproduct">Update Product </button>
      
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