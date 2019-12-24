<?php
    ob_start();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php echo (empty($task['id']) ? 'New Task' : 'Edit Task')?>
                </div>

                <div class="card-body">

                    <?php Utils::drawError(); ?>

                    <form method="POST" action="<?php echo(empty($task['id']) ? '/add' : '/edit') ?>">

                        <?php
                         if (!empty($task['id'])) {
                             echo '<input type="hidden" name="id" value="'.$task['id'].'"/>';
                         }
                         ?>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">
                                Username
                                <sup class="text-danger">*</sup>
                            </label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="<?php _e($task['username']) ?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                Email
                                <sup class="text-danger">*</sup>
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php _e($task['email']) ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">
                                Text
                                <sup class="text-danger">*</sup>
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control w-100" name="text" id="text" rows="5"><?php _e($task['text']) ?></textarea>
                            </div>
                        </div>
                        <?php
                         if (Auth::check() && !empty($task['id'])) {
                             $checked = empty($task['done']) ? '' : 'checked';
                             echo
                             '<div class="form-group row form-check">'.
                             '<div class="offset-md-4">'.
                             '<input type="checkbox" value="1" class="form-check-input ml-0" name="done" id="done" '.$checked.'>'.
                             '<label for="done" class="form-check-label ml-4">'.
                             'Done'.
                             '</label>'.
                            '</div>'.
                            '</div>';
                         }
                        ?>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <a href="/">
                                    <button type="button" class="btn">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $context = ob_get_clean();
    include APP_PATH.'views/layouts/app.html.php';
?>