

$(document).ready(function(){
    $(".add-new-record").on("click", function(){
        BX.ajax({
            url:"./",
            data:{ ajax: "yes"},
            method:"post",
            dataType:"json",
            onSuccess: function(data){
        
            }
        })
    })
})
// console.log(ajaxUrl);