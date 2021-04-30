
function sendAjaxRequest(params){
    $.each(params, function(key, value){
        if(value == null || typeof value === "undefined"){
            alert("Не все данные заполнены");
            return;
        }
    });
    BX.ajax({
        url:"/local/components/qwelve/comments/ajax.php",
        data:params,
        method:"post",
        onsuccess: function(data){
            $(".container.comments").replaceWith(data);
        },
        onfailure: function(){
            alert("Что-то пошло не так");
        }
    })
}
function returnResponseToDefault(){
    $(".comment-response>a").slideDown("fast");
    $(".comment-response .response-panel").slideUp("fast");
}
function getParams(context){
    let commentTopBlock = $(context).parents(".container.comments");
    let mediaBlock = $(context).parents(".media-block");
    let parentBlock = $(context).parents(".new-comment");
    let parentId = mediaBlock.data("comment-id") == null ? 0 : mediaBlock.data("comment-id");
    let comment = parentBlock.find("textarea").val();
    let author = parentBlock.find("input[name='fullName']").val();
    let commentType = commentTopBlock.data("comment-type");
    let commentObject = commentTopBlock.data("comment-object");
    return {
        parent: parentId,
        author: author,
        comment: comment,
        commentType:commentType,
        commentObject:commentObject
    }
}
$(document).ready(function(){
    $("body").on("click", ".add-new-record", function(){
        let params = getParams(this);
        sendAjaxRequest(params);
    })
    $("body").on("click", ".comment-response>a", function(e){
        e.preventDefault();    
        returnResponseToDefault();   
        $(this).parents(".comment-response").find(".response-panel").slideDown("fast");
        $(this).slideUp("fast");
    })
})
// console.log(ajaxUrl);