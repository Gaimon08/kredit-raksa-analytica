<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JaminanSHMModel;
use App\Models\MPengajuan;
use TCPDF;
class JaminanSHM extends BaseController
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

        $data['listSHM'] = $this->shm->findAll();

       return view('Jaminan/data_SHM',$data);
    }

    public function JaminanSHM_add()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('login');
            exit;
        }
    
        $session = session();
    
        if ($session->has('nama')) {
            $username = $session->get('nama');
            $greeting = 'Hi, ' . $username;
        } else {
            $greeting = 'Hi, Guest';
        }
    
        $data = [
            'judulHalaman' => 'Your Page Title',
            'introTeks' => 'Your Intro Text',
            'listKredit'=> $this->kredit->findAll(),
            'greeting' => $greeting, // Masukkan greeting ke dalam array
        ];
    
        return view('Jaminan/SHM_Add', $data);
    }
    

    public function JaminanSHM_post()
    {
        helper(['form']);

        $jaminanSHMModel = new JaminanSHMModel(); 

        $data = [
            'nama_pemohon' => $this->request->getPost('nama_pemohon'),
            '' => $this->request->getPost(''),
            'Surat_Tanah_Nomor' => $this->request->getPost('Surat_Tanah_Nomor'),
            'Surat_Tanah_Tanggal' => $this->request->getPost('Surat_Tanah_Tanggal'),
            'Surat_Tanah_Atas_Nama' => $this->request->getPost('Surat_Tanah_Atas_Nama'),
            'Hak_Atas_Tanah_Status' => $this->request->getPost('Hak_Atas_Tanah_Status'),
            'Lokasi_Tanah_Cocok_Tidak' => $this->request->getPost('Lokasi_Tanah_Cocok_Tidak'),
            'Batas_Tanah_Cocok_Tidak' => $this->request->getPost('Batas_Tanah_Cocok_Tidak'),
            'Luas_Tanah' => $this->request->getPost('Luas_Tanah'),
            'Lokasi_Tanah_Jalan' => $this->request->getPost('Lokasi_Tanah_Jalan'),
            'Lokasi_Tanah_Kampung' => $this->request->getPost('Lokasi_Tanah_Kampung'),
            'Lokasi_Tanah_Desa' => $this->request->getPost('Lokasi_Tanah_Desa'),
            'Lokasi_Tanah_Kecamatan' => $this->request->getPost('Lokasi_Tanah_Kecamatan'),
            'Lokasi_Tanah_Kabupaten' => $this->request->getPost('Lokasi_Tanah_Kabupaten'),
            'Lokasi_Tanah_Jarak_Meter' => $this->request->getPost('Lokasi_Tanah_Jarak_Meter'),
            'Lokasi_Tanah_Akses_Masuk' => $this->request->getPost('Lokasi_Tanah_Akses_Masuk'),
            'Batas_Tanah_Utara' => $this->request->getPost('Batas_Tanah_Utara'),
            'Batas_Tanah_Timur' => $this->request->getPost('Batas_Tanah_Timur'),
            'Batas_Tanah_Selatan' => $this->request->getPost('Batas_Tanah_Selatan'),
            'Batas_Tanah_Barat' => $this->request->getPost('Batas_Tanah_Barat'),
            'Bentuk_Tanah' => $this->request->getPost('Bentuk_Tanah'),
            'Permukaan_Tanah' => $this->request->getPost('Permukaan_Tanah'),
            'Luas_Tanah_Bentuk' => $this->request->getPost('Luas_Tanah_Bentuk'),
            'Persetujuan_Bangunan_No' => $this->request->getPost('Persetujuan_Bangunan_No'),
            'Persetujuan_Bangunan_Tanggal' => $this->request->getPost('Persetujuan_Bangunan_Tanggal'),
            'Persetujuan_Bangunan_Atas_Nama' => $this->request->getPost('Persetujuan_Bangunan_Atas_Nama'),
            'Jumlah_Toko' => $this->request->getPost('Jumlah_Toko'),
            'Luas_Toko' => $this->request->getPost('Luas_Toko'),
            'Tahun_Toko' => $this->request->getPost('Tahun_Toko'),
            'Jumlah_Rumah' => $this->request->getPost('Jumlah_Rumah'),
            'Luas_Rumah' => $this->request->getPost('Luas_Rumah'),
            'Tahun_Rumah' => $this->request->getPost('Tahun_Rumah'),
            'Jumlah_Pabrik' => $this->request->getPost('Jumlah_Pabrik'),
            'Luas_Pabrik' => $this->request->getPost('Luas_Pabrik'),
            'Tahun_Pabrik' => $this->request->getPost('Tahun_Pabrik'),
            'Jumlah_Gudang' => $this->request->getPost('Jumlah_Gudang'),
            'Luas_Gudang' => $this->request->getPost('Luas_Gudang'),
            'Tahun_Gudang' => $this->request->getPost('Tahun_Gudang'),
        ];

        $jaminanSHMModel->insert($data);

        return redirect()->to('/jaminanSHM/add');
    }

    public function hapus($id)
	{
		// 1. where id_jenisBarang=1
		$syarat = [
			'id' => $id
		];

		// 2. delete from tbl_jenisBarang
		$this->shm->where($syarat)->delete();

		// 3. redirect
		return redirect()->to('/jaminanSHM/data');
	}

    public function jaminan_tanah_dan_bangunan($id)
    {

        // data session
        $session = session();
        $greeting = $username = $session->get('nama');

        $DataSHM = new JaminanSHMModel();
        $shmData = $DataSHM->find(($id));

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
                    width:65%
                    border-collapse: collapse;
                    border-bottom: 1px solid #000;
                }
                .separator-column {
                    text-align:right;
                    width: 5%;
                }
                .laporan .label{
                    width:17%;
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
                <th class="title" colspan="3"><h4>HASIL PEMERIKSAAN JAMINAN TANAH & BANGUNAN</h4></th>
                </tr>
            </table>
                
            <table class="laporan">
                <tr>
                <th class="label">Nama Pemohon</th>
                <td class="separator-column">:</td>
                <td  class="content"><strong>' . $shmData['nama_pemohon'] . '</strong></td>
            </tr>
                <tr>
                <th class="label">Nama Penjamin</th>
                <td class="separator-column">:</td>
                <td  class="content"><strong>' . $shmData['nama_penjamin'] . '</strong></td>
            </tr>
            </table>
                
            <table class="laporan">
                <tr>
                <td class="sub-title-left" rowspan="15">
                <h4>I.</h4>
                </td>
                <td class="sub-title-right">
                <h4>DATA TANAH BERDASARKAN SURAT TANAH</h4>
                </td>
            </tr>
            <tr>
            <td style="width:100%">
            1.1  SURAT TANAH DAN HAK ATAS TANAH
            </td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="2">
            </td>
            <td class="label">
        a. BPKB MOTOR
            </td>
            </tr>
            <tr>
            <td class="sub-title-left" rowspan="2">
            </td>
            <td class="label">
         Nomor
            </td>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $shmData['Surat_Tanah_Nomor'] . '</strong></td>
            </tr>
            <tr>
            <td class="sub-title-left" rowspan="2">
            </td>
            <td class="label">
        Tanggal
            </td>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $shmData['Surat_Tanah_Tanggal'] . '</strong></td>
            </tr>
            <tr>
            <td class="sub-title-left" rowspan="1">
            </td>
            <td class="label">
        Atas Nama
            </td>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $shmData['Surat_Tanah_Atas_Nama'] . '</strong></td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="2">
            </td>
            <td class="label">
        b. Hak Atas Tanah
            </td>
            </tr>
            <tr>
            <td class="sub-title-left" rowspan="2">
            </td>
            <td class="label">
        Status Hak
            </td>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' . $shmData['Hak_Atas_Tanah_Status'] . '</strong></td>
            </tr>

            <tr>
            <td style="width:100%"> 
            1.1  SURAT TANAH DAN HAK ATAS TANAH
            </td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="2">
            </td>
            <td style="width:70%">
        a.          Nama Kampung/ Dusun /Jalan, Desa, Kecamatan, Kabupaten adalah

            </td>
            <td  style="width:20%" class="bottom-border text-center"><strong>' . $shmData['Lokasi_Tanah_Cocok_Tidak'] . '</strong></td>
            </tr>
            <tr>
            <td class="sub-title-left" rowspan="1">
            </td>
            <td style="width:100%">
            dengan pemeriksaan dilapangan.
            </td>
            </tr>
            <tr>
                  <td class="sub-title-left" rowspan="2">
            </td>
            <td style="width:70%">
        a.          Batas-batas tanah yang tertera di dalam surat-surat tanah adalah

            </td>
            <td  style="width:20%" class="bottom-border text-center"><strong>' . $shmData['Batas_Tanah_Cocok_Tidak'] . '</strong></td>
            </tr>
            <tr>
            <td class="sub-title-left" rowspan="2">
            </td>
            <td style="width:100%">
            dengan pemeriksaan dilapangan.
            </td>
            </tr>
     
        <tr>
        <td style="width:100%">
        1.3  UKURAN TANAH   
        </td>
        </tr>
        <tr>
        <td class="sub-title-left" rowspan="1">
        </td>
        <td class="label">
    Luas Tanah
        </td>
        <td class="separator-column">:</td>
        <td  class="content"><strong>' . $shmData['Luas_Tanah'] . '</strong></td>
        </tr>
   
        <tr>
        <td class="sub-title-left" rowspan="19">
        <h4>II.</h4>
        </td>
        <td class="sub-title-right">
        <h4>SITUASI DI LAPANGAN</h4>
        </td>
    </tr>
    <tr>
    <td style="width:100%">
    2.1  LOKASI TANAH
    </td>
    </tr>
    <tr>
          <td class="sub-title-left" rowspan="2">
    </td>
    <td style="width:100%">
a. Alamat Lokasi Tanah
    </td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Terletak di Jalan
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Lokasi_Tanah_Jalan'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Kampung/ Dusun
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Lokasi_Tanah_Kampung'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Desa
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Lokasi_Tanah_Desa'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Kecamatan
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Lokasi_Tanah_Kecamatan'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td class="label">
Kabupaten
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Lokasi_Tanah_Kabupaten'] . '</strong></td>
    </tr>
    <tr>
          <td class="sub-title-left" rowspan="2">
    </td>
    <td style="width:21%">
b. Lebih Kurang
    </td>
    <td class="separator-column">:</td>
    <td  style="width:30%" class="bottom-border text-center"><strong>' . $shmData['Lokasi_Tanah_Jarak_Meter'] . '</strong></td>
    <td style="width:20%">
meter dari jalan desa
        </td>
    </tr>
    <tr>
    
    <td style="width:21%">
c. Akses Masuk
    </td>
    <td class="separator-column">:</td>
    <td class="content"><strong>' . $shmData['Lokasi_Tanah_Akses_Masuk'] . '</strong></td>
    </tr>
      <tr>
      <td class="sub-title-left" rowspan="2">
      </td>
    <td style="width:100%">
d.Batas Tanah
    </td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Utara
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Batas_Tanah_Utara'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Timur
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Batas_Tanah_Timur'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td class="label">
Selatan
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Batas_Tanah_Selatan'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td class="label">
Barat
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Batas_Tanah_Barat'] . '</strong></td>
    </tr>
    <tr>
    <td style="width:100%">
    2.2  BENTUK DAN UKURAN TANAH
    </td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td style="width:21%">
a. Bentuk Tanah
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Bentuk_Tanah'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="2">
    </td>
    <td style="width:21%">
b. Permukaan Tanah
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Permukaan_Tanah'] . '</strong></td>
    </tr>
    <tr>
  
    <td style="width:21%">
c.Luas Tanah
    </td>
    <td class="separator-column">:</td>
    <td  class="content"><strong>' . $shmData['Luas_Tanah_Bentuk'] . '</strong></td>
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="8">
    <h4>III.</h4>
    </td>
    <td class="sub-title-right">
    <h4>BANGUNAN</h4>
    </td>
</tr>
    <tr>
    <td style="width:100%">
    3.1 PERSETUJUAN BANGUNAN GEDUNG (PBG)
    </td>
    </tr>   
      <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td style="width:4%">
No:
    </td>
 
    <td  style="width:20%" class="bottom-border text-center"><strong>' . $shmData['Persetujuan_Bangunan_No'] . '</strong></td>
   
    <td style="width:10%">
Tanggal:
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Persetujuan_Bangunan_Tanggal'] . '</strong></td>
    <td style="width:13%">
Atas Nama:
    </td>
  <td  style="width:25%" class="bottom-border text-center"><strong>' . $shmData['Persetujuan_Bangunan_Atas_Nama'] . '</strong></td>
    </tr>
     <tr>
    <td style="width:100%">
    3.2 JENIS, JUMLAH DAN TAHUN MENDIRIKAN BANGUNAN
    </td>
    </tr> 
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td style="width:21%">
a. Toko
    </td>
    <td class="separator-column">:</td>
    <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Jumlah_Toko'] . '</strong></td>
    <td style="width:10%">
Unit, luas :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Luas_Toko'] . ' m2</strong></td>
    
    <td style="width:10%">
Tahun :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Tahun_Toko'] . '</strong></td>
    
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td style="width:21%">
b. Rumah
    </td>
    <td class="separator-column">:</td>
    <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Jumlah_Rumah'] . '</strong></td>
    <td style="width:10%">
Unit, luas :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Luas_Rumah'] . ' m2</strong></td>
    
    <td style="width:10%">
Tahun :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Tahun_Rumah'] . '</strong></td>
    
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td style="width:21%">
c. Pabrik
    </td>
    <td class="separator-column">:</td>
    <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Jumlah_Pabrik'] . '</strong></td>
    <td style="width:10%">
Unit, luas :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Luas_Pabrik'] . ' m2</strong></td>
    
    <td style="width:10%">
Tahun :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Tahun_Pabrik'] . '</strong></td>
    
    </tr>
    <tr>
    <td class="sub-title-left" rowspan="1">
    </td>
    <td style="width:21%">
d. Gudang
    </td>
    <td class="separator-column">:</td>
    <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Jumlah_Gudang'] . '</strong></td>
    <td style="width:10%">
Unit, luas :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Luas_Gudang'] . ' m2</strong></td>
    
    <td style="width:10%">
Tahun :
    </td>
  <td  style="width:15%" class="bottom-border text-center"><strong>' . $shmData['Tahun_Gudang'] . '</strong></td>
    
    </tr>
    <tr>
    <td></td>
       </tr>

            </table>
            <table>
            <tr>
            <td></td>
            </tr>
            <tr>
            <td style="width:100%">
            Demikian laporan cek fisik ini saya buat dengan sebenarnya sesuai dengan kondisi saat ini, Dan saya bertanggung jawab 
            </td>
            </tr>
            <tr>
            <td style="width:100%">
            atas keakurasian laporan ini.
            </td>
            </tr>
            <tr>
            <td style="width:30%">
            Pemeriksa I
            </td>
            <td style="width:30%">
            Pemeriksa II
            </td>
            <td style="width:30%">
            Mengetahui,
            </td>
            </tr>
            <tr>
            <td style="width:30%">
            Kabag Marketing
            </td>
            <td style="width:30%">
            Analis Kredit
            </td>
            <td style="width:30%">
            Calon Debitur
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
            <td style="width:30%">
            <strong>Suyat</strong>
            </td>
            <td style="width:30%">
            <strong>' . $greeting . '</strong>
            </td>
            <td style="width:30%">
            <strong>' . $shmData['nama_pemohon']  . '</strong>
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

