<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BidConfirmedNotification extends Notification
{
    use Queueable;
    protected $propertyName;
    protected $bidAmount;
    protected $username;

    /**
     * Create a new notification instance.
     */
    public function __construct($propertyName, $bidAmount, $username)
    {
        $this->propertyName = $propertyName;
        $this->bidAmount = $bidAmount;
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
            'message' => "Your bid of {$this->bidAmount} on {$this->propertyName} has been placed.",
            'time' => now()->timestamp,
            'url' => route('site.investor.page', [$activeTab = 'active-bids'])
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
