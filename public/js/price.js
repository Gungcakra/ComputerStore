// Fungsi untuk mengubah format input menjadi format Rupiah
function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
      ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }

  // Menangkap perubahan nilai input dan memformatnya sebagai Rupiah
  document.getElementById('rupiahInput').addEventListener('input', function () {
    var angka = this.value.replace(/[^0-9]/g, ''); // Hapus karakter non-digit
    this.value = formatRupiah(angka);
  });