<?php
//echo "Delete Expense";
function delete_expense(){
    echo "delete expense";
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'expense_manager';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
        echo "Expense Deleted Successfully";
    }
    echo get_site_url() .'/wp-admin/admin.php?page=Expense_Manager';
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/wp-admin/admin.php?page=Expense_Manager" />
   <?php
    //wp_redirect( admin_url('admin.php?page=page=Expense_Manager'),301 );
    //exit;
    //header("location:http://localhost/wp-admin/admin.php?page=Expense_Manager");
}
?>

