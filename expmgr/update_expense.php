<?php
//echo "update page";
function update_expense(){
    //echo "update page in";
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'expense_manager';
    $expenses = $wpdb->get_results("SELECT id,item,quantity,price,date from $table_name where id=$i");
    echo $expenses[0]->id;
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
            <input type="hidden" name="id" value="<?= $expenses[0]->id; ?>">
            <tr>
                <td>Item Name:</td>
                <td>
                    <input type="text" name="item" value="<?= $expenses[0]->item; ?>">
                </td>
            </tr>
            <tr>
                <td>Quantity:</td>
                <td>
                    <input type="number" name="quantity" value="<?= $expenses[0]->quantity; ?>">
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                <input type="number" step="any" name="price" value="<?= $expenses[0]->price; ?>">
                </td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" name="date" value="<?= $expenses[0]->date; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="update"></td>
            </tr>
        </form>
        </tbody>
    </table>
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
    $date=$_POST['date'];
    $wpdb->update(
        $table_name,
        array(
            'item'=>$item,
            'quantity'=>$quantity,
            'price'=>$price,
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