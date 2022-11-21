<?php
function alert($status, $message)
{
    if ($status == 'success') {
        return '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> ' . $message . '
                            </div>';
    } else {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Failed!</strong> ' . $message . '
                            </div>';
    }
}

function alert_admin($status, $message)
{
    if ($status == 'success') {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> ' . $message . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } else {
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Failed!</strong> ' . $message . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
}
