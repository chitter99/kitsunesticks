<?php require("layout/head.php"); ?>

<div>
    <p>Username: <input type="text" name="username" id="username" /></p>
    <p>Password: <input type="password" name="password" id="password" /></p>
    <button id="loginBtn">Login</button>
</div>
<script>

    document.getElementById("loginBtn").onclick = function() {
        var usernameElm = document.getElementById("username");
        var passwordElm = document.getElementById("password");

        var http = new XMLHttpRequest();
        http.open("post", "/index.php?controller=auth&action=login", true);
        http.onreadystatechange = function() {
            if(http.readyState == 4) {
                if(http.status == 200)
                {
                    location.href = "/index.php?controller=profile&action=index";
                }
                else
                {
                    alert("Password or username is wrong");
                }
            }
        };
        var data = new FormData();
        data.append("username", usernameElm.value);
        data.append("password", passwordElm.value);

        http.send(data);
    };

</script>

<?php require("layout/foot.php"); ?>