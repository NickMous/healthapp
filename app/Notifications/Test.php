<?php

namespace App\Notifications;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class Test extends Notification implements ShouldBroadcast
{
    use Queueable;

    public $data;
    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        Log::info('Creating notification');
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => $this->data,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->data,
        ];
    }

    public function broadcastOn(): PrivateChannel
    {
        Log::info('Broadcasting on channel');
        return new PrivateChannel('App.Models.User.' . 1);
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        Log::info('Broadcasting message');
        return new BroadcastMessage([
            'message' => $this->data,
        ]);
    }
}
