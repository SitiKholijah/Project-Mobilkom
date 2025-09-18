<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset; // <-- 1. Import model Asset

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. Kosongkan tabel assets terlebih dahulu
        Asset::truncate();

        // 3. Buat beberapa data aset contoh
        Asset::create([
            'asset_name' => 'RTX 3080 GPU',
            'project_name' => 'Project X',
            'category' => 'Graphics Card',
            'status' => 'Active',
            'id_inventory' => 'INV-2025-001',
            'serial_number' => 'SN-123456789',
            'image' => 'images/gpu.png', // path gambar contoh
            'company' => 'Nvidia Corp'
        ]);

        Asset::create([
            'asset_name' => 'Dell XPS 15',
            'project_name' => 'Project Y',
            'category' => 'Laptop',
            'status' => 'Maintenance',
            'id_inventory' => 'INV-2025-002',
            'serial_number' => 'SN-987654321',
            'image' => 'images/laptop.png', // path gambar contoh
            'company' => 'Dell Inc.'
        ]);

        Asset::create([
            'asset_name' => 'Server Rack A1',
            'project_name' => 'Project Z',
            'category' => 'Infrastructure',
            'status' => 'Retired',
            'id_inventory' => 'INV-2025-003',
            'serial_number' => 'SN-A1B2C3D4E5',
            'image' => 'images/server.png', // path gambar contoh
            'company' => 'Data Center ID'
        ]);
    }
}