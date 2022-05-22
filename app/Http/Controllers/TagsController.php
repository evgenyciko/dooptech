<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Tags;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tags = Tags::orderBy('created_at','DESC')->paginate(5);
       $data  = compact('tags');
       return view('dashboard.tags',$data);
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

          $tags = Tags::create([
            'name'=>$request->name,
            'slug'=>str_slug($request->slug),
          ]);
            // return redirect('tags')->with(['success' => 'Kategori Berhasil ditambahkan']);
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
          $tags = Tags::find($request->id);
          $tags->name = $request->name;
          $tags->slug = str_slug($request->slug);
          $tags->save();
         // return redirect('category')->with(['success' => 'Kategori Berhasil di edit']);
        }else {
          return response()->json(['error'=>$validator->errors()->all()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $tags = Tags::find($request->id);
      try {
          $tags->delete();
      } catch (\Exception $e) {

      }

        return redirect('tags')->with(['success' => 'Kategori Berhasil di Hapus']);

    }
}
