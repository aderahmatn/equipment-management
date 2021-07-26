<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Edit</h4>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <a href="<?= base_url('user/profile') ?>" type="button" class="btn btn-primary  mr-2">Kembali</a>
        </div>

    </div>
</div>
<!-- breadcrumb -->
<div class="row row-sm">
    <div class="col-lg-4">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            <img alt="" src="<?= base_url('uploads/picture/') . $user['picture'] ?>"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                        </div>
                        <div class="d-flex justify-content-between mg-b-20">
                            <div>
                                <h5 class="main-profile-name"><?= ucwords($user['full_name']) ?></h5>
                                <p class="main-profile-name-text"><?= ucwords($user['nik']) ?> - <?= ucwords($user['position']) ?></p>
                            </div>
                        </div>
                        <hr class="mg-y-30">
                        <label class="main-content-label tx-13 mg-b-20">Detail information</label>
                        <div class="main-profile-social-list">
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-ios-contact"></i>
                                </div>
                                <div class="media-body">
                                    <span>Full Name</span> <strong><?= ucwords($user['full_name']) ?></strong>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-md-barcode"></i>
                                </div>
                                <div class="media-body">
                                    <span>NIK</span> <strong><?= ucwords($user['nik']) ?></strong>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-md-at"></i>
                                </div>
                                <div class="media-body">
                                    <span>Email</span> <strong><?= ucwords($user['email']) ?></strong>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-md-unlock"></i>
                                </div>
                                <div class="media-body">
                                    <span>Position</span> <strong><?= ucwords($user['position']) ?></strong>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-ios-flag"></i>
                                </div>
                                <div class="media-body">
                                    <span>Division</span> <strong><?= ucwords($user['division']) ?></strong>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-ios-bookmark"></i>
                                </div>
                                <div class="media-body">
                                    <span>Dept Code</span> <strong><?= ucwords($user['dept_code']) ?></strong>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-icon bg-primary-transparent text-primary">
                                    <i class="icon ion-md-star"></i>
                                </div>
                                <div class="media-body">
                                    <span>First Work</span> <strong><?= ucwords($user['first_work']) ?></strong>
                                </div>
                            </div>
                        </div>
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                <div class="card  box-shadow-0">
                    <div class="card-body pt-4">
                        <form class="form-horizontal" method="post" action="<?= base_url('user/update_profile/') . $user['id_master_create_user'] ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id='nik' class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?>" name="nik" placeholder="NIK" value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $user['nik']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('nik'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" id='full_name' class="form-control <?= form_error('full_name') ? 'is-invalid' : '' ?>" name="full_name" placeholder="Full Name" value="<?php echo ($this->input->post('full_name') ? $this->input->post('full_name') : $user['full_name']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('full_name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="division">Division</label>
                                <input type="text" id='division' class="form-control <?= form_error('division') ? 'is-invalid' : '' ?>" name="division" placeholder="Division" value="<?php echo ($this->input->post('division') ? $this->input->post('division') : $user['division']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('division'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dept_code">Departement Code</label>
                                <input type="text" id='dept_code' class="form-control <?= form_error('dept_code') ? 'is-invalid' : '' ?>" name="dept_code" placeholder="Departement Code" value="<?php echo ($this->input->post('dept_code') ? $this->input->post('dept_code') : $user['dept_code']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('dept_code'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id='position' class="form-control <?= form_error('position') ? 'is-invalid' : '' ?>" name="position" placeholder="Position" value="<?php echo ($this->input->post('position') ? $this->input->post('position') : $user['position']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('position'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="first_work">First Work</label>
                                <input type="date" id='first_work' class="form-control <?= form_error('first_work') ? 'is-invalid' : '' ?>" name="first_work" placeholder="First Work" value="<?php echo ($this->input->post('first_work') ? $this->input->post('first_work') : $user['first_work']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('first_work'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id='email' class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" placeholder="First Work" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0 d-flex  justify-content-end">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>