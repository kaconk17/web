$(document).ready(function(){
    $('#login-form').submit(function(e){
        var link = 'auth/login';
        var data = $("#login-form").serialize();
        
        $.ajax({
            type: "POST",
            url: link,
            data: data,
                            
            success: function(response){
               if(response== "success")
                {
                    
                    window.location = '';
                }
                else
                {
                    
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Login Gagal !</div>');
                }
            }           
        });           
        

        e.preventDefault();
    });

    $('#btn-guest').click(function(){
        //alert('test');
        $.ajax({
            type: "POST",
            url: 'auth/guest',
            data: 0,
                            
            success: function(response){
               if(response== "success")
                {
                    
                    window.location = '';
                }
                else
                {
                    
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Login Gagal !</div>');
                }
            }           
        });   
    });
    

});

