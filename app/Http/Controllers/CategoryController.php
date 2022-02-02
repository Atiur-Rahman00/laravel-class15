<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;
use Carbon\Carbon;
use Auth;

class categoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_categories = Category::all();

        return view('category.index',compact('all_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_name'=>'required',
        ]);
        $category_name = Str::lower($request->category_name);
        if(Category::Where('category_name','=',$category_name)->doesntExist()){
            Category::insert([
                'category_name' => $category_name,
                'added_by' => Auth::user()->id,
                'created_at' => Carbon::now(),
            ]);
        }else{
            return back()->with('inserr','Already inserted');
        }
        return back()->with('insdone','Category inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $single_info = Category::find($id);
        return view('category.edit',compact('single_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'category_name'=>'required',
        ],[
            'category_name.required'=>'Category field fill first',
        ]);
        $category_name = Str::lower($request->category_name);
        Category::findOrFail($request->category_id)->update([
            'category_name'=> $category_name,
        ]);
        return redirect('/category/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::find($id)->delete();
        return back();
    }

    public function deletedcategory(){
        $all_trashed = Category::onlyTrashed()->get();
        return view('category.trashed',compact('all_trashed'));
    }
    
    public function categoryrestore($id){
        Category::withTrashed()->where('id',$id)->restore();
        return back()->with('restoredone','Category restore successfully done');
    }

    public function categoryvanish($id){
        category::withTrashed()->where('id',$id)->forceDelete();
        return back()->with('fordlt','Category deleted done');
    }



}
