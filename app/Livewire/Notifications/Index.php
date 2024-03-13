<?php

namespace App\Livewire\Notifications;

use Livewire\Component;

class Index extends Component
{
    public $notifications;

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }

    public function markAsRead()
    {
        auth()->user()->notifications()->where('id', request('notification_id'))->update(['read_at' => now()]);
        $this->notifications = auth()->user()->notifications;
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->notifications = auth()->user()->notifications;
    }

    public function render()
    {
        return view('livewire.notifications.index')->layout('layouts.app')->title('Notifications');
    }
}
