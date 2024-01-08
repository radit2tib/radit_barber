<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Lpj</h1>
    </div>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul; ?></h6>
            </div>
            <div class="col-md-6"><a href="<?= base_url('Barber/tambah_barber') ?>" class="btn btn-info mb-2">Ajukan Barber</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>Nama Pengaju</th>
                                <th>Nama Kegiatan</th>
                                <th>Detail</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lpj as $us) : ?>
                            <tr>
                                <td><?php
                                        $userId = $us['nama'];
                                        $user = $this->db->get_where('user', ['id' => $userId])->row_array();
                                        echo $user['nama'];
                                        ?>
                                </td>
                                <td><?= $us['namakegiatan']; ?></td>
                                <td>
                                    <a href="<?= base_url('Lpj/detail/') . $us['id']; ?>"
                                        class="btn btn-info btn-circle">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('Lpj/tolak/') . $us['id']; ?>"
                                        class="btn btn-danger">Ditolak</a>
                                    <a href="<?= base_url('Lpj/proses/') . $us['id']; ?>"
                                        class="btn btn-warning">Proses</a>
                                    <a href="<?= base_url('Lpj/selesai/') . $us['id']; ?>"
                                        class="btn btn-success">Selesai</a>
                                </td>
                                <td>
                                    <?php if ($us['status'] == 'Ditolak') : ?>
                                    <span class="btn btn-danger"><?= $us['status']; ?></span>
                                    <?php elseif ($us['status'] == 'Proses') : ?>
                                    <span class="btn btn-warning"><?= $us['status']; ?></span>
                                    <?php elseif ($us['status'] == 'Selesai') : ?>
                                    <span class="btn btn-success"><?= $us['status']; ?></span>
                                    <?php else : ?>
                                    <span class="btn btn-info"><?= $us['status']; ?></span>
                                    <?php endif; ?>
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
</div>