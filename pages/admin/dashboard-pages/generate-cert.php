<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Generate Certificate</h4>
                    </div>
                </div>
            </div>
            <div class="row" id="step1">
                <div class="col-md-12">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">1. SELECT TUTOR</h5>
                        <table id="tutor-list" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" id="step2">
                <div class="col-md-12">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">2. GENERATE CERTIFICATE</h5>

                        <!--Add form for generating -->
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Full Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDate">Date Issued <strong>(Now)</strong></label>
                                    <input type="text" class="form-control" id="inputDate" placeholder="Date" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCourse">Certificate Description</label>
                                    <textarea class="form-control" id="certdesc" placeholder="eg. For completing 10hours of tutoring"></textarea>
                                    <!-- next button -->
                                    <button type="submit" class="btn btn-success btn-block mt-3" id="generate-certificate">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" id="step3">
                <div class="col-md-12">
                    <div class="card-box">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">3. SEND CERTIFICATE TO TUTOR</h5>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputName">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="text-center">
                                    <button class="btn btn-success btn-block" id="send-certificate">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>