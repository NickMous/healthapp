<?php

namespace App\Notifications\Data\Import;

use App\Models\FoodDataSources;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FileDoesNotExist extends Notification
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
            ->subject('Data Import Failed')
            ->greeting('Data Import Failed')
            ->tag('Data Import')
            ->line('The data import from ' . $this->source->name . ' has failed.')
            ->line('The file that you uploaded, magically disappeared.')
            ->action('Try Again', route('data.import', ['id' => $this->source->id]))
            ->line('Can\'t figure out what happened?')
            ->action('Contact Sander', 'mailto:sanderdenhollander12@gmail.com')
            ->error();
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
            'title' => 'Data Import Failed',
            'message' => 'The data import from ' . $this->source->name . ' has failed. The file that you uploaded, magically disappeared. Can\'t figure out what happened? Contact Sander.',
            'status' => 'error',
            'url' => route('data.import', ['id' => $this->source->id]),
            'icon' => 'fa-solid fa-triangle-exclamation',
        ];
    }
}
