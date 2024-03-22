<?php

namespace App\Models;

use CodeIgniter\Model;

class JaminanBPKBModel extends Model
{
    protected $table            = 'jaminan_bpkb';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'nama_pemohon',
        'nama_penjamin',
        'alamat',
        'jenis_barang',
        'merk',
        'tahun',
        'warna',
        'no_mesin',
        'no_rangka',
        'no_polisi',
        'no_stnk',
        'no_bpkb',
        'nama_di_bpkb',
        'kondisi_bodi_kendaraan',
        'kondisi_cat',
        'kondisi_plapon_atap',
        'kondisi_rangka_sasis',
        'kondisi_kaca_spion',
        'kondisi_lampu_depan',
        'kondisi_lampu_belakang',
        'kondisi_lampu_rem',
        'kondisi_lampu_sen',
        'kondisi_ban_depan',
        'kondisi_ban_belakang',
        'kondisi_mesin',
        'kondisi_dalam_mobil',
        'kondisi_jok_dashboard',
        'kondisi_aksesoris_khusus',
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
