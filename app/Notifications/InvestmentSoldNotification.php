<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentSoldNotification extends Notification
{
    use Queueable;
    protected $investmentAmount;
    protected $property;
    protected $sellerName;
    protected $investorName;

    /**
     * Create a new notification instance.
     */
    public function __construct($investmentAmount, $property, $sellerName, $investorName)
    {
        $this->investmentAmount = $investmentAmount;
        $this->property = $property;
        $this->sellerName = $sellerName;
        $this->investorName = $investorName;
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
            'name' => $this->sellerName,
            'message' => "Your investment in {$this->property->property_name} has been sold to {$this->investorName} for Total Amount {$this->investmentAmount}.",
            'time' => now()->timestamp // Stores the Unix timestamp
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
