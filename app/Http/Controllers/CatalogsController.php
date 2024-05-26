<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;

class CatalogsController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        if($request->has('cat')) {
            $cat = $request->get('cat');
            $category = Category::findOrFail($cat);
            //we use to get product form curret category  and its child
            $products = Product::whereIn('id', $category->related_products_id)->where('name','LIKE', '%'.$q.'%');
        }else{

            $products =Product::where('name', 'LIKE','%'.$q.'%');
        }

        if ($request->has('sort')) {
            $sort = $request->get('sort');
            $order = $request->has('order') ? $request->get('order') : 'asc';
            $filed = in_array($sort, ['price','name']) ? $request->get('sort') : 'price';
            $proucts = $products->orderBy($filed, $order);
        }
        $products = $products->paginate(4);

        return view('catalogs.index', compact('products', 'q', 'cat' , 'selected_category', 'sort', 'order', 'category'));
    }

}
