<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title">Profile</h4>
    </div>

    <div class="col-sm-5 col-6 text-right m-b-30">
        <a href="<?= base_url('master-data/karyawan/edit/') . $header->idKaryawan ?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
        <a href="<?= base_url() ?>master-data/karyawan" class="btn btn-danger btn-rounded"><i class="fa fa-chevron-left"></i> Kembali</a>
    </div>
</div>
<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <a href="#"><img class="avatar" src="<?= base_url() ?>assets/img/avatar_default.png" alt=""></a>
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                                <h3 class="user-name m-t-0 mb-0"><?= $header->namaLengkap ?> </h3>
                                <div class="staff-id">Nomor Induk : </div>
                                <div class="staff-id"><small class="text-muted">Jabatan :</small> </div>

                                <div class="staff-id"><small class="text-muted">Departemen : <?= $header->departemen ?></small></div>

                                <div class="staff-msg"><a href="https://api.whatsapp.com/send/?phone=0<?= $header->noTel ?>" class="btn btn-primary">Kirim Pesan</a></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row m-b-10">
                                <div class="col-md-4">
                                    <span class="title"><strong>Nomor Telepon</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="text"><a href="https://api.whatsapp.com/send/?phone=0<?= $header->noTel ?>">+62<?= $header->noTel ?></a></span>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-4">
                                    <span class="title"><strong>Email</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="text"><a href="mailto:<?= $header->email ?>"><?= $header->email ?></a></span>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-4">
                                    <span class="title"><strong>Tempat, Tanggal Lahir</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="text"><?= $header->tempatLahir ?>, <?= date('d-m-Y', strtotime($header->tanggalLahir))  ?></span>
                                </div>
                            </div>
                            <div class="row m-b-10 ">
                                <div class="col-md-4">
                                    <span class="title"><strong>Alamat Lengkap</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="text"><?= $header->alamatLengkap ?>,Kel. <?= $header->kelurahan ?>,Kec. <?= $header->kecamatan ?>, Kab/Kota <?= $header->kota ?>, <?= $header->provinsi ?> ( <?= $header->kodePos ?> )</span>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-4">
                                    <span class="title"><strong>Jenis Kelamin</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="text"><?= $header->jenisKelamin ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="profile-tabs">
    <ul class="nav nav-tabs nav-tabs-bottom">
        <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Hak Akses</a></li>
        <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane show active" id="about-cont">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
        <div class="tab-pane" id="bottom-tab2">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="card-title m-b-20">Module Access</h6>
                <div class="m-b-30">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Employee
                            <div class="material-switch float-right">
                                <input id="staff_module" type="checkbox" checked disabled>
                                <label for="staff_module" class="badge-success"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Holidays
                            <div class="material-switch float-right">
                                <input id="holidays_module" type="checkbox">
                                <label for="holidays_module" class="badge-success"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Leave Request
                            <div class="material-switch float-right">
                                <input id="leave_module" type="checkbox">
                                <label for="leave_module" class="badge-success"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Events
                            <div class="material-switch float-right">
                                <input id="events_module" type="checkbox">
                                <label for="events_module" class="badge-success"></label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Chat
                            <div class="material-switch float-right">
                                <input id="chat_module" type="checkbox">
                                <label for="chat_module" class="badge-success"></label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Module Permission</th>
                                <th class="text-center">Read</th>
                                <th class="text-center">Write</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Employee</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>

                            </tr>
                            <tr>
                                <td>Holidays</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>

                            </tr>
                            <tr>
                                <td>Leave Request</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>

                            </tr>
                            <tr>
                                <td>Events</td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked="">
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="bottom-tab3">
            Tab content 3
        </div>
    </div>
</div>