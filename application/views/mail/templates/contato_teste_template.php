<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>Novo Contato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        * {
            padding: 0px;
            margin: 0px;
        }
        
        body {
            background-color: #f4f4f4;
            font-family: "Montserrat", sans-serif;
            line-height: 1.5;
        }
        
        .mail {
            margin-top: 20px;
        }
        
        .mail-btn {
            background-color: #ff9820;
            padding: 20px 30px;
            color: #fff !important;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            display: block;
            text-align: center;
        }
        
        .mail .mail-logo {
            text-align: right;
            padding-bottom: 10px;
        }
        
        .mail .mail-header {
            background-color: #ff9820;
            padding: 20px 50px;
            text-align: center;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        
        .mail .mail-header h3 {
            color: #fff;
            font-size: 20.73px;
        }
        
        .mail .mail-header small {
            color: #fff;
            font-size: 11px;
            opacity: .54;
        }
        
        .mail .mail-content {
            background-color: #fff;
            padding: 60px 40px 30px 40px;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        
        .mail .mail-content h2 {
            font-size: 23.63px;
        }
        
        .mail .mail-content p {
            font-size: 14px;
        }
        
        .mail .mail-content h2 span {
            color: #ff9820;
            font-weight: 700;
        }
        
        .mail .mail-content .mail-contact-data {
            margin-top: 30px;
        }
        
        .mail .mail-content .mail-contact-data p {
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 10px;
        }
        
        .mail .mail-content .mail-contact-data ul {
            list-style: none;
        }
        
        .mail .mail-content .mail-contact-manager {
            text-align: center;
            margin-top: 10px;
        }
        
        .mail .mail-content .mail-contact-manager small {
            font-size: 8.54px;
            color: #000;
            opacity: .81;
        }
        
        .mail .mail-content .mail-contact-manager small a {
            color: #000;
            opacity: .81;
            text-decoration: none;
        }
        
        .mail .mail-footer-sg ul {
            list-style: none;
            color: #000;
            opacity: .60;
            text-align: right;
            padding-top: 10px;
        }
        
        .mail .mail-footer-sg ul li {
            display: inline-block;
        }
        
        .mail .mail-footer-sg ul li a {
            display: inline-block;
            color: #000;
            text-decoration: none;
        }
        
        .mail .mail-footer-sg ul li small {
            font-size: 10px;
        }
        
        .mail .mail-footer-sg ul li+li {
            margin-left: 10px;
        }
        
        .mail .mail-footer-sg ul .mail-footer-tel h3 {
            font-size: 14px;
        }
        
        .mail .mail-footer-sg ul .mail-footer-tel i {
            font-size: 20px;
            vertical-align: -2px;
        }
        
        .mail .mail-footer-sg ul .mail-footer-tel+.mail-footer-tel {
            border-left: 1px solid rgba(0, 0, 0, .1);
            padding-left: 10px;
        }
        
        @media (max-width: 767px) {
            body {
                font-size: 12px;
            }
            .mail .mail-header h3 {
                font-size: 15px;
            }
            .mail .mail-content h2 {
                font-size: 15px;
            }
            .mail .mail-content p {
                font-size: 12px;
            }
            .mail .mail-content .mail-contact-data p {
                font-size: 12px;
            }
            .mail-btn {
                font-size: 12px;
            }
        }
        
        .message-mail {
            background-color: #eaeaea;
            border-radius: 6px;
            padding: 5px;
            color: #757575;
            font-size: 12px;
        }
        
        h5 {
            font-weight: 600;
        }
        
        hr {
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        table {
            border-collapse: collapse;
        }
        
        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        
        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }
        
        .table .table {
            background-color: #fff;
        }
        
        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }
        
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #cbcbcb;
        }
        
        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }
        
        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody+tbody {
            border: 0;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
        
        .table-primary,
        .table-primary>th,
        .table-primary>td {
            background-color: #b8daff;
        }
        
        .table-hover .table-primary:hover {
            background-color: #9fcdff;
        }
        
        .table-hover .table-primary:hover>td,
        .table-hover .table-primary:hover>th {
            background-color: #9fcdff;
        }
        
        .table-secondary,
        .table-secondary>th,
        .table-secondary>td {
            background-color: #d6d8db;
        }
        
        .table-hover .table-secondary:hover {
            background-color: #c8cbcf;
        }
        
        .table-hover .table-secondary:hover>td,
        .table-hover .table-secondary:hover>th {
            background-color: #c8cbcf;
        }
        
        .table-success,
        .table-success>th,
        .table-success>td {
            background-color: #c3e6cb;
        }
        
        .table-hover .table-success:hover {
            background-color: #b1dfbb;
        }
        
        .table-hover .table-success:hover>td,
        .table-hover .table-success:hover>th {
            background-color: #b1dfbb;
        }
        
        .table-info,
        .table-info>th,
        .table-info>td {
            background-color: #bee5eb;
        }
        
        .table-hover .table-info:hover {
            background-color: #abdde5;
        }
        
        .table-hover .table-info:hover>td,
        .table-hover .table-info:hover>th {
            background-color: #abdde5;
        }
        
        .table-warning,
        .table-warning>th,
        .table-warning>td {
            background-color: #ffeeba;
        }
        
        .table-hover .table-warning:hover {
            background-color: #ffe8a1;
        }
        
        .table-hover .table-warning:hover>td,
        .table-hover .table-warning:hover>th {
            background-color: #ffe8a1;
        }
        
        .table-danger,
        .table-danger>th,
        .table-danger>td {
            background-color: #f5c6cb;
        }
        
        .table-hover .table-danger:hover {
            background-color: #f1b0b7;
        }
        
        .table-hover .table-danger:hover>td,
        .table-hover .table-danger:hover>th {
            background-color: #f1b0b7;
        }
        
        .table-light,
        .table-light>th,
        .table-light>td {
            background-color: #fdfdfe;
        }
        
        .table-hover .table-light:hover {
            background-color: #ececf6;
        }
        
        .table-hover .table-light:hover>td,
        .table-hover .table-light:hover>th {
            background-color: #ececf6;
        }
        
        .table-dark,
        .table-dark>th,
        .table-dark>td {
            background-color: #c6c8ca;
        }
        
        .table-hover .table-dark:hover {
            background-color: #b9bbbe;
        }
        
        .table-hover .table-dark:hover>td,
        .table-hover .table-dark:hover>th {
            background-color: #b9bbbe;
        }
        
        .table-active,
        .table-active>th,
        .table-active>td {
            background-color: rgba(0, 0, 0, 0.075);
        }
        
        .table-hover .table-active:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
        
        .table-hover .table-active:hover>td,
        .table-hover .table-active:hover>th {
            background-color: rgba(0, 0, 0, 0.075);
        }
        
        .table .thead-dark th {
            color: #fff;
            background-color: #212529;
            border-color: #32383e;
        }
        
        .table .thead-light th {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }
        
        .table-dark {
            color: #fff;
            background-color: #212529;
        }
        
        .table-dark th,
        .table-dark td,
        .table-dark thead th {
            border-color: #32383e;
        }
        
        .table-dark.table-bordered {
            border: 0;
        }
        
        .table-dark.table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .table-dark.table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.075);
        }
        
        @media (max-width: 575.98px) {
            .table-responsive-sm {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table-responsive-sm>.table-bordered {
                border: 0;
            }
        }
        
        @media (max-width: 767.98px) {
            .table-responsive-md {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table-responsive-md>.table-bordered {
                border: 0;
            }
        }
        
        @media (max-width: 991.98px) {
            .table-responsive-lg {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table-responsive-lg>.table-bordered {
                border: 0;
            }
        }
        
        @media (max-width: 1199.98px) {
            .table-responsive-xl {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }
            .table-responsive-xl>.table-bordered {
                border: 0;
            }
        }
        
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
        
        .table-responsive>.table-bordered {
            border: 0;
        }
        
        .table-title {
            background-color: #e2e2e2;
        }
    </style>
</head>

<body style="background-image: url('<?=base_url();?>public/images/bg-contato.png'); padding: 30px;">
    <div class="container">
        <div class="col-md-4 offset-md-3 offset-lg-12 col-lg-12">
            <div class="mail">
                <div class="mail-logo text-center">
                    <img src="<?=base_url();?>public/images/logo.png">
                </div>
                <div class="mail-header">
                    <h3>Novo teste iniciado</h3>
                </div>
                <div class="mail-content">
                    <h4>O cliente <strong><?=$cliente['nome'];?></strong>, inicou um teste:</h4><br>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" class="table-title">Nome</th>
                                <td colspan="2">
                                    <?=$cliente['nome'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="table-title">Email</th>
                                <td colspan="2">
                                    <?=$cliente['email'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="table-title">Telefone</th>
                                <td colspan="2">
                                    <?=$cliente['telefone'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="table-title">Plano</th>
                                <td colspan="2">
                                    <?=$cliente['titulo'];?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>