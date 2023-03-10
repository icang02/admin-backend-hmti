@php
    $allKategori = App\Models\KategoriArtikel::orderBy('nama')->get();
@endphp

<div class="col-md-3 left_col menu_fixed pb-3">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>HMTI UHO</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('template') }}/images/img.jpg" alt="img.jpg" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin HMTI</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu Utama</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('index-dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="{{ route('halaman-depan') }}"><i class="fa fa-home"></i> Halaman Depan</a></li>

                    {{-- <li><a><i class="fa fa-desktop"></i> Halaman Depan<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#level1_1">Background Slider</a>
              <li><a href="#level1_1">Visi & Misi</a>
              <li><a href="#level1_1">Foto</a>
              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                  </li>
                  <li><a href="#level2_1">Level Two</a>
                  </li>
                  <li><a href="#level2_2">Level Two</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> --}}

                    <li class="{{ request()->is('dashboard/artikel*') ? 'active' : '' }}"><a><i
                                class="fa fa-newspaper-o"></i>
                            Artikel <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" @if (request()->is('dashboard/artikel*')) style="display: block;" @endif>
                            @forelse ($allKategori as $kategori)
                                @if (request()->is('dashboard/artikel*'))
                                    <li class="{{ $kategoriArtikel == $kategori->slug ? 'active current-page' : '' }}">
                                        <a
                                            href="{{ url("/dashboard/artikel/$kategori->slug") }}">{{ $kategori->nama }}</a>
                                    </li>
                                @else
                                    <li><a
                                            href="{{ url("/dashboard/artikel/$kategori->slug") }}">{{ $kategori->nama }}</a>
                                    </li>
                                @endif
                            @empty
                                <li><a href="#">Belum ada kategori</a></li>
                            @endforelse
                        </ul>
                    </li>

                    <li><a><i class="fa fa-sitemap"></i> Struktur Organisasi <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            {{-- <li><a href="{{ url('dashboard/visi-misi') }}">Visi & Misi</a></li> --}}
                            <li><a href="{{ url('dashboard/anggota') }}">Anggota</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-file-text-o"></i> Arsip Surat <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Coming Soon</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('galeri') }}"><i class="fa fa-mortar-board"></i> Gallery</a></li>

                    <li><a href="{{ route('index-alumni') }}"><i class="fa fa-mortar-board"></i> Alumni</a></li>

                    <li><a href="javascript:void(0)"><i class="fa fa-question-circle"></i> Pengaduan</a></li>
                </ul>
            </div>

            <div class="menu_section">
                <h3>Lainnya</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-windows"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('dashboard/kategori-artikel') }}">Kategori Artikel</a></li>
                            <li><a href="{{ url('dashboard/data-jabatan') }}">Data Jabatan</a></li>
                            <li><a href="{{ url('dashboard/data-angkatan') }}">Data Angkatan</a></li>
                        </ul>
                    </li>

                    {{-- <li><a><i class="fa fa-desktop"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#level1_1">Level One</a>
              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                  </li>
                  <li><a href="#level2_1">Level Two</a>
                  </li>
                  <li><a href="#level2_2">Level Two</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> --}}
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a href="{{ url('https://hmti.site') }}" target="_blank" data-toggle="tooltip" data-placement="top"
                title="Ke Website">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
