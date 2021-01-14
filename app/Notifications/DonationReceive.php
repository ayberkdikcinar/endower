<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Donator;
class DonationReceive extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $donator=Donator::find($this->data->donator_id);

        if($this->data->is_anonymous){
            return (new MailMessage)->subject('Donation Received')
            ->line('You have recieved a donation...')
            ->line('Comment: '.$this->data->comment)
            ->line('Amount: '.$this->data->amount.'$');
        }

        else{
            return (new MailMessage)->subject('Donation Received')
            ->line('You have recieved a donation from: '.$donator->name)
            ->line('Amount: '.$this->data->amount.'$')
            ->line('Comment: '.$this->data->comment)
            ->line('If you want to contact with Donator: '.$donator->email);
        }


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
            //
        ];
    }
}
