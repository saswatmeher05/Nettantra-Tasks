<?php

function add_expense()
{
    //echo "insert page";
    ?>
<table>
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <td>Item Name:</td>
        <td><input type="text" name="item"></td>
    </tr>
    <tr>
        <td>Quantity:</td>
        <td>
            <input type="number" name="quantity">
        </td>
    </tr>
    <tr>
        <td>Price:</td>
        <td>
            <input type="number" name="price" step="any" >
        </td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>
            <input type="date" name="date">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Add Expense" name="submit">
        </td>
    </tr>
    </form>
    </tbody>
</table>
<?php
    if(isset($_POST['submit'])){
        global $wpdb;
        $item=$_POST['item'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $date=$_POST['date'];
        $table_name = $wpdb->prefix . 'expense_manager';
        $wpdb->insert(
            $table_name,
            array(
                'item' => $item,
                'quantity' => $quantity,
                'price' => $price,
                'date'=>$date
            )
        );
        echo "Expense Added Successfully";
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