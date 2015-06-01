<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller {

    private $categoryModel;

    public function __construct(Category $category)
    {
        $this->middleware('guest');
        $this->categoryModel = $category;
    }

    public function Index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        $categories = $this->categoryModel->all();

        return view('store.index',compact('categories','pFeatured','pRecommend'));
    }

    public function Categories($id)
    {
        $category = $this->categoryModel->find($id);
        $categories = $this->categoryModel->all();

        return view('store.products',compact('category','categories'));
    }
}
