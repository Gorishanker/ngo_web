<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class ChangeGurujiDocumentNotify extends Notification implements ShouldQueue
{
    use Queueable;

    protected $messages, $link_type, $image, $title;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notify_array)
    { 
        $this->messages =  $notify_array["messages"];
        $this->image = isset($notify_array["image"]) ? $notify_array["image"] : '';
        $this->title = $notify_array["title"];
        $this->link_type =  $notify_array["link_type"];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', FcmChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'notification' => $notifiable->id,
            'message' => $this->messages,
            'link_type' => $this->link_type,
            'image' => $this->image,
            'title' => $this->title,
            'sound' => 'default',
        ];
    }


    public function toFcm($notifiable)
    {
        Log::channel('notification')->info($notifiable);
        return  FcmMessage::create()
            ->setData(['session_type' =>  $this->link_type, 'sound' => 'default'])
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle($this->title)
                ->setBody($this->messages)
                ->setImage($this->image))
            ->setAndroid(
                AndroidConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios'))
            );
    }
}
