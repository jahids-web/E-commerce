<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
        $this->middleware('verified')->except(['show']);
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
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
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        $return_after_create = Category::create([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('category_photo')) {
            $uploaded_category_images = $request->file('category_photo');
            $new_category_photo_name = $return_after_create->id . "." . $uploaded_category_images->extension();
            $new_category_photo_location = base_path('public/uploads/category/' . $new_category_photo_name);
            Image::make($uploaded_category_images)->resize(600, 470)->save($new_category_photo_location, 30);

            $return_after_create->category_photo = $new_category_photo_name;
            $return_after_create->save();

            // Category::find($return_after_create->id)->update([
            //     'category_photo' => $new_category_photo_name
            // ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // if wehave file or not
        if ($request->hasFile('category_photo')) {
            // is you old photo default photo or not
            if ($category->category_photo !== 'category_default_photo.jpg') {
                // delete the old photo
                $location = base_path() . "/public/uploads/category/" . $category->category_photo;
                unlink($location);
            }
            $uploaded_category_images = $request->file('category_photo');
            $new_category_photo_name = $category->id . "." . $uploaded_category_images->extension();
            $new_category_photo_location = base_path('public/uploads/category/' . $new_category_photo_name);
            Image::make($uploaded_category_images)->resize(600, 470)->save($new_category_photo_location, 30);
            $category->category_photo = $new_category_photo_name;
        }
        $category->category_name = $request->category_name;
        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
