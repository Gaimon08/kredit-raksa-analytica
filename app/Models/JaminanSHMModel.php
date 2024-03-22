<?php

namespace App\Models;

use CodeIgniter\Model;

class JaminanSHMModel extends Model
{
    protected $table            = 'jaminan_shm';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'nama_pemohon',
        'nama_penjamin',
        'Surat_Tanah_Nomor',
        'Surat_Tanah_Tanggal',
        'Surat_Tanah_Atas_Nama',
        'Hak_Atas_Tanah_Status',
        'Lokasi_Tanah_Cocok_Tidak',
        'Batas_Tanah_Cocok_Tidak',
        'Luas_Tanah',
        'Lokasi_Tanah_Alamat',
        'Lokasi_Tanah_Jalan',
        'Lokasi_Tanah_Kampung',
        'Lokasi_Tanah_Desa',
        'Lokasi_Tanah_Kecamatan',
        'Lokasi_Tanah_Kabupaten',
        'Lokasi_Tanah_Jarak_Meter',
        'Lokasi_Tanah_Akses_Masuk',
        'Batas_Tanah_Utara',
        'Batas_Tanah_Timur',
        'Batas_Tanah_Selatan',
        'Batas_Tanah_Barat',
        'Bentuk_Tanah',
        'Permukaan_Tanah',
        'Luas_Tanah_Bentuk',
        'Persetujuan_Bangunan_No',
        'Persetujuan_Bangunan_Tanggal',
        'Persetujuan_Bangunan_Atas_Nama',
        'Jumlah_Toko',
        'Luas_Toko',
        'Tahun_Toko',
        'Jumlah_Rumah',
        'Luas_Rumah',
        'Tahun_Rumah',
        'Jumlah_Pabrik',
        'Luas_Pabrik',
        'Tahun_Pabrik',
        'Jumlah_Gudang',
        'Luas_Gudang',
        'Tahun_Gudang',
    ];
    

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    
    
    

}

