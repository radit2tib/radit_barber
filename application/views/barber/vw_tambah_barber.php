<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('Barber/upload') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nohp">Nama Barberman</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                        </div>
                        <div class="form-group">
                            <label for="nohp">No WA</label>
                            <input type="text" name="nohp" class="form-control" id="nohp" placeholder="nohp">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="gambar" accept=".jpg" required>
                            <small class="form-text text-muted">Pilih file PDF.</small>
                        </div>

                        <a href="<?= base_url('Barber') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" id="tombol" class="btn btn-primary float-right">Tambah barber</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    const tombol = document.querySelector('#tombol');
    tombol.addEventListener('click', function(event) {
        // Memeriksa apakah input namakegiatan, nohp, dan file_path sudah diisi
        const namakegiatanInput = document.getElementById('namakegiatan');
        const nohpInput = document.getElementById('nohp');
        const fileInput = document.getElementById('file_path');

        const namakegiatanValue = namakegiatanInput.value.trim();
        const nohpValue = nohpInput.value.trim();
        const fileValue = fileInput.value.trim();

        if (namakegiatanValue !== '' && nohpValue !== '' && fileValue !== '') {
            // Jika semua input diisi, tampilkan sweet alert
            Swal.fire({
                icon: 'success',
                title: 'Terima Kasih',
                showConfirmButton: false,
                text: 'Data Anda akan kami proses',
            });
            if (nohpValue !== '' && !isNaN(nohpValue)) {
                // Jika semua input diisi dan nohp adalah angka, tampilkan sweet alert
                Swal.fire({
                    icon: 'success',
                    title: 'Terima Kasih',
                    showConfirmButton: false,
                    text: 'Data Anda akan kami proses',
                });
            } else {
                // Jika ada input yang belum diisi atau nohp bukan angka, berikan pesan error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nomor HP harus menggunakan angka',
                });

                // Mencegah formulir untuk dikirim (submit)
                event.preventDefault();
            }


        } else {
            // Jika ada input yang belum diisi, berikan pesan error
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap isi semua data terlebih dahulu!',
            });

            // Mencegah formulir untuk dikirim (submit)
            event.preventDefault();
        }
    });
</script>