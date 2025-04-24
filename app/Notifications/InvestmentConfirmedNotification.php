<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvestmentConfirmedNotification extends Notification
{
    use Queueable;
    public $investment;
    public $property;
    public $investorName;

    /**
     * Create a new notification instance.
     */
    public function __construct($investment, $property, $investorName)
    {
        $this->investment = $investment;
        $this->property = $property;
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
            'name' => $this->investorName,
            'message' => 'Your investment in ' . $this->property->property_name . ' has been confirmed.',
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
