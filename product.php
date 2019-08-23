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
              <h3 class="box-title">Product Form</h3>
              </div>
              <!-- /.box-header -->
            <!-- form start --> 
            
           <div class="box-body">
            <form role="form" action="" method="post">
              
              <div class="col-md-6">
              
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product Name" name="txt_product">
                </div>
                
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="txt_selectoption">
                    <option>Admin</option>
                    <option>User</option>
                    
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Purchase Price</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Purchase Price" name="txt_purchaseprice">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Sales Price</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Sales Price" name="txt_salesprice">
                </div>
                
            
                
              
              
              </div>
              
              
              <div class="col-md-6">
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Sock</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Sock Price" name="txt_sock">
                </div>
                
                  <label >Description</label>
                  <div class="form-group">
                  <textarea class="form-group"  name="txtdescription" cols="70" rows="9"></textarea>
                </div>
                  
              </div>
            </form>
               
           </div>  
         </div>
       
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    include_once 'footer.php';
?>