<?php
require $_SERVER['DOCUMENT_ROOT'] . '/utils/cognito.php';

$entercode = false;

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'code') {
        $username = $_POST['username'] ?? '';

        $error = $wrapper->sendPasswordResetMail($username);

        if (empty($error)) {
            header('Location: forgot.php?username=' . $username);
        }
    }

    if ($_POST['action'] == 'reset') {
        $code = $_POST['code'] ?? '';
        $password = $_POST['password'] ?? '';
        $username = $_GET['username'] ?? '';

        $error = $wrapper->resetPassword($code, $password, $username);

        // TODO: show message on new page that password has been reset
        if (empty($error)) {
            header('Location: login.php?reset');
        }
    }
}

if (isset($_GET['username'])) {
    $entercode = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Forgotten password</title>
    <?php require '../../utils/styles.php'; ?>
    <?php require '../../utils/scripts.php'; ?>
</head>
<body>
<?php require '../../utils/toolbar.php'; ?>
<div class="container">
    <div class="row">
        <?php if ($entercode): ?>
            <div class="col-md-12">
                <form method="POST"
                      action=""
                      role="form"
                      class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <h2>Reset password</h2>
                            <p>If your account was found, a code has been sent to the associated email address. Please
                                enter the code and your new password.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-md-3 control-label">Code</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="code" name="code"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">New password</label>
                        <div class="col-md-6 my-2">
                            <input type="password" class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary" value="login">Submit</button>
                        </div>
                    </div>
                    <input type='hidden' name='action' value='reset'/>
                </form>
            </div>
        <?php else : ?>
            <div class="col-md-12">
                <form method="POST"
                      action=""
                      role="form"
                      class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <h2>Forgotten password</h2>
                            <p>Enter your username and we will send a reset code to your email address.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-md-3 control-label">Username</label>
                        <div class="col-md-6 my-2">
                            <input type="text" class="form-control" id="username" name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary" value="login">Submit</button>
                        </div>
                    </div>
                    <input type='hidden' name='action' value='code'/>
                </form>
            </div>
        <?php endif ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php require '../../utils/footer.php'; ?>
        </div>
    </div>
</div>
</body>
</html>
