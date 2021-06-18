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

/**
 * 最小文字数チェック
 *
 * @param array $errors
 * @param string $check_value
 * @param string $message
 * @param integer $min_size
 * @return void
 */
function stringMinSizeCheck(array &$errors, string $check_value, string $message, int $min_size = 8): void
{
    if (mb_strlen($check_value) < $min_size) {
        array_push($errors, $message);
    }
}

/**
 * 最大文字数チェック
 *
 * @param array $errors
 * @param string $check_value
 * @param string $message
 * @param integer $max_size
 * @return void
 */
function stringMaxSizeCheck(array &$errors, string $check_value, string $message, int $max_size = 255): void
{
    if ($max_size < mb_strlen($check_value)) {
        array_push($errors, $message);
    }
}
