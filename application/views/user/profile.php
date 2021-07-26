<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Profile</h4>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <a href="<?= base_url('user/update_profile/') . $user['id_master_create_user'] ?>" type="button" class="btn btn-primary  mr-2">Edit Profile</a>
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
                        <hr class="mg-y-30">
                        <a class="btn btn-primary btn-block" href="<?= base_url('user/update_profile/') . $user['id_master_create_user'] ?>">Edit Profile</a>
                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>

</div>