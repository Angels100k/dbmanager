<?php
require ('classes/db.php');
session_start();
$errormessage = "";
if(!empty($_SESSION['Username'])){
    $database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
    $db = $database->getConnection();
    if ($db['error'] === 0) {
        header('Location: dashboard.php');
    }else {
        $errormessage = $db['errormessage'];
    }

}

if (isset($_POST['Login']) && $_POST['Login'] == 'Login') {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $_SESSION['Username'] = $username;
    $_SESSION['password'] = $password;

    $database = new Dbconfig($_SESSION['Username'], $_SESSION['password']);
    
    $db = $database->getConnection();
    if ($db['error'] === 0) {
        header('Location: dashboard.php');
    }else {
        $errormessage = $db['errormessage'];
        session_destroy();
    }
    // header('Location: dashboard.php');
}
?>
<!doctype html>
<html lang="nl">

<head>
    <?php include_once("layouts/head.php")?>
</head>

<body>
    <div style="margin-top: 19.8em">
        <div class="container border border-dark">
            <div class="row">
                <h1>Aanmelden</h1>
                <div class="col-md-8">
                    <div class="row">
                        <form id="Login" method="post" class=".form-inline .form-horizontal">
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label class="control-label" data-placeholder="Email" for="Email">Username:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="Username" name="Username" class="form-control" id="Username" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                    <label class="control-label" data-placeholder="Wachtwoord"
                                        for="Password">Password:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="password" name="Password" class="form-control" id="Password">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-3">
                                </div>
                                <div class="col-sm-8">
                                    <input type="submit" id="submit" name="Login" value="Login"
                                        class="btn btn-light px-5 border border-dark float-end">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php if($errormessage != ""){
    echo '
        <div class="container mt-4">
        <div class="clearfloat" id="pma_errors">
        <div class="alert alert-danger" role="alert">
            <img src="themes/dot.gif" title="" alt="" class="icon ic_s_error">
            '. $errormessage .'
        </div>
    </div>
    </div>
    ';   
   }
?>
</body>

</html>