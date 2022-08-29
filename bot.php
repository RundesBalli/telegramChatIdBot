<?php
/**
 * telegramChatIdBot
 * 
 * Returns the Chat ID in Groups and private chats.
 * 
 * @author    RundesBalli <GitHub@RundesBalli.com>
 * @copyright 2022 RundesBalli
 * @see       https://github.com/RundesBalli/telegramChatIdBot
 */

/**
 * Including the configuration file and the function to send the messages to telegram.
 */
require_once(__DIR__.DIRECTORY_SEPARATOR."config.php");
require_once(__DIR__.DIRECTORY_SEPARATOR."sendMessageToTelegram.php");

/**
 * Check if the secretToken is provided and correct.
 */
$headers = getallheaders();
if(empty($headers['X-Telegram-Bot-Api-Secret-Token']) OR $headers['X-Telegram-Bot-Api-Secret-Token'] != $secretToken) {
  die();
}

/**
 * Catch the input from telegram.
 */
$content = file_get_contents("php://input");
$response = json_decode($content, TRUE);
if(empty($response)) {
  die();
}

sendMessageToTelegram($response['message']['chat']['id'], $response['message']['chat']['id']);
die();
?>
