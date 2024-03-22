<?php

namespace App\Models;

use CodeIgniter\Model;

class KreditModel extends Model
{
    protected $table            = 'analisa_kredit_rwap';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'kantor',
        'nama_pemohon',
        'nama_penjamin',
        'alamat',
        'pekerjaan_instansi',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'jumlah_tanggungan',
        'pendidikan_terakhir',
        'tahun_lulus',
        'gaji_dan_tunjangan',
        'penghasilan_lain',
        'sumber_pendapatan_lain_1',
        'sumber_pendapatan_lain_2',
        'sumber_pendapatan_lain_3',
        'nominal_pendapatan_lain_1',
        'nominal_pendapatan_lain_2',
        'nominal_pendapatan_lain_3',
        'biaya_hidup_perbulan',
        'biaya_pendidikan_anak',
        'biaya_listrik_dan_telp',
        'biaya_lain',
        'nama_bank_lain_1',
        'nama_bank_lain_2',
        'nama_bank_lain_3',
        'nominal_angsuran_1',
        'nominal_angsuran_2',
        'nominal_angsuran_3',
        'total_jumlah_pendapatan',
        'total_jumlah_pengeluaran',
        'sisa_pendapatan_perbulan',
        'lokasi_usaha',
        'kondisi_lokasi_usaha',
        'akses_lokasi',
        'yang_mengunjungi_1',
        'yang_mengunjungi_2',
        'tanggal_kunjungan',
        'tujuan_kredit_1',
        'tujuan_kredit_2',
        'nilai_permohonan_kredit',
        'bentuk_kredit',
        'jangka_waktu',
        'suku_bunga_per_tahun',
        'angsuran_perbulan',
        'agunan_jenis_jaminan',
        'agunan_bukti_kepemilikan',
        'agunan_harga_pasar',
        'agunan_transaksi_bank',
        'agunan_nilai_likuidasi',
        'agunan_atas_nama',
        'agunan_nilai_likuidasi_mencover',
        'hubungan_bpr',
        'hubungan_pinjaman',
        'hubungan_nilai_pinjaman_terakhir',
        'hubungan_kolektibilitas',
        'hubungan_penabung_aktif',
        'aspek_pertimbangan_positif',
        'aspek_pertimbangan_negatif',
        'usulan_plafond_kredit',
        'usulan_bentuk_kredit',
        'usulan_jangka_waktu_kredit',
        'usulan_provisi_kredit',
        'usulan_administrasi_kredit',
        'usulan_asuransi',
        'usulan_suku_bunga',
        'usulan_syarat_lain_1',
        'usulan_syarat_lain_2'
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
