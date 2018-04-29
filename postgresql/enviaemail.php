<?php

require_once './classes/PHPMailer.php';
require_once './classes/PHPMailerAdapter.php';

$email = new PHPMailerAdapter;
$email->setUseSmtp();
$email->setSmtpHost('smtp.gmail.com', 465);
$email->setSmtpUser('rafael.sil@edu.unipar.br', 'teemoop123@');
$email->setFrom('rafael.sil@edu.unipar.br', 'Rafael Almeida');
$email->addAddress('ralfalmeida22@hotmail.com', 'Rafael Almeida');
$email->setSubject('Oi cara!');
$email->setHtmlBody('<b>Isso é um <i>teste</i></b>');
$email->send();