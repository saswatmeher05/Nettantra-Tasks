<?php

function add_expense()
{
    //echo "insert page";
    ?>
    <style>
        .bordershadow{
            border-radius: 5px;
            box-shadow: 2px 2px 2px 2px rgb(194, 194, 194);
        }
    </style>
    <div class="container mt-5 mb-4">
    <div class="row">
    <div class="col-2">
    </div>
    <div class="col-8 bordershadow">
    <h1 class="text-white bg-dark text-center mb-0 mt-3 rounded-lg">Add Item/Expense</h1>
<table class="table table-hover">
    <!-- <thead> -->
    <!-- <tr colspan=2> -->
    
        
    <!-- </tr> -->
    <!-- </thead> -->
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <td>Item Name:</td>
        <td><input type="text" name="item" class="form-control"></td>
    </tr>
    <tr>
        <td>Quantity:</td>
        <td>
            <input type="number" name="quantity" class="form-control">
        </td>
    </tr>
    <tr>
        <td>Price:</td>
        <td>
            <input type="number" name="price" step="any" class="form-control" >
        </td>
    </tr>
    <tr>
        <td>Catagory:</td>
        <td>
            <select name="catagory" class="form-control">
            <option value="">--select--</option>
                <option value="food">food</option>
                <option value="electronics">electronics</option>
                <option value="grocery">grocery</option>
                <option value="travel">travel</option>
                <option value="healthcare">healthcare</option>
                <option value="clothing">clothing</option>
                <option value="miscellaneous">miscellaneous</option>
            </select>
        </td>
        <!-- <td>
            <input type="text" name="catagory" class="form-control" >
        </td> -->
    </tr>
    <tr>
        <td>Date:</td>
        <td>
            <input type="date" name="date" class="form-control">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Add Item" name="submit"class="btn btn-info">
        </td>
    </tr>
    </form>
    </tbody>
</table>
    </div>

    <div class="col-2">
    </div>

    </div><!--row end-->
    </div><!--container end-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<?php
    if(isset($_POST['submit'])){
        global $wpdb;
        $item=$_POST['item'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $catagory=$_POST['catagory'];
        $date=$_POST['date'];
        $table_name = $wpdb->prefix . 'expense_manager';
        $wpdb->insert(
            $table_name,
            array(
                'item' => $item,
                'quantity' => $quantity,
                'price' => $price,
                'catagory' => $catagory,
                'date'=>$date
            )
        );
        echo "<div class='container text-center'><div class='text-success text-center'>Added Successfully</div></div>";
       // wp_redirect( admin_url('admin.php?page=page=Expense_Manager'),301 );
        //header("location:http://localhost/wp-admin/admin.php?page=Expense_Manager");
      //  header("http://google.com");
        ?>
        <!-- <meta http-equiv="refresh" content="1; url=http://localhost/wp-admin/admin.php?page=Expense_Manager" /> -->
        <?php
        exit;
    }
}
?>
