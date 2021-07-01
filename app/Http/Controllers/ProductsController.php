<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use App\Unit;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request){

        $search = $request->search;

        // $unit = Unit::all();
        // $category = Category::all();

        $products = Products::with(['category','unit'])
        ->where('product_name','LIKE','%'.$search.'%')
        ->paginate(10);

        return view('pages.products.index',[
            'products' => $products
    
        ]);
    }

    public function add(){

        $category = Category::all();
        $unit = Unit::all();
        return view('pages.products.add',compact(['category','unit']));
    }

    public function store(Request $request){


        $this->validate($request,[
            'unit_id'      => 'required',
            'category_id'  => 'required',
            'sku'          => 'required',
            'product_name' => 'required|string|max:50',
            'price'        => 'required|',
            'sale_price'   => 'required|',
            'description'  => 'required'
        ]);
        

        foreach($request as $key => $val) {
            
            $data[] = array(
                'unit_id'      => $request->unit_id[$key]
                'category_id'  => $request->category_id[$key]
                'sku'          => $request->sku[$key]
                'product_name' => $request->product_name[$key]
                'price'        => $request->price[$key]
                'sale_price'   => $request->sale_price[$key]
                'description'  => $request->description[$key]
            );
        };

        

        // Products::create([
        //     "unit_id"      => $request->unit_id,
        //     "category_id"  => $request->category_id,
        //     "product_name" => $request->product_name,
        //     "sku"          => $request->sku,
        //     "price"        => $request->price,
        //     "sale_price"   => $request->sale_price,  
        //     "description"  => $request->description,
        // ]);
        
        // $q = DB::table('products')->where('id', $request->input('id'))->get();

        // $product = new Products;

        // foreach ($request as $key => $val) {

        // $data[]= [

        //     $product->unit_id      = $request->unit_id[$key],
        //     $product->category_id  = $request->category_id[$key],
        //     $product->product_name = $request->product_name[$key],
        //     $product->sku          = $request->sku[$key],
        //     $product->price        = $request->price[$key],
        //     $product->sale_price   = $request->sale_price[$key],  
        //     $product->description  = $request->description[$key] 
        // ];
        // }

      
        // $product->insert($data);

        // return redirect()->route('products');

       


    }

    public function edit($id){

    }

    public function update(Request $request,$id){

    }

    public function destroy($id){

    }
}
