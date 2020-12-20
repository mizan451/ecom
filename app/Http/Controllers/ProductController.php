<?php

namespace App\Http\Controllers;


use App\Model\Product;
use App\Model\Category;
use App\Model\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutipleDelete(Request $request)
    {
       foreach($request->all() as $product){
        Product::find($product['id'])->delete();
       }
    }
    public function index($number = 10)
    {
        $products = Product::latest()->with('category')->paginate($number);
         return response()->json([
            'products' => $products
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productValidation($request);


        $request['color'] = explode(',',$request->color);
        $request['size'] = explode(',',$request->size);
        $file = '';
        $upload_path = public_path('uploads');
        if($request->hasFile('image')){
          $file = $request->file('image');
          $name = time()."_".$file->getClientOriginalName();
          $file->move($upload_path, $name);
           }
        $product = new Product();
        $product->create(array_merge($request->all(), ['image'=>$name] ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return response()->json([
            'product' => $product
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product){
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       return $this->index();
    }

    public function productValidation($request, $id=null){
        if($id){
                $image = '';
        }else{
            $image = 'required|mimes:jpg,png,gif,jpeg|max:1024';
        }
        $request->validate(
            [
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required',
            'size' => 'required',
            'description' => 'required',
            'image' =>  $image,
            'quantity' => 'required|integer',

           ],
           [
               'category_id.required' => 'The Category Field Is Required',
               'brand_id.required' => 'The Brand Field Is Required'
           ]
        );

    }

    public function updateProduct(Request $request,$id){
        $product = Product::findOrFail($id);
        $this->productValidation($request,$id);
        $request['color'] = explode(',',$request->color);
        $request['size'] = explode(',',$request->size);
        $file = '';
        $upload_path = public_path('uploads');
        if($request->hasFile('image')){
           $file = $request->file('image');
           $name = time()."_".$file->getClientOriginalName();
           $file->move($upload_path, $name);
           $image = public_path(`uploads/$product->image`);
                 if(file_exists($image)){
                  unlink($image);
                 }
            }else{
            $name = $product->image;
        }
        $product->update(array_merge($request->all(), ['image'=>$name] ));
    }

    public function  geltAllProduct(){
        if(!\Request::ajax()){
            return abort(404);
           }
        return $this->index(15);
    }

    public function sidebarInfo(){
        $categories = Category::all();
        $brands = Brand::all();
        $min_price = Product::min('price');
        $max_price = Product::max('price');

        return response()->json([
           'categories' => $categories,
           'brands'     => $brands,
           'price' => [
               'min'=> $min_price,
               'max'=> $max_price,
           ]
        ]);
    }

    public function productFilter($data){
        $data = json_decode($data);
        $field = $data->field;
        $data = $data->data;

        if ($field==='price') {
            $product = $this->priceRangeFilter($data);
        }elseif($field==='size'|| $field==='color'){
            $product = $this->sizeOrColorFilter($data, $field);
        }
        elseif ($field==='category_id'|| $field==='brand_id') {
            $product = Product::where($field, $data)->paginate(15);
        }else{
            $product = $this->index(15);
        }
          return response()->json([
            'product' => $product,
        ],200);
    }

    public function priceRangeFilter($data){
        $min = $data['0'];
        $max = $data['1'];

        $product = Product::whereBetween('price', [ $min,$max])->paginate(15);
        return $product;
    }

    public function sizeOrColorFilter($data){

        $product = Product::query()->where($field, 'like', "%{$data}%")->paginate(15);
        return $product;
    }
}
