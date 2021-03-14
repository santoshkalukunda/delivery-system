<?php

namespace App\Notifications;

use App\Models\Customer;
use App\Models\ProductOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductConfirmNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $customer;
    public $productOrder;
    public $productOrderId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, ProductOrder $productOrder)
    {
        $this->customer = $customer;
        $this->productOrder = $productOrder;
        $this->productOrderId= $productOrder->id;
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
        ->subject("Your Order has been Confirmed ($this->productOrderId)")
        ->markdown('mail.productConfirm',
        [
          'customer' =>  $this->customer, 
          'productOrder' => $this->productOrder,
        ]
    );
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
