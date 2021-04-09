<?php
require $_SERVER['DOCUMENT_ROOT'] . '/utils/cognito.php';

if (isset($_POST['action'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($_POST['action'] === 'login') {
        $error = $wrapper->authenticate($username, $password);

        if (empty($error)) {
            header('Location: /views/festivals/index.php');
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Log in</title>
    <?php require '../../utils/styles.php'; ?>
    <?php require '../../utils/scripts.php'; ?>
</head>
<body>
<?php require '../../utils/toolbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($_GET['reset'])): ?>
                <div class="alert alert-success" role="alert">
                    Your password was reset successfully, log in to continue.
                </div>
            <?php endif ?>
            <?php if (isset($_GET['register'])): ?>
                <div class="alert alert-success" role="alert">
                    Your account was created successfully, log in to continue.
                </div>
            <?php endif ?>
            <form method="POST"
                  action=""
                  role="form"
                  class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>Log in</h2>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-md-3 control-label">Username</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="username" name="username"
                               value="<?= old('username') ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="password" name="password"/>
                    </div>
                    <div class="col-md-6 my-2">
                        <?php if (isset($error)): ?>
                            <div class="d-flex justify-content-between">
                                <p class="text-danger"><?= $error ?></p>
                                <a href="/views/auth/forgot.php" class="link-primary">Forgot password?</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary" value="login">Submit</button>
                    </div>
                </div>
                <input type='hidden' name='action' value='login'/>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php require '../../utils/footer.php'; ?>
        </div>
    </div>
</div>
</body>
</html>
