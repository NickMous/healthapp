<?php

namespace App\Notifications\Data\Import;

use App\Models\FoodDataSources;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Done extends Notification implements ShouldQueue
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
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Data Import Complete')
            ->greeting('Data Import Complete')
            ->tag('Data Import')
            ->line('The data import from ' . $this->source->name . ' has been completed.')
            ->action('View Data', route('data.index'));
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
            'title' => 'Data Import Complete',
            'message' => 'The data import from ' . $this->source->name . ' has been completed.',
            'status' => 'success',
            'url' => route('data.index'),
            'icon' => 'fa-solid fa-floppy-disk',
        ];
    }
}
