<?php


if ($api == "clientes") {
    if ($method == 'GET')
        require_once 'get.php';

    if ($method == 'POST')
        require_once 'post.php';

    if ($method == "DELETE")
        require_once 'delete.php';

    if ($method == "PUT")
        require_once 'put.php';
}
