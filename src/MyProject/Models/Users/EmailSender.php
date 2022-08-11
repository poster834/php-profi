<?php
namespace MyProject\Models\Users;

use MyProject\Models\Users\User;

class EmailSender
{
    public static function send
    (
        User $receiver,
        string $subject,
        string $templateName, 
        array $templateVars = []
    ): void
    {
        // var_dump($templateVars);
        extract($templateVars);
        ob_start();
        require __DIR__. str_replace('/','\\','/../../../templates/mail/').$templateName;
        $body = ob_get_contents();
        ob_end_clean();

        mail($receiver->getEmail(), $subject, $body, 'Content-Type: text/html; charset=UTF-8');
    }
}