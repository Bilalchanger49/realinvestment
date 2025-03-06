<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentRejectedNotification extends Notification
{
    use Queueable;
    public $amount;
    public $property;
    public $username;

    /**
     * Create a new notification instance.
     */
    public function __construct($investment, $property, $username)
    {
        $this->investment = $investment;
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
            'message' => 'Your investment in ' . $this->property->property_name . ' has been rejected.',
            'time' => now()->timestamp
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
