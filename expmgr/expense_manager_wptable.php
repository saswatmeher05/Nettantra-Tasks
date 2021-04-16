<?php
/*
Plugin Name: My List Table Example
*/
?>
<div class="wrap">
<div id="icon-users" class="icon32"></div>
<h2>Expense Table</h2>
</div>
<?php
//Expense table implementing wp_list_table
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

function expense_manager_wptable(){

    $myListTable = new ExpenseManagerWPTable();
    echo '<div class="wrap"><h2>Expense Table</h2>'; 
    $myListTable->prepare_items(); 
    $myListTable->display(); 
    echo '</div>'; 

    // global $wpdb;
    // $table_name = $wpdb->prefix . 'expense_manager';
    // $expenses = $wpdb->get_results("SELECT id,item,quantity,price,catagory,date from $table_name");

    }//function end
    



class ExpenseManagerWPTable extends WP_List_Table{

    //define data set for WP_List_Table => data
        var $data;

        // var $data=array(
        //     array(
        //             'id'=>1, 
        //             "item"=>"item1", 
        //             "quantity"=>"1", 
        //             "price"=>"30", 
        //             "catagory"=>"cat1",
        //             "date"=>"2021-04-15"
        //     ),
        //     array(
        //             "id"=>2, 
        //             "item"=>"item2", 
        //             "quantity"=>"1", 
        //             "price"=>"330", 
        //             "catagory"=>"cat1",
        //             "date"=>"2021-04-15"
            
        //         )
        // );
        // foreach ($expenses as $expense) {
        //     $data=array(array(
        //         'id' => $expense->id,
        //         'item' => $expense->item,
        //         'quantity' => $expense->quantity,
        //         'price' => $expense->price,
        //         'catagory' => $expense->catagory,
        //         'date' => $expense->date,
        //     ));
        //}

        //dummy data
        // $data[]=array(
        //     'id'=>1, 
        //     "item"=>"item1", 
        //     "quantity"=>"1", 
        //     "price"=>"30", 
        //     "catagory"=>"cat1"
        //     );
        // $data[]=array(
        //     "id"=>2, 
        //     "item"=>"item2", 
        //     "quantity"=>"1", 
        //     "price"=>"330", 
        //     "catagory"=>"cat1"
        //     );
        // $data[]=array(
        //     "id"=>3, 
        //     "item"=>"item3", 
        //     "quantity"=>"2", 
        //     "price"=>"530", 
        //     "catagory"=>"cat2"
        //     );
   
 
    //prepare_items
    function prepare_items(){
        //new logic
        global $wpdb;
        $table_name = $wpdb->prefix . 'expense_manager'; // do not forget about tables prefix

        $per_page = 5; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        //$this->process_bulk_action();

        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? ($per_page * max(0, intval($_REQUEST['paged']) - 1)) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'asc';

        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);

        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));




        /* old logic
//         global $wpdb;
//         $table_name = $wpdb->prefix . 'expense_manager';
//         $expenses = $wpdb->get_results("SELECT * from $table_name");

        
        
//         $columns = $this->get_columns();
//         $hidden = array();
//         $sortable = array();
//         $this->_column_headers = array($columns, $hidden, $sortable);
//         foreach ($expenses as $expense) {
//             $data[]=array(
                
//                     'id'=>$expense->id,
//                     'item'=>$expense->item,
//                     'quantity'=>$expense->quantity,
//                     'price'=>$expense->price,
//                     'catagory'=>$expense->catagory,
//                     'date'=>$expense->date
                
//             );
//         }
//         $this->items = $data;
//         //items to display per page
//         $per_page = 5;
//   $current_page = $this->get_pagenum();
//   $total_items = count($this->data);

//   // only ncessary because we have sample data
//   $this->found_data = array_slice($this->data,(($current_page-1)*$per_page),$per_page);

//   $this->set_pagination_args( array(
//     'total_items' => $total_items,                  //WE have to calculate the total number of items
//     'per_page'    => $per_page                     //WE have to determine how many items to show on a page
//   ) );
//   $this->items = $this->found_data;
    */








    }   
    
    //get_columns
    function get_columns(){
        $columns=array(
            'id'=>'ID',
            'item'=>'Item',
            'quantity'=>'Quantity',
            'price'=>'Price',
            'catagory'=>'Catagory',
            'date'=>'Date'
        );
        return $columns;
    }
     
    //column_default
    function column_default($item,$column_name){
        switch ($column_name) {
            case 'id':
            case 'item':
            case 'quantity':
            case 'price':
            case 'catagory':
            case 'date':
                return $item[$column_name];
                default: 
                    return print_r($item,true);
        }
    }

    //sortable columns
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'id' => array('id', true),
            'item' => array('item', false),
            'quantity' => array('quantity', false),
            'price' => array('price', false),
            'catagory' => array('catagory', false),
            'date' => array('date', true)
        );
        return $sortable_columns;
    }


}//class end

function my_add_menu_items(){
    add_submenu_page('Expense_Manager',//parent page slug
        'expense_manager_wptable',//page title
        'Expense WPTable',//menu title
        'manage_options',//manage optios
        'Expense_WPTable',//slug
        'expense_manager_wptable'//function
    );
}
add_action( 'admin_menu', 'my_add_menu_items' );

function my_render_list_page(){
  $myListTable = new My_Example_List_Table();
  echo '<div class="wrap"><h2>My List Table Test</h2>'; 
  $myListTable->prepare_items(); 
  $myListTable->display(); 
  echo '</div>'; 
}


// function expense_table_layout(){
//  $expenseTable=new ExpenseTable();
 
// //calling prepare items from class
// $expenseTable->prepate_items();

// $expenseTable->display();

// }


?>
