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
            background-color: #0059b0;
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
            background-color: #0059b0;
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
            color: #283dbb;
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
        
        th,
        td {
            border-bottom: 1px solid #ddd;
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
    </style>
</head>

<body style="background-color: #f4f4f4; padding: 30px;">
    <div class="container">
        <div class="col-md-4 offset-md-3">
            <div class="mail">
                <div class="mail-logo text-center">
                    <img src="<?=base_url();?>public/images/logo-default.png">
                </div>
                <div class="mail-header">
                    <h3>Mudança de Senha</h3>
                </div>
                <div class="mail-content">
                    <h4>Olá <?=$cliente['nome'];?>, acesse o endereço abaixo para prosseguir com sua mudança de senha:</h4><br>
                    <div class="text-center">
                        <a href="<?=$cliente['url_change'];?>" class="mail-btn">Mudar Senha</a>
                        <small><a href="<?=$cliente['url_change'];?>"><?=$cliente['url_change'];?></a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>