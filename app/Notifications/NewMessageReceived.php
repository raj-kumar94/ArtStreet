<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMessageReceived extends Notification
{
    use Queueable;
    public $user;
    public $thread_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $thread_id)
    {
         $this->user = $user;
         $this->thread_id = $thread_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','broadcast','database'];
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
                    ->line(''.$this->user->name. ' sent a new message')
                    ->action('View Profile', route('messages.show', ['slug' => $this->thread_id]))
                    ->line('Thank you for being part of ArtStreet!');

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
            'name' => $this->user->name,
            'message' =>  ' sent a new message.'
        ];
    }
}
