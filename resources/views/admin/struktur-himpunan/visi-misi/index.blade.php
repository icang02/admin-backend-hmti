@extends('layouts.dashboard')

@section('children')
  @include('admin.components.tag-ckeditor')
  @push('script')
    <script>
      const btnEdit = document.querySelector('#btnEdit');
      const btnSave = document.querySelector('#btnSave');

      btnEdit.addEventListener('click', function() {
        if (btnSave.hasAttribute('disabled') == true) {
          btnSave.removeAttribute('disabled');
        } else {
          btnSave.setAttribute("disabled", "");
        }
      });

      $(document).ready(function() {
        CKEDITOR.config.readOnly = true;
      });
    </script>
  @endpush

  @if (session()->has('data'))
    @include('admin.components.alert', session('data'))
  @endif

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Visi & Misi | <small>HMTI</small></h3>
          <div style="width: 130px; height: 3px; border-radius: 10px; background-color: #2A3F54;"></div>
        </div>

        <div class="title_right"></div>
      </div>
      <div class="clearfix"></div>

      <form method="post" action="{{ url('dashboard/visi-misi') }}" id="demo-form" data-parsley-validate>
        <div class="row pb-4">
          <div class="col-md-12 ">
            <div class="d-flex justify-content-end">
              <div type="button" id="btnEdit" class="btn shadow btn-app" style="border-radius: 8px; transition: 0.3s;">
                <i class="fa fa-edit"></i> Edit
              </div>
              <button type="submit" id="btnSave" disabled class="btn shadow btn-app"
                style="border-radius: 8px; transition: 0.3s;">
                <i class="fa fa-save"></i> Save
              </button>
            </div>

            <div class="x_panel">
              <div class="x_title">
                <h2>Visi & Misi <small>HMTI</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                @csrf
                <label for="fullname">Kata Sambutan * :</label>
                <div>
                  <textarea disabled name="kata_sambutan" id="editor">{{ old('kata_sambutan', $data[2]->isi) }}</textarea>
                </div>
                @error('kata_sambutan')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                <br />

                <label for="fullname">Visi * :</label>
                <div>
                  <textarea name="visi" id="editor1">{{ old('visi', $data[0]->isi) }}</textarea>
                </div>
                @error('visi')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                <br />

                <label for="fullname">Misi * :</label>
                <div>
                  <textarea name="misi" id="editor2">{{ old('misi', $data[1]->isi) }}</textarea>
                </div>
                @error('misi')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    function previewImage() {
      const imgInput = document.querySelector('#imgInput');
      const imgPreview = document.querySelector('#img-preview');

      const oFReader = new FileReader();
      oFReader.readAsDataURL(imgInput.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection
