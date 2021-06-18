<?php

if (!isset($_SESSION)) {
    session_start();
}

/**
 * ログインしているかチェックする
 *
 * @return boolean
 */
function isLogin(): bool
{
    if (isset($_SESSION['user'])) {
        return true;
    }
    return false;
}
