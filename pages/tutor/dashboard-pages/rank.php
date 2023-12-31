<style>
    canvas {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
        /* Set z-index lower than the modal */
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <canvas id="my-canvas"></canvas>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- Add breadcrumb items if needed -->
                            </ol>
                        </div>
                        <h4 class="page-title">Rank Profile</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <img class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" id="profile-pic">

                        <h4 class="mb-0" id="rank"></h4>
                        <p class="text-muted"><strong id="points">15</strong> Points</p>

                        <!-- Add Total Tutored and Average Rank -->
                        <div class="text-left mt-3">
                            <h4 class="font-13 text-uppercase">Total Tutored: <strong>10 Tutees</strong></h4>
                            <h4 class="font-13 text-uppercase">Average Rating: <strong id="avg_rating"></strong> <i
                                    class="fe-star"></i></h4>
                        </div>
                    </div> <!-- end card-box -->

                    <div class="card-box">
                        <!-- Add an information card explaining the points system -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Points System</h4>
                                <p class="card-text">Earn points based on your performance. Higher points lead to a
                                    higher rank.</p>
                                <hr>
                                <p class="card-text">
                                    Gain <strong>5 points</strong> after each successfully finished session. Receive the
                                    exact number of points matching the rating given by a tutee, e.g., a 4 rating
                                    results in <strong>4 Points</strong>.
                                </p>
                            </div>
                        </div>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->

                <div class="col-xl-8 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title mb-3">Ranking System</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Rank</th>
                                        <th>Points</th>
                                        <th>Badge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td>0 - 100</td>
                                        <td><span class="badge badge-info">Novice Tutor</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>101 - 200</td>
                                        <td><span class="badge badge-warning">Junior Tutor</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>201 - 300</td>
                                        <td><span class="badge badge-success">Experienced Tutor</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>301 - 400</td>
                                        <td><span class="badge badge-primary">Senior Tutor</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>401 - 500</td>
                                        <td><span class="badge badge-danger">Master Tutor</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>501+</td>
                                        <td><span class="badge badge-dark">Grand Master Tutor</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="congratsModal" tabindex="-1" aria-labelledby="congratsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="congratsModalLabel">
                    <span class="emoji">🎉</span> Congratulations
                    <span class="emoji">🎉</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="confettimessage">
                    </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>