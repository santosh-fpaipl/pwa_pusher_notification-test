<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Events\PusherNotificationEvent;
use App\Notifications\RefreshNotification;

class NotificationBell extends Component
{
    public $notifications;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $user = User::findOrfail(1);
        $this->notifications = $user->notifications;
    }

    public function boot(){
        $this->mount();
    }

    public function refreshPage()
    {
        // Trigger an event using Pusher
        PusherNotificationEvent::dispatch('Page refresh required');

        $user = User::findOrfail(1);
        // Display a notification using Laravel's built-in notification system
        $user->notify(new RefreshNotification('Page refreshed'));
    }

    public function render()
    {
        return view('livewire.notification-bell');
    }
}
