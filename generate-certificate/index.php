<?php
require __DIR__ . '/dompdf/autoload.inc.php';

// get the post
$tutor_name = $_POST['tutor_name'];
$cert_desc = $_POST['cert_desc'];
$date = $_POST['date'];

// generate the certificate
generateCertificate($tutor_name, $cert_desc, $date);

function generateCertificate($tutorName, $descCert, $date) {
    $dompdf = new Dompdf\Dompdf;
    $dompdf->loadHtml('
<!DOCTYPE html>
<html>
<head>
    <style>
        .cert {
            border: 15px solid #0072c6;
            border-right: 15px solid #0894fb;
            border-left: 15px solid #0894fb;
            width: 700px;
            font-family: arial;
            color: #383737;
        }

        .crt_title {
            margin-top: 30px;
            font-family: "Satisfy", cursive;
            font-size: 40px;
            letter-spacing: 1px;
            color: #0060a9;
        }
        .crt_logo img {
            width: 130px;
            height: auto;
            margin: auto;
            padding: 30px;
        }
        .colorGreen {
            color: #27ae60;
        }
        .crt_user {
            display: inline-block;
            width: 80%;
            padding: 5px 25px;
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-family: "Satisfy", cursive;
            font-size: 40px;
            border-bottom: 1px dashed #cecece;
        }

        .afterName {
            font-weight: 100;
            color: #383737;
        }
        .colorGrey {
            color: grey;
        }
        .certSign {
            width: 200px;
        }

        @media (max-width: 700px) {
            .cert {
                width: 100%;
            }
        }

    </style>
</head>
<body>
<div class="test">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <table class="cert">
        <tr>
            <td class="crt_logo">
                <img src="../assets/images/nexus-logo.png" alt="logo">
            </td>
        </tr>
        <tr>
            <td align="center">
                <h1 class="crt_title">Certificate Of Recognition</h1>
                    <h2>This Certificate is awarded to</h2>
                    <h1 class="colorGreen crt_user">'.$tutorName.'</h1>
                    <h3 class="afterName">
                        '.$descCert.'
                    </h3>
                    <h3>Awarded on '.$date.' </h3>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
');

// Generate the certificate and save it to the server
$dompdf->render();
$output = $dompdf->output();
$filename = '../server/certificates/' . $tutorName . '.pdf';
file_put_contents($filename, $output);

}

?>

