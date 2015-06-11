<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

class StoreController extends Controller {

    private $categoryModel;
    private $tagModel;

    public function __construct(Category $category, Tag $tag)
    {
        $this->middleware('guest');
        $this->categoryModel = $category;
        $this->tagModel = $tag;
    }

    public function Index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        $categories = $this->categoryModel->all();

        return view('store.index',compact('categories','pFeatured','pRecommend'));
    }

    public function category($id)
    {
        $categories = $this->categoryModel->all();
        $category = $this->categoryModel->find($id);
        $products = Product::OfCategory($id)->get();

        return view('store.category',compact('products','categories','category'));
    }

    public function tag($id)
    {
        $categories = $this->categoryModel->all();
        $tag = $this->tagModel->find($id);
        $products = $tag->products;

        return view('store.tag',compact('products','categories','tag'));
    }


    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product',compact('categories','product'));
    }
}
