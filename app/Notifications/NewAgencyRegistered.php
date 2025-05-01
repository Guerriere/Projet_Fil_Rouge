<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Agency; // Assurez-vous d'importer le modèle Agency

class NewAgencyRegistered extends Notification
{
    use Queueable;

    /**
     * The agency instance.
     *
     * @var \App\Models\Agency
     */
    protected $agency;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\Agency  $agency
     * @return void
     */
    public function __construct(Agency $agency)
    {
        $this->agency = $agency;
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
        return (new MailMessage)
            ->subject('Nouvelle inscription d\'agence partenaire')
            ->greeting('Bonjour Admin,')
            ->line('Une nouvelle agence s\'est inscrite sur la plateforme TravelCam.')
            ->line('Nom de l\'agence: ' . $this->agency->agency_name)
            ->line('Email: ' . $this->agency->email)
            ->line('Type: ' . $this->agency->agency_type)
            ->line('Ville: ' . $this->agency->city)
            ->action('Voir les détails', url('/admin/agencies/' . $this->agency->id))
            ->line('Merci d\'examiner cette demande rapidement.');
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