<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TesModel;
use App\Models\KreditModel;
use TCPDF;

class Tes extends BaseController
{
  public function index()
  {
    return view('laporan');
  }
}
//   public function index(($id))
//   {

//     $tanggal_hari_ini = date('Y-m-d');
//     $DataKredit = new KreditModel();
//     $kreditData = $DataKredit->find(($id));

//     // Create a new PDF document
//     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//     // Set document information
//     $pdf->SetCreator(PDF_CREATOR);
//     $pdf->SetAuthor('Haikal Jibran A.');
//     $pdf->SetTitle('Laporan kredit Bank Raksa');
//     $pdf->SetSubject('TCPDF Tutorial');
//     $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

//     // Set default header data
//     $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

//     // Set header and footer fonts
//     $pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//     $pdf->SetFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//     // Set default monospaced font
//     $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//     // Set margins
//     $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//     $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//     $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//     // Set auto page breaks
//     $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

//     // Set image scale factor
//     $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//     // Set some language-dependent strings (optional)
//     if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
//       require_once(dirname(__FILE__) . '/lang/eng.php');
//       $pdf->setLanguageArray($l);
//     }

//     // Set font
//     $pdf->SetFont('helvetica', '', 12);

//     // Add a page
//     $pdf->AddPage();

//     // Define your HTML content for the report
//     $html = '
// <!DOCTYPE html>
// <html>
// <head>
//     <style>
//        .title-header {
//         width: 100%;
//         border-collapse: collapse;
//         border: 1px solid #243783;
//         padding-bottom: 10px;
//     }
//        .title-header .title {
//        text-align:center;

//     }
//    .laporan {
//         width: 100%;
//         border-collapse: collapse;
//         border: 1px solid #243783;
//     }
//      .laporan .content {
//    width:70%
//     }
//     .separator-column {
//         text-align:right;
//         width: 5%;
//     }
//     .laporan .label{
//         width:25%;
    
//     </style>
// </head>
// <body>
//   <table class="title-header">
//      <tr>
//     <th class="title" colspan="3"><h4>NOTA ANALISA KREDIT KONSUMTIF / KRETAP</h4></th>
//     </tr>
// </table>

// <table class="laporan">
//     <tr>
//     <th class="label"><h5>Nama Pemohon</h5></th>
//     <td class="separator-column">:</td>
//     <td  class="content"><h5>' . $kreditData['nama_pemohon'] . '</h5></td>
// </tr>
//     <tr>
//     <th class="label"><h5>Nama Pemohon</h5></th>
//     <td class="separator-column">:</td>
//     <td  class="content"><h5>Nama Pemohon </h5></td>
// </tr>
//     <tr>
//     <th class="label"><h5>Nama Pemohon</h5></th>
//     <td class="separator-column">:</td>
//     <td  class="content"><h5>Nama Pemohon </h5></td>
// </tr>
//     <tr>
//     <th class="label"><h5>Nama Pemohon</h5></th>
//     <td class="separator-column">:</td>
//     <td  class="content"><h5>Nama Pemohon </h5></td>
// </tr>
//     <tr>
//     <th class="label"><h5>Nama Pemohon</h5></th>
//     <td class="separator-column">:</td>
//     <td  class="content"><h5>Nama Pemohon </h5></td>
// </tr>
//     <tr>
//     <th class="label"><h5>Nama Pemohon</h5></th>
//     <td class="separator-column">:</td>
//     <td  class="content"><h5>Nama Pemohon </h5></td>
// </tr>
// </table>

//    ';

//     $html .= '
// </body>
// </html>';

//     // Move the pointer to the last pag
//     $pdf->lastPage();

//     // Output the HTML content to the PDF
//     $pdf->writeHTML($html, true, false, true, false, '');

//     $this->response->setContentType('application/pdf');
//     $pdf->Output('detail-laporan.pdf', 'I');
//   }
// }

//     public function tes_add(){
//         $validationRules = [
//             'nama' => 'required',
//             'alamat' => 'required'
//         ];

//         // Load library form validation 
//         $validation = \Config\Services::validation();
//         $validation->setRules($validationRules);

//         if (!$validation->withRequest($this->request)->run()) {
//             // If validation fails, return to the add page with error messages
//             return view('tes_view');
//         } else {
//             $tanggalDaftar = date('Y-m-d');

//             $data = [
//                 'nama' => $this->request->getPost('nama'),
//                 'alamat' => $this->request->getPost('alamat'),

//                 'tgl_daftar' => $tanggalDaftar,
//             ];

//             // Load the model (replace 'YourModel' with your actual model name)
//             $TesModel = new \App\Models\TesModel();

//             // Call the method in your model to save data
//             $result = $TesModel->simpanTes($data);

//             if ($result) {
//                 // If successfully saved, redirect with success message
//                echo'sukses';
//             } else {
//                 // If failed, redirect with error message
//                echo'eror';
//             }
//         }
//     } 
// }

// $datanya = [
//     'nama_pemohon' => $this->request->getPost('nama_pemohon'),
//     'nama_penjamin' => $this->request->getPost('nama_penjamin'),
//     'alamat' => $this->request->getPost('alamat'),
//     'pekerjaan_instansi' => $this->request->getPost('pekerjaan_instansi'),
//     'tempat_lahir' => $this->request->getPost('tempat_lahir'),
//     'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
//     'status_perkawinan' => $this->request->getPost('status_perkawinan'),
//     'jumlah_tanggungan' => $this->request->getPost('jumlah_tanggungan'),
//     'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
//     'tahun_lulus' => $this->request->getPost('tahun_lulus'),
//     'gaji_dan_tunjangan' => $this->request->getPost('gaji_dan_tunjangan'),
//     'penghasilan_lain' => $this->request->getPost('penghasilan_lain'),
//     'sumber_pendapatan_lain_1' => $this->request->getPost('sumber_pendapatan_lain_1'),
//     'sumber_pendapatan_lain_2' => $this->request->getPost('sumber_pendapatan_lain_2'),
//     'sumber_pendapatan_lain_3' => $this->request->getPost('sumber_pendapatan_lain_3'),
//     'nominal_pendapatan_lain_1' => $this->request->getPost('nominal_pendapatan_lain_1'),
//     'nominal_pendapatan_lain_2' => $this->request->getPost('nominal_pendapatan_lain_2'),
//     'nominal_pendapatan_lain_3' => $this->request->getPost('nominal_pendapatan_lain_3'),
//     'biaya_hidup_perbulan' => $this->request->getPost('biaya_hidup_perbulan'),
//     'biaya_pendidikan_anak' => $this->request->getPost('biaya_pendidikan_anak'),
//     'biaya_listrik_dan_telp' => $this->request->getPost('biaya_listrik_dan_telp'),
//     'biaya_lain' => $this->request->getPost('biaya_lain'),
//     'nama_bank_lain_1' => $this->request->getPost('nama_bank_lain_1'),
//     'nama_bank_lain_2' => $this->request->getPost('nama_bank_lain_2'),
//     'nama_bank_lain_3' => $this->request->getPost('nama_bank_lain_3'),
//     'nominal_angsuran_1' => $this->request->getPost('nominal_angsuran_1'),
//     'nominal_angsuran_2' => $this->request->getPost('nominal_angsuran_2'),
//     'nominal_angsuran_3' => $this->request->getPost('nominal_angsuran_3'),
//     'total_jumlah_pengeluaran' => $this->request->getPost('total_jumlah_pengeluaran'),
//     'sisa_pendapatan_perbulan' => $this->request->getPost('sisa_pendapatan_perbulan'),
//     'lokasi_usaha' => $this->request->getPost('lokasi_usaha'),
//     'kondisi_lokasi_usaha' => $this->request->getPost('kondisi_lokasi_usaha'),
//     'akses_lokasi' => $this->request->getPost('akses_lokasi'),
//     'yang_mengunjungi_1' => $this->request->getPost('yang_mengunjungi_1'),
//     'yang_mengunjungi_2' => $this->request->getPost('yang_mengunjungi_2'),
//     'tanggal_kunjungan' => $this->request->getPost('tanggal_kunjungan'),
//     'tujuan_kredit' => $this->request->getPost('tujuan_kredit'),
//     'nilai_permohonan_kredit' => $this->request->getPost('nilai_permohonan_kredit'),
//     'bentuk_kredit' => $this->request->getPost('bentuk_kredit'),
//     'jangka_waktu' => $this->request->getPost('jangka_waktu'),
//     'suku_bunga_per_tahun' => $this->request->getPost('suku_bunga_per_tahun'),
//     'angsuran_perbulan' => $this->request->getPost('angsuran_perbulan'),
//     'agunan_jenis_jaminan' => $this->request->getPost('agunan_jenis_jaminan'),
//     'agunan_bukti_kepemilikan' => $this->request->getPost('agunan_bukti_kepemilikan'),
//     'agunan_harga_pasar' => $this->request->getPost('agunan_harga_pasar'),
//     'agunan_transaksi_bank' => $this->request->getPost('agunan_transaksi_bank'),
//     'agunan_nilai_likuidasi' => $this->request->getPost('agunan_nilai_likuidasi'),
//     'agunan_atas_nama' => $this->request->getPost('agunan_atas_nama'),
//     'agunan_nilai_likuidasi_mencover' => $this->request->getPost('agunan_nilai_likuidasi_mencover'),
//     'hubungan_bpr' => $this->request->getPost('hubungan_bpr'),
//     'hubungan_pinjaman' => $this->request->getPost('hubungan_pinjaman'),
//     'hubungan_nilai_pinjaman_terakhir' => $this->request->getPost('hubungan_nilai_pinjaman_terakhir'),
//     'hubungan_kolektibilitas' => $this->request->getPost('hubungan_kolektibilitas'),
//     'hubungan_penabung_aktif' => $this->request->getPost('hubungan_penabung_aktif'),
//     'aspek_pertimbangan_positif' => $this->request->getPost('aspek_pertimbangan_positif'),
//     'aspek_pertimbangan_negatif' => $this->request->getPost('aspek_pertimbangan_negatif'),
//     'usulan_plafond_kredit' => $this->request->getPost('usulan_plafond_kredit'),
//     'usulan_bentuk_kredit' => $this->request->getPost('usulan_bentuk_kredit'),
//     'usulan_jangka_waktu_kredit' => $this->request->getPost('usulan_jangka_waktu_kredit'),
//     'usulan_provisi_kredit' => $this->request->getPost('usulan_provisi_kredit'),
//     'usulan_administrasi_kredit' => $this->request->getPost('usulan_administrasi_kredit'),
//     'usulan_asuransi' => $this->request->getPost('usulan_asuransi'),
//     'usulan_suku_bunga' => $this->request->getPost('usulan_suku_bunga'),
//     'usulan_syarat_lain_1' => $this->request->getPost('usulan_syarat_lain_1'),
//     'usulan_syarat_lain_2' => $this->request->getPost('usulan_syarat_lain_2'),
// ];
