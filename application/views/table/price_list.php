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
                            Price List of Master Item
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Item Code</th>
                                        <th>Class</th>
                                        <th>Item</th>
                                        <th>Spesifikasi</th>
                                        <th>Uom</th>
                                        <th>Unit Price</th>
                                        <th>Currency</th>
                                        <th>Supplier</th>
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
        $('#dataTables-example').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url":'purchasing/datatable_price',
                "dataType":"json",
                "type":'POST'

            },
            
            "columns":[ 
                { "data": "no" },
		          { "data": "item_code" },
		          { "data": "class" },
		          { "data": "item" },
                  { "data": "spesifikasi" },
                  { "data": "uom" },
                  { "data": "price" },
                  { "data": "currency" },
                  { "data": "supplier" },
            ]

           
        });
    });
    </script>