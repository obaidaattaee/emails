<?php

namespace App\Notifications;

use App\Helpers\UserSystemInfoHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendUserLoginToAdminEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
public $user ;
    public function __construct($user)
    {
       $this->user = $user ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->line("hello {$this->user->name} :")
            ->line('we have trying to login for your account from device details :')
            ->line('    browser :'.UserSystemInfoHelper::get_browsers())
            ->line('    ip address  :'.UserSystemInfoHelper::get_ip())
            ->line('    device :'.UserSystemInfoHelper::get_device())
            ->line('    operating system :'.UserSystemInfoHelper::get_os())
            ;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
