<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rCtMk6F5Pdjp7x9+2sQL9FemR5eZR2+G9hE54aPPdLESlc4lD3cYyyU5fbB6tZiS" crossorigin="anonymous">
    <title>Bootstrap Table Example</title>
</head>

<body>

    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">
                            <h4>NOTA ANALISA KREDIT KONSUMTIF / KRETAP</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="label">Nama Pemohon</th>
                        <td class="separator-column">:</td>
                        <td class="content"><strong>' . $kreditData['nama_pemohon'] . '</strong></td>
                    </tr>
                    <!-- Add other rows as needed -->
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td class="sub-title-left">
                        <h4>I.</h4>
                    </td>
                    <td class="sub-title-right">
                        <h4>Pendahuluan</h4>
                    </td>
                </tr>
                <tr>
                    <td class="content" colspan="2">Nota analisa ini dibuat sebagai bahan pertimbangan bagi komite kredit PT. BPR RAKSA WACANA AGRI PURNAMA</td>
                </tr>
                <!-- Add other rows as needed -->
            </table>
        </div>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td class="sub-title-left">
                        <h4>II.</h4>
                    </td>
                    <td class="sub-title-right">
                        <h4>Permohonan Kredit</h4>
                    </td>
                </tr>
                <tr>
                    <td class="content" colspan="2">a. Tujuan permohonan kredit ini adalah untuk:</td>
                </tr>
                <!-- Add other rows as needed -->
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-rHyoN1iRsVXV4nDvBnZtRaxu8QCGRE6L/iD6SBA/JVdGjQISsbV6b9GJpiSkaVXp" crossorigin="anonymous"></script>
</body>

</html>