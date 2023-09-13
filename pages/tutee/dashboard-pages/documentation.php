<style>
    .card-box {
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        margin-bottom: 30px;
        -webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .card-title {
        margin-bottom: 0.75rem;
    }

    .card-title .header-title {
        font-size: 16px;
        font-weight: 600;
        color: #1a2942;
    }

    .card-body {
        padding: 1.25rem;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-left">
                            <h4 class="page-title">Nexus Link Documentation</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- end col -->
                <div class="col-12">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">SCHEDULES DOCUMENTATION</h5>
                        <table id="documentation" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" id="schedule_title">
                <div class="col-md-12">
                    <!-- For Schedule title to be submitted -->
                    <div class="card-box text-center">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3" id="schedule_name"></h5>
                    </div>
                </div>
            </div>
            <div class="row" id="rating_form">
                <div class="col-md-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">DOCUMENTATION</h5>

                        <div class="form-group mb-3">
                            <label for="product-meta-title">Upload Documentation <span class="text-danger">*</label>
                            <input type="file" class="form-control" id="uploadDocu" placeholder="Enter Documentation" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">RATING FOR TUTOR</h5>
                        <div class="form-group mb-3">
                            <label for="product-meta-title">Feedback to Tutor <span class="text-danger">*</label>
                            <textarea class="form-control" id="product-meta-title" placeholder="Enter Feedback" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="product-meta-title">Rate Tutor <span class="text-danger">*</label>
                            <select class="form-control" name="rating">
                                <option value="5">5 Star</option>
                                <option value="4">4 Star</option>
                                <option value="3">3 Star</option>
                                <option value="2">2 Star</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="button" class="btn btn-success btn-block waves-effect waves-light" id="btn-submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>