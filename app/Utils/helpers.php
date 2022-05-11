<?php
if ( ! function_exists('setting')){
    function setting( string $key ): string
    {
        $key = explode('.', $key);
        $settingName = $key[0];
        $settingKey = $key[1];
        return \App\Models\Settings::getByNameAndKey($settingName, $settingKey);
    }
}

if ( ! function_exists('getLang')){
    function getLang( string $key ): string
    {
        $key = str_replace(["'", '"'], '', $key);
        $key = explode('.', $key);
        $wordName = $key[0];
        $wordKey = $key[1];
        return \App\Models\LanguageWord::findByNameAndKeyWord($wordName, $wordKey);
    }
}


if(!function_exists('telegram')) {
    function telegram( string $text )
    {
        $bot = new \TelegramBot\Api\BotApi(env('TELEGRAM_BOT_ACCESS_TOKEN'));
        $chatId = env('TELEGRAM_CHAT_ID');

        $bot->sendMessage($chatId, $text, 'html');
    }
}
