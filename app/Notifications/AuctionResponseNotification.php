<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;


class AuctionResponseNotification extends Notification
{
    use Queueable;

    protected $propertyName;
    protected $bidAmount;
    protected $username;
    protected $investorname;

    /**
     * Create a new notification instance.
     */
    public function __construct($propertyName, $bidAmount, $username, $investorname)
    {
        $this->propertyName = $propertyName;
        $this->bidAmount = $bidAmount;
        $this->username = $username;
        $this->investorname = $investorname;
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
     * Get the array representation of the notification for database storage.
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->investorname,
            'message' => "Your have received a bid of {$this->bidAmount} on {$this->propertyName} by {$this->username}",
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
