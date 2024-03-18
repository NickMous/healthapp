<?php

namespace App\Livewire\Notifications;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['notification.received' => 'mount'];

    public $notifications;

    public function mount()
    {
        $this->notifications = auth()->user()->notifications;
    }

    public function markAsRead($id)
    {
//        dd($id);
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

    public function render()
    {
        return view('livewire.notifications.index')->layout('layouts.app')->title('Notifications');
    }
}
