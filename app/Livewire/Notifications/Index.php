<?php

namespace App\Livewire\Notifications;

use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $notifications;

    public $unreadNotifications;

    #[On('notificationReceived')]
    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
        $this->unreadNotifications = auth()->user()->unreadNotifications;
    }

    public function markAsRead($id)
    {
        auth()->user()->notifications()->where('id', $id)->update(['read_at' => now()]);
        $this->notifications = auth()->user()->notifications;
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->notifications = auth()->user()->notifications;
    }

    public function delete($id) {
        auth()->user()->notifications()->where('id', $id)->delete();
        $this->notifications = auth()->user()->notifications;
    }

    public function deleteAll() {
        auth()->user()->notifications()->delete();
        $this->notifications = auth()->user()->notifications;
    }

    public function render()
    {
        return view('livewire.notifications.index')->layout('layouts.app')->title('Notifications');
    }
}
