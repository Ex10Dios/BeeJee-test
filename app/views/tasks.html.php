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
                                <form action="/" method="GET" class=" float-right" id="sort_form">
                                    <input type="hidden" name="page" value="<?php _textOut($data['page']) ?>">
                                    <select name="sort" class="form-control" style="width: 150px;" onchange="document.getElementById('sort_form').submit();">
                                        <option value="username:asc" <?php echo ($data['sort'] == 'username:asc' ? 'selected' : '')?> >Name (acs)</option>
                                        <option value="username:desc" <?php echo ($data['sort'] == 'username:desc' ? 'selected' : '')?> >Name (desc)</option>
                                        <option value="email:asc" <?php echo ($data['sort'] == 'email:asc' ? 'selected' : '')?> >Email (acs)</option>
                                        <option value="email:desc" <?php echo ($data['sort'] == 'email:desc' ? 'selected' : '')?> >Email (desc)</option>
                                        <option value="done:asc" <?php echo ($data['sort'] == 'done:asc' ? 'selected' : '')?> >Status (acs)</option>
                                        <option value="done:desc" <?php echo ($data['sort'] == 'done:desc' ? 'selected' : '')?> >Status (desc)</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <?php
                        foreach ($data['items'] as $task) {
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

                        if (!count($data['items'])) {
                            echo '<p class="my-5 text-secondary text-center">No tasks to show</p>';
                        }
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $total_pages = ceil($data['total']/$data['page_size']);
                                $prev_href = $data['page'] <= 1 ? '#' : "?page=" . ($data['page'] - 1) . "&sort=" . urlencode($data['sort']);
                                $next_href = $data['page'] >= $total_pages ? '#' : "?page=" . ($data['page'] + 1) . "&sort=" . urlencode($data['sort']);
                                ?>
                                <ul class="pagination float-right mb-0">
                                    <li class="page-item <?php echo (($data['page'] <= 1) ? 'disabled' : '') ?>">
                                        <a class="page-link" href="<?php echo $prev_href; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#"><?php echo $data['page'] ?></a></li>
                                    <li class="page-item <?php echo (($data['page'] >= $total_pages) ? 'disabled' : '') ?>">
                                        <a class="page-link" href="<?php echo $next_href; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require APP_PATH.'views/includes/footer.html.php';
?>