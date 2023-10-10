<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="width: 500px" id="reader"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 15,
            qrbox: 250,
            aspectRatio: 1.0,
            disableFlip: false
        });

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`, decodedResult);
        // ...
        html5QrcodeScanner.clear();
        // redirect to the tutor's profile page and close the current window
        window.location.href = "http://localhost/learnme/pages/tutee/dashboard-pages/tutor-profile.php?id=" + decodedText;
    }

    html5QrcodeScanner.render(onScanSuccess);
</script>

</html>