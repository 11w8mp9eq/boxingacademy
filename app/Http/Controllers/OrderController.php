<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use App\Providers\Ordered;

class OrderController extends Controller
{
	 /** Save input data to the database */
    public function order()
    {
        $order = new Order();

        $order->name = request('name');
        $order->email = request('email');
        $order->product = request('product');
        $order->address = request('address');

        event(new Ordered($order->name));

        $order->save();

        return redirect('/products');
    }

	 /**
     * Display orders
     *
     * @return Order[]
     */
    public function index()
    {
        $times = DB::table('orders')->select(DB::raw("product,
			SUM(CASE WHEN `created_at` < now() - interval 3 day THEN 1 ELSE 0 END) AS Urgent,
			SUM(CASE WHEN `created_at` > now() - interval 3 day && `created_at` < now() - interval 1 day THEN 1 ELSE 0 END) AS Moderate,
			SUM(CASE WHEN `created_at` > now() - interval 1 day THEN 1 ELSE 0 END) AS New"))
            ->groupBy('product')
            ->get();

        $orders = Order::all();

        return view('orders.index', [
            'orders' => $orders,
            'times' => $times
        ]);
    }

	 /**
     * Delete order
     */
	public function destroy($id) {

    $order = Order::findOrFail($id);
    $order->delete();

    return redirect('/orders');
	}
}