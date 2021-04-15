<?php
function expense_manager() {
    ?>
    <!-- <style>
        table {
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style> -->
    <style>
        .bordershadow{
            border-radius: 5px;
            box-shadow: 2px 2px 2px 2px rgb(194, 194, 194);
        }
    </style>
    <div class="container mt-5 pt-2 bordershadow">
    <h1 class="text-secondary text-center mt-2 mb-3">Expense List</h1>
        <table class="table table-hover">
            <thead>
            <tr class="bg-dark text-white">
                <th>Sl.No.</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Catagory</th>
                <th>Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'expense_manager';
            $expenses = $wpdb->get_results("SELECT id,item,quantity,price,catagory,date from $table_name");
            foreach ($expenses as $expense) {
                ?>
                <tr>
                    <td><?= $expense->id; ?></td>
                    <td><?= $expense->item; ?></td>
                    <td><?= $expense->quantity; ?></td>
                    <td><?= $expense->price; ?></td>
                    <td><?= $expense->catagory; ?></td>
                    <td><?= $expense->date; ?></td>
                    <td><a class="btn btn-warning" href="<?php echo admin_url('admin.php?page=Update_Expense&id=' . $expense->id); ?>">Edit</a> </td>
                    <td><a class="btn btn-danger" href="<?php echo admin_url('admin.php?page=Delete_Expense&id=' . $expense->id); ?>"> Delete</a></td>
                </tr>
            <?php } ?>

            <!-- </tbody>
            <tbody>
            <tr>
                <td>*</td>
                <td>mobile phone</td>
                <td>1</td>
                <td>15000</td>
                <td>2021-04-10</td>
            </tr>
            <tr>
                <td>*</td>
                <td>chicken</td>
                <td>1</td>
                <td>200</td>
                <td>2021-04-10</td>
            </tr>
            <tr>
                <td>*</td>
                <td>Electric Iron</td>
                <td>1</td>
                <td>500</td>
                <td>2021-04-10</td>
            </tr>
            
            
            </tbody> -->
        </table>

        <!-- show total expense amount -->


    </div><!--container end-->

    <!-- <div style="background-color:black;color: yellow;">This is a test div</div> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <?php
}
add_shortcode('short_expense_manager', 'expense_manager');
?>