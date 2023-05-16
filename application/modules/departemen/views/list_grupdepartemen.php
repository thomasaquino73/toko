<div class="row">
    <div class="col-sm-8">
        <h4 class="page-title">Departemen</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
        <a href="<?= base_url() ?>karyawan/grup-departemen/add" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Departemen</a>
        <div class="roles-menu">
            <ul>
                <li class="active">
                    <a href="<?= base_url('master-data/departemen')  ?>">Semua</a>
                </li>
                <?php foreach ($departemen as $dpt) { ?>
                    <li class="active">
                        <a href="<?= base_url('karyawan/grup-departemen/grup/') . $dpt->idDepartemen ?>"><?= $dpt->departemen ?></a>
                        <span class="role-action">
                            <a href="<?= base_url('master-data/departemen/edit-grup/') . $dpt->idDepartemen ?>">
                                <span class="action-circle large">
                                    <i class="material-icons">edit</i>
                                </span>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#delete_role">
                                <span class="action-circle large delete-btn">
                                    <i class="material-icons">delete</i>
                                </span>
                            </a>
                        </span>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
        <h6 class="card-title m-b-20">Daftar Karyawan</h6>
        <div class="row doctor-grid">

            <div class="table-responsive">
                <?php if ($this->session->flashdata('sukses')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }; ?>

                <table id="table" class="table table-striped custom-table mb-0 datatable">
                    <!-- <table id="table" class="display"> -->
                    <thead>
                        <tr>
                            <th style="min-width:150px;">Nama Lengkap</th>
                            <th>Departemen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listgrup as $listgrup) { ?>
                            <tr>
                                <td>
                                    <h2><?= $listgrup->namaLengkap ?> </h2>
                                </td>
                                <td>
                                    <h2><?= $listgrup->departemen ?> </h2>
                                </td>
                                <td class="text-right">

                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?= base_url('karyawan/grup-departemen/edit/') . $listgrup->idKaryawan ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>