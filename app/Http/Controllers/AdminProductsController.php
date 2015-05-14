<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Category;

class AdminProductsController extends Controller {

    private $productsModel;

    public function __construct(Product $product)
    {
        $this->middleware('guest');
        $this->productsModel = $product;
    }

    public function index()
    {
        $products = $this->productsModel->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create',compact('categories'));
    }

    public function storage(Requests\RequestProduct $requestProduct)
    {
        $input = $requestProduct->all();
        //dd($input);
        $product = $this->productsModel->fill($input);
        $product->save();

        return redirect()->route('products');
    }

    public function edit($id,Category $category)
    {
        $categories = $category->lists('name','id');
        $product = $this->productsModel->find($id);
        return view('products.edit', compact('product','categories'));
    }

    public function update(Requests\RequestProduct $requestProduct, $id)
    {
        $this->productsModel->find($id)->update($requestProduct->all());
        return redirect()->route('products');
    }

    public function destroy($id)
    {
        $this->productsModel->find($id)->delete();

        return redirect()->route('products');
    }

}
