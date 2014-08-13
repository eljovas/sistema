<?php
require 'class.phpmailer.php';
$asociado = intval($_GET["asociado"]);

$link = mysql_connect('internal-db.s75015.gridserver.com', 'db75015_dermato', 'drizabalweb');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$db_selected = mysql_select_db('db75015_sistema', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}
$hoy = date("Y-m-d");
$rs_citas = mysql_query("SELECT
      procedimientos.concepto as razon,
      clients.nombre as nombre,
      clients.apellido as apellido,
      citas.tipo as atiende,
      citas.fecha_inicio as fecha,
      citas.hora_inicio as inicia,
      citas.hora_fin as termina,
      user.first_name as cosmetologa
FROM
      citas
INNER JOIN
      procedimientos
ON
      procedimientos.id = citas.asunto
INNER JOIN
      clients
ON 
      clients.id = citas.paciente
INNER JOIN
      user
ON
      user.user_id = citas.atiende      
WHERE
      citas.sucursal = 1
AND
      citas.fecha_inicio = '".$hoy."'
ORDER BY
      user.first_name ASC, hora_inicio ASC");




define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Dermatológica")
							 ->setLastModifiedBy("Dermatológica")
							 ->setTitle("Reporte de Citas ".date("Y-m-d"))
							 ->setSubject("Reporte de Citas")
							 ->setDescription("Reporte de Citas.")
							 ->setKeywords("gastos")
							 ->setCategory("Citas");

// HEADERS

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hora')
            ->setCellValue('B1', 'Paciente')
            ->setCellValue('C1', 'Asunto')
            ->setCellValue('D1', 'Tipo')
            ->setCellValue('E1', 'Encargado');
$j=2;
while ($cita = mysql_fetch_assoc($rs_citas)) {
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$j, $cita["inicia"]." - ".$cita["termina"])
            ->setCellValue('B'.$j, utf8_encode($cita["nombre"]." ".$cita["apellido"]))
            ->setCellValue('C'.$j, utf8_encode($cita["razon"]))
            ->setCellValue('D'.$j, $cita["atiende"])
            ->setCellValue('E'.$j, $cita["cosmetologa"]);
            $j++;
}
$objPHPExcel->getActiveSheet()->setTitle('hoy');
$objPHPExcel->createSheet();

$callStartTime = microtime(true);

$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$file = "dermatologica_tijuana_citas_".date("Y-m-d").".xls";

$objWriter->save($file);
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

$mail = new PHPMailer;

$mail->From = 'noreplay@dermatologica.org';
$mail->FromName = 'Notificaciones';
$mail->AddAddress('recepcion@dermatologica.org', 'Recepcion');  // Add a recipient
$mail->AddAddress('jhovan.eduardo@gmail.com', 'Jhovan Lopez');
$mail->AddAddress('drbizarre@gmail.com', 'Oscar Quintero');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->AddAttachment($file);         // Add attachments

$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Reporte de Citas Dermatologica Tijuana: '. date("Y-m-d");
$mail->Body    = '<p>Hola Buenos dias, adjunto encontraras el archivo con las citas a efectuarse el dia de hoy '.date("Y-m-d").'</p>';
$mail->AltBody = 'reporte de citas';

$mail->Send();


mysql_close($link);
?>