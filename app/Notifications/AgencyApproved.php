<?php

namespace App\Notifications;

use App\Models\Agency; // Assurez-vous d'importer le modèle Agency
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AgencyApproved extends Notification
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
            ->subject('Votre compte agence a été approuvé !')
            ->greeting('Félicitations ' . $this->agency->agency_name . '!')
            ->line('Votre compte d\'agence partenaire sur TravelCam a été approuvé.')
            ->line('Vous pouvez maintenant vous connecter et commencer à gérer vos services et réservations.')
            ->action('Accéder à votre tableau de bord', url('/agence/dashboard'))
            ->line('Nous sommes ravis de vous compter parmi nos partenaires et nous vous souhaitons beaucoup de succès!');
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