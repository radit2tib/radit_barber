<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Barber</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo $judul; ?></li>
        </ol>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"><a href="<?= base_url('Barber/tambah') ?>" class="btn btn-info mb-2">Ajukan Barber</a></div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nama Barberman</td>
                            <td>barberman</td>
                            <td>Status Aktif</td>
                            <td>Status</td>
                            <td>Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barber as $us) : ?>
                            <tr>
                                <td>
                                    <?= $us['nama']; ?>
                                </td>
                                <td><img src="<?= base_url('assets/assets/img/') . $user['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                <td>
                                    <a href="<?= base_url('Barber/tolak/') . $us['id']; ?>" class="btn btn-danger">Sedang Off</a>
                                    
                                    <a href="<?= base_url('Barber/selesai/') . $us['id']; ?>" class="btn btn-success">Sedang On</a>
                                </td>
                                <td>
                                    <?php if ($us['status'] == 'Sedang off') : ?>
                                        <span class="btn btn-danger"><?= $us['status']; ?></span>
                                    <?php elseif ($us['status'] == 'Proses') : ?>
                                        <span class="btn btn-warning"><?= $us['status']; ?></span>
                                    <?php elseif ($us['status'] == 'Sedang on') : ?>
                                        <span class="btn btn-success"><?= $us['status']; ?></span>
                                    <?php else : ?>
                                        <span class="btn btn-info"><?= $us['status']; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('Barber/detail/') . $us['id']; ?>" class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>