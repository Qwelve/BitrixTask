
function sendAjaxRequest(parentId, authorName, commentText){
    if(parentId < 0 || authorName == "" || commentText == ""){
        alert("ERROR");
        return;
    }
    BX.ajax({
        url:"./",
        data:{ ajax: "yes", parent: parentId, author: authorName, comment:commentText},
        method:"post",
        dataType:"json",
        onsuccess: function(data){
            window.location.reload();
        },
        onfailure: function(data){
            alert("Что-то пошло не так");
        }
    })
}
function returnResponseToDefault(){
    $(".comment-response>a").slideDown("fast");
    $(".comment-response .response-panel").slideUp("fast");
}
$(document).ready(function(){
    $(".add-new-record").on("click", function(){
        let parentBlock = $(this).parents(".new-comment");
        let parentId = 0;
        let comment = parentBlock.find("textarea").val();
        let author = parentBlock.find("input[name='fullName']").val();
        sendAjaxRequest(parentId, author, comment);
    })
    $(".comment-response>a").on("click", function(e){
        e.preventDefault();    
        returnResponseToDefault();   
        $(this).parents(".comment-response").find(".response-panel").slideDown("fast");
        $(this).slideUp("fast");
        console.log($(this).parents(".comment-response").find("response-panel"));
    })
    $(".add-new-response-record").on("click", function(){
        let mediaBlock = $(this).parents(".media-block");
        let parentBlock = $(this).parents(".new-comment");
        let parentId = mediaBlock.data("comment-id");
        let comment = parentBlock.find("textarea").val();
        let author = parentBlock.find("input[name='fullName']").val();
        sendAjaxRequest(parentId, author, comment);
    })
})
// console.log(ajaxUrl);