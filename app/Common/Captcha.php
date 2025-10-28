<?php

namespace App\Common;

class Captcha
{
    public static function create(): void {
        $questions = array_keys(__('security'));
        $currentQuestion = array_rand($questions);
        session()->put('security.question', $currentQuestion);
        return;
    }
}
