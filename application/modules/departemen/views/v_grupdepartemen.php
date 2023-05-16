<?php if ($this->session->flashdata('sukses')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?= $this->session->flashdata('sukses') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }; ?>
<div class="row">
    <div class="col-sm-8">
        <h4 class="page-title">Departemen</h4>
    </div>
</div>
<div class="row">

    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
        <a href="<?= base_url() ?>master-data/departemen/add" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Departemen</a>
        <div class="roles-menu">
            <ul>
                <li class="active">
                    <a href="<?= base_url('master-data/departemen')  ?>">Semua</a>
                </li>
                <?php foreach ($departemen as $dpt) { ?>
                    <li class="active">
                        <a href="<?= base_url('master-data/departemen/grup/') . $dpt->idDepartemen ?>"><?= $dpt->departemen ?></a>
                        <span class="role-action">
                            <a href="<?= base_url('karyawan/grup-departemen/edit-grup/') . $dpt->idDepartemen ?>">
                                <span class="action-circle large">
                                    <i class="material-icons">edit</i>
                                </span>
                            </a>
                            <a href="#" onclick="hapus_departemen(<?= $dpt->idDepartemen ?>)">
                                <span class="action-circle large delete-btn">
                                    <i class="material-icons">delete</i>
                                </span>
                            </a>
                        </span>
                    </li>
                <?php } ?>
                <!-- <li><a href="#">Doctor</a></li>
                <li><a href="#">Nurse</a></li>
                <li><a href="#">Laboratorist</a></li>
                <li><a href="#">Pharmacist</a></li>
                <li><a href="#">Accountant</a></li>
                <li><a href="#">Receptionist</a></li> -->
            </ul>
        </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
        <h6 class="card-title m-b-20">Daftar Karyawan</h6>
        <div class="row doctor-grid">
            <?php foreach ($karyawan as $karyawan) { ?>
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="<?= base_url('master-data/karyawan/profile-id/') . $karyawan->idKaryawan ?>"><img alt="" src="<?= base_url() ?>assets/img/avatar_default.png"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= base_url('master-data/departemen/edit/') . $karyawan->idKaryawan ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="<?= base_url('master-data/karyawan/profile-id/') . $karyawan->idKaryawan ?>"><?= $karyawan->namaLengkap ?></a></h4>
                        <div class="doc-prof"> <?= $karyawan->departemen ?></div>
                        <div class="user-country">
                            <i class="fa fa-phone"></i>+62<?= $karyawan->noTel ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="see-all">
                    <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function reload_table() {
        location.reload(); //reload datatable ajax
    }

    function hapus_departemen(id) {
        Swal.fire({
            title: 'Yakin Mau Dihapus?',
            text: ` `,
            icon: '',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    data: "idDepartemen=" + id,
                    url: "grup-departemen/hapus_id",
                    type: "GET",
                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data sudah dihapus',
                            showConfirmButton: false,
                            timer: 5000

                        });
                        setTimeout(function() {
                            reload_table()
                        }, 1000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal Dihapus Karena Data sudah terpakai di tabel lain',
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            }
        })
    }
</script>