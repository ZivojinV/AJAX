function login() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    $.ajax({
        url: 'handler/login.php',
        type: 'get',
        data: { 
            "username": username, 
            "password": password
        },
        success: function(response){
            if(response == "null"){
                alert("GRESKA");
            }
            else {
                const json = response;
                const obj = JSON.parse(json);
                const id = obj.id;
                localStorage.setItem("id", id)
                console.log(id)
                location.href="watchlist.html";
            }
        },
        error: function(xhr){
            alert("GRESKA" + xhr.status+"1");
        }
     });
}

  function register(){
    $.ajax({
        url: 'handler/register.php',
        type: 'post',
        data: { 
            "username": document.getElementById("username").value,
            "password": document.getElementById("password").value
        },
        success: function(response){
            alert("Sacuvano" + response);

        },
        error: function(xhr){
            alert("GRESKA" + xhr);
        }
     });
  }