<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DividendDistributedNotification extends Notification
{
    use Queueable;

    public $amount;
    public $property;
    public $username;
    /**
     * Create a new notification instance.
     */
    public function __construct($amount, $property, $username)
    {
        $this->amount = $amount;
        $this->property = $property;
        $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->username,
            'message' => 'You have received a dividend of ' . $this->amount . ' for'. $this->property.'.',
            'time' => now()->timestamp,
            'url' => route('site.investor.page', [$activeTab = 'active-investments'])
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
            //
        ];
    }
}
