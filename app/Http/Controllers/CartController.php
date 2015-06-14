<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {

    private $cart;

    /**
     * @param Cart $cart
     */

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

	public function index()
    {
        if(!Session::has('cart')){
            Session::set('cart',$this->cart);
        }

        return view('store.cart',['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        $urlImage = 'images/no-img.jpg';

        if(count($product->images))
        {
            $urlImage = 'uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension;
        }

        $cart->add($id,$product->name,$product->price,$urlImage);

        Session::setFacadeApplication('cart',$cart);

        return redirect()->route('cart');
    }

    public function removeQtd($id)
    {
        $cart = $this->getCart();
        $qtd = $cart->removeQtd($id);

        if($qtd == 1)
        {
            $this->destroy(($id));
        }else{
            Session::setFacadeApplication('cart',$cart);
        }

        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart',$cart);

        return redirect()->route('cart');
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

}
