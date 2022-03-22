<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostChangeStatusNotification extends Notification
{
    use Queueable;
    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toBroadCast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'the admin approve to your post',
            'body'  => "the admin approve to your post ".$this->post->title,
            'url' => "/dashboard/posts/".$this->post->id,
            'time' => $this->post->created_at->diffForHumans(),
        ]);
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
            'title' => __('Aprove your poste'),
            'body' => __('the admin aprove your poste (:name)', ['name' => $this->post->title]),
            'url' => '/dashboard/posts/'.$this->post->id,
            'icon' => ''
        ];
    }
}
