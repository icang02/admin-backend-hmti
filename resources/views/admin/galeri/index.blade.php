@extends('layouts.dashboard')

@section('children')
    {{-- Include datatable style & script --}}
    @include('admin.components.tag-datatable')
    @if (session()->has('data'))
        @include('admin.components.alert', session('data'))
    @endif

    {{-- Modal Tambah --}}
    <div class="modal fade" id="mTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store-kategori_artikel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input value="{{ old('nama') }}" name="nama" type="text" class="form-control"
                                id="nama" required>
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
                    <h3>Galeri <small>| HMTI</small></h3>
                    <div style="width: 77px; height: 3px; border-radius: 10px; background-color: #2A3F54;">
                    </div>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="d-flex justify-content-end mb-2">
                <button data-toggle="modal" data-target="#mTambah" class="btn btn-primary"><i
                        class="fa fa-plus-square-o mr-1"></i>
                    Tambah Data</button>
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
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <p class="text-muted font-13 m-b-30">
                                            Menampilkan seluruh data <code>galeri</code>.
                                        </p>
                                        <table id="datatable" class="table table-striped table-bordered table-sm"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Aksi</th>
                                                    <th>Gambar</th>
                                                    <th>Judul</th>
                                                    <th>Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $galeri)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <button data-toggle="modal"
                                                                data-target="#mEdit{{ $galeri->id }}"
                                                                class="btn btn-sm btn-secondary"><i
                                                                    class="fa fa-edit"></i></button>
                                                            <form class="d-inline"
                                                                action="{{ route('destroy-kategori_artikel', $galeri->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button onclick="return confirm('Hapus kategori?')"
                                                                    type="submit" class="btn btn-sm btn-danger"><i
                                                                        class="fa fa-trash-o"></i></button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <style>
                                                                img:hover {
                                                                    filter: brightness(70%);
                                                                    transition: .3s;
                                                                    cursor: pointer;
                                                                }
                                                            </style>
                                                            <a href="{{ $galeri->gambar }}" target="_blank">
                                                                <img src="{{ $galeri->gambar }}" width="150"
                                                                    class="img-thumbnail">
                                                            </a>
                                                        </td>
                                                        <td>{{ $galeri->judul }}</td>
                                                        <td>{{ $galeri->deskripsi }}</td>
                                                    </tr>

                                                    {{-- <div class="modal fade" id="mEdit{{ $kategori->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit
                                                                        Kategori</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('update-kategori_artikel', $kategori->id) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="nama">Nama Kategori</label>
                                                                            <input
                                                                                value="{{ old('nama', $kategori->nama) }}"
                                                                                name="nama" type="text"
                                                                                class="form-control" id="nama"
                                                                                required>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div> --}}
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
