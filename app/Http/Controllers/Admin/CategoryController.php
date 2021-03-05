<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('admin.category.index',[
            'categories' => $category::latest()->paginate(5),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
            'facility' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);
        $attr = $request->all();
        Category::create($attr);
        Alert::success('Information Message', 'Data Saved');
        return redirect()->route('admin.category.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $attr = $request->all();
        $request->validate([
            'name' => ['required', 'string', 'unique:categories,name,'.$id],
            'facility' => ['required', 'string'],
            'description' => ['required', 'string',]
        ]);
        $category->update($attr);
        Alert::success('Message Information', 'Data Updated');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->rooms()->delete();
        $category->delete();
        Alert::success('Message Information', 'Data Deleted');
        return back();
    }
}
