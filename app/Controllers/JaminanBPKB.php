<?php

namespace App\Controllers;
use TCPDF;

use App\Controllers\BaseController;
use App\Models\JaminanBPKBModel;
class JaminanBPKB extends BaseController
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

        $data['listBPKB'] = $this->bpkb->findAll();

       return view('Jaminan/data_BPKB',$data);
    }

    public function JaminanBPKB_add()
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
    
        return view('Jaminan/BPKB_Add', $data);
    }

    public function JaminanBPKB_post()
    {
    helper(['form']);

    $jaminanBPKBModel = new JaminanBPKBModel(); 

    $data = [
        // ''                       => $this->request->getPost(''),
        'nama_penjamin'             => $this->request->getPost('nama_penjamin'),
        'alamat'                    => $this->request->getPost('alamat'),
        'jenis_barang'              => $this->request->getPost('jenis_barang'),
        'merk'                      => $this->request->getPost('merk'),
        'tahun'                     => $this->request->getPost('tahun'),
        'warna'                     => $this->request->getPost('warna'),
        'no_mesin'                  => $this->request->getPost('no_mesin'),
        'no_rangka'                 => $this->request->getPost('no_rangka'),
        'no_polisi'                 => $this->request->getPost('no_polisi'),
        'no_stnk'                   => $this->request->getPost('no_stnk'),
        'no_bpkb'                   => $this->request->getPost('no_bpkb'),
        'nama_di_bpkb'              => $this->request->getPost('nama_di_bpkb'),
        'kondisi_bodi_kendaraan'    => $this->request->getPost('kondisi_bodi_kendaraan'),
        'kondisi_cat'               => $this->request->getPost('kondisi_cat'),
        'kondisi_plapon_atap'       => $this->request->getPost('kondisi_plapon_atap'),
        'kondisi_rangka_sasis'      => $this->request->getPost('kondisi_rangka_sasis'),
        'kondisi_kaca_spion'        => $this->request->getPost('kondisi_kaca_spion'),
        'kondisi_lampu_depan'       => $this->request->getPost('kondisi_lampu_depan'),
        'kondisi_lampu_belakang'    => $this->request->getPost('kondisi_lampu_belakang'),
        'kondisi_lampu_rem'         => $this->request->getPost('kondisi_lampu_rem'),
        'kondisi_lampu_sen'         => $this->request->getPost('kondisi_lampu_sen'),
        'kondisi_ban_depan'         => $this->request->getPost('kondisi_ban_depan'),
        'kondisi_ban_belakang'      => $this->request->getPost('kondisi_ban_belakang'),
        'kondisi_mesin'             => $this->request->getPost('kondisi_mesin'),
        'kondisi_dalam_mobil'       => $this->request->getPost('kondisi_dalam_mobil'),
        'kondisi_jok_dashboard'     => $this->request->getPost('kondisi_jok_dashboard'),
        'kondisi_aksesoris_khusus'  => $this->request->getPost('kondisi_aksesoris_khusus'),

    ];

    $jaminanBPKBModel->insert($data);

    return redirect()->to('/jaminanBPKB/add');
}

public function hapus($id)
{
    // 1. where id_jenisBarang=1
    $syarat = [
        'id' => $id
    ];

    // 2. delete from tbl_jenisBarang
    $this->bpkb->where($syarat)->delete();

    // 3. redirect
    return redirect()->to('/jaminanBPKB/data');
}

public function jaminan_barang_bergerak($id)
{

    // data session
    $session = session();
    $greeting = $username = $session->get('nama');

    $DataBPKB = new JaminanBPKBModel();
    $shmData = $DataBPKB->find(($id));

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

// Add a new page
$pdf->AddPage();

// Your new page content goes here
$NewPageHhtml = '
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
            width:60%
            border-collapse: collapse;
            border-bottom: 1px solid #000;
        }
        .laporan .content-kondisi{
            width:60%; 
            text-align:center;
            border-collapse: collapse;
            border: 1px solid #000;
        }
        .separator-column {
            text-align:right;
            width: 5%;
        }
        .laporan .label{
            width:35%;
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
        <th class="title" colspan="3"><h4>HASIL PEMERIKSAAN JAMINAN BARANG BERGERAK</h4></th>
        </tr>
    </table>
        <table class="laporan">
        <tr>
        <td class="sub-title-right">
        <h4>Dengan ini kami melaporkan hasil pemeriksaan fisik jaminan bergerak</h4>
        </td>
    </tr>
            <tr>
            <th class="label">Nama Pemohon</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['nama_pemohon'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Nama Penjamin</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['nama_penjamin'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Alamat</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['alamat'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Jenis Barang</th>
            <td class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['jenis_barang'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Merk</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['merk'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Tahun</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['tahun'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Warna</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['warna'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">No. Mesin</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['no_mesin'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">No. Rangka</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['no_rangka'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">No. Polisi</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['no_polisi'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">No. STNK</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['no_stnk'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">No. BPKB</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['no_bpkb'] . '</strong></td>
        </tr>
            <tr>
            <th class="label">Nama Di BPKB</th>
            <td  class="separator-column">:</td>
            <td  class="content"><strong>' .$shmData['nama_di_bpkb'] . '</strong></td>
        </tr>
        <tr>
        <th class="title" colspan="3"><h4>KONDISI BARANG JAMINAN</h4></th>
        </tr>
        <tr>
        <th class="label">Kondisi</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi" style="background-color:yellow;"><strong>Kondisi Kendaraan</strong></td>
    </tr>
        <tr>
        <th class="label">Bodi Kendaraan</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_bodi_kendaraan'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Cat</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_cat'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Plapon/ Atap</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_plapon_atap'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Rangka/ Sasis</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_rangka_sasis'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Kaca Spion</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_kaca_spion'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Lampu Depan</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_lampu_depan'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Lampu Belakang</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_lampu_belakang'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Lampu Rem</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_lampu_rem'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Lampu Sen</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_lampu_sen'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Ban Depan</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_ban_depan'] . ' %</strong></td>
    </tr>
        <tr>
        <th class="label">Ban Belakang</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_ban_belakang'] . ' %</strong></td>
    </tr>
        <tr>
        <th class="label">Mesin</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_mesin'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Dalam Mobil</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_dalam_mobil'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Jok Depan & Dashboard</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_jok_dashboard'] . '</strong></td>
    </tr>
        <tr>
        <th class="label">Aksesoris Khusus</th>
        <td  class="separator-column"></td>
        <td  class="content-kondisi"><strong>' .$shmData['kondisi_aksesoris_khusus'] . '</strong></td>
    </tr>
    <tr>
    <th class="title" colspan="3"><h4>KONDISI BARANG JAMINAN</h4></th>
    </tr>
    <tr>
    <th class="label">Harga Pasar</th>
    <td  class="separator-column">Rp.</td>
    <td  class="content"><strong>' .$shmData['harga_pasar'] . '</strong></td>
</tr>
    <tr>
    <th class="label">Taksasi Bank</th>
    <td  class="separator-column">Rp.</td>
    <td  class="content"><strong>' .$shmData['transaksi_bank'] . '</strong></td>
</tr>
    <tr>
    <th class="label">Harga Likuidasi</th>
    <td  class="separator-column">Rp.</td>
    <td  class="content"><strong>' .$shmData['harga_likuidasi'] . '</strong></td>
</tr>
        </table>
    
<table>
<tr>
<td></td>
</tr>
<tr>
<td style="width:100%">
Demikian laporan cek fisik ini saya buat dengan sebenarnya sesuai dengan kondisi saat ini, Dan saya bertanggung jawab atas keakurasian laporan ini.
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

    $NewPageHhtml .= '
    </body>
    </html>';
$pdf->writeHTML($NewPageHhtml, true, false, true, false, '');
$this->response->setContentType('application/pdf');
$pdf->Output('laporan-Pemeriksaan-barang-bergerak.pdf', 'I');
   }
 }

