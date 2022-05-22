@extends('layouts.app-dashboard')
@section('content')
@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<div class="col-md-12 col-sm-12">
  <div class="card">
    <div class="card-header card-header-info d-flex justify-content-between">
      <div class="">
        <h4 class="card-title ">Edit Postingan</h4>
        <p class="card-category"></p>
      </div>
    </div>
    <div class="card-body p-5 ">
      <form class="" action="{{ route('update_post',$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="table-responsive">
          <div class="form-group">
             <label>Judul Postingan</label>
             <input type="text" class="form-control form-control" name="judul" value="{{ $post->judul }}">
             @error('judul')
                   <small class="text-danger font-weight-bold">{{ $message }}</small>
             @enderror
           </div>

           <div class="form-group">
              <label>Example select</label>
              <select class="form-control" id="exampleFormControlSelect1" name="kategori_id">
                @foreach($category as $data)
                <option value="{{$data->id}}" <?php if ($post->category->id == $data->id):echo "selected"; ?>

                <?php endif; ?>>
                    {{$data->name}}
                </option>
                @endforeach
              </select>
              @error('kategori_id')
                    <small class="text-danger font-weight-bold">{{ $message }}</small>
              @enderror
            </div>
              <div class="form-group">
                   <div class="form-group">
                     <label for="exampleFormControlTextarea1">Tags</label>
                       <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                       @foreach($tags as $tag)
                       <option value="{{$tag->id}}"
                      @foreach($post->tags as $value)
                      @if($tag->id == $value->id)
                      selected
                      @endif
                      @endforeach
                         >{{ $tag->name }}</option>
                       @endforeach
                       </select>
                    </div>
              </div>
            <div class="form-group">
               <!-- <label for="exampleInputEmail1">Konten</label> -->
               <div class="form-group">
                   <label for="exampleFormControlTextarea1">Konten</label>
                   <textarea class="form-control" id="summernote" rows="8" name="konten" >{!! $post->content !!}</textarea>
                   @error('konten')
                      <small class="text-danger font-weight-bold">{{ $message }}</small>
                   @enderror
                </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="customFile">Pilih foto</label>
              <input type="file" class="form-control" id="gambar" name="gambar" value="{{ old('gambar') }}"/>
              <img src="{{ \URL::to('/storage/gambar')}}/{{$post->gambar}}" id="preview-gambar" width="300" alt="Preview Gambar" class="mt-2"/>
              @error('gambar')
                  <small class="text-danger font-weight-bold">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">
                  submit
              </button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">


$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


function bacaFotoBanner(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#preview-gambar').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#gambar").change(function(){
   bacaFotoBanner(this);
});

</script>
@endpush
