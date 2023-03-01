@extends('layouts.dashboard')

@section('children')
  @include('admin.components.tag-ckeditor')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Edit | <small>Artikel</small></h3>
          <div style="width: 50px; height: 3px; border-radius: 10px; background-color: #2A3F54;"></div>
        </div>

        <div class="title_right"></div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 ">
          <div class="d-flex justify-content-end">
            <a href="{{ url('dashboard/artikel/' . str()->slug($kategoriArtikel)) }}"
              class="btn btn-secondary">Kembali</a>
          </div>

          <div class="x_panel">
            <div class="x_title">
              <h2>Kategori <small>{{ ucwords(str_replace('-', ' ', $kategoriArtikel)) }}</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <!-- start form for validation -->
              <form method="post" action="{{ url("dashboard/artikel/$kategoriArtikel/$artikel->slug") }}" id="demo-form"
                enctype="multipart/form-data" data-parsley-validate>
                @method('put')
                @csrf
                <label for="fullname">Judul * :</label>
                <input value="{{ old('judul', $artikel->judul) }}" type="text" id="fullname" class="form-control"
                  name="judul" />
                @error('judul')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <label for="fullname">Gambar Sampul :</label>
                    <input id="imgInput" onchange="previewImage()" accept="image/*" type="file" id="fullname"
                      class="form-control" name="gambar" />
                    @if ($artikel->gambar != null)
                      <img id="img-preview" src="{{ asset("storage/artikel/$artikel->gambar") }}"
                        class="img-thumbnail mt-2 mb-1" width="200">
                    @else
                      <img id="img-preview" src="{{ asset('img/artikel.jpg') }}" class="img-thumbnail mt-2 mb-1"
                        width="200">
                    @endif
                    <div class="text-muted">Upload gambar dengan rasio 16:9. Ukurang maksimal 2Mb.</div>
                    @error('gambar')
                      <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="fullname">Tanggal Post * :</label>
                    <input value="{{ old('tanggal', $artikel->tanggal) }}" type="date" id="fullname"
                      class="form-control" name="tanggal" />
                    @error('tanggal')
                      <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <br>
                <label for="fullname">Isi Konten * :</label>
                <textarea name="content" id="editor">{{ old('content', $artikel->content) }}</textarea>
                @error('content')
                  <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                <br />
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>

                {{-- <input type="hidden" name="kategori_artikel_id" value="{{ $kategoriArtikelId }}"> --}}
              </form>
              <!-- end form for validations -->

            </div>
          </div>
        </div>
      </div>
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
