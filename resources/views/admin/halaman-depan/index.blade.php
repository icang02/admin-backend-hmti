@extends('layouts.dashboard')

@section('children')
  {{-- Include datatable style & script --}}
  @include('admin.components.tag-datatable')

  @if (session('data'))
    @include('admin.components.alert', session('data'))
  @endif

  {{-- Modal Tambah --}}
  {{-- <div class="modal fade" id="mTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Anggota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('dashboard/alumni') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input value="{{ old('nama') }}" name="nama" type="text" class="form-control" id="nama"
                required>
            </div>

            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select class="custom-select" name="jabatan_id" required>
                <option value="">Pilih ..</option>
                @forelse ($allAngkatan as $angkatan)
                  <option value="{{ $angkatan->id }}" @if (old('angkatan_id') == $angkatan->id) selected @endif>
                    {{ $angkatan->tahun }}</option>
                @empty
                  <option value="">Belum ada data angkatan</option>
                @endforelse
              </select>
            </div>

            <div class="form-group">
              <label for="jabatan">Foto</label>
              <input name="foto" type="file" accept="image/*" class="form-control" id="foto">
              <div class="text-muted mt-1">Upload dengan aspect ratio 1:1. Ukuran foto maksimal
                2Mb.
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div> --}}

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Halaman Depan <small>| HMTI</small></h3>
          <div style="width: 202px; height: 3px; border-radius: 10px; background-color: #2A3F54;"></div>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="d-flex justify-content-end mb-2">
        <button data-toggle="modal" data-target="#mTambah" class="btn btn-primary"><i
            class="fa fa-plus-square-o mr-1"></i> Tambah Data</button>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Table Data</h2>
              <ul class="nav panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Menampilkan data <code>halaman home</code>.
                    </p>
                    <table class="table table-striped table-bordered table-sm" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Aksi</th>
                          <th>Kategori</th>
                          <th>Content</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-nowrap">
                              <button data-toggle="modal" data-target="#mEdit{{ $item->id }}"
                                class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></button>

                              @php
                                $cKategori = $data->where('kategori', 'slider')->count();
                                $cVisi = $data->where('kategori', 'visi')->count();
                                $cMisi = $data->where('kategori', 'misi')->count();
                              @endphp
                              @if (
                                  ($item->kategori == 'slider' && $cKategori > 1) ||
                                      ($item->kategori == 'visi' && $cVisi > 1) ||
                                      ($item->kategori == 'misi' && $cMisi > 1))
                                <form action="{{ route('destroy-alumni', $item->id) }}" method="post" class="d-inline">
                                  @csrf
                                  @method('delete')
                                  <button onclick="return confirm('Hapus data?')" type="submit"
                                    class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                </form>
                              @endif
                            </td>
                            <td>{{ str()->title($item->kategori) }}</td>
                            <td>
                              @if ($item->kategori == 'slider' || $item->kategori == 'foto kahim' || $item->kategori == 'foto wakahim')
                                <style>
                                  img:hover {
                                    filter: brightness(70%);
                                    transition: .3s;
                                    cursor: pointer;
                                  }
                                </style>
                                <a href="{{ request()->root() . "/storage/$item->content" }}" target="_blank">
                                  <img src="{{ asset("storage/$item->content") }}"
                                    width="{{ $item->kategori == 'slider' ? '250' : '150' }}" class="img-thumbnail">
                                </a>
                              @else
                                {{ $item->content }}
                              @endif
                            </td>
                          </tr>

                          <!-- Modal -->
                          <div class="modal fade" id="mEdit{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{ route('update-alumni', $item->id) }}" method="post"
                                  enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                  <div class="modal-body">
                                    <div class="form-group">
                                      @if ($item->kategori == 'slider' || $item->kategori == 'foto kahim' || $item->kategori == 'foto wakahim')
                                        <img src="{{ asset("storage/$item->content") }}"
                                          width="{{ $item->kategori == 'slider' ? '500' : '320' }}"
                                          class="img-fluid d-block mx-auto" style="border-radius: 4px;">
                                        <input type="file" name="content" id="content" class="form-control mt-3">
                                      @else
                                        <textarea name="content" rows="5" type="text" class="form-control" id="content" required>{{ old('content', $item->content) }}</textarea>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
