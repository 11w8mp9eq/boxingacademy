<?php
namespace App\Providers;

use App\Providers\Ordered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class DisplayBankAccountNumberNotification
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Providers\Ordered $event
	 *
     * @return string
     */
    public function handle(Ordered $event)
    {
        $user = $event->user;

        return redirect('/products')->with('mssg', "$user->name, Thanks for your order!</br></br>
		Here are the details for the transfer:</br>
		Bank account number: 00 12 3456 7890 123 5678 0022</br>
		Transfer title: $user->name-order</br>
		Address: 123 Main Street, New York, NY 10030");
    }
}
