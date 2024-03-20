<?php

namespace App\Notifications\Data\Import;

use App\Models\FoodDataSources;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OldDataRemoved extends Notification
{
    use Queueable;

    public $source;

    /**
     * Create a new notification instance.
     */
    public function __construct(FoodDataSources $source)
    {
        $this->source = $source;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'source' => $this->source,
            'title' => 'Old Data Removed',
            'message' => 'The old data from ' . $this->source->name . ' has been removed.',
            'status' => 'success',
            'url' => route('data.index'),
            'icon' => 'fa-solid fa-trash'
        ];
    }
}
