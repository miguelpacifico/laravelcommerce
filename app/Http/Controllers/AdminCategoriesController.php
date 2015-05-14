<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminCategoriesController extends Controller {

    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->middleware('guest');
        $this->categoryModel = $categoryModel;
    }

	public function index()
    {
        $categories = $this->categoryModel->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function storage(Requests\RequestCategory $requestCategory)
    {
        $input = $requestCategory->all();
        $category = $this->categoryModel->fill($input);
        $category->save();

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Requests\RequestCategory $requestCategory, $id)
    {
        $this->categoryModel->find($id)->update($requestCategory->all());
        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect()->route('categories');
    }


}
