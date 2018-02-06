function showUserDiagBox(user){

    $( "#dialog" ).dialog();
    $( "#dialog" ).show();

    document.getElementById("diag_img").setAttribute("src", user.prof_pic);
    $("#diag_name").html(user.fname+" "+user.lname);

}
