<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PackageActivationNotification extends Notification
{
    use Queueable;

    protected $package;

    public function __construct($package)
    {
        $this->package = $package;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your package has been activated successfully!',
            'package_id' => $this->package->id,
            'status' => 'active'
        ];
    }
}
