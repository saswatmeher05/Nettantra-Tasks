<?php
//echo "update page";
function update_expense(){
    //echo "update page in";
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'expense_manager';
    $expenses = $wpdb->get_results("SELECT id,item,quantity,price,catagory,date from $table_name where id=$i");
    //echo $expenses[0]->id;
    ?>
    <style>
        .bordershadow{
            border-radius: 5px;
            box-shadow: 2px 2px 2px 2px rgb(194, 194, 194);
        }
    </style>
    <div class="container mt-5">
    <div class="row">
    <div class="col-2">
    </div>
    <div class="col-8 bordershadow">
    <h1 class="text-white bg-dark text-center mb-0 mt-3 rounded-lg">Update Item/Expense</h1>
    <table class="table table-hover">
        <!-- <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead> -->
        <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="id" value="<?= $expenses[0]->id; ?>">
            <tr>
                <td>Item Name:</td>
                <td>
                    <input type="text" class="form-control" name="item" value="<?= $expenses[0]->item; ?>">
                </td>
            </tr>
            <tr>
                <td>Quantity:</td>
                <td>
                    <input type="number" class="form-control" name="quantity" value="<?= $expenses[0]->quantity; ?>">
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                <input type="number" step="any" class="form-control" name="price" value="<?= $expenses[0]->price; ?>">
                </td>
            </tr>
            <tr>
                <td>Catagory:</td>
                <td>
             <select name="catagory" class="form-control">
             
                <?php 
                $query=$wpdb->get_results("select distinct catagory from $table_name");
                foreach($query as $expense){   ?>
                <option value="<?= $expense->catagory; ?>"><?= $expense->catagory; ?></option>
                <?php  }  ?>
                <!-- <option value="food">food</option>
                <option value="electronics">electronics</option>
                <option value="grocery">grocery</option>
                <option value="travel">travel</option>
                <option value="healthcare">healthcare</option>
                <option value="clothing">clothing</option>
                <option value="miscellaneous">miscellaneous</option> -->
              </select>
                </td>
                <!-- <td>
                <input type="text" class="form-control" name="catagory" value="<//?= $expenses[0]->catagory; ?>">
                </td> -->
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" class="form-control" name="date" value="<?= $expenses[0]->date; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" class="btn btn-warning" name="update"></td>
            </tr>
        </form>
        </tbody>
    </table>
    </div>

<div class="col-2">
</div>

</div><!--row end-->
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <?php
}
if(isset($_POST['update']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'expense_manager';
    $id=$_POST['id'];
    $item=$_POST['item'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $catagory=$_POST['catagory'];
    $date=$_POST['date'];
    $wpdb->update(
        $table_name,
        array(
            'item'=>$item,
            'quantity'=>$quantity,
            'price'=>$price,
            'catagory'=>$catagory,
            'date'=>$date
        ),
        array(
            'id'=>$id
        )
    );
    $url=admin_url('admin.php?page=Expense_Manager');
    header("location:http://localhost/wp-admin/admin.php?page=Expense_Manager");
}
?>