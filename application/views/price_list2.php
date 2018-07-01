
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Price List</h1>
</div>  
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <form class="form-inline" id="form_cari_price">
                                    <label for="inlineFormInputName2">Cari</label>
                                    <select class="custom-select my-1 mr-sm-4" id="combo_cari_price">
                                        <option selected value="0">Choose...</option>
                                        <option value="item">Item</option>
                                        <option value="spesifikasi">Spesifikasi</option>
                                        <option value="item_code">Item Code</option>
                                        <option value="supplier">Supplier</option>
                                    </select>
                                    <input type="text" class="form-control mb-2 mr-sm-2" id="txt_cari" placeholder="Cari">

                                    

                                    

                                    <button type="button" class="btn btn-primary mb-2" id="btn_cari_price">Cari</button>
                                    </form>
                        </div>
                        
                        <div class="panel-body">
                        <div id="table_price_area">   
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        
                                        
                                    
                                    
                                        <tr>
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
                                        <?php foreach ($table as $row) {
                                            echo "<tr>";
                                            echo "<td>".$row->item_code."</td>";
                                            echo "<td>".$row->class."</td>";
                                            echo "<td>".$row->item."</td>";
                                            echo "<td>".$row->spesifikasi."</td>";
                                            echo "<td>".$row->uom."</td>";
                                            echo "<td>".$row->price."</td>";
                                            echo "<td>".$row->currency."</td>";
                                            echo "<td>".$row->supplier."</td>";
                                            echo "</tr>";
                                        } ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>
<div class="row justify-content-between">
<div class="col-sm-8">
    <div class="dataTables_info" id="table_price_info" role="status" aria-live="polite">Halaman Ke 1 Dari <?php echo $pages; ?> Halaman</div>
    <div class="row align-items-start">
    <div class="col-sm-4">
    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
            
            <li id="btn_first" class="paginate_button previous disabled" >
                <a id="btn_price_first" aria-controls="example2" data-dt-idx="0" tabindex="0"><<</a>
            </li>
            <li class="paginate_button previous disabled" id="btn_back">
                <a id="btn_price_back" aria-controls="example2" data-dt-idx="0" tabindex="0"><</a>
            </li>  
        </ul>
    </div>
    </div>
    <div class="col-sm-2 my-1">
    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
            <li class="paginate_button ">
            <input type="text" style="width:30px" id="txt_page">
            </li>
        </ul>
    </div>
    </div>
    <div class="col-sm-4">
    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
        <ul class="pagination">
            <li class="disabled" id="btn_next">
                <a id="btn_price_next" aria-controls="example2" data-dt-idx="7" tabindex="0">></a>
            </li>
            <li id="btn_last" class="paginate_button next" >
                <a id="btn_price_last" aria-controls="example2" data-dt-idx="7" tabindex="0">>></a>
            </li>
        </ul>
    </div>
    </div>
    </div>
    </div>
    </div>

</div>

<script type="text/javascript">

$(document).ready(function () {
    var current_page = 1;
    var max = 1;
    $('#btn_cari_price').click(function(){
        var con = $('#combo_cari_price').val();
        var cari = $('#txt_cari').val();
        
        
        page = current_page;
        load_page(con,cari,page);
        if (current_page=> max) {
                    maju_off();
                  }else{
                      maju_on();
                  }
        mundur_off();
        
    });

    $("#btn_price_last").click(function(){
        
        maju_off();
        //mundur_on();
        
    });
    $("#btn_price_next").click(function(){

        
        current_page = current_page += 1;
        var con = $('#combo_cari_price').val();
        var cari = $('#txt_cari').val();

        load_page(con,cari,current_page);
        
        
        
        
    });

    $("#btn_price_first").click(function(){
        maju_on();
    });
});
function load_page(con,cari, page) {
    var table = 'tb_masteritem';
    if (con!=='Choose...') {
            
            $.ajax({
                type: "POST",
                url: 'purchasing/pagination',
                data: {con,cari,table,page},
                dataType: "json",
    
                success: function(response){ 
                  var pages = 'Halaman Ke '+page+' Dari '+response.pages+' Halaman';
                  // Ganti isi dari div view dengan view yang diambil dari controller siswa function search
                  $("#table_price_area").html(response.html);
                  $("#table_price_info").html(pages);
                  max = response.pages;
                  $("#txt_page").val(page);
                  
                  
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                  alert(xhr.responseText); // munculkan alert
                }           
            }); 
        }
}

function maju_off() {
        $("#btn_next").attr("class","paginate_button next disabled");
        $("#btn_last").attr("class","paginate_button next disabled");

        $("#btn_price_next").attr("id","btn_price_next_off");
        $("#btn_price_last").attr("id","btn_price_last_off");
}
function mundur_off() {
        $("#btn_first").attr("class","paginate_button next disabled");
        $("#btn_back").attr("class","paginate_button next disabled");
}

function maju_on() {
        $("#btn_next").attr("class","paginate_button next");
        $("#btn_last").attr("class","paginate_button next");
}

function mundur_on() {
        $("#btn_first").attr("class","paginate_button next");
        $("#btn_back").attr("class","paginate_button next");
}
</script>
           
            