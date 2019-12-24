<?php
    ob_start();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">

                    <?php Utils::drawError(); ?>

                    <form method="POST" action="/login">
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">
                                Username
                                <sup class="text-danger">*</sup>
                            </label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                Password
                                <sup class="text-danger">*</sup>
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Login</button>
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