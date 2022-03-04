jQuery(document).ready(function(){
    $('#selection').change(function(){
        if($(this).val() === '' ||$(this).val() === 'admin'||$(this).val() === 'staff'){
         $('#student').hide();
        }
        else if($(this).val() === 'student'||$(this).val() === 'parent'){
            $('#student').show();
        }
       
    })
})