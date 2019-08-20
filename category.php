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
            <form role="form" action="#" method="post">
              <div class="col-md-4">
                  <div class="box-body">
                   <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" name="txt_username">
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
                              <td><b>CATEGORY</b></td>
                              <td><b>EDIT</b></td>
                              <td><b>DELETE</b></td>
                          </tr>
                      </thead>
                      <tbody>
                          
                        
                          
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