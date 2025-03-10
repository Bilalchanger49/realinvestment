<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BidResponseNotification extends Notification
{
    use Queueable;
    protected $propertyName;
    protected $respose;
    protected $bidCreator;
    protected $auctionCreator;
    protected $bidTotalAmount;

    /**
     * Create a new notification instance.
     */
    public function __construct($propertyName, $respose, $bidCreator, $auctionCreator, $bidTotalAmount)
    {
        $this->propertyName = $propertyName;
        $this->respose = $respose;
        $this->bidCreator = $bidCreator;
        $this->auctionCreator = $auctionCreator;
        $this->bidTotalAmount = $bidTotalAmount;
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
            'name' => $this->bidCreator,
            'message' => "Your bid on {$this->propertyName} of amount {$this->bidTotalAmount} has been {$this->respose} by {$this->auctionCreator}",
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
