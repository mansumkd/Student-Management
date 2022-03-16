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

function handleDelete(){
    var conf = confirm('Are you sure to wanto delete?');
    if(conf){
        alert("Successfully Deleted");
    }
    else{
        location.reload();
    }


}