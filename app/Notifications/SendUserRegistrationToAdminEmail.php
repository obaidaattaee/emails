<?php

namespace App\Notifications;

use App\Helpers\UserSystemInfoHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendUserRegistrationToAdminEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->line('hello admin ')
            ->line('there email is notification for new customer make registration in your web app .')
            ->line('new customer make registration using device details :')
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
