<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <title>Login Page</title>
</head>
<body onload="pageload()">
    <div class="maindiv">
        <div class="flexright">
            <div class="flexdiv">
                <h1 id="welcomeText">Welcome to the login page</h1>
            </div>
        </div>
        <?php $message = $_GET["q"];
            $otherMes = $_GET["l"];?>
        <div class="flexleft">
            <div>
                <h2>Log In</h2>
                <form id="loginForm" action="forlogin.php" method="post" target="_self">
                    <table>
                        <tr>
                            <td><p>User email</p></td>
                            <td><input type="email" name="useremail" id="useremail" required="required"></td>
                        </tr>
                        <tr>
                            <td><p>User pass:</p></td>
                            <td><input type="password" name="userpassword" id="userpassword" required="required"></td>
                        </tr>
                    </table>
                    <input type="submit" value="log in">
                    <p class="messagebox"id="messageP"><?php echo $message; ?></p>
                </form>
                
            </div>
            <form id="signUpForm" action="forsignup.php" method="post">
                <!-- HER YENI USER OLUSTURULDUGUNDA --- 
                YENI BIR TABLO USERIN ILETISIME GECTIGI ---
                (eg. BULDUGU, LIKE/DISLAKI ATTIGI) FOTOLARI KAYIT ETMELI --- 
                SCOR DA BURADAN HESAPLANMALI -->

                <div class="flexdiv logdiv">
                    <table>
                        <tr>
                            <td><h2>Sign Up</h2></td>
                        </tr>
                        <tr>
                            <td><p>User name:</p></td>
                            <td><input type="text" name="name" required="required"></td>
                        </tr>
                        <tr>
                            <td><p>User surname:</p></td>
                            <td><input type="text" name="surname" required="required"></td>
                        </tr>
                        <tr>
                            <td><p>User email:</p></td>
                            <td><input type="email" name="email" id="useremail" required="required"></td>
                        </tr>
                        <tr>
                            <td><p>User password:</p></td>
                            <td><input type="password" name="pass" id="" required="required"></td>
                        </tr>
                        <tr>
                            <td><p>Profile photo:</p></td>
                            <td><input type="file" name="profilephoto" id="profilephoto" required="required" accept="image/*"></td>
                        </tr>
                        <tr>
                            <td><p>Target language:</p></td>
                            <td><select name="selectlanguage" id="selectLang" required="required"></select></td>
                        </tr>
                    </table>
                    <p class="messagebox"id="messageP"><?php echo $otherMes; ?></p>
                    <input type="submit" value="sign up">
                </div>
            </form>
        </div>

    </div>
</body>
</html>