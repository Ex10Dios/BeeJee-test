<?php
require APP_PATH.'views/includes/header.html.php';
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task List</div>

                    <div class="card-body">
                        <?php
                        Utils::drawMessage();
                        Utils::drawError();
                        ?>
                        <div class="row mb-4">
                            <div class="col-12">
                                <a href="/add">
                                    <button class="btn btn-primary">Add New</button>
                                </a>
                                <select name="sort" class="form-control float-right" style="width: 150px;">
                                    <option value="">Sort by</option>
                                    <option value="name:asc">Name (acs)</option>
                                    <option value="name:desc">Name (desc)</option>
                                    <option value="email:asc">Email (acs)</option>
                                    <option value="email:desc">Email (desc)</option>
                                    <option value="done:asc">Status (acs)</option>
                                    <option value="done:desc">Status (desc)</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        foreach ($tasks as $task) {
                            $editBnt = '';
                            if (Auth::check()) {
                                $editBnt =
                                    '<a href="/edit?id='.$task['id'].'" class="float-right">'.
                                    '<button class="btn btn-outline-primary btn-sm">Edit</button>'.
                                    '</a>';
                            }
                            echo
                                '<div class="card mb-3">'.
                                '<div class="card-body">'.
                                '<p><b>Name:</b> '._text($task['username']).$editBnt.'</p>'.
                                '<p><b>Email:</b> '._text($task['email']).'</p>'.
                                '<p><b>Text:</b> '._text($task['text']).'</p>'.
                                '<p>'.($task['edited'] ? 'Edited by Admin' : '').'</p>'.
                                '<p class="mb-0"><b>Status:</b> '.($task['done'] ? 'Done' : 'Pending').'</p>'.
                                '</div>'.
                                '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require APP_PATH.'views/includes/footer.html.php';
?>