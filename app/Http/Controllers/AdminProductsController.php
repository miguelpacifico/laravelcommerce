<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

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

    public function images($id)
    {
        $product = $this->productsModel->find($id);
        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productsModel->find($id);
        return view('products.create_image',compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        //dd($request);

        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id,'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension,File::get($file));

        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path() . '/uploads/'.$image->id.'.'.$image->extension))
        {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }



        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images',['id' => $product->id]);

    }

}
