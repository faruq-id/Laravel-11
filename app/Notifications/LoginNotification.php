<?php

namespace App\Notifications;

use Jenssegers\Agent\Agent;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LoginNotification extends Notification
{
    use Queueable;

    public $user;
    protected $ip;
    protected $browser;
    protected $platform;
    protected $language;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;

        // Tangkap data tambahan
        $this->ip = request()->ip();
        $agent = new Agent();
        $this->browser = $agent->browser();
        $this->platform = $agent->platform();
        $this->language = request()->header('accept-language');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Login Notification')
            ->greeting('Hello, ' . $this->user->name . '!')
            ->line('We noticed a login to your account.')
            ->line('Login Time: ' . now()->toDateTimeString())
            ->line('IP Address: ' . $this->ip)
            ->line('Browser: ' . $this->browser)
            ->line('Platform: ' . $this->platform)
            ->line('Language: ' . $this->language)
            ->action('Check Your Account', route('admin.dashboard.index'))
            ->line('If this was you, no action is needed.')
            ->line('If this wasn’t you, please secure your account immediately.')
            ->salutation('Regards, ' . config('app.name'));
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
