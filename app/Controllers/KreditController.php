<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KreditModel;
use App\Models\JaminanSHMModel;
use TCPDF;


class KreditController extends BaseController
{

    public function index()
    {
        $session = session();

        if ($session->has('nama')) {

            $username = $session->get('nama');

            $data['greeting'] = 'Hi, ' . $username;
        } else {

            $data['greeting'] = 'Hi, Guest';
        }
        $DataKredit = new KreditModel;
        $data['listKredit'] = $DataKredit->findAll();
        return view('Kredit/data_kredit', $data);
    }

    public function kredit_add()
    {
        $session = session();

        if ($session->has('nama')) {

            $username = $session->get('nama');

            $data['greeting'] = 'Hi, ' . $username;
        } else {

            $data['greeting'] = 'Hi, Guest';
        }

        return view('Kredit/kredit_add', $data);
    }

    public function kredit_detail($id)
    {
        $session = session();

        if ($session->has('nama')) {
            $username = $session->get('nama');
            $data['greeting'] = 'Hi, ' . $username;
        } else {
            $data['greeting'] = 'Hi, Guest';
        }

        $DataKredit = new KreditModel();
        $data['listKredit'] = $DataKredit->find($id);

        return view('Kredit/detail_kredit', $data);
    }

    public function kredit_post()
    {
        helper(['form']);
        $DataKredit = new KreditModel;
        $datanya = [
            'kantor'                            => $this->request->getPost('kantor'),
            'nama_pemohon'                      => $this->request->getPost('nama_pemohon'),
            'nama_penjamin'                     => $this->request->getPost('nama_penjamin'),
            'alamat'                            => $this->request->getPost('alamat'),
            'pekerjaan_instansi'                => $this->request->getPost('pekerjaan_instansi'),
            'tempat_lahir'                      => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'                     => $this->request->getPost('tanggal_lahir'),
            'status_perkawinan'                 => $this->request->getPost('status_perkawinan'),
            'jumlah_tanggungan'                 => $this->request->getPost('jumlah_tanggungan'),
            'pendidikan_terakhir'               => $this->request->getPost('pendidikan_terakhir'),
            'tahun_lulus'                       => $this->request->getPost('tahun_lulus'),
            'gaji_dan_tunjangan'                => str_replace(['Rp ', '.'], '', $this->request->getPost('gaji_dan_tunjangan')),
            // 'penghasilan_lain'               => $this->request->getPost('penghasilan_lain'),
            'sumber_pendapatan_lain_1'          => $this->request->getPost('sumber_pendapatan_lain_1'),
            'sumber_pendapatan_lain_2'          => $this->request->getPost('sumber_pendapatan_lain_2'),
            'sumber_pendapatan_lain_3'          => $this->request->getPost('sumber_pendapatan_lain_3'),
            'nominal_pendapatan_lain_1'         => str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_pendapatan_lain_1')),
            'nominal_pendapatan_lain_2'         => str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_pendapatan_lain_2')),
            'nominal_pendapatan_lain_3'         => str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_pendapatan_lain_3')),
            'biaya_hidup_perbulan'              => str_replace(['Rp ', '.'], '', $this->request->getPost('biaya_hidup_perbulan')),
            'biaya_pendidikan_anak'             => str_replace(['Rp ', '.'], '', $this->request->getPost('biaya_pendidikan_anak')),
            'biaya_listrik_dan_telp'            => str_replace(['Rp ', '.'], '', $this->request->getPost('biaya_listrik_dan_telp')),
            'biaya_lain'                        => str_replace(['Rp ', '.'], '', $this->request->getPost('biaya_lain')),
            'nama_bank_lain_1'                  => $this->request->getPost('nama_bank_lain_1'),
            'nama_bank_lain_2'                  => $this->request->getPost('nama_bank_lain_2'),
            'nama_bank_lain_3'                  => $this->request->getPost('nama_bank_lain_3'),
            'nominal_angsuran_1'                => str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_angsuran_1')),
            'nominal_angsuran_2'                => str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_angsuran_2')),
            'nominal_angsuran_3'                => str_replace(['Rp ', '.'], '', $this->request->getPost('nominal_angsuran_3')),
            'total_jumlah_pendapatan'           => str_replace(['Rp ', '.', ','], '', $this->request->getPost('total_pendapatan')),
            'total_jumlah_pengeluaran'          => str_replace(['Rp ', '.', ','], '', $this->request->getPost('total_jumlah_pengeluaran')),
            'sisa_pendapatan_perbulan'          => str_replace(['Rp ', '.', ','], '', $this->request->getPost('sisa_pendapatan_perbulan')),
            'lokasi_usaha'                      => $this->request->getPost('lokasi_usaha'),
            'kondisi_lokasi_usaha'              => $this->request->getPost('kondisi_lokasi_usaha'),
            'akses_lokasi'                      => $this->request->getPost('akses_lokasi'),
            'yang_mengunjungi_1'                => $this->request->getPost('yang_mengunjungi_1'),
            'yang_mengunjungi_2'                => $this->request->getPost('yang_mengunjungi_2'),
            'tanggal_kunjungan'                 => $this->request->getPost('tanggal_kunjungan'),
            'jenis_kredit'                      => $this->request->getPost('jenis_kredit'),
            'tujuan_kredit_1'                   => $this->request->getPost('tujuan_kredit_1'),
            'tujuan_kredit_2'                   => $this->request->getPost('tujuan_kredit_2'),
            'nilai_permohonan_kredit'           => str_replace(['Rp ', '.'], '', $this->request->getPost('nilai_permohonan_kredit')),
            'bentuk_kredit'                     => $this->request->getPost('bentuk_kredit'),
            'jangka_waktu'                      => $this->request->getPost('jangka_waktu'),
            'suku_bunga_per_tahun'              => $this->request->getPost('suku_bunga_per_tahun'),
            'angsuran_perbulan'                 => str_replace(['Rp ', '.', ','], '', $this->request->getPost('angsuran_perbulan')),
            'agunan_jenis_jaminan'              => $this->request->getPost('agunan_jenis_jaminan'),
            'agunan_bukti_kepemilikan'          => $this->request->getPost('agunan_bukti_kepemilikan'),
            'agunan_atas_nama'                  => $this->request->getPost('agunan_atas_nama'),
            'agunan_nilai_likuidasi_mencover'   => $this->request->getPost('agunan_nilai_likuidasi_mencover'),
            'harga_pasar'                       => str_replace(['Rp ', '.'], '', $this->request->getPost('harga_pasar')),
            'transaksi_bank'                    => str_replace(['Rp ', '.'], '', $this->request->getPost('transaksi_bank')),
            'harga_likuidasi'                   => str_replace(['Rp ', '.'], '', $this->request->getPost('harga_likuidasi')),
            'hubungan_bpr'                      => $this->request->getPost('hubungan_bpr'),
            'hubungan_pinjaman'                 => $this->request->getPost('hubungan_pinjaman'),
            'hubungan_nilai_pinjaman_terakhir'  => str_replace(['Rp ', '.'], '', $this->request->getPost('hubungan_nilai_pinjaman_terakhir')),
            'hubungan_kolektibilitas'           => $this->request->getPost('hubungan_kolektibilitas'),
            'hubungan_penabung_aktif'           => $this->request->getPost('hubungan_penabung_aktif'),
            'aspek_pertimbangan_positif'        => $this->request->getPost('aspek_pertimbangan_positif'),
            'aspek_pertimbangan_negatif'        => $this->request->getPost('aspek_pertimbangan_negatif'),
            'usulan_plafond_kredit'             => $this->request->getPost('usulan_plafond_kredit'),
            'usulan_bentuk_kredit'              => $this->request->getPost('usulan_bentuk_kredit'),
            'usulan_jangka_waktu_kredit'        => $this->request->getPost('usulan_jangka_waktu_kredit'),
            'usulan_provisi_kredit'             => $this->request->getPost('usulan_provisi_kredit'),
            'usulan_administrasi_kredit'        => $this->request->getPost('usulan_administrasi_kredit'),
            'usulan_asuransi'                   => $this->request->getPost('usulan_asuransi'),
            'usulan_suku_bunga'                 => $this->request->getPost('usulan_suku_bunga'),
            'usulan_syarat_lain_1'              => $this->request->getPost('usulan_syarat_lain_1'),
            'usulan_syarat_lain_2'              => $this->request->getPost('usulan_syarat_lain_2'),
        ];

        $DataKredit->insert($datanya);

        return redirect()->to('/analisa/add');
    }

    public function hapus($id)
	{
		// 1. where id_jenisBarang=1
		$syarat = [
			'id' => $id
		];

		// 2. delete from tbl_jenisBarang
		$this->kredit->where($syarat)->delete();

		// 3. redirect
		return redirect()->to('/analisa/data');
	}

   

    public function nota_analisa_kredit($id)
    {
        // data session
        $session = session();
        $greeting = $username = $session->get('nama');
        // var tanggal hari ini
        $tanggal_hari_ini = date('d-m-Y');
        // get data dari model
        $DataKredit = new KreditModel();
        $kreditData = $DataKredit->find(($id));
        // funct angka terbilang
        function terbilang($x)
        {
            $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

            if (
                $x < 12
            )
                return " " . $angka[$x];
            elseif ($x < 20)
                return terbilang($x - 10) . " belas";
            elseif ($x < 100)
                return terbilang($x / 10) . " puluh" . terbilang($x % 10);
            elseif ($x < 200)
                return "seratus" . terbilang($x - 100);
            elseif ($x < 1000)
                return terbilang($x / 100) . " ratus" . terbilang($x % 100);
            elseif ($x < 2000)
                return "seribu" . terbilang($x - 1000);
            elseif ($x < 1000000)
                return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
            elseif ($x < 1000000000)
                return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
        }



        function terbilangDecimal($x)
        {
            $angka = [
                "", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
            ];

            $integerPart = floor($x);
            $decimalPart = ($x - $integerPart) * 100; // Assuming two decimal places

            $result = "";

            if ($integerPart > 0) {
                $result .= terbilang($integerPart);
            }

            if ($decimalPart > 0) {
                $result .= " Koma " . terbilang($decimalPart);
            }

            $result .= " persen";

            return $result;
        }
        // var hitung sisa pendapatan
        $sisaPendapatan = $kreditData['sisa_pendapatan_perbulan'];
        $angsuranPerbulan = $kreditData['angsuran_perbulan'];

        $sisaPendapatanSetelahKredit = $sisaPendapatan - $angsuranPerbulan;


        function calculateKapasitas($angsuranPerbulan, $sisaPerbulan)
        {
            $kapasitas = $angsuranPerbulan / $sisaPerbulan;
            return $kapasitas;
        }

        $angsuranPerbulan_value = $kreditData['angsuran_perbulan'];
        $sisaPerbulan_value = $kreditData['sisa_pendapatan_perbulan'];

        $kapasitas = calculateKapasitas($angsuranPerbulan_value, $sisaPerbulan_value);

        // Convert $kapasitas to a percentage and round to two decimal places
        $kapasitasPercentage = round($kapasitas * 100, 2);

        if (
            $kapasitasPercentage > 0 && $kapasitasPercentage <= 90
        ) {
            $statusKapasitas = "LAYAK";
        } else {
            $statusKapasitas = "TIDAK LAYAK";
        }




        // Create a new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Haikal Jibran A.');
        $pdf->SetTitle('Laporan kredit Bank Raksa');

        // Set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // Set header and footer fonts
        $pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->SetFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // Set font
        $pdf->SetFont('helvetica', '', 9);

        // Add a page
        $pdf->AddPage();


        // Define your HTML content for the report
        $html = '
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            .bottom-border{
                border-collapse: collapse;
                border-bottom: 1px solid #000;
            }
            .text-center{
                text-align:center;
            }
            .text-end{
                text-align:right;
            }
            .text-start{
                text-align:left;
            }
            .title-header {
                width: 100%;

                padding-bottom: 10px;
            }
            .title-header .title {
                text-align:center;
            }
            table {
                width: 100%;
            }
            .laporan .content {
                width:70%
                border-collapse: collapse;
                border-bottom: 1px solid #000;
            }
            .separator-column {
                text-align:right;
                width: 5%;
            }
            .laporan .label{
                width:25%;
            }
            .sub-title-left{
                width:4%;
            }
            .sub-title-right{
                width:96%;
            }
            .content{
                width:100%; 
            }
            .nilai-col-title{
                width:70%;
            }
            .nilai-col-nominal{
                width:25%;
                border-collapse: collapse;
                border-bottom: 1px solid #000;
                text-align:center;
            }
            .angka-terbilang{
                width:100%; 
                text-align:center;
            }
            .agunan-table th,.agunan-table td{
              border-collapse: collapse;
                border: 1px solid #000;
            }
        </style>
    </head>
    <body>
        <table class="title-header">
            <tr>
            <th class="title" colspan="3"><h4>NOTA ANALISA KREDIT KONSUMTIF / KRETAP</h4></th>
            </tr>
        </table>
            
        <table class="laporan">
            <tr>
            <th class="label">Nama Pemohon</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $kreditData['nama_pemohon'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Nama Penjamin</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $kreditData['nama_penjamin'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Alamat</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $kreditData['alamat'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Pekerjaan/Instansi</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $kreditData['pekerjaan_instansi'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Tanggal Kunjungan</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . date('d-m-Y', strtotime($kreditData['tanggal_kunjungan'])) . '</strong></td>
        </tr>
            <tr>
            <th class="label">Yang Mengunjungi</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' . $kreditData['yang_mengunjungi_1'] . '</strong></td>
        </tr>
            <tr>
            <th class="label"></th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' . $kreditData['yang_mengunjungi_2'] . '</strong></td>
        </tr>
        </table>
            
        <table>
            <tr>
            <td class="sub-title-left" rowspan="3">
            <h4>I.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Pendahuluan</h4>
            </td>
        </tr>
            <tr>
            <td class="content">
        Nota analisa ini dibuat sebagai bahan pertimbangan bagi komite kredit PT. BPR RAKSA WACANA AGRI PURNAMA
            </td>
        </tr>
            <tr>
            <td style="width:30%" class="bottom-border text-center">
        <strong>' . $kreditData['kantor'] . '</strong>
            </td>
            <td style="width:45%" class=" text-center">
        atas permohonan yang diajukan oleh:
            </td>
            <td style="width:20%" class="bottom-border text-center">
        <strong>' . $kreditData['nama_pemohon'] . '</strong>
            </td>
        </tr>
        <tr>
            <td class="sub-title-left" rowspan="8">
            <h4>II.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Permohonan Kredit</h4>
            </td>
            </tr>
            <tr>
            <td class="content">
        a. Tujuan permohonan kredit ini adalah untuk:
            </td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="2">

            </td>
            <td class="content">
        1.  <strong>' . $kreditData['tujuan_kredit_1'] . '</strong>
            </td>
            </tr>
            <tr>
            <td class="content">
        2.  <strong>' . $kreditData['tujuan_kredit_2'] . '</strong>
            </td>
            </tr>
            <tr>
            <td style="width:66%">
        b. Nilai permohonan kredit yang diajukan pemohon sejumlah 
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nilai_permohonan_kredit'], 0, ',', '.') . '</strong>
            </td>
            </tr>
            
        <tr>
            <td class="angka-terbilang"><strong>(' . ucwords(terbilang($kreditData['nilai_permohonan_kredit'])) . ' Rupiah)</strong></td>
        </tr>
        <tr>
              <td class="sub-title-left" rowspan="2">
            </td>
            <td style="width:20%">
            Dalam bentuk kredit
            </td>
            <td class=" bottom-border text-center" style="width:20%">
            <strong>' . $kreditData['bentuk_kredit'] . '</strong>
            </td>
            <td style="width:32%" class="text-center">
            dengan jangka waktu selama
            </td>
            <td class=" bottom-border text-center" style="width:20%">
            <strong>' . $kreditData['jangka_waktu'] . ' Bulan</strong>
            </td>
        </tr>
        <tr>
            <td style="width:25%">
            Suku bunga kredit sebesar
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' . $kreditData['suku_bunga_per_tahun'] . ' %</strong>
            </td>
            <td style="width:40%" class="text-center">
            <strong>(' . terbilangDecimal($kreditData['suku_bunga_per_tahun']) . ')</strong>
            </td>
            <td style="width:15%">
            per tahun.
            </td>
        </tr>
                                  <tr>
            <td class="sub-title-left"rowspan="4" >
            <h4>III.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Latar Belakang Pemohon</h4>
            </td>
            </tr>
             <tr>
            <td style="width:18%">
          Pemohon terlahir di
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' . $kreditData['tempat_lahir'] . ' </strong>
            </td>
            <td style="width:15%" class="text-center">
pada tanggal
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' . date('d-m-Y', strtotime($kreditData['tanggal_lahir'])) . ' </strong>
            </td>
            <td style="width:35%">
; status perkawinan pemohon saat ini
            </td>
               </tr>
     <tr>
            <td style="width:20%" class="bottom-border text-center">
        <strong>' . $kreditData['status_perkawinan'] . '</strong>
            </td>
            <td style="width:35%" class=" text-center">
     dengan jumlah tanggungan sebanyak
            </td>
            <td style="width:10%" class="bottom-border text-center">
        <strong>' . $kreditData['jumlah_tanggungan'] . '</strong>
            </td>
                   <td style="width:20%" >
   orang
            </td>
        </tr>
           <tr>
            <td style="width:35%">
        pendidikan terakhir pemohon adalah
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' . $kreditData['pendidikan_terakhir'] . ' </strong>
            </td>
            <td style="width:15%" class="text-center">
lulus tahun
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' . $kreditData['tahun_lulus'] . ' </strong>
            </td>
               </tr>
                        <tr>
            <td class="sub-title-left" rowspan="3">
            <h4>IV.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Tempat Kerja / Instansi</h4>
            </td>
            </tr>
                  <tr>
            <td style="width:63%">
     Lokasi tempat kerja / instansi terletak di wilayah 
            </td>
            <td  class=" bottom-border text-center" style="width:30%">
         <strong>' . $kreditData['lokasi_usaha'] . ' </strong>
            </td>
            </tr>
   <tr>
            <td style="width:30%" >
  dengan kondisi lokasi tergolong
            </td>
            <td style="width:15%" class="bottom-border text-center">
        <strong>' . $kreditData['kondisi_lokasi_usaha'] . '</strong>
            </td>
                   <td style="width:10%" class="text-center" >
   serta
            </td>
              <td style="width:15%" class="bottom-border text-center">
        <strong>' . $kreditData['akses_lokasi'] . '</strong>
            </td>
                      <td style="width:25%" class=" text-center">
   dilalui sarana transportasi.
            </td>
        </tr>
                            <tr>
            <td class="sub-title-left" rowspan="20">
            <h4>V.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Aspek Keuangan</h4>
            </td>
            </tr>
                 <tr>
            <td class="content">
       Berdasarkan data dan informasi yang diperoleh di perkirakan mengenai kondisi keuangan pemohon sebagai berikut:
            </td>
        </tr>
            <tr>
            <td>
        I. Analisa Pendapatan Per Bulan:
            </td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="3">
            </td>
      
              <td style="width:44%">
       Gaji dan tunjangan lainnya per bulan:
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['gaji_dan_tunjangan'], 0, ',', '.') . '</strong>
            </td>
            </tr>
            <tr>
            <td class="content">
       Pendapatan dari usaha/penghasilan lainnya:
            </td>
            </tr>
    
               <tr>
                    <td class="sub-title-left" rowspan="2">
            </td>
              <td style="width:40%">
    1. <strong>' . $kreditData['sumber_pendapatan_lain_1'] . '</strong>
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nominal_pendapatan_lain_1'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
                    <td class="sub-title-left" rowspan="2">
            </td>
              <td style="width:40%">
    2. <strong>' . $kreditData['sumber_pendapatan_lain_2'] . '</strong>
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nominal_pendapatan_lain_2'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
                    <td class="sub-title-left" rowspan="2">
            </td>
              <td style="width:40%">
    3. <strong>' . $kreditData['sumber_pendapatan_lain_3'] . '</strong>
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nominal_pendapatan_lain_3'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
                    <td class="sub-title-left" >
            </td>
                    <td class="sub-title-left" >
            </td>
              <td style="width:36%">
   Total Jumlah Pendapatan:
            </td>
 <td class="separator-column">Rp.</td>
            <td style="width:40%" class="bottom-border text-end">
        <strong>' .
            number_format($kreditData['total_jumlah_pendapatan'], 0, ',', '.') . '</strong>
            </td>
            </tr>
            <tr>
            <td class="content">
        II. Analisa Kapasitas Pembayaran:
            </td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="5">
            </td>
              <td class="content">
       Berikut biaya-biaya yang dikeluarkan setiap bulan nya, sebagai berikut:
            </td>
            </tr>
    
               <tr>
            
              <td style="width:44%">
    Biaya hidup per bulan
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['biaya_hidup_perbulan'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
           
              <td style="width:44%">
    Biaya pendidikan anak
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['biaya_pendidikan_anak'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
          
              <td style="width:44%">
    Biaya listrik & Telp.
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['biaya_listrik_dan_telp'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
          
              <td style="width:44%">
    Biaya Lain-lain
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['biaya_lain'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
                  <td class="sub-title-left" rowspan="5">
            </td>
              <td class="content">
      Biaya Angsuran Bank Lain nya:
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    1. <strong>' . $kreditData['nama_bank_lain_1'] . '</strong>
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nominal_angsuran_1'], 0, ',', '.') . '</strong>
            </td>
            </tr>
                    <tr>
                    <td class="sub-title-left" >
            </td>
              <td style="width:40%">
    2. <strong>' . $kreditData['nama_bank_lain_2'] . '</strong>
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nominal_angsuran_2'], 0, ',', '.') . '</strong>
            </td>
            </tr>
                    <tr>
                    <td class="sub-title-left" >
            </td>
              <td style="width:40%">
    3. <strong>' . $kreditData['nama_bank_lain_3'] . '</strong>
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['nominal_angsuran_3'], 0, ',', '.') . '</strong>
            </td>
            </tr>
                    <tr>
                    <td class="sub-title-left" >
            </td>
                    <td class="sub-title-left" >
            </td>
              <td style="width:36%">
   Total Jumlah Pengeluaran:
            </td>
 <td class="separator-column">Rp.</td>
            <td style="width:40%" class="bottom-border text-end">
        <strong>' .
            number_format($kreditData['total_jumlah_pengeluaran'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
               <td class="sub-title-left" >
            </td>
            </tr>
               <tr>
             <td class="sub-title-left" >
            </td>
             <td class="sub-title-left" >
            </td>
              <td style="width:44%">
  Sisa pendapatan perbulan
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['sisa_pendapatan_perbulan'], 0, ',', '.') . '</strong>
            </td>
            </tr>
               <tr>
               <td class="sub-title-left" >
            </td>
            </tr>
          <tr>
            <td class="sub-title-left" >
            </td>
            <td style="width:38%">
      Rencana angsuran di BPR 
            </td>
             <td class="separator-column">Rp.</td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' .
            number_format($kreditData['angsuran_perbulan'], 0, ',', '.') . '</strong>
            </td>
            <td style="width:15%" class="text-center">
dengan pinjaman
            </td>
             <td class="separator-column">Rp.</td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' .
            number_format($kreditData['nilai_permohonan_kredit'], 0, ',', '.') . '</strong>
            </td>
               </tr> 
                      <tr>
             <td class="sub-title-left" >
            </td>
              <td style="width:38%">
  Total angsuran
            </td>
 <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
        <strong>' .
            number_format($kreditData['angsuran_perbulan'], 0, ',', '.') . '</strong>
            </td>
            </tr> 
            <tr>
            <td class="sub-title-left" >
            </td>
            <td style="width:38%">
            Sisa pendapatan setelah kredit
            </td>
            <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal">
            <strong>' .
            number_format($sisaPendapatanSetelahKredit, 0, ',', '.') . '</strong>
            </td>
            </tr> 
            <tr>
            <td class="sub-title-left" >
            </td>
              <td style="width:38%">
            Kapasitas pembayaran pemohon tergolong
            </td>
   
            <td class="separator-column">Rp.</td>
            <td class="nilai-col-nominal" style="border-collapse: collapse; border: 1px solid #000;" >
            <strong>' .
            $statusKapasitas . '</strong>
            </td>

            <td style="width:15%; background-color:yellow; border-collapse: collapse; border: 1px solid #000;" class=" text-center">
            <strong>' .
            $kapasitasPercentage . '%</strong>
            </td>
            </tr> 
                  <tr>
            <td class="sub-title-left" rowspan="5">
            <h4>VI.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Aspek Jaminan/Agunan</h4>
            </td>
            </tr>
               <tr>
              <td class="content">
       Jaminan/agunan kredit konsumtif atau kredit pegawai tetap ini berupa dalam bentuk kerja sama kesepakatan antara
            </td>
            </tr>
               <tr>  
              <td style="width:63%">
    pihak PT. BPR Raksa Wacana Agri Purnama dengan instansi
            </td>
            <td class=" bottom-border text-center" style="width:30%">
           <strong>' . $kreditData['pekerjaan_instansi'] . '</strong>
            </td>
            </tr>
             <tr>
            <td style="width:15%">
     dengan nomor
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' .
            number_format($kreditData['angsuran_perbulan'], 0, ',', '.') . '</strong>
            </td>
            <td style="width:15%" class="text-center">
tanggal
            </td>
            <td class=" bottom-border text-center" style="width:15%">
            <strong>' .
            number_format($kreditData['nilai_permohonan_kredit'], 0, ',', '.') . '</strong>
            </td>
               </tr> 
                    <tr>
              <td class="content">
       Bentuk jaminan tambahan yang di ajukan untuk mengcover kewajiban pinjaman pemohon adalah:
            </td>
            </tr>
        </table>
        <table class="agunan-table text-center">
        <tr>
        <th style="width:5%"  rowspan="2">No</th>
        <th style="width:15%" rowspan="2">Jenis Jaminan</th>
        <th style="width:20%" rowspan="2">Bukti Kepemilikan</th>
        <th style="width:45%" >Nilai Jaminan</th>
        <th style="width:15%" rowspan="2">Atas Nama</th>
        </tr>
        <tr>
        <th style="width:15%">Harga Pasar</th>
        <th style="width:15%">Transaksi Bank</th>
        <th style="width:15%">Nilai Likuidasi</th>
        </tr>
      <tr>
        <td style="width:5%" >1</td>
        <td style="width:15%">  <strong>' . $kreditData['agunan_jenis_jaminan'] . '</strong></td>
        <td style="width:20%"> <strong>' . $kreditData['agunan_bukti_kepemilikan'] . '</strong></td>
        <td style="width:15%"> <strong>Rp.' . number_format($kreditData['agunan_harga_pasar'], 0, ',', '.') . '</strong></td>
        <td style="width:15%"> <strong>Rp.' . number_format($kreditData['agunan_transaksi_bank'], 0, ',', '.') . '</strong></td>
        <td style="width:15%"> <strong>Rp.' . number_format($kreditData['agunan_nilai_likuidasi'], 0, ',', '.') . '</strong></td>
        <td style="width:15%"> <strong>' . $kreditData['agunan_atas_nama'] . '</strong></td>
        </tr>
        </table>
        <table class="laporan">
        <tr>
          <td class="sub-title-left" >
            </td>
        </tr>
 <tr> 
   <td class="sub-title-left" >
            </td>
            <td style="width:27%">
     Nilai likuidasi atas nilai agunan 
            </td>
            <td class=" bottom-border text-center" style="width:18%">
          <strong>' . $kreditData['agunan_nilai_likuidasi_mencover'] . '</strong>
            </td>
            <td style="width:55%">
mengcover jumlah permohonan yang dapat di pertimbangkan.
            </td>
               </tr> 

                        <tr>
            <td class="sub-title-left" rowspan="5">
            <h4>VII.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Hubungan Dengan BPR</h4>
            </td>
            </tr>
             <tr> 
            <td style="width:19%">
   Selama ini pemohon
            </td>
            <td class=" bottom-border text-center" style="width:20%">
          <strong>' . $kreditData['hubungan_bpr'] . '</strong>
            </td>
            <td style="width:55%">
memiliki hubungan dengan BPR:
            </td>
               </tr>
             <tr> 
            <td style="width:27%">
  1. Sebagai nasabah peminjam 
            </td>
            <td class=" bottom-border text-center" style="width:20%">
   ' . ($kreditData['hubungan_pinjaman'] > 0 ? '<strong>' . $kreditData['hubungan_pinjaman'] . ' (' . ucwords(terbilang($kreditData['hubungan_pinjaman'])) . ')</strong>' : '') . '
            </td>
            <td style="width:55%">
kali, dengan nilai punjaman terakhir sebesar
            </td>
               </tr>
             <tr> 
                <td class="sub-title-left" >
            </td>
                     <td class="separator-column">Rp.</td>
              <td class=" bottom-border text-center" style="width:45%">
               ' . ($kreditData['hubungan_nilai_pinjaman_terakhir'] > 0 ? '<strong>' . number_format($kreditData['hubungan_nilai_pinjaman_terakhir'], 0, ',', '.') . ' (' . ucwords(terbilang($kreditData['hubungan_nilai_pinjaman_terakhir'])) . ' Rupiah)</strong>' : '') . '
            </td>
            <td style="width:20%" class="text-center">
dengan kolektiblitas
            </td>
          <td class=" bottom-border text-center" style="width:20%">
          <strong>' . $kreditData['hubungan_kolektibilitas'] . '</strong>
            </td>
               </tr>
                <tr> 
            <td style="width:32%">
  2. Sebagai nasabah penabung aktif :
            </td>
            <td class=" bottom-border text-center" style="width:20%">
          <strong>' . $kreditData['hubungan_penabung_aktif'] . '</strong>
            </td>
               </tr>
                              <tr>
            <td class="sub-title-left" rowspan="5">
            <h4>IX.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Aspek Pertimbangan Kredit</h4>
            </td>
            </tr>
              <tr> 
            <td style="width:32%">
  1. Aspek Positif :
            </td>
               </tr>
              <tr> 
            <td class=" content">
          <strong>' . $kreditData['aspek_pertimbangan_positif'] . '</strong>
            </td>
               </tr>
              <tr> 
              <td class="sub-title-left">
            </td>
               </tr>
              <tr> 
            <td style="width:32%">
  2. Aspek Negatif :
            </td>
               </tr>
               <tr> 
                 <td class="sub-title-left">
            </td>
            <td class=" content">
          <strong>' . $kreditData['aspek_pertimbangan_negatif'] . '</strong>
            </td>
               </tr>
         
               <tr>
            <td class="sub-title-left" rowspan="12">
            <h4>VII.</h4>
            </td>
            <td class="sub-title-right">
            <h4>Usulan Kredit</h4>
            </td>
            </tr>
               <tr>
              <td style="width:100%">
     Dari analisa tersebut diatas, bersama ini disampaikan usulan kredit yang dapat dipertimbangkan oleh komite kredit 
            </td>
               </tr>
               <tr>
              <td style="width:100%">
    dengan rincian sebagai berikut:
            </td>
               </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    1. Plafond Kredit
            </td>
<td class="separator-column">:</td>
            <td class="nilai-col-nominal text-start">
       <strong>Rp.</strong>
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    2. Bentuk Kredit
            </td>
 <td class="separator-column">:</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    3. Jangka Waktu Kredit
            </td>
 <td class="separator-column">:</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    4. Provisi Kredit
            </td>
 <td class="separator-column">:</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    5. Administrasi Kredit
            </td>
 <td class="separator-column">:</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    6. ASURANSI
            </td>
<td class="separator-column">:</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%">
    7. Suku Bunga Kredit
            </td>
<td class="separator-column">:</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>
              <td style="width:40%" rowspan="2">
    8. Syarat-syarat lain:
            </td>
 <td class="separator-column">a.</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                <tr>
                    <td class="sub-title-left">
            </td>

 <td class="separator-column">b.</td>
            <td class="nilai-col-nominal">
       
            </td>
            </tr>
                
         </table>
         <table class="laporan">
                <tr>
            <td class="sub-title-left">
        </td>
            </tr>
                 <tr>
              <td style="width:100%">
      Demikian nota analisa kredit ini dibuat dan disampaikan untuk dapat menjadi bahan pertimbangan bagi pihak komite 
            </td>
               </tr>
                  <tr>
              <td style="width:100%">
     kredit PT.BPR Raksa Wacana Agri Purnama.
            </td>
            </tr>
                  <tr style="text-align:right">
              <td>
   Kuningan, ' . $tanggal_hari_ini . '
            </td>
             </tr>
                  <tr>
              <td style="width:50%">
  Mengetahui,
            </td>
              <td style="width:50%">
  Dibuat oleh,
            </td>
             </tr>
                  <tr>
              <td style="width:50%">
  Kabag Marketing
            </td>
              <td style="width:50%">
  Analis Kredit
            </td>
             </tr>
                  <tr>
<td></td>
             </tr>
                  <tr>
<td></td>
             </tr>
                  <tr>
<td></td>
             </tr>
                  <tr>
<td></td>
             </tr>
                
            
          
           <tr>
              <td style="width:50%">
  <strong>Suyat</strong>
            </td>
              <td style="width:50%">
  <strong>' . $greeting . '</strong>
            </td>
             </tr>
              

        </table>
            
        ';

        $html .= '
        </body>
        </html>';

        // Move the pointer to the last pag
        $pdf->lastPage();

        // Output the HTML content to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-analisa-kredit.pdf', 'I');
    }
    }


 