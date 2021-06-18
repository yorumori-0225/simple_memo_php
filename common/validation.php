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

/**
 * メールアドレスチェック
 *
 * @param array $errors
 * @param string $check_value
 * @param string $message
 * @return void
 */
function mailAddressCheck(array &$errors, string $check_value, string $message): void
{
    if (!filter_var($check_value . FILTER_VALIDATE_EMAIL)) {
        array_push($errors, $message);
    }
}
/**
 * 半角英数字チェック
 *
 * @param array $errors
 * @param string $check_value
 * @param string $message
 * @return void
 */
function halfAlphanumericCheck(array &$errors, string $check_value, string $message): void
{
    if (!preg_match("/^[a-zA-Z0-9]+$/", $check_value)) {
        array_push($errors, $message);
    }
}

/**
 * メールアドレスの重複チェック
 *
 * @param array $errors
 * @param string $check_value
 * @param string $message
 * @return void
 */
function mailAddressDuplicationCheck(array &$errors, string $check_value, string $message): void
{
    $database_handler = getDatabaseConnection();
    if ($statement = $database_handler->prepare('SELECT id FROM users WHERE email = :user_email')) {
        $statement->bindParam(':user_email', $check_value);
        $statement->execute();
    }

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        array_push($errors, $message);
    }
}