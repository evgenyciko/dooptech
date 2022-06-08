<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tags;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Post::with('category')->with('tags')->orderBy('created_at','DESC')->paginate(5);
      $data = compact('post');
          return view('dashboard.post',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kategoris = Category::orderBy('created_at','DESC')->get();
        $tags = Tags::orderBy('created_at','DESC')->get();
        $data = compact('kategoris','tags');
        return view ('dashboard.create-post',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



      $messages = [
        'required' => ':attribute harus terisi',
      ];
        $request->validate([
       'judul' =>  ['required'],
       'konten' =>  ['required'],
       'gambar' =>  ['required'],
        ], $messages);

        if ($request->hasfile('gambar')) {
                $file = $request->file('gambar');
                $name_file = $file->getClientOriginalName();
                $filename = time().$name_file;
              Storage::putFileAs('public/gambar',$file, $filename);
          }


          $post = Post::create([
            'judul'=>$request->judul,
            'category_id'=>$request->kategori_id,
            'content'=>$request->konten,
            'gambar'=>$filename,
            'slug'=>str_slug($request->judul),
          ]);
            // return $request->tags;
          $post->tags()->attach($request->tags);

          // return $request;

          return redirect()->action('PostController@index')->with(['success' => 'Postingan Berhasil ditambahkan']);
    }


    public function upload(Request $request)
    {
      if($request->hasFile('upload')) {
        //get filename with extension
        $filenamewithextension = $request->file('upload')->getClientOriginalName();
   
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
   
        //get file extension
        $extension = $request->file('upload')->getClientOriginalExtension();
   
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
   
        //Upload File
        $request->file('upload')->storeAs('public/uploads', $filenametostore);
 
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('storage/uploads/'.$filenametostore); 
        $msg = 'Image successfully uploaded'; 
        $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
          
        // Render HTML output 
        @header('Content-type: text/html; charset=utf-8'); 
        echo $re;
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
        $category = Category::orderBy('created_at','DESC')->get();
        $post = Post::with('category')->with('tags')->where('id',$id)->first();
        $tags = Tags::with('post')->orderBy('created_at','DESC')->get();
        $data = compact('post','category','tags');
        return view('dashboard.edit-post',$data);
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
      $messages = [
        'required' => ':attribute harus terisi',
      ];
        $request->validate([
       'judul' =>  ['required'],
       'konten' =>  ['required'],
        ], $messages);

        $post = Post::find($id);

        if ($request->hasfile('gambar')) {
                $file = $request->file('gambar');
                // $extension = $file->getClientOriginalExtension();
                $name_file = $file->getClientOriginalName();
                 // getting image extension
                $filename = time().$name_file;
              Storage::putFileAs('public/gambar',$file, $filename);
          }else {
            $filename = $post->gambar;
          }


          $post->judul = $request->judul;
          $post->category_id = $request->kategori_id;
          $post->content = $request->konten;
          $post->gambar = $filename;
          $post->slug = str_slug($request->judul);

          $post->tags()->sync($request->tags);

           $post->save();

           return redirect()->action('PostController@index')->with(['success' => 'Postingan Berhasil diedit']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $post = Post::find($request->id);
      try {
          $post->delete();
      } catch (\Exception $e) {
      }
      return redirect('postingan')->with(['success' => 'Postingan Berhasil di Hapus']);
    }

    public function hapus_sementara(){
      $post = Post::with('category')->with('tags')->orderBy('created_at','DESC')->onlyTrashed()->paginate(5);
    $data = compact('post');
        return view('dashboard.hapus_posts',$data);
    }


    public function restore(Request $request){

      $post = Post::withTrashed()->where('id',$request->id)->first();
      $post->restore();

      return redirect('hapus_sementara')->with(['success' => 'Postingan Berhasil di restore']);
}

  public function kill(Request $request){

      $post = Post::withTrashed()->where('id',$request->id)->first();
        $post->forceDelete();

        return redirect('hapus_sementara')->with(['success' => 'Postingan Berhasil di Hapus Permanen']);
  }




    }
