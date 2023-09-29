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
    <link href="https:/fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <table class="cert">
        <tr>
            <td class="crt_logo">
                <img src="data:image/png;base64,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" alt="" />
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

