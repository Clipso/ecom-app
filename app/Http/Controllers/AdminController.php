<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category.view_category', compact('categories'));
    }

    public function create_category()
    {
        return view('admin.category.create_category');
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();
        flash()->success('Category has been added successfully.');

        return redirect('view_category');
    }

    public function edit_category($id)
    {
        $category = Category::find($id);

        if (!$category) {
            flash()->error('Category not found.');
            return redirect()->back();
        }

        return view('admin.category.edit_category', compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
        ]);

        $category = Category::find($id);

        if (!$category) {
            flash()->error('Category not found.');
            return redirect()->back();
        }

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();

        flash()->success('Category has been updated successfully.');

        return redirect('view_category');
    }

    public function delete_category($id)
    {
        // dd($id);
        $category = Category::find($id);

        if (!$category) {
            flash()->error('Category not found.');
            return redirect()->back();
        }

        $category->delete();

        flash()->success('Category has been deleted successfully.');

        return redirect()->back();
    }
    /**
     * Product Controller Methods
     */
    public function product_list()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $category = Category::find($product->category);
            $product->category = $category ? $category->category_name : 'Unknown';
        }
        
        
        return view('admin.product.product_list', compact('products'));
    }

    public function create_product()
    {
        $categories = Category::all();

        return view('admin.product.create_product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $image = $request->image;

        if ($image) {
            $name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $name);
            $product->image = $name;
        }

        $product->save();
        flash()->success('Product has been added successfully.');

        return redirect('product_list');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        return view('admin.product.edit_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($id);

        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $image = $request->image;

        if ($image) {
            $name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $name);
            $product->image = $name;
        }

        $product->save();

        flash()->success('Product has been updated successfully.');

        return redirect('product_list');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        $product->delete();

        flash()->success('Product has been deleted successfully.');

        return redirect()->back();
    }

    public function single_product($id)
    {
        $product = Product::find($id);

        if (!$product) {
            flash()->error('Product not found.');
            return redirect()->back();
        }

        return view('admin.product.single_product', compact('product'));
    }

    /**
     * Customer Controller Methods
     */
    public function customer_list()
    {
        $customers= Customer::all();
        if (!$customers) {
            flash()->error('Customer not found.');
            $customers = [];
        }

        return view('admin.customer.customer_list', compact('customers'));
    }

    public function create_customer()
    {
        $cities = $this->show_cities();

        return view('admin.customer.create_customer', compact('cities'));
    }

    private function show_cities(): array
    {
        $jsonFilePath = storage_path('app/my.json');

        if (!file_exists($jsonFilePath)) {
            return [];
        }

        $jsonContent = File::get($jsonFilePath);
        $cities = json_decode($jsonContent, true);

        return $cities;
    }
}
