<?php

/**
 * 空チェック
 * @param $errors
 * @param $check_value
 * @param $message
 */
function emptyCheck(array &$errors, string $check_value, int $message)
{
    if (empty(trim($check_value))) {
        array_push($errors, $message);
    }
}
