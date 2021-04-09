<?php
require $_SERVER['DOCUMENT_ROOT'] . '/utils/cognito.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'confirm') {
        $username = $_POST['username'] ?? '';
        $confirmation = $_POST['confirmation'] ?? '';

        $error = $wrapper->confirmSignup($username, $confirmation);

        if (empty($error)) {
            header('Location: login.php?register');
        }
    }
}

$username = $_GET['username'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Register</title>
    <?php require '../../utils/styles.php'; ?>
    <?php require '../../utils/scripts.php'; ?>
</head>
<body>
<?php require '../../utils/toolbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST"
                  action=""
                  role="form"
                  class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <h2>Confirm registration</h2>
                        <p>A confirmation code was sent to your email address, please enter the code to complete your
                            registration.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-md-3 control-label">Username</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="username" name="username"
                               value="<?= $username; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmation" class="col-md-3 control-label">Confirmation code</label>
                    <div class="col-md-6 my-2">
                        <input type="text" class="form-control" id="confirmation" name="confirmation"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary" value="login">Submit</button>
                    </div>
                </div>
                <input type='hidden' name='action' value='confirm'/>
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
