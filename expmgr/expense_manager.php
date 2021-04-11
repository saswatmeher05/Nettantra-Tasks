<?php
function expense_manager() {
    ?>
    <style>
        table {
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <table>
            <thead>
            <tr>
                <th>Sl.No.</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'expense_manager';
            $expenses = $wpdb->get_results("SELECT id,item,quantity,price,date from $table_name");
            foreach ($expenses as $expense) {
                ?>
                <tr>
                    <td><?= $expense->id; ?></td>
                    <td><?= $expense->item; ?></td>
                    <td><?= $expense->quantity; ?></td>
                    <td><?= $expense->price; ?></td>
                    <td><?= $expense->date; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=Update_Expense&id=' . $expense->id); ?>">Update</a> </td>
                    <td><a href="<?php echo admin_url('admin.php?page=Delete_Expense&id=' . $expense->id); ?>"> Delete</a></td>
                </tr>
            <?php } ?>

            </tbody>
            <!--<tbody>
            <tr>
                <td>1</td>
                <td>mobile phone</td>
                <td>1</td>
                <td>15000</td>
                <td>2021-04-10</td>
            </tr>
            <tr>
                <td>2</td>
                <td>chicken</td>
                <td>1</td>
                <td>200</td>
                <td>2021-04-10</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Electric Iron</td>
                <td>1</td>
                <td>500</td>
                <td>2021-04-10</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jayesh P. Patel</td>
                <td>Web Designer</td>
                <td>+91 98562315</td>
            </tr>
            
            </tbody>-->
        </table>
    </div>
    <?php
}
add_shortcode('short_expense_manager', 'expense_manager');
?>