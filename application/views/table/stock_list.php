<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stock</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Stock of Warehouse
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables_stock">
                                    <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>Item Code</th>
                                    <th>Min Stock</th>
                                    <th>Status</th>
                                    <th>Item</th>
                                    <th>Spesifikasi</th>
                                    <th>End Stock</th>
                                    <th>Uom</th>
                                    <th>Class</th>
                                    <th>Used</th>
                                    </tr>

                                    </thead>
                                    
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
    
            
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    

    
            
            
    <script>
    $(document).ready(function() {
        $('#dataTables_stock').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url":'warehouse/datatable_stock',
                "dataType":"json",
                "type":'POST'

            },
            
            "columns":[ 
                { "data": "no" },
		          { "data": "item_code" },
		          { "data": "min_stock" },
                  { "data": "status" },
                  { "data": "item" },
                  { "data": "spesifikasi" },
                  { "data": "end_stock" },
                  { "data": "uom" },
                  { "data": "class" },
                  { "data": "used" },
            ],
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
      if ( aData['status'] == "NG" )
      {
        $('td', nRow).css('background-color', 'hsla(9,100%,64%,0.8)' );
      }
      
    }

        });
    });
    </script>