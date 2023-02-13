<?php

function redirect($url, $flash= null) {
    if($flash){
        setFlash($flash[0], $flash[1]);
    }

    header("Location: " . BASE_URL . $url);

}

function setFlash($type, $message)
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message,
        ];
    }

function flash()
    {
        if(isset($_SESSION['flash'])) {
            echo '<div role="alert" class="alert alert-dismissible fade show alert-' . $_SESSION['flash']['type'] . '">
                ' . $_SESSION['flash']['message'] . '
            </div>';
            unset($_SESSION['flash']);
        }
    }



?>