<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pemakaian Stock
                            <i id="label_tgl"></i>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="chart_pemakaian"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    
                </div>
                <!-- /.col-lg-8 -->
                
            </div>
            <!-- /.row -->
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.css">
        <script src="<?php echo base_url(); ?>assets/js/plugins/morris/morris.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
        

       <script type="text/javascript">
       $(document).ready(function(){
           var d = new Date();
           var tanggal_awal = d.getFullYear() + "-" + (d.getMonth()+1) + "-01";
           var tanggal_akhir = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
           $('#label_tgl').html(tanggal_awal+" Sampai "+tanggal_akhir);
           chart_rekap();
       });

       function chart_rekap() {
        $.ajax({
            type: "POST",
            url: 'warehouse/chart_rekap',
            data: 0,
            dataType: "json",

            success: function(response){ 
             
            $('#bar-chart').empty();
             Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'chart_pemakaian',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: response,
                // The name of the data record attribute that contains x-values.
                xkey: 'dept',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['total'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Total'],
                gridTextSize:10,
                resize: false
            });
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            } 
        });
        }
       </script>