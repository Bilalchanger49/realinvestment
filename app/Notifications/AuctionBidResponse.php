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
    protected $status;

    /**
     * Create a new notification instance.
     */
    public function __construct($auction, $bidAmount, $status)
    {
        $this->auction = $auction;
        $this->bidAmount = $bidAmount;
        $this->status = $status;
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
//        return [
//            'auction_id' => $this->auction->id,
//            'auction_title' => $this->auction->title,
//            'bid_amount' => $this->bidAmount,
//            'status' => $this->status,
//            'message' => "Your bid of {$this->bidAmount} on '{$this->auction->title}' has been {$this->status}.",
//        ];
        return [
            'auction_id' => $this->auction,
            'auction_title' => 'bid placed',
            'bid_amount' => $this->bidAmount,
            'status' => $this->status,
            'message' => "Your bid of {$this->bidAmount} on bid placed has been {$this->status}.",
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
