<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $products = Product::where('name', 'LIKE', "%$keyword%")
				->orWhere('image', 'LIKE', "%$keyword%")
				->orWhere('price', 'LIKE', "%$keyword%")
				->orWhere('category_id', 'LIKE', "%$keyword%")
				->orWhere('decription', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $products = Product::paginate($perPage);
        }

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
			'name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
			'category_id' => 'required',
			'description' => 'required'
		]);
        //$requestData = $request->all();
        //$product = new Product;
        
        //image:
        $product_image = $request->image;
        $product_image_new_name = time()."_".$product_image->getClientOriginalName();
        $product_image->move('uploads/products/', $product_image_new_name);
        
        //save all
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'uploads/products/'.$product_image_new_name,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        Session::flash('flash_message', 'Product added!');
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.products.edit', compact('product'))->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'price' => 'required',
			'category_id' => 'required',
			'description' => 'required'
		]);
        //$requestData = $request->all();
        //dd($requestData);
        $product = Product::findOrFail($id);
        //$product->update($requestData);

        if($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time()."_".$image->getClientOriginalName();
            $image->move('uploads/products/', $image_new_name);
            $product->image = 'uploads/products/'.$image_new_name;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->save();
        Session::flash('flash_message', 'Product updated!');
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);

        Session::flash('flash_message', 'Product deleted!');

        return redirect('admin/products');
    }
}
