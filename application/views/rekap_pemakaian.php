

<div class="row">


                <div class="col-lg-12">
                    <h1 class="page-header">Used Stock</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                            <div class="container">
                            <div class="form-inline">
                            <div class="form-group">
                            
                                <label for="tgl_awal">Begining</label>
                                <input type='text' class="form-control-sm" id="tgl_awal"/>
                                
                            
                            
                                <label for="tgl_akhir">End</label>
                                <input type='text' class="form-control-sm" id="tgl_akhir"/>
                                
                                <button type="button" class="btn btn-primary" id="btn_submit">Submit</button>
                            
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div id="tbl_rekap">
                                    
                                        
                                    
                                    <!-- /.table-responsive -->
                                    </div>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-12">
                                    <div id="bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="col-lg-12" id="page_accord">
                    
                    </div>
                    
                </div>
                <!-- /.col-lg-8 -->
                
            </div>
            <!-- /.row -->
        </div>
        
  
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/sb-admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/morris/morris.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            chart_rekap();
            load_table();
            
            $(function(){

            
                $('#tgl_awal').datepicker({dateFormat:'yy-mm-dd'});
                $('#tgl_akhir').datepicker({dateFormat:'yy-mm-dd'}); 
            });

            $('#btn_submit').click(function(){
                //alert($('#tgl_awal').val());
                var tgl_awal = $('#tgl_awal').val();
                var tgl_akhir = $('#tgl_akhir').val();
                chart_rekap(tgl_awal,tgl_akhir);
                load_table(tgl_awal,tgl_akhir);

            });
        });

        function load_table(tgl_awal,tgl_akhir) {
        
        $.ajax({
            type: "POST",
            url: 'warehouse/rekap_pemakaian',
            data: {tgl_awal,tgl_akhir},
            dataType: "json",

            success: function(response){ 
              
              // Ganti isi dari div view dengan view yang diambil dari controller siswa function search
              $("#page_accord").html(response.html);
             
              
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }           
        }); 

        }

       function chart_rekap(tgl_awal,tgl_akhir) {
        $.ajax({
            type: "POST",
            url: 'warehouse/chart_rekap',
            data: {tgl_awal,tgl_akhir},
            dataType: "json",

            success: function(response){ 
             
            $('#bar-chart').empty();
             Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'bar-chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: response,
                // The name of the data record attribute that contains x-values.
                xkey: 'dept1',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['total1','total2'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Total1','Total2'],
                stacked: true,
                hideHover: 'auto',
                resize: false
                
            });
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            } 
        });
        }
            
       

        
        </script>
