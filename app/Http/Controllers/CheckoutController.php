<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller {

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return "sem itens";
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {
            $order = $orderModel->create(['user_id' => \Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach ($cart->all() as $k => $item) {
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            //Session::forget('cart');

            $cart->clear();

            return view('store.checkout', compact('order','cart'));

        }

        $categories = Category::all();

        return view('store.checkout', ['cart'=>'empty','categories'=>$categories]);

    }
}
