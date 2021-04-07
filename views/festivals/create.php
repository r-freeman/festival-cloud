<?php
require_once '../../utils/functions.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require '../../utils/styles.php'; ?>
        <?php require '../../utils/scripts.php'; ?>
    </head>
    <body>
        <?php require '../../utils/toolbar.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require '../../utils/header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST"
                          action="store.php"
                          role="form"
                          class="form-horizontal"
                          enctype="multipart/form-data"
                          >
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Create festival form</h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                              <textarea id="description" name="description" rows="4" cols="50"><?= old('description') ?></textarea>
                            </div>
                            <div class="col-md-3 error">
                                <?php error('description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-md-3 control-label">City</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="city" name="city" value="<?= old('city') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('city'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="col-md-3 control-label">Start Date</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="<?= old('start_date') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('start_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end_date" class="col-md-3 control-label">End Date</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="<?= old('end_date') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('end_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image_path" class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="image_path" name="image_path" value="" />
                            </div>

                            <div class="col-md-3 error">
                                <?php error('image_path'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="index.php" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
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
