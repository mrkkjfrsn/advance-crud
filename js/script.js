$(document).ready(function(){
//adding users
$(document).on("submit", "#addform", function(e){
    e.preventDefault();

    //ajax
    $.ajax({
        url: "./advance-crud/ajax.php",
        type: "post",
        dataType: "json",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend:function(){
            console.log("Please Wait..");
        },
        success:function(response){
            console.log(response)
        },
        error:function(request,error){
            console.log(arguements);
            console.log("Error" + error);
        },
    })
})

})