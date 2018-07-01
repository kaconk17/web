$(document).ready(function(){
    $('#price_list_link').click(function(){
        
              $("#page-wrapper").load('purchasing/price_list');
           
          
    });

    $('#stock_wh').click(function(){
      $("#page-wrapper").load('warehouse/stock_wh');
    });

    $('#order_link').click(function(){
        var con = $('#combo_cari_price').val();
        alert(con);
    });

    $('#pemakaian').click(function(){
        //$("#page-wrapper").load('warehouse/rekap_pemakaian');
        var tgl_awal = '2018-06-01';
        var tgl_akhir = '2018-07-01';
        $.ajax({
            type: "POST",
            url: 'warehouse/rekap_pemakaian',
            data: {tgl_awal,tgl_akhir},
            dataType: "json",

            success: function(response){ 
              
              // Ganti isi dari div view dengan view yang diambil dari controller siswa function search
              $("#page-wrapper").html(response.html);
              
              
              
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }           
        }); 
    });

    
});