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
    });

    $('#pemakaian').click(function(){
        $('#page-wrapper').empty();
        $("#page-wrapper").load('warehouse/rekap_page');
        
    });

    
});