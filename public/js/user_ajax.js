function viewUserById(url){

    console.log(url);
    $.ajax({
        type:'GET',
        url:url,
        contentType:'application/json',
        success:function(data){
            console.log(JSON.parse(data));
            showUserDiagBox(JSON.parse(data));
        },
        error:function(err){
            console.log(err);
        }
    });

}
