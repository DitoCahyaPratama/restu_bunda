<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::all();
        return view('pages.admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('pages.admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name'=>'required|min:5|unique:products,name',
            'code'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'image'=>'image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput=$request->all();
        if($request->file('image')){
            $image=$request->file('image');
            if($image->isValid()){
                $fileName=time().'-'.Str::slug($formInput['name'],"-").'.'.$image->getClientOriginalExtension();
                $large_image_path=public_path('products/large/'.$fileName);
                $medium_image_path=public_path('products/medium/'.$fileName);
                $small_image_path=public_path('products/small/'.$fileName);
                //Resize Image
                Image::make($image)->save($large_image_path);
                Image::make($image)->resize(600,600)->save($medium_image_path);
                Image::make($image)->resize(300,300)->save($small_image_path);
                $formInput['image']=$fileName;
            }
        }
        Product::create($formInput);
        return redirect()->route('product.index')->with('message','Add Products Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories=Category::all();
        $data_product=Product::findOrFail($id);
        $data_category=Category::findOrFail($data_product->category_id);
        // return view('pages.admin.product.edit',compact('data_product','categories','data_category'));
        return view('pages.admin.product.edit', compact('data_product','categories','data_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update_product=Product::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|min:5',
            'code'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'image'=>'mimes:png,jpg,jpeg|max:1000',
        ]);
        $formInput=$request->all();
        if($update_product['image']==''){
            if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.Str::slug($formInput['name'],"-").'.'.$image->getClientOriginalExtension();
                    $large_image_path=public_path('products/large/'.$fileName);
                    $medium_image_path=public_path('products/medium/'.$fileName);
                    $small_image_path=public_path('products/small/'.$fileName);
                    //Resize Image
                    Image::make($image)->save($large_image_path);
                    Image::make($image)->resize(600,600)->save($medium_image_path);
                    Image::make($image)->resize(300,300)->save($small_image_path);
                    $formInput['image']=$fileName;
                }
            }
        }else{
            $formInput['image']=$update_product['image'];
        }
        $update_product->update($formInput);
        return redirect()->route('product.index')->with('message','Update Products Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete=Product::findOrFail($id);
        $image_large=public_path().'/products/large/'.$delete->image;
        $image_medium=public_path().'/products/medium/'.$delete->image;
        $image_small=public_path().'/products/small/'.$delete->image;
        if($delete->delete()){
            unlink($image_large);
            unlink($image_medium);
            unlink($image_small);
        }
        return redirect()->route('product.index')->with('message','Delete Success!');
    }
}
