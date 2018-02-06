var current_tab = "add_user";

function changeTab(new_tab){

    $("#"+current_tab).hide();
    $("#"+new_tab).show();
    current_tab = new_tab;
    
}
