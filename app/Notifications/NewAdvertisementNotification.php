<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAdvertisementNotification extends Notification
{
    use Queueable;
    protected $sellerName;
    protected $propertyName;
    protected $Amount;

    /**
     * Create a new notification instance.
     */
    public function __construct($Amount, $propertyName, $sellerName)
    {
        $this->sellerName = $sellerName;
        $this->propertyName = $propertyName;
        $this->Amount = $Amount;
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
            'message' => "Your Advertisement of {$this->Amount} on {$this->propertyName} has been placed.",
            'time' => now()->timestamp,
            'url' => route('site.investor.page', [$activeTab = 'advertisements'])
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
