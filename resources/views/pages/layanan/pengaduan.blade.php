@extends('layouts.master')
@section('title', 'Pengaduan Masyarakat - Desa Ajakkang')
@section('meta_description', 'Sampaikan pengaduan Anda terkait masalah di Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru. Kami siap menerima dan menindaklanjuti aspirasi Anda.')
@section('page-title')
@component('components.page-title')
@slot('title', 'Pengaduan Masyarakat')
@slot('description', 'Sampaikan pengaduan Anda secara langsung kepada pemerintah Desa Ajakkang. Setiap laporan akan ditindaklanjuti sesuai prosedur.')
@slot('parent', 'Layanan')
@slot('parentUrl', Request::is('/') ? '#layanan-kami' : url('/#layanan-kami'))
@endcomponent
@endsection

@section('content')
<section class="pengaduan-form section">
  <div class="container" data-aos="fade-up">
    <div class="row align-items-center g-5">
      <!-- Ilustrasi -->
      <div class="col-lg-6" data-aos="fade-right">
        <img src="{{ asset('assets/img/icon/undraw_collaborative-writing_ir40.svg') }}" 
             alt="Ilustrasi Pengaduan Masyarakat" 
             class="img-fluid rounded"
             style="width: 100%; max-height: 300px; object-fit: contain; justify-content: center;">
      </div>

      <!-- Form Pengaduan -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
        <div class="card p-4 shadow-sm">
          <h3 class="mb-4 text-center">Formulir Pengaduan</h3>
          <form action="https://website.desa-batupute.com/layanan/layanan-pengaduan/store" method="POST" enctype="multipart/form-data" class="php-email-form aos-init aos-animate">
            <input type="hidden" name="_token" value="yIAfGPbIz1ldMVhcylsj7CsbGzO7zwfZbxb7VOFE" autocomplete="off">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" required>
              </div>

              <div class="col-md-6">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor HP Anda" required>
              </div>

              <div class="col-md-6">
                <label for="foto_bukti" class="form-label">Foto Bukti</label>
                <input type="file" class="form-control" name="foto_bukti" id="foto_bukti">
                <small id="formatError" class="text-danger d-none">Format gambar tidak sesuai! (Hanya jpeg, jpg, png, gif, heic, heif)</small>
                <small id="sizeError" class="text-danger d-none">Ukuran gambar tidak boleh melebihi 2 MB.</small>
              </div>

              <div class="col-md-6">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                  <option selected disabled>- Pilih Kategori -</option>
                  <option value="Umum">Umum</option>
                  <option value="Sosial">Sosial</option>
                  <option value="Keamanan">Keamanan</option>
                  <option value="Kesehatan">Kesehatan</option>
                  <option value="Kebersihan">Kebersihan</option>
                </select>
              </div>

              <div class="col-12">
                <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                <textarea class="form-control" name="isi_pengaduan" id="isi_pengaduan" rows="1" placeholder="Tulis pengaduan Anda di sini secara lengkap..." required></textarea>
              </div>

              <div class="col-12 text-center d-flex justify-content-between mt-3">
                <button type="reset" class="btn btn-white px-4 py-2">Reset</button>
                <button type="submit" class="btn btn-primary px-4 py-2">Kirim Pengaduan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
  :root {
    --primary: #28a745;
    --primary-light: #4dd08a;
    --primary-dark: #1e7e34;
    --text: #212529;
    --text-light: #6c757d;
    --border: #e9ecef;
    --radius: 14px;
    --shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    --shadow-hover: 0 12px 30px rgba(0, 0, 0, 0.1);
  }

  .pengaduan-form {
    padding: 20px 0 50px 0;
  }


  .card {
    border-radius: var(--radius);
    border: 1px solid var(--border);
    box-shadow: var(--shadow);
  }

  .btn-primary {
    background-color: var(--primary);
    border-color: var(--primary);
  }

  .btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
  }

  .btn-white {
    background-color: #ffffffff;
    border-color: #909090ff;
  }

  .form-control,
  .form-select {
    border-radius: 8px;
  }
</style>
@endpush

@push('scripts')
<script>
  document.getElementById('foto_bukti').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const maxSize = 2 * 1024 * 1024; // 2MB
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/heic', 'image/heif'];

    const formatError = document.getElementById('formatError');
    const sizeError = document.getElementById('sizeError');

    formatError.classList.add('d-none');
    sizeError.classList.add('d-none');

    if (file) {
      if (!allowedTypes.includes(file.type)) {
        formatError.classList.remove('d-none');
        e.target.value = ''; // reset input
      }

      if (file.size > maxSize) {
        sizeError.classList.remove('d-none');
        e.target.value = ''; // reset input
      }
    }
  });
</script>
@endpush