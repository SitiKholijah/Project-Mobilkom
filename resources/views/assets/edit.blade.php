<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <h3>Edit Aset: {{ $asset->asset_name }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{-- Formulir akan mengirim data ke route 'assets.update' --}}
                    <form action="{{ route('assets.update', $asset) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Wajib untuk proses update --}}
                        
                        <div class="mb-3">
                            <label for="asset_name" class="form-label">Nama Aset</label>
                            {{-- Tampilkan data lama di input field --}}
                            <input type="text" class="form-control" id="asset_name" name="asset_name" value="{{ old('asset_name', $asset->asset_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="project_name" class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" value="{{ old('project_name', $asset->project_name) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $asset->category) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_inventory" class="form-label">ID Inventaris</label>
                            <input type="text" class="form-control" id="id_inventory" name="id_inventory" value="{{ old('id_inventory', $asset->id_inventory) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" value="{{ old('serial_number', $asset->serial_number) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Aset</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>