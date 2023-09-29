<script>
    $.ajax({
        url: '../../server/tutor/update-rank.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.status == 200) {
                $('#rank').html(data.rank);
                $('#points').html(data.points);
                $('#avg_rating').html(data.avg_rating);
                // change the profile
                $('#profile-pic').attr('src', data.profile);
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