<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order; 
use App\Models\Phone;
use Auth;
use PDF;
use DB;

class orderPaid extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $myorders=DB::table('orders')
        ->leftjoin('carts', 'orders.id', '=', 'carts.orderID')
        ->leftjoin('phones', 'phones.id', '=', 'carts.ProductID')
        ->select('carts.*','orders.*','phones.*','carts.quantity as qty')
        ->where('orders.userID','=',Auth::id())
        ->where('orders.paymentStatus','=','pending')
        ->get();

        $products=Phone::where('phones.userID','=',Auth::id())
        ->paginate(5)
        ;
        $pdf = PDF::loadView('myPDF', compact('myorders'));
    
        return (new MailMessage)
                    ->line('Purchase success ')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our Website!View your reciept in Attachments')
                    ->attachData($pdf->output(), "recipt.pdf");
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
