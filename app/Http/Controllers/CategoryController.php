<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $category = Category::orderBy('created_at','DESC')->paginate(5);
      $data  = compact('category');
      return view('dashboard.category',$data);
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


      $validator = Validator::make($request->all(), [
             'name' => 'required',
             'slug' => 'required',
         ]);

        if ($validator->passes()) {

          $category = Category::create([
            'name'=>$request->name,
            'slug'=>str_slug($request->slug),
          ]);
            // return redirect('category')->with(['success' => 'Kategori Berhasil ditambahkan']);
        }else {
        	return response()->json(['error'=>$validator->errors()->all()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('dashboard.maps');
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

      $validator = Validator::make($request->all(), [
             'name' => 'required',
             'slug' => 'required',
         ]);

        if ($validator->passes()) {
          $kategori = Category::find($request->id);
          $kategori->name = $request->name;
          $kategori->slug = str_slug($request->slug);
          $kategori->save();
         // return redirect('category')->with(['success' => 'Kategori Berhasil di edit']);
        }else {
          return response()->json(['error'=>$validator->errors()->all()]);
        }

      // echo $request;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $kategori = Category::find($request->id);
         try {
             $kategori->delete();
         } catch (\Exception $e) {

         }

           return redirect('category')->with(['success' => 'Kategori Berhasil di Hapus']);

    }




    public function get_lokasi(Request $request)
    {
      if($request->ajax())
     {

      $data = compact($request);
        return view('dashboard.maps-ajax',$data);
     }
    }
}
