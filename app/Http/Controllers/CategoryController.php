<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){

        $search = $request->search;

        $categories = Category::withCount(['products'])
        ->where('category_name','LIKE','%'.$search.'%')
        ->paginate(10);

        return view('pages.category.index',[
            'categories' => $categories
        ]);
    }

    public function add(){
        return view('pages.category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required|string|min:5|max:30',
            'desc' => 'nullable|min:5|max:200'
        ]);


        try {
            $category = new Category;

            $category->category_name = ucwords($request->category_name);
            $category->desc = ucwords($request->desc);

            $category->save();
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->with('error-msg','Failed Add Category');
            
        }

        return redirect()->route('category')->with('success-msg','Success Add Category');
        
    }

    public function edit($id)
    {
    
        $categories = Category::findOrFail($id);
        
        return view('pages.category.edit',[
            'categories'=> $categories
        ]);
    }

    public function update(Request $request,$id)
    {
        $categories = Category::findOrFail($id);

        $this->validate($request, [
            'category_name' => 'required|string|min:5|max:30',
            'desc' => 'nullable|min:5|max:200'
        ]);

        try {

            $categories->category_name = $request->category_name;
            $categories->desc          = $request->desc;

            $categories->update();
            
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->with('error-msg', 'Failed Edit Category');
        }

        return redirect()->route('category')->with('success-msg', 'Success Edit Category');

    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);

        try {

            $categories->delete();
        } catch (\Exception $e) {

            return redirect()->back()->with('error-msg', 'Failed Delete Category');
        }

        return redirect()->route('category')->with('success-msg', 'Success Delete Category');
    }
}
