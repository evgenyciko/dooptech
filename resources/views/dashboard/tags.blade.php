@extends('layouts.app-dashboard')
@section('content')
<!-- Modal HTML Markup -->
<div id="ModalTambah" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-xs-center">Add Tags</h4>
      </div>

      <div class="alert alert-danger print-error-msg mb-1" style="display:none">
        <ul></ul>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Tags Name</label>
          <div>
            <input type="text" class="form-control input-lg" name="name" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label">Slug Name</label>
          <div>
            <input type="text" class="form-control input-lg" name="slug">
          </div>
        </div>
        <div class="form-group">
          <div>
            <button id="create-tags" class="btn btn-success btn-block">Add</button>
          </div>
        </div>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<div id="ModalEdit" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-xs-center">Edit Tags</h4>
      </div>

      <div class="alert alert-danger print-error-msg-edit mb-1" style="display:none">
        <ul></ul>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Tags Name</label>
          <div>
            <input type="text" id="tags-id" class="form-control input-lg" name="id" value="" hidden>
            <input type="text" id="tags-name" class="form-control input-lg" name="edit_name" value="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label">Slug Name</label>
          <div>
            <input type="text" id="tags-slug" class="form-control input-lg" name="edit_slug" value="">
          </div>
        </div>
        <div class="form-group">
          <div>
            <button id="update-tags" class="btn btn-success btn-block">Update</button>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="modalDelete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-xs-center">Hapus tags</h4>
      </div>
      <div class="modal-body">
        <h4>Anda yakin ?</h4>
        <form role="form" method="POST" action="{{route('delete_tags')}}">
          @csrf
          <div class="form-group">
            <input type="text" id="tags-id-delete" class="form-control input-lg" name="id" value="" hidden>
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





<div class="col-md-6 col-sm-12 d-flex justify-content-center">
  <div class="card">
    <div class="card-header card-header-info d-flex justify-content-between" str>
      <div class="">
        <h4 class="card-title ">tags Table</h4>
        <p class="card-category"> Tambahkan atau Hapus Kategori</p>
      </div>
      <div class="align-self-center">
        <button type="button" class="btn btn-success btn-rounded btn-sm" data-toggle="modal" data-target="#ModalTambah" style=" border-radius: 10px;">
          <span class="material-icons">add_circle_outline</span>
          tambah</button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-info">
            <th>
              No
            </th>
            <th>
              Nama Kategori
            </th>
            <th>
              Slug
            </th>
            <th>
              Aksi
            </th>
          </thead>
          <tbody>
            @foreach($tags as $data => $hasil)
            <tr>
              <td>
                {{$data + $tags->firstitem()}}
              </td>
              <td>
                {{$hasil->name}}
              </td>
              <td>
                {{$hasil->slug}}
              </td>
              <td>
                <button type="button" class="edit btn btn-warning btn-rounded btn-sm" style=" border-radius: 10px;" data-toggle="modal" data-target="#ModalEdit" data-name="{{$hasil->name}}" data-slug="{{$hasil->slug}}" data-id="{{$hasil->id}}">
                  <span class="material-icons">edit</span>
                </button>
                <button type="button" class="delete btn btn-danger btn-rounded btn-sm" style=" border-radius: 10px;" data-toggle="modal" data-target="#modalDelete" data-id="{{$hasil->id}}">
                  <span class="material-icons">delete</span>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class=" d-flex justify-content-center mt-0 pb-3">
          {{ $tags->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  $(document).ready(function() {


    $('.edit').on('click', function() {
      var id = $(this).data('id');
      var name = $(this).data('name');
      var slug = $(this).data('slug');
      $('#tags-id').val(id);
      $('#tags-name').val(name);
      $('#tags-slug').val(slug);

      $('#update-tags').on('click', function() {
        id = $("input[name='id']").val();
        name = $("input[name='edit_name']").val();
        slug = $("input[name='edit_slug']").val();
        console.log(id);

        $.ajax({
          url: "update_tags",
          type: 'POST',
          data: {
            '_token': '{{csrf_token()}}',
            name: name,
            slug: slug,
            id: id
          },
          success: function(data) {
            if ($.isEmptyObject(data.error)) {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
              setTimeout(function() {
                window.location.assign("{{ route('tags') }}");
              }, 1500);

            } else {
              printErrorMsg(data.error);
            }
          }
        });


        function printErrorMsg(msg) {
          $(".print-error-msg-edit").find("ul").html('');
          $(".print-error-msg-edit").css('display', 'block');
          $.each(msg, function(key, value) {
            $(".print-error-msg-edit").find("ul").append('<li>' + value + '</li>');
          });
        }

      });


    });


    // });





    $('.delete').on('click', function() {
      var id = $(this).data('id');
      $('#tags-id-delete').val(id);
      console.log(id);
    });


    $('#create-tags').on('click', function() {

      var name = $("input[name='name']").val();
      var slug = $("input[name='slug']").val();

      $.ajax({
        url: "create_tags",
        type: 'POST',
        data: {
          '_token': '{{csrf_token()}}',
          name: name,
          slug: slug
        },
        success: function(data) {
          if ($.isEmptyObject(data.error)) {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Your work has been saved',
              showConfirmButton: false,
              timer: 1500
            })
            setTimeout(function() {
              window.location.assign("{{ route('tags') }}");
            }, 1500);

          } else {
            printErrorMsg(data.error);
          }
        }
      });


      function printErrorMsg(msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $.each(msg, function(key, value) {
          $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
        });
      }

    });


  });
</script>

@endpush