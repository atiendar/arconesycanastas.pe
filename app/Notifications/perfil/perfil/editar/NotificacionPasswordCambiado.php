<?php
namespace App\Notifications\perfil\perfil\editar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
// Models
use App\Models\Sistema;
// Otros
use Carbon\Carbon;

class NotificacionPasswordCambiado extends Notification {
    use Queueable;
    protected $plantilla;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($plantilla) {
        $this->plantilla = $plantilla;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail']; // 'database', 'mail'
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        $year = Carbon::parse(Sistema::datos()->sistemaFindOrFail()->year_de_ini);
        return (new MailMessage)
        ->subject($this->plantilla->asunt)
        ->view(
            'correo.' . $this->plantilla->id, [
                // General
                'nombre_completo_del_usuario'       => $notifiable->nom . ' ' . $notifiable->apell,
                'nombre_del_usuario'                => $notifiable->nom,
                'apellido_del_usuario'              => $notifiable->apell,
                'email_registro_del_usuario'        => $notifiable->email_registro,
                'nombre_de_la_empresa'              => Sistema::datos()->sistemaFindOrFail()->emp_abrev,
                'year_de_inicio_de_la_empresa'      => $year->year,
                'pagina_web_de_la_empresa'          => Sistema::datos()->sistemaFindOrFail()->pag,
                'pagina_de_inicio_del_sistema'      => url(config('app.url')),
                'year_actual'                       => date("Y"),
                // Otros
            ]
        );


/*
        return (new MailMessage)
            ->subject(Lang::get('Cambio de contraseña'))
            ->greeting('Estimado/a ' . $notifiable->nom)
            ->line(Lang::get('Recibió este correo electrónico porque detectamos un cambio en su contraseña. Si no fue usted favor de cambiarla lo antes posible.'))
            ->action(Lang::get('Acceder a la plataforma'), route('login'))
            ->line(Lang::get('Si usted a realizado el cambio, puede ignorar o eliminar este e-mail.'));
*/
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
