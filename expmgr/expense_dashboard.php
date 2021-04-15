<?php

//echo "dashboard page";
function expense_dashboard(){
    //$i=$_GET['id'];
    global $wpdb;
    $table_name=$wpdb->prefix.'expense_manager';
    $expenses=$wpdb->get_results("SELECT catagory, count(*) as number from $table_name group by catagory");


?>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        .bordershadow{
            border-radius: 5px;
            box-shadow: 2px 2px 2px 2px rgb(194, 194, 194);
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
            var data=google.visualization.arrayToDataTable([  
                ['Catagory','Number'],
                <?php 
                    foreach($expenses as $expense){
                        echo "['".$expense->catagory."', ".$expense->number."],"; 
                    }
                ?>
            ]);
            var options={
                title: 'Expense' ,
                //is3D: true,
                pieHole:0.4

            };
            var chart=new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data,options);

           }

    </script>
    <!-- <br /><br />   -->
    <div class="container bordershadow mt-3 mb-3 pt-3">
                <h1 align="center" class="text-secondary">Expence Report</h1>  
                <hr>
           <div class="row">
           <div class="col-6">  
                  
            <div id="piechart" style="width: 600px;height: 450px;"></div>  
           </div>
           <div class="col-6 text-center pt-5">
           <!-- this is div 2 -->
           <h2 class="text-info">Total Expenditure</h2>
           <?php 

                // $expensestotal=$wpdb->get_results("SELECT SUM(price) AS totalsum FROM $table_name");
                // echo $expensestotal->totalsum;
                $sum=$wpdb->get_var("SELECT SUM(price) FROM $table_name");
                echo "<h3 class='text-success'>Rs. ".$sum."</h3>";
           ?>
            
           
            <a class="text-white" href=" <?php echo admin_url('admin.php?page=Generate_Pdf'); ?> "><h3 class="btn btn-primary" >Generate Pdf</h3></a>
            </div>  
           </div><!--row end-->


    </div><!--container end-->
<?php 
}

//add_shortcode('short_expense_manager', 'expense_manager');
?>
