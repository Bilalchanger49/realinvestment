<?php

namespace App\Livewire\Site\notification;

use Livewire\Component;

class NotificationComponent extends Component
{

    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->where('id', $notificationId)->first();

        if ($notification) {
            $notification->markAsRead();
            $this->dispatch('notificationRead'); // Emit an event to update UI
        }
    }
    public function render()
    {
        return view('livewire.site.notification.notification' )->extends('layouts.site');
    }
}
