$(document).ready(function(){
    $('#price_list_link').click(function(){
            $('#page-wrapper').empty();
              $("#page-wrapper").load('purchasing/price_list');
           
          
    });

    $('#stock_wh').click(function(){
        $('#page-wrapper').empty();
      $("#page-wrapper").load('warehouse/stock_wh');
    });

    $('#order_link').click(function(){
        var con = $('#combo_cari_price').val();
        alert(con);
       // $('#page-wrapper').empty();
        //$("#page-wrapper").load('purchasing/request_table');
    });

    $('#pemakaian').click(function(){
        $('#page-wrapper').empty();
        $("#page-wrapper").load('warehouse/rekap_page');
        
    });

    $('#link_req').click(function(){
        $('#page-wrapper').empty();
        $("#page-wrapper").load('purchasing/request_table');
        
    });

    $('#notcomplete_req').click(function(){
        $('#page-wrapper').empty();
        $("#page-wrapper").load('purchasing/request_ng');
        
    });

    
});