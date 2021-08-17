<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Change Picture</h4>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <div class="pr-1 mb-3 mb-xl-0">
            <button type="button" class="btn btn-warning  btn-icon mr-2" onclick="location.reload()"><i class="mdi mdi-refresh"></i></button>
        </div>
        <div class="pr-1 mb-3 mb-xl-0">
            <a href="<?= base_url('user/profile/') . $user['id_master_create_user'] ?>" type="button" class="btn btn-primary  mr-2">Back</a>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<div class="row row-sm">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="pl-0">
                    <div class="main-profile-overview">
                        <div class="main-img-user profile-user">
                            <img alt="" src="<?= base_url('uploads/picture/') . $user['picture'] ?>">
                        </div>

                        <form class="form-horizontal" method="post" action="<?= base_url('user/change_picture_process') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="old_pic" value="<?= $this->session->userdata('picture') ?>">
                            <div class="form-group">
                                <label for="picture">Choose Picture</label>
                                <input type="file" id='picture' class="form-control <?= form_error('picture') ? 'is-invalid' : '' ?>" name="picture" placeholder="First Work" value="<?= $this->input->post('picture'); ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('picture'); ?>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-3 justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-primary btn-block">Change Picture</button>
                                </div>
                            </div>
                        </form>

                    </div><!-- main-profile-overview -->
                </div>
            </div>
        </div>
    </div>

</div>