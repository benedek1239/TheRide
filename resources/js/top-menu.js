$('#loginFormDesktop').submit(
    function( e ) {
    e.preventDefault();
        var formData = $(this).serialize();
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            
            success: function(result){
                location.reload();
            },

            error: function(reject){
                if( reject.status == 422 ) {
                    var errors = reject.responseJSON.errors;
                    $('.error-msg').text('');
                    var tmp=0;
                    $.each(errors, function (key, val) {
                        

                        if(key == "email"){
                            $('#' + key + '_error_desktop').text(val[0]);
                            tmp=1;
                        }
                        
                        if(tmp!=1)
                            $('#email_error_desktop').text("");
                        
                        
                        if(key == "password"){
                            $('#' + key + '_error_desktop').text(val[0]);
                            tmp=2;
                        }
                        if(tmp!=2)
                        $('#password_error_desktop').text("");

                    });
                }
            }
            
        });
});

$('#loginFormMobile').submit(
    function( e ) {
    e.preventDefault();
        var formData = $(this).serialize();
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            
            success: function(result){
                location.reload();
            },

            error: function(reject){
                if( reject.status == 422 ) {
                    var errors = reject.responseJSON.errors;
                    $('.error-msg').text('');
                    var tmp=0;
                    $.each(errors, function (key, val) {
                        

                        if(key == "email"){
                            $('#' + key + '_error_mobile').text(val[0]);
                            tmp=1;
                        }
                        
                        if(tmp!=1)
                            $('#email_error_mobile').text("");
                        
                        
                        if(key == "password"){
                            $('#' + key + '_error_mobile').text(val[0]);
                            tmp=2;
                        }
                        if(tmp!=2)
                        $('#password_error_mobile').text("");
                    });
                }
            }
            
        });
});

document.getElementById('kt_header_mobile_toggle').addEventListener('click', ()=>{
    document.getElementById('kt_header_menu_wrapper').classList.add('header-menu-wrapper-on');
});

document.getElementById('kt_header_menu_wrapper').addEventListener('click', ()=>{
    document.getElementById('kt_header_menu_wrapper').classList.remove('header-menu-wrapper-on');
});
