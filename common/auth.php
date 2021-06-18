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

/**
 * ログインしているユーザーの表示用ユーザー名を取得
 *
 * @return string
 */
function getLoginUserName(): string
{
    if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];

        if (7 < mb_strlen($name)) {
            $name = mb_substr($name, 0, 7) . "...";
        }
        return $name;
    }
    return "";
}
