<?php

namespace App\Notifications;

use App\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;


class SendEmailForResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        $user = User::whereEmail($notifiable->getEmailForPasswordReset())->first();
        return (new MailMessage)
                    ->subject('Recuperar Contraseña')
                    ->greeting('Hola '.$user->name)
                    ->action('Cambiar Contraseña', route('password.reset', ['token'=>$this->token,'email'=>$notifiable->getEmailForPasswordReset()]))
                    ->line('Para poder cambiar tu contraseña da click en el enlace!')
                    ->line(config('auth.passwords.'.config('auth.defaults.passwords').'.expire'));
    }
}
