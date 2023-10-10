<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Settings</a></li>
                                <li class="breadcrumb-item active">Website Settings</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Website Settings</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="card-box">
                        <form>
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-cogs mr-1"></i> Website Settings</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Website Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" value="Nexus Link">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" id="description" name="description" rows="4">This is a description of my website.</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">Logo: <strong>NOT AVAILABLE YET</strong></label>
                                        <input type="file" class="form-control-file" id="logo" name="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="theme">Theme:<strong>NOT AVAILABLE YET</strong></label>
                                        <select class="form-control" id="theme" name="theme">
                                            <option value="dark">Dark</option>
                                            <option value="light">Light</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-settings mr-1"></i> Maintenance Mode</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="maintenance_mode" name="maintenance_mode" value="true">
                                        <label class="custom-control-label" for="maintenance_mode">Enable Maintenance Mode</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-left mt-3">
                                        <button type="button" class="btn btn-success waves-effect waves-light" id="save-settings-btn"><i class="mdi mdi-content-save"></i> Save Settings</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
