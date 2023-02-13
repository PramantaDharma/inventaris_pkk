<?php

class Flasher {
    public static function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type,
        ];
    }

    public static function flash()
    {
        if(isset($_SESSION['flash'])) {
            echo '<div role="alert" class="alert alert-dismissible fade show alert-' . $_SESSION['flash']['type'] . '">
                ' . $_SESSION['flash']['message'] . '
            </div>';
            unset($_SESSION['flash']);
        }
    }
}