<script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
<script>
    $.ajax({
        url: '../../server/tutor/update-rank.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.status == 200) {
                $('#rank').html(data.rank);
                $('#points').html(data.points);
                $('#avg_rating').html(data.avg_rating);
                // change the profile
                $('#profile-pic').attr('src', data.profile);

                // add confetti
                if (data.confetti != null) {
                    // add confetti to the page if the tutor has reached a new rank
                    function initializeConfetti() {
                        confetti = new ConfettiGenerator(confettiSettings);
                    }

                    function startConfetti() {
                        if (!confetti) {
                            initializeConfetti();
                        }
                        confetti.render();
                        $('#congratsModal').modal('show');
                        $('#confettimessage').html(data.confetti);

                        // Automatically hide confetti after 3 seconds
                        setTimeout(function () {
                            hideConfetti();
                        }, 5000);
                    }

                    function hideConfetti() {
                        var confettiCanvas = document.getElementById('my-canvas');
                        if (confettiCanvas) {
                            confettiCanvas.style.display = 'none';
                        }
                    }
                    var confettiSettings = {
                        target: 'my-canvas'
                    };
                    var confetti;
                    $('#congratsModal').on('hidden.bs.modal', function () {
                        // Hide confetti when modal is closed
                        hideConfetti();
                    });
                    startConfetti();
                }
            } else {
                swal.fire({
                    title: 'Error!',
                    text: data.message,
                    icon: 'error'
                })
            }
        },
    })
</script>