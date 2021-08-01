<?php
function status($status)
{
    switch ($status) {
        case 'not fixed yet':
            return
                '<span class="badge badge-danger">' . strtoupper($status) . '</span>';
            break;
        case 'already repaired':
            return
                '<span class="badge badge-success">' . strtoupper($status) . '</span>';
            break;
            return
                '<span class="badge badge-warning">' . strtoupper($status) . '</span>';
            break;
    }
}
