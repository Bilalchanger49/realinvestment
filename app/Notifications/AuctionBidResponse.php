<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;


class AuctionBidResponse extends Notification
{
    use Queueable;

    protected $auction;
    protected $bidAmount;
    protected $username;

    /**
     * Create a new notification instance.
     */
    public function __construct($auction, $bidAmount, $username)
    {
        $this->auction = $auction;
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
     * Get the array representation of the notification for database storage.
     */
    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->username,
            'message' => "Your bid of {$this->bidAmount} on {$this->auction->title} has been placed.",
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
