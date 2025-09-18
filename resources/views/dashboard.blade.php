<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">

            {{-- ================== TAMBAHKAN BLOK INI ================== --}}
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- ======================================================== --}}

            <div class="row">
                <div class="col-md-12">
                {{-- ... sisa kode Anda ... --}}
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            
                            @auth
                                {{-- Kode ini hanya akan tampil JIKA ada pengguna yang login --}}
                                <h3 class="font-weight-bold mb-0">Hello, {{ Auth::user()->name }}</h3>
                            @else
                                {{-- Kode ini akan tampil JIKA TIDAK ada yang login (sebagai pengunjung) --}}
                                <h3 class="font-weight-bold mb-0">Hello, Guest</h3>
                            @endauth
                            
                            <p class="mb-0">Your assets at a glance!</p>
                        </div>
                        <a href="{{ route('assets.create') }}" class="btn btn-sm btn-primary d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                            Tambah Aset Baru
                        </a>

                        <button type="button"
                            class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 mb-sm-0 mb-2 me-2">
                            <span class="btn-inner--icon">
                                <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                                    <span class="visually-hidden">New</span>
                                </span>
                            </span>
                            <span class="btn-inner--text">Messages</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                            <span class="btn-inner--icon">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </span>
                            <span class="btn-inner--text">Sync</span>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="row">
                <div class="position-relative overflow-hidden">
                    <div class="swiper mySwiper mt-4 mb-2">
                        <div class="swiper-wrapper">

                            {{-- Mulai perulangan untuk setiap data aset yang dikirim dari controller --}}
                            @foreach ($assets as $asset)
                                <div class="swiper-slide">
                                    <div class="card card-background shadow-none border-radius-xl">

                                        {{-- Ganti gambar statis dengan data dari kolom 'image' --}}
                                        <div class="full-background bg-cover" style="background-image: url('{{ asset('storage/' . $asset->image) }}')"></div>
                                        
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    {{-- Ganti nomor statis dengan data dari kolom 'id_inventory' atau 'id' --}}
                                                    <h4 class="text-dark font-weight-bolder">#{{ $asset->id_inventory }}</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                                    {{-- Ganti nama aset statis dengan data dari kolom 'asset_name' --}}
                                                    <h5 class="text-dark font-weight-bolder">{{ $asset->asset_name }}</h5>
                                                </div>
                                                <div class="col-sm-3 ms-auto mt-auto">
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                                    {{-- Ganti kategori statis dengan data dari kolom 'category' --}}
                                                    <h5 class="text-dark font-weight-bolder">{{ $asset->category }}</h5>
                                                </div>
                                            </div>
                                            
                                            {{-- ================== TOMBOL EDIT & HAPUS DITAMBAHKAN DI SINI ================== --}}
                                            <div class="mt-3">
                                                <a href="{{ route('assets.edit', $asset) }}" class="btn btn-sm btn-info me-2">Edit</a>
                                                <form action="{{ route('assets.destroy', $asset) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus aset ini?')">Hapus</button>
                                                </form>
                                            </div>
                                            {{-- ============================================================================== --}}

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Akhir dari perulangan --}}

                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="row my-4">
                {{-- ... (Sisa kode Anda tetap sama) ... --}}
            </div>
            <x-app.footer />
        </div>
    </main>

</x-app-layout>