@extends('layouts.dashboard')

@section('children')
  {{-- Include datatable style & script --}}
  @include('admin.components.tag-datatable')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Artikel <small>| {{ $kategoriArtikel }}</small></h3>
          <div style="width: 79px; height: 3px; border-radius: 10px; background-color: #2A3F54;"></div>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            {{-- <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Telusuri</button>
              </span>
            </div> --}}
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="d-flex justify-content-end mb-2">
        <a href="#" class="btn btn-primary"><i class="fa fa-plus-square-o mr-1"></i> Tambah Artikel</a>
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
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Menampilkan seluruh data artikel dengan kategori <code>{{ $kategoriArtikel }}</code>.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered table-sm" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Aksi</th>
                          <th>Judul</th>
                          <th>Tanggal Post</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($artikel as $art)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <a href="{{ url('dashboard/artikel/' . str()->slug($kategoriArtikel) . '/' . $art->slug) }}"
                                class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></a>
                              <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                            </td>
                            <td>{{ $art->judul }}</td>
                            <td>{{ $art->tanggal }}</td>
                          </tr>
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
