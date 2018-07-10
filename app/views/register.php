<?php require("layout/head.php"); ?>

<div>
    <p>Username: <input type="text" name="username" id="username" /></p>
    <p>Password: <input type="password" name="password" id="password" /></p>
    <p>Vorname: <input type="text" name="vorname" id="vorname" /></p>
    <p>Nachname: <input type="text" name="nachname" id="nachname" /></p>
    <p>Email: <input type="text" name="email" id="email" /></p>
    <button id="registerBtn">Register</button>
</div>
<script>
    document.getElementById("registerBtn").onclick = function() {
        var usernameElm = document.getElementById("username");
        var passwordElm = document.getElementById("password");
        var vornameElm = document.getElementById("vorname");
        var nachnameElm = document.getElementById("nachname");
        var emailElm = document.getElementById("email");

        usernameElm.classList.remove("invalid");
        passwordElm.classList.remove("invalid");
        vornameElm.classList.remove("invalid");
        usernameElm.classList.remove("invalid");
        nachnameElm.classList.remove("invalid");
        emailElm.classList.remove("invalid");

        if(usernameElm.value.length > 40 || usernameElm.value.length < 5) {
            usernameElm.classList.add("invalid");
            return;
        }

        if(passwordElm.value.length < 8) {
            passwordElm.classList.add("invalid");
            return;
        }

        if(vornameElm.value == false) {
            vornameElm.classList.add("invalid");
            return;
        }

        if(nachnameElm.value == false) {
            nachnameElm.classList.add("invalid");
            return;
        }

        if(emailElm.value == false) {
            emailElm.classList.add("invalid");
            return;
        }

        var http = new XMLHttpRequest();
        http.open("post", "/index.php?controller=auth&action=register", true);
        http.onreadystatechange = function() {
            if(http.readyState == 4) {
                if(http.status == 200) {
                    alert("Registed!");
                }
                else
                {
                    if(http.responseText == "Email wrong format") {
                        emailElm.classList.add("invalid");
                    }
                    if(http.responseText == "Password too easy") {
                        passwordElm.classList.add("invalid");
                    }
                    if(http.responseText == "Username already exists") {
                        usernameElm.classList.add("invalid");
                    }
                    if(http.responseText == "Email already exists") {
                        emailElm.classList.add("invalid");
                    }
                }
            }
        };
        var data = new FormData();
        data.append("username", usernameElm.value);
        data.append("password", passwordElm.value);
        data.append("email", emailElm.value);
        data.append("vorname", vornameElm.value);
        data.append("nachname", nachnameElm.value);

        http.send(data);
    };
</script>

<?php require("layout/foot.php"); ?>