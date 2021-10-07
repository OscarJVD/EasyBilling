<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            // var_dump($category->products);
            foreach ($category->products as $productCategory) {
                // dd($productCategory->name);
                $countProducts = $productCategory
                    ->groupBy('name')
                    ->count('category_id');
            }
            // $categoryGraph = Category::all()->groupBy($category->products->category_id);
        }

        // echo $countProducts;

        // $categoryGraph = Category::get()
        // ->groupBy('name')
        // ->count('id');

        // $categoryGraph = Category::all()
        // ->groupBy('name')
        // ->count('id');

        // dd($categoryGraph);

        // foreach($categoryGraph as $cat){
        //     dd($cat);
        // }

        // dd($categoryGraph);

        return view('categories/.list', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->status_id = 1;
        $category->save();
        $categories = Category::select('statuses.name as status', 'categories.*')->join('statuses', 'statuses.id', '=', 'categories.status_id')->get();
        return ['categories' => $categories];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return ['category' => $category];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        $categories = Category::select('statuses.name as status', 'categories.*')->join('statuses', 'statuses.id', '=', 'categories.status_id')->get();
        return ['categories' => $categories];
    }

    public function updateStatus($id)
    {
        $category = Category::find($id);
        if ($category->status_id == 1) {
            $category->status_id = 2;
        } else {
            $category->status_id = 1;
        }
        $category->save();
        $categories = Category::select('statuses.name as status', 'categories.*')->join('statuses', 'statuses.id', '=', 'categories.status_id')->get();
        return ['categories' => $categories];
    }
}
