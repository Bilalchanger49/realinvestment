<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuctionConfirmedNotification extends Notification
{
    use Queueable;
    protected $auctionAmount;
    protected $propertyName;
    protected $username;
    /**
     * Create a new notification instance.
     */
    public function __construct($auctionAmount, $propertyName, $username)
    {
        $this->auctionAmount = $auctionAmount;
        $this->propertyName = $propertyName;
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
            'message' => "Your auction of {$this->auctionAmount} on {$this->propertyName} has been placed.",
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
