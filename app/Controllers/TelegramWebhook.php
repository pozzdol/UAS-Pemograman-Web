<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;

class TelegramWebhook extends Controller
{
    public function index()
    {
        $telegram = new Telegram('7364439474:AAHicFDYEaV-yVCaYOTLndw6YBPLvhnfqoI', 'reserPassword_bot');

        try {
            $telegram->handle();
        } catch (\Longman\TelegramBot\Exception\TelegramException $e) {
            // log telegram errors
            log_message('error', $e->getMessage());
        }
    }
}
