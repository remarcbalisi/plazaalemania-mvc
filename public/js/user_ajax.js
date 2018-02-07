function viewUserById(url){

    $.ajax({
        type:'GET',
        url:url,
        contentType:'application/json',
        success:function(data){
            showUserDiagBox(JSON.parse(data));
        },
        error:function(err){
            alert(err);
            console.log(err);
        }
    });

}
