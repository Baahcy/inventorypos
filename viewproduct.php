<?php
include_once'connectdb.php';
session_start();

include_once 'header.php';
?>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Product
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
              <h3 class="box-title"><a href="productlist.php" class="btn btn-primary" role="button">Back to Product List</a></h3>
            </div>
            
            <div class="box-body">
               
               <?php
        $id = $_GET['id'];
        
        $select = $pdo->prepare("Select * from tbl_addproduct where id=$id");
        
        $select->execute();
        
        while($row=$select->fetch(PDO::FETCH_OBJ)){
            echo '
            <div class="col-md-6">
                <ul class="list-group">
                <center><p class="list-group-item list-group-item-success"><b>Product Details</b></p></center>
                    <li class="list-group-item">ID<span class="badge">'.$row->id.'</span></li>
                    <li class="list-group-item">Product Price<span class="label label-info pull-right">'.$row->product_name.'</span></li>
                    <li class="list-group-item">Category<span class="label label-primary pull-right">'.$row->category.'</span></li>
                    <li class="list-group-item">Purchase Price<span class="label label-warning pull-right">'.$row->purchase_price.'</span></li>
                    <li class="list-group-item">Sales Price<span class="label label-warning pull-right">'.$row->sales_price.'</span></li>
                    <li class="list-group-item">Profit Price<span class="label label-success pull-right">'.($row->sales_price - $row->purchase_price).'</span></li>
                    <li class="list-group-item">Stock Price<span class="label label-danger pull-right">'.$row->stock_price.'</span></li>
                    
                    <li class="list-group-item"><b>Description : -</b><span class="">'.$row->description.'</span></li>
                
            </div>
            
            
            <div class="col-md-6">
                <ul class="list-group">
                    <center><p class="list-group-item list-group-item-success"><b>Product Image</b></p></center>
                    <img src="upload/'.$row->image.'" class="img-responsive" />
            </div>
            
            ';
            
        }
        
        
        
        ?>
                
            </div>
    
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    include_once 'footer.php';
?>