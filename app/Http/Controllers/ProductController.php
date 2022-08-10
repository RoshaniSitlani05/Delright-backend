<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\products_images;
use Illuminate\Http\Request;

use Validator;

class ProductController extends Controller
{

  function Imagevalidation($image, $request)
  {
    $validator = Validator::make(
      $request->all(),
      [$image => 'mimes:jpg,jpeg,png|max:204888'],
      [
        'image.mime' => 'image must be jpf or png',
        'max' => 'image size exeeded'
      ]
    );
    if ($validator->fails()) {

      return $error[$image] = $validator->errors();
    } else {
      return true;
    }
  }

  public function addProduct(Request $request)
  {

    $product = new products();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->discount_percentage = $request->discount_percentage;
    $product->quantity = $request->quantity;
    $product->gst = $request->gst;
    $product->hsn_code = $request->hsn_code;
    $product->category = $request->category;
    $product->description = $request->description;
    $product->tags = $request->tags;
    $product->seller_id = auth('api')->user()->id;
    $result = $product->save();

    $product_images = new products_images;
    $product_images->product_id = $product->id;
    $check = $product_images->save();

    if ($request->has('image')) {
      $check =  $this->Imagevalidation('image', $request);
      if ($check) {
        $image = $request->image->store('public/products_images');
        products_images::where('product_id', $product->id)->update(['image' => $image]);
      }
    }
    if ($request->has('image2')) {
      $check =  $this->Imagevalidation('image2', $request);
      if ($check) {
        $image2 = $request->image2->store('public/products_images');
        products_images::where('product_id', $product->id)->update(['image2' => $image2]);
      }
    }
    if ($request->has('image3')) {
      $check =  $this->Imagevalidation('image3', $request);
      if ($check) {
        $image3 = $request->image3->store('public/products_images');
        products_images::where('product_id', $product->id)->update(['image3' => $image3]);
      }
    }
    if ($request->has('image4')) {
      $check =  $this->Imagevalidation('image4', $request);
      if ($check) {
        $image4 = $request->image4->store('public/products_images');
        products_images::where('product_id', $product->id)->update(['image4' => $image4]);
      }
    }
    if ($request->has('image5')) {
      $check =  $this->Imagevalidation('image5', $request);
      if ($check) {
        $image5 = $request->image5->store('public/products_images');
        products_images::where('product_id', $product->id)->update(['image5' => $image5]);
      }
    }
    if ($request->has('image6')) {
      $check =  $this->Imagevalidation('image6', $request);
      if ($check) {
        $image6 = $request->image6->store('public/products_images');
        products_images::where('product_id', $product->id)->update(['image6' => $image6]);
      }
    }


    if ($result && $check) {
      return response()->json(['successMsg' => 'Product successfully added']);
    }
  }
  #** @vendor
  public function displayMyProducts()
  {
    $products = products::select(
      'products.*',
      'products.created_at as posted_date',
      'products_images.*',
      'categories.name as category_name'
    )
      ->where('seller_id', auth('api')->user()->id)
      ->leftjoin('products_images', 'products_images.product_id', '=', 'products.id')
      ->leftjoin('categories', 'categories.id', '=', 'products.category')
      ->paginate(10);
    $products->makeHidden(['created_at', 'updated_at', 'id']);
    return $products;
    return response()->json(['totalCount' => strval(count($products)), 'details' => $products]);
  }

  public function updateMyProducts(Request $request)
  {
    $products = products::where('id', $request->id);
    if ($request->has('name')) {
      $products->update(['name' => $request->name]);
    }
    if ($request->has('price')) {
      $products->update(['price' => $request->price]);
    }
    if ($request->has('discount_percentage')) {
      $products->update(['discount_percentage' => $request->discount_percentage]);
    }
    if ($request->has('quantity')) {
      $products->update(['quantity' => $request->quantity]);
    }
    if ($request->has('gst')) {
      $products->update(['gst' => $request->gst]);
    }
    if ($request->has('hsn_code')) {
      $products->update(['hsn_code' => $request->hsn_code]);
    }
    if ($request->has('category')) {
      $products->update(['category' => $request->category]);
    }
    if ($request->has('description')) {
      $products->update(['description' => $request->description]);
    }
    if ($request->has('tags')) {
      $products->update(['tags' => $request->tags]);
    }
    $products_images = products_images::where('product_id', $request->id);
    if ($request->has('image')) {
      $check =  $this->Imagevalidation('image', $request);
      if ($check) {
        $image = $request->image->store('public/products_images');
        $products_images->update(['image' => $image]);
      }
    }
    if ($request->has('image2')) {
      $check =  $this->Imagevalidation('image2', $request);
      if ($check) {
        $image2 = $request->image2->store('public/products_images');
        $products_images->update(['image2' => $image2]);
      }
    }
    if ($request->has('image3')) {
      $check =  $this->Imagevalidation('image3', $request);
      if ($check) {
        $image3 = $request->image3->store('public/products_images');
        $products_images->update(['image3' => $image3]);
      }
    }
    if ($request->has('image4')) {
      $check =  $this->Imagevalidation('image4', $request);
      if ($check) {
        $image4 = $request->image4->store('public/products_images');
        $products_images->update(['image4' => $image4]);
      }
    }
    if ($request->has('image5')) {
      $check =  $this->Imagevalidation('image5', $request);
      if ($check) {
        $image5 = $request->image5->store('public/products_images');
        $products_images->update(['image5' => $image5]);
      }
    }
    if ($request->has('image6')) {
      $check =  $this->Imagevalidation('image6', $request);
      if ($check) {
        $image6 = $request->image6->store('public/products_images');
        $products_images->update(['image6' => $image6]);
      }
    }
    return response()->json(['successMsg' => 'updated successFully']);
  }

  public function deleteMyProductsImage(Request $request)
  {

    $product = products_images::where('product_id', $request->id);
    if ($request->has('image')) {
      $product->update(['image' => '']);
    }
    if ($request->has('image2')) {
      $product->update(['image2' => '']);
    }
    if ($request->has('image3')) {
      $product->update(['image3' => '']);
    }
    if ($request->has('image4')) {
      $product->update(['image4' => '']);
    }
    if ($request->has('image5')) {
      $product->update(['image5' => '']);
    }
    if ($request->has('image6')) {
      $product->update(['image6' => '']);
    }
    return response()->json(['successMsg' => 'deleted successFully']);
  }


  public function deleteMyProducts($id)
  {
    $product = products::find($id);
    $check = $product->delete();
    if ($check) {
      return response()->json(['successMsg' => 'deleted successFully']);
    }
  }

  #vendor
}
