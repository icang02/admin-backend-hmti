@extends('layouts.dashboard')

@section('children')
  {{-- Include datatable style & script --}}
  @include('admin.components.tag-datatable')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>{{ $menu }} <small>| HMTI</small></h3>
          @php
            if ($menu == 'Kategori Artikel') {
                $width = '189px';
            }
            if ($menu == 'Data Jabatan') {
                $width = '167px';
            }
            if ($menu === 'Data Angkatan') {
                $width = '184px';
            }
          @endphp
          <div style="width: {{ $width }}; height: 3px; border-radius: 10px; background-color: #2A3F54;"></div>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="d-flex justify-content-end mb-2">
        <a href="#" class="btn btn-primary"><i class="fa fa-plus-square-o mr-1"></i> Tambah Data</a>
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
                <div class="col-sm-7">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Menampilkan seluruh data <code>{{ str()->lower($menu) }}</code>.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered table-sm" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Aksi</th>
                          <th>{{ $headerTable }}</th>
                          @if (request()->is('dashboard/data-angkatan'))
                            <th>Tahun</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kategoriArtikel as $kategori)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <button class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></button>
                              <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                            </td>
                            <td>{{ $kategori->nama }}</td>
                            @if (request()->is('dashboard/data-angkatan'))
                              <td>{{ $kategori->tahun }}</td>
                            @endif
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
