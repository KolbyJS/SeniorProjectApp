<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Report extends Notification
{
    use Queueable;

    /**
     * This property will be passed to the constructor from 
     * the controller we will be initiating the notificaiton from
     */
    private $reportData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reportData)
    {
        //
        $this->reportData =  $reportData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line($this->reportData['body'])
                    ->action($this->reportData['reportText'], 
                    $this->reportData['url'])
                    ->line($this->reportData['thankyou']);
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
            'user' => $this->reportData['user']
        ];
    }
}