<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Category;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = DB::table('categories');
            $datatables = DataTables::queryBuilder($categories)
                ->editColumn('name', function ($category) {
                    return \Str::limit($category->name, 30);
                })->editColumn('description', function ($category) {
                    return nl2br(\Str::limit($category->description, 55));
                })->addColumn('action', function ($category) {
                    return '
                <a href="' . route('admin.category.show', $category->id) . '" style="float: left;" class="mr-2 modal-show-detail"><i class="fa fa-eye" style="color: #2980b9;"></i></a>
                <a href="' . route('admin.category.edit', $category->id) . '" style="float: left;"><i class="fa fa-pencil-square-o" style="color: rgb(0, 241, 12);"></i></a>
                <button type="submit" onclick="deleteCategory(\'' . $category->id . '\')" style="background-color: transparent; border: none; margin: -7px 0 0 -5px;"><i class="icon-trash" style="color: red;"></i></button>   
                <form action="' . route('admin.category.destroy', $category->id) . '" method="post" id="DeleteCategory' . $category->id . '">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                </form>
            ';
                })->rawColumns(['name', 'description', 'action'])->toJson();
            return $datatables;
        }
        return view('admin.category.index');
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
        return view('admin.category.edit', compact('category'));
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
            'name' => ['required', 'string', 'unique:categories,name,' . $id],
            'facility' => ['required', 'string'],
            'description' => ['required', 'string',]
        ]);
        $category->update($attr);
        Alert::success('Message Information', 'Data Updated');
        return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.detail', compact('category'));
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
        $roomIds = Room::where('category_id', $category->id)->pluck('id');
        Booking::whereIn('room_id', $roomIds)->delete();
        $category->rooms()->delete();
        $category->delete();
        Alert::success('Message Information', 'Data Deleted');
        return back();
    }
}
