<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Web Pages List</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <div class="action-btn">

                        <div class="form-group mb-0">
                            <div class="input-container icon-left position-relative">
                                <span class="input-icon icon-left">
                                    <span data-feather="calendar"></span>
                                </span>
                                <input type="text" class="form-control form-control-default date-ranger" name="date-ranger" placeholder="Oct 30, 2019 - Nov 30, 2019">
                                <span class="input-icon icon-right">
                                    <span data-feather="chevron-down"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="action-btn">
                        <a href="<?php echo base_url('create_menu/add_menu') ?>" class="btn btn-sm btn-primary btn-add">
                            <i class="la la-plus"></i> Add New</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xxl-12 col-lg-12  col-sm-12 m-bottom-30">

            <div class="card border-0">
                <div class="card-header">
                    <h6>Content Pages</h6>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="t_landing-today" role="tabpanel" aria-labelledby="t_landing-today-tab">
                            <div class="landing-pages-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pages</th>
                                            <th>Title</th>
                                            <th>CTR</th>
                                            <th>Goal Conv. Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
