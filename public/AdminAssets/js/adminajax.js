function category_ajax(Formid){
    event.preventDefault();
    
    let formdata=   new FormData(document.getElementById(Formid));
    let token = document.head.querySelector("meta[name='csrf-token']").content;
    fetch('http://127.0.0.1:8000/admin/category_add',{
        method:"post",
        body:formdata,
        _token:token,
        header:{
            'content-type':'application/x-wwwform-urlencoded'
        },
    }).then(
        (response) => response.json()
    ).then(
        (json) => {
            // Display the response message to the user
            document.getElementById('responseMessage').innerText = json.message;
            setTimeout(function() {
                responseMessage.style.display = 'none';
            }, 3000);
            document.getElementById(Formid).reset();
        }
    )    
}