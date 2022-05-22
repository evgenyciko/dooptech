@extends('layouts.app-dashboard')
@section('content')

<!-- modal -->
<div id="modalDelete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Hapus Post</h4>
            </div>
            <div class="modal-body">
              <h4>Anda yakin Hapus Secara Permanen?</h4>
                <form role="form" method="POST" action="{{route('kill')}}">
                  @csrf
                    <div class="form-group">
                        <input type="text" id="post-id-delete" class="form-control input-lg" name="id" value="" hidden>
                    </div>
                    <div class="modal-footer">
                        <div>
                          <button type="submit" class="btn btn-danger">Delete</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end modal -->


<div id="modalRestore" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Restore Postingan</h4>
            </div>
            <div class="modal-body">
              <h4>Apakah Anda Yakin ?</h4>
                <form role="form" method="POST" action="{{route('restore')}}">
                  @csrf
                    <div class="form-group">
                        <input type="text" id="post-id-restore" class="form-control input-lg" name="id" value="" hidden>
                    </div>
                    <div class="modal-footer">
                        <div>
                          <button type="submit" class="btn btn-primary">Restore</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="col-md-8 col-sm-12">
  <div class="card">
    <div class="card-header card-header-info d-flex justify-content-between" str>
      <div class="">
        <h4 class="card-title ">Table Postingan</h4>
        <p class="card-category"></p>
      </div>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-info">
            <th>
              Id
            </th>
            <th>
              Judul
            </th>
            <th>
              Kategori
            </th>
            <th>
              Tags
            </th>
            <th>
              Preview Gambar
            </th>
            <th>
              Aksi
            </th>
          </thead>
          <tbody>
              @foreach($post as $data => $hasil)
              <tr>
                <td>
                    {{$data + $post->firstitem()}}
                </td>
                <td>
                  {{$hasil->judul}}
                </td>
                <td>
                  {{$hasil->category['name']}}
                </td>
                <td>
                  <ul>
                    @foreach($hasil->tags as $tag)
                      <li>{{$tag['name']}}</li>
                    @endforeach
                  </ul>
                </td>
                <td>
                  {{$hasil->gambar}}
                </td>
                <td>
                  <a  class="restore btn btn-primary btn-rounded btn-sm" style=" border-radius: 10px; color:white;" data-toggle="modal" data-target="#modalRestore" data-id="{{$hasil->id}}">
                    <span class="material-icons">restore</span>
                  </a>
                  <a class="delete btn btn-danger btn-rounded btn-sm" style=" border-radius: 10px; color:white !important;" data-toggle="modal" data-target="#modalDelete" data-id="{{$hasil->id}}" >
                    <span class="material-icons">delete_forever</span>
                  </a>
                </td>
              </tr>
                @endforeach

          </tbody>
        </table>
        <div class=" d-flex justify-content-center mt-0 pb-3">
            {{ $post->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

$('.delete').on('click', function(){
  var id = $(this).data('id');
  $('#post-id-delete').val(id);
  console.log(id);
});

$('.restore').on('click', function(){
  var id = $(this).data('id');
  $('#post-id-restore').val(id);
  console.log(id);
});


</script>

@endpush
