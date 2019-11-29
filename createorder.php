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
        Create Order
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
    <form action="" method="" name="">
        <div class="box-header with-border">
            <h3 class="box-title">New Order</h3>
        </div>

        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Name</label>

                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" class="form-control" placeholder="Customer Name" name="txt_customername">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Date:</label>
                    <div class="input-group date">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
            </div>

        </div>
        <div class="box-body">
            <div class="col-md-12">
                <table id="producttable" class="table table-striped">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th><b>Search Product</b></th>
                            <th><b>Stock</b></th>
                            <th><b>Price </b></th>
                            <th><b>Enter Quantity</b></th>
                            <th><b>Total</b></th>
                            <th>
                                <button type="button" name="add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
                            </th>

                        </tr>
                    </thead>
                </table>
            </div>

        </div>
<div class="box-body">
  <div class="col-md-6">
    <div class="form-group">
        <label for="exampleInputPassword1">Sub Total</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
            <input type="text" class="form-control" name="txt_subtotal">
        </div>
    </div>

<div class="form-group">
    <label for="exampleInputPassword1">Tax(15%)</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
        <input type="text" class="form-control"  name="txt_tax">
    </div>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Discount</label>
     <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
        <input type="text" class="form-control"  name="txt_discount">
    </div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="exampleInputPassword1">Total</label>
         <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
        <input type="text" class="form-control"  name="txt_total">
    </div>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Paid</label>
         <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
        <input type="text" class="form-control"  name="txt_paid">
    </div>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Due</label>
         <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
        <input type="text" class="form-control"  name="txt_due">
    </div>
    </div>
    <!-- radio -->
<div class="form-group">
    <p><b>Payement Method</b></p>
    <label>
        <input type="radio" name="r2" class="minimal-red" checked> CASH
    </label>
    <label>
        <input type="radio" name="r2" class="minimal-red"> CARD
    </label>
    <label>
        <input type="radio" name="r2" class="minimal-red"> CHECK
    </label>
</div>

</div>
    <center><input type="submit" name="btn_saveorder" value="Save Order" class="btn btn-info"></center>
</div>


</form>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
    </script>
    
    <script>
          //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    
    </script>
    
   
    <?php
    include_once 'footer.php';
?>