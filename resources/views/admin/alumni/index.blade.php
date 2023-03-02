@extends('layouts.dashboard')

@section('children')
  {{-- Include datatable style & script --}}
  @include('admin.components.tag-datatable')

  @if (session('data'))
    @include('admin.components.alert', session('data'))
  @endif

  {{-- Modal Tambah --}}
  <div class="modal fade" id="mTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
  </div>

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Alumni <small>| HMTI</small></h3>
          <div style="width: 105px; height: 3px; border-radius: 10px; background-color: #2A3F54;"></div>
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
                <div class="col-sm-9">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Menampilkan seluruh data <code>alumni</code>.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered table-sm" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Aksi</th>
                          <th>Foto</th>
                          <th>Angkatan</th>
                          <th>Nama</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($alumni as $alu)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <button data-toggle="modal" data-target="#mEdit{{ $alu->id }}"
                                class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></button>
                              <form action="{{ route('destroy-alumni', $alu->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Hapus data?')" type="submit"
                                  class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                              </form>
                            </td>
                            <td class="text-center">
                              @if ($alu->foto != null)
                                <img src="{{ asset("storage/anggota/$alu->foto") }}" width="90" class="img-thumbnail">
                              @else
                                <img src="{{ asset('img/anggota.png') }}" width="90" class="img-thumbnail">
                              @endif
                            </td>
                            <td>{{ $alu->angkatan->tahun }}</td>
                            <td>{{ $alu->nama }}</td>
                          </tr>

                          <!-- Modal -->
                          <div class="modal fade" id="mEdit{{ $alu->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Anggota</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{ route('update-alumni', $alu->id) }}" method="post"
                                  enctype="multipart/form-data">
                                  @csrf
                                  @method('put')
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="nama">Nama Lengkap</label>
                                      <input value="{{ old('nama', $alu->nama) }}" name="nama" type="text"
                                        class="form-control" id="nama" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="jabatan">Jabatan</label>
                                      <select class="custom-select" name="jabatan_id" required>
                                        <option value="">Pilih ..</option>
                                        @forelse ($allAngkatan as $angkatan)
                                          <option value="{{ $angkatan->id }}"
                                            @if (old('angkatan_id', $alu->angkatan->id) == $angkatan->id) selected @endif>
                                            {{ $angkatan->tahun }}</option>
                                        @empty
                                          <option value="">Belum ada data angkatan</option>
                                        @endforelse
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="jabatan">Foto</label>
                                      <input name="foto" type="file" accept="image/*" class="form-control"
                                        id="foto">
                                      <div class="text-muted mt-1">Upload dengan aspect ratio 1:1. Ukuran foto maksimal
                                        2Mb.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-dismiss="modal">Close</button>
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
