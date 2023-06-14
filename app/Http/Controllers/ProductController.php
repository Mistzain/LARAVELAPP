<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        //Route::get('/products',[ProductController::class, 'index']);
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //Set min and max values
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'unit' => 'required|min:3|max:50'
        ]);

        //Set default values in case the user left the fields empty
        //I prefer this over an error message requiring the user to enter something
        //Default values allow faster data entry
        if ($request->input('unit') == null) {
            $unit = 'Kilo';
        } else {
            $unit = $request->input('unit');
        }

        if ($request->input('price') == null) {
            $price = 49.99;
        } else {
            $price = $request->input('price');
        }

        if ($request->input('description') == null) {
            $description = 'Product of RBJ Agrivet Supplies';
        } else {
            $description = $request->input('description');
        }


        //We are yet to use the `discontinued` attribute
        //We'll set a default value to avoid database errors

        if ($request->input('discontinued') == null) {
            $discontinued = 1;
        } else if ($request->input('discontinued') == 'on') {
            $discontinued = 0;
        }

        //Clean the value for price. Remove any invalid characters.
        $price = floatval(preg_replace('/[^\d.]/', '', $price));

        //Find the product using the Product model and its ID.
        $product = new Product;
        //Assign values using the field names from the HTML form
        $product->name = $request->input('name');
        $product->description = $description;
        $product->category = $request->input('category');
        $product->branch = $request->input('branch');
        $product->price = $price;
        $product->unit = $unit;
        //dd($product);
        //Save to the database
        $product->save();
        $id = DB::getPdo()->lastInsertId();
        //Redirect back to the show view with a message
        return redirect('product/show/' . $id)->with('status', 'Record Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        //Set min and max values
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'unit' => 'required|min:3|max:50'
        ]);

        //dd($request);

        //Set default values in case the user left the fields empty
        //I prefer this over an error message requiring the user to enter something
        //Default values allow faster data entry
        if ($request->input('unit') == null) {
            $unit = 'Kilo';
        } else {
            $unit = $request->input('unit');
        }

        if ($request->input('price') == null) {
            $price = 49.99;
        } else {
            $price = $request->input('price');
        }

        if ($request->input('description') == null) {
            $description = 'Scented Candle';
        } else {
            $description = $request->input('description');
        }


        //We are yet to use the `discontinued` attribute
        //We'll set a default value to avoid database errors

        if ($request->input('discontinued') == null) {
            $discontinued = 1;
        } else if ($request->input('discontinued') == 'on') {
            $discontinued = 0;
        }

        //Clean the value for price. Remove any invalid characters.
        $price = floatval(preg_replace('/[^\d.]/', '', $price));

        //Find the product using the Product model and its ID.
        $product = Product::find($id);
        //Assign values using the field names from the HTML form
        $product->name = $request->input('name');
        $product->description = $description;
        $product->category = $request->input('category');
        $product->branch = $request->input('branch');
        $product->price = $price;
        $product->unit = $unit;
        //dd($product);
        //Save to the database
        $product->save();

        //Redirect back to the show view with a message
        return redirect('product/show/' . $id)->with('status', 'Record Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('status', 'Record Deleted!');
    }
}