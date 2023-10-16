<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nexus Link - Tutee Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">

    <link href="../../assets/libs/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <!-- C3 Chart css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css" integrity="sha512-cznfNokevSG7QPA5dZepud8taylLdvgr0lDqw/FEZIhluFsSwyvS81CMnRdrNSKwbsmc43LtRd2/WMQV+Z85AQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Plugins css-->
    <link href="../../assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />


</head>

<body class="left-side-menu-dark">

    <!-- Begin page -->
    <div id="wrapper">
        <style>
            #floating-button {
                width: 55px;
                height: 55px;
                border-radius: 50%;
                background: #db4437;
                position: fixed;
                bottom: 30px;
                right: 30px;
                cursor: pointer;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
            }

            .plus {
                color: white;
                position: absolute;
                top: 0;
                display: block;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
                padding: 0;
                margin: 0;
                line-height: 55px;
                font-size: 38px;
                font-family: 'Roboto';
                font-weight: 300;
                animation: plus-out 0.3s;
                transition: all 0.3s;
            }

            #container-floating {
                position: fixed;
                width: 70px;
                height: 70px;
                bottom: 30px;
                right: 30px;
                z-index: 50px;
            }

            #container-floating:hover {
                height: 400px;
                width: 90px;
                padding: 30px;
            }

            #container-floating:hover .plus {
                animation: plus-in 0.15s linear;
                animation-fill-mode: forwards;
            }

            .letter {
                font-size: 23px;
                font-family: 'Roboto';
                color: white;
                position: absolute;
                left: 0;
                right: 0;
                margin: 0;
                top: 0;
                bottom: 0;
                text-align: center;
                line-height: 40px;
            }
        </style>