<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 *Email Configuration file
 *
 *contains preferences that can be set when sending email.
 */


$config['protocol']='smtp';
$config['smtp_host']='ssl://smtp.googlemail.com';
$config['smtp_port']='465';
$config['smtp_timeout']='30';	

$config['smtp_user'] = 'trust.manager@mishkat.pk';
$config['smtp_pass'] = 'T1234567m';

$config['charset']='utf-8';
$config['newline']="\r\n";
$config['mailtype']="html";