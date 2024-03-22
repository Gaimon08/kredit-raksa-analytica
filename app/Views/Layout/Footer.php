<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2023 <div class="bullet"></div>By <a href="#">Haikal Jibran A.</a>
  </div>
  <div class="footer-right">
    1.0.0
  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url() ?>/template/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url() ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url() ?>/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?= base_url() ?>/template/node_modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  import Swal from 'sweetalert2'

  // or via CommonJS
  const Swal = require('sweetalert2')
</script>
<!-- Template JS File -->
<script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/template/assets/js/page/index-0.js"></script>

<!-- datatables -->
<script src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
<script>
  let table = new DataTable('#myTable');
</script>
<script>
  function formatRupiah(angka) {
    const numberFormat = Number(angka).toLocaleString('id-ID');
    return `${numberFormat}`;
  }

  document.addEventListener("DOMContentLoaded", function() {
    const jumlahInputs = document.querySelectorAll('.currency');
    jumlahInputs.forEach(function(input) {
      input.addEventListener('input', function() {

        const nilaiTanpaRp = input.value.replace(/[^\d]/g, '');

        const formattedValue = formatRupiah(nilaiTanpaRp);

        input.value = formattedValue;
      });
    });
  });
</script>

<script>
  function formatRupiah(angka) {
    const numberFormat = Number(angka).toLocaleString('id-ID');
    return `${numberFormat}`;
  }

  function formatCurrency(input) {
    const nilaiTanpaRp = input.value.replace(/[^\d]/g, '');
    const formattedValue = formatRupiah(nilaiTanpaRp);
    input.value = formattedValue;
  }

  function calculateValues() {
    var hargaPasar = parseFloat($("#hargaPasar").val().replace(/[^\d]/g, ''));
    if (!isNaN(hargaPasar)) {
      var transaksiBank = hargaPasar * 0.9;
      var nilaiLikuidasi = transaksiBank * 0.8;

      $("#transaksiBank").val(formatRupiah(transaksiBank.toFixed(2)));
      $("#nilaiLikuidasi").val(formatRupiah(nilaiLikuidasi.toFixed(2)));
    }
  }
</script>

<script>
  // Fungsi untuk menghapus karakter non-digit dari string
  function extractNumber(value) {
    return value.replace(/[^\d]/g, '');
  }

  // Fungsi untuk menghitung total uang
  function hitungTotal() {
    // Ambil nilai dari setiap input
    var gajiTunjangan = parseInt(extractNumber(document.getElementsByName('gaji_dan_tunjangan')[0].value)) || 0;
    var pendapatanLain1 = parseInt(extractNumber(document.getElementsByName('nominal_pendapatan_lain_1')[0].value)) || 0;
    var pendapatanLain2 = parseInt(extractNumber(document.getElementsByName('nominal_pendapatan_lain_2')[0].value)) || 0;
    var pendapatanLain3 = parseInt(extractNumber(document.getElementsByName('nominal_pendapatan_lain_3')[0].value)) || 0;
    var biayaHidup = parseInt(extractNumber(document.getElementsByName('biaya_hidup_perbulan')[0].value)) || 0;
    var biayaPendidikan = parseInt(extractNumber(document.getElementsByName('biaya_pendidikan_anak')[0].value)) || 0;
    var biayaListrikTelp = parseInt(extractNumber(document.getElementsByName('biaya_listrik_dan_telp')[0].value)) || 0;
    var biayaLain = parseInt(extractNumber(document.getElementsByName('biaya_lain')[0].value)) || 0;
    var angsuran1 = parseInt(extractNumber(document.getElementsByName('nominal_angsuran_1')[0].value)) || 0;
    var angsuran2 = parseInt(extractNumber(document.getElementsByName('nominal_angsuran_2')[0].value)) || 0;
    var angsuran3 = parseInt(extractNumber(document.getElementsByName('nominal_angsuran_3')[0].value)) || 0;

    // Hitung total pengeluaran
    var totalPengeluaran = biayaHidup + biayaPendidikan + biayaListrikTelp + biayaLain +
      angsuran1 + angsuran2 + angsuran3;

    // Hitung total pendapatan
    var totalPendapatan = gajiTunjangan + pendapatanLain1 + pendapatanLain2 + pendapatanLain3;

    // Tampilkan total pengeluaran dan total pendapatan
    document.getElementsByName('total_jumlah_pengeluaran')[0].value = totalPengeluaran.toLocaleString();
    document.getElementsByName('total_pendapatan')[0].value = totalPendapatan.toLocaleString();

    // Hitung sisa pendapatan
    var sisaPendapatan = totalPendapatan - totalPengeluaran;

    // Tampilkan sisa pendapatan
    document.getElementsByName('sisa_pendapatan_perbulan')[0].value = sisaPendapatan.toLocaleString();
  }

  // Panggil fungsi hitungTotal saat halaman dimuat
  document.addEventListener('DOMContentLoaded', function() {
    hitungTotal();
    calculateAngsuran(); // Panggil fungsi calculateAngsuran setelah hitungTotal
  });

  // Panggil fungsi hitungTotal setiap kali nilai input berubah
  var inputs = document.querySelectorAll('.form-control');
  inputs.forEach(function(input) {
    input.addEventListener('input', function() {
      hitungTotal();
      calculateAngsuran(); // Panggil fungsi calculateAngsuran setiap kali input berubah
    });
  });

  function calculateAngsuran() {
    var nilaiPermohonan = parseFloat(extractNumber(document.getElementsByName('nilai_permohonan_kredit')[0].value)) || 0;
    var jangkaWaktu = parseInt(extractNumber(document.getElementsByName('jangka_waktu')[0].value)) || 0;
    var sukuBungaInput = document.getElementsByName('suku_bunga_per_tahun')[0].value;

    // Konversi suku bunga ke bentuk desimal
    var sukuBungaDecimal = parseFloat(sukuBungaInput.replace(',', '.')) / 100;

    var angsuran = (nilaiPermohonan / jangkaWaktu) + ((nilaiPermohonan * sukuBungaDecimal) / 12);

    // Bulatkan nilai angsuran ke bilangan bulat
    var bulatAngsuran = Math.floor(angsuran);

    // Set nilai elemen dengan nama 'angsuran_perbulan'
    document.getElementsByName('angsuran_perbulan')[0].value = bulatAngsuran.toLocaleString();
  }
</script>




</html>