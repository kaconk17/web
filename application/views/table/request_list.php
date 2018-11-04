<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Price List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Request List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables_request">
                                    <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>Request Date</th>
                                    <th>Requset No</th>
                                    <th>Item</th>
                                    <th>Spesifikasi</th>
                                    <th>Item Code</th>
                                    <th>Qty</th>
                                    <th>Uom</th>
                                    <th>Reason</th>
                                    <th>Nomer PO</th>
                                    <th>Status PO</th>
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
        $('#dataTables_request').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url":'purchasing/table_request',
                "dataType":"json",
                "type":'POST'

            },
            
            "columns":[ 
                { "data": "no" },
		          { "data": "request_date" },
		          { "data": "request_no" },
                  { "data": "item" },
                  { "data": "spesifikasi" },
                  { "data": "item_code" },
                  { "data": "qty"}, 
                  { "data": "uom" },
                  { "data": "reason" },
                  { "data": "po_no" },
                  { "data": "status_po" },
            ],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            if ( aData['status_po'] == "complete" )
            {
                $('td', nRow).css('background-color', 'hsla(9,100%,64%,0.8)' );
            }
            
            }

        });
    });
    </script>