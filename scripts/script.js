$('document').ready(function(){

    $('#login-form').validate({
        rules:
        {
                password :{required: true,},
                user : {required:true,},
        }, 
        messages :{
            password :{required:"Masukkan Password !"},
            user :{required:"Massukkan Username !"},
        },
        submitHandler : submitForm
    })
})