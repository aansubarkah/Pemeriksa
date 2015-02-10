<?php
App::import('Vendor', 'xtcpdf');

$pdf = new XTCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Aplikasi SP2P');
$pdf->SetTitle('Draft ST Pemeriksaan');
$pdf->SetSubject('ST Pemeriksaan');
$pdf->SetKeywords('ST', 'Pemeriksaan', 'Draft');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
//$pdf->SetFont('times', 'BI', 12);
$pdf->SetFont('times', '', 12);
// add a page
$pdf->AddPage();

$pdf->setJPEGQuality(75);

$fileName = 'cobaST2';
//++++++++++++++++++++++++++++++++++++++++ HEADER +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Image example with resizing
//          file path                       horizontal align    y pos   height  width   type
$pdf->Image(APP . 'webroot/img/garuda.jpg', 'C', 6, 34.5, 34.5, 'JPG', false, 'C', true, 300, 'C', false, false, 0, false, false, false);

$pdf->SetY($pdf->GetY() + 15);

$pdf->SetFont('times', '', 10);
$html = '<span style="text-align: center;">';
$html .= '<strong>BADAN PEMERIKSA KEUANGAN REPUBLIK INDONESIA<br>';
$html .= 'PERWAKILAN PROVINSI JAWA TIMUR<br></strong>';
$html .= 'Jalan Raya Juanda Sidoarjo Jawa Timur Telepon (031) 8669244 Faksimil (031) 8669206';
$html .= '</span>';

$pdf->writeHTML($html, true, 0, true, true);
$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$width = $pdf->getPageWidth() - 10;
$y = $pdf->GetY() + 1;
$pdf->Line(10, $y, $width, $y, $style);
$pdf->SetFont('times', '', 10);

$html = '<span style="text-align: center;">';
$html .= '<br><strong><u>SURAT TUGAS</u></strong><br>';
$html .= 'No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $users[0]['Activityuserview']['activityname'] . '<br><br>';
$html .= '</span>';

$pdf->SetFont('times', '', 10);
$html .= 'Berdasarkan Undang-undang Nomor 15 Tahun 2006, Badan Pemeriksa Keuangan Republik Indonesia memberi tugas kepada:<br>';
$pdf->writeHTML($html, true, 0, true, true);

//++++++++++++++++++++++++++++++++++++++++ PERSON IN CHARGE TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
    <thead>
    <tr>
        <td width="67.5"></td>
        <td align="center" width="30"><strong>No</strong></td>
        <td align="center" width="200"><strong>Nama</strong></td>
        <td align="center" width="160"><strong>Jabatan</strong></td>
        <td align="center" width="125"><strong>Jumlah Hari</strong></td>
    </tr>
    </thead>
    <tbody>';
//135 width
//$roles = array();
//$departements = array();
$i = 1;
foreach ($users as $user) {
    $table .= '<tr nobr="true">';
    $table .= '<td width="66.5"></td>';
    $table .= '<td nobr="true" width="30" align="center">';
    $table .= $i;
    $table .= '</td>';
    $table .= '<td nobr="true" width="200">';
    $table .= '&nbsp;' . $user['Activityuserview']['username'] . '</td>';
    $table .= '<td nobr="true" width="160" align="center">';
    $table .= $user['Activityuserview']['dutyname'];
    $table .= '</td>';
    $table .= '<td nobr="true" width="125" align="center">';
    //$dateStart = strtotime($user['Activityuserview']['userstart']);
    //$dateEnd = strtotime($user['Activityuserview']['userend']);
    //$dateDiff = $dateEnd - $dateStart;
    //$table .= abs($dateDiff/(60*60*24));
    //alternative
    $dateStart = new DateTime($user['Activityuserview']['userstart']);
    $dateEnd = new DateTime($user['Activityuserview']['userend']);
    $dateDiff = $dateEnd->diff($dateStart)->format("%a");
    $table .= $dateDiff;

    $table .= '</td>';
    $table .= '</tr>';
    $i++;
}

$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ USER'S DUTY TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
    <tbody>
    <tr>
        <td width="120">&nbsp;Untuk melaksanakan</td>
        <td align="center" width="15">:</td>
        <td width="515" style="text-align: justify;">';
$table .= $users[0]['Activityuserview']['activitydescription'];
//$table .= '&nbsp;di&nbsp;' . $entity['Entityview']['capital'];
$table .= '</td></tr></tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ MASTER'S TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
    <tbody>
    <tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: right;">' . $city . ',&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $month . '&nbsp;' . $arrDate[0] . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: center;"><strong>Kepala Perwakilan,</strong><br><br><br><br><br></td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: center;"><strong>' . $master['Chief']['User']['name'] . '</strong></td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: center;"><strong>NIP&nbsp;' . $master['Chief']['User']['number'] . '</strong></td>';
$table .= '</tr>';
$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ DEPARTEMENT TO SEND LETTER ++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '<br>
<table nobr="true">
    <tbody>
    <tr>
        <td width="650" colspan="2">Tembusan Yth:</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="15">1</td>';
$table .= '<td width="635">Menteri Dalam Negeri di Jakarta;</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="15">2</td>';
$table .= '<td width="635">Anggota V BPK RI di Jakarta;</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="15">3</td>';
$table .= '<td width="635">Auditor Utama Keuangan Negara V BPK RI di Jakarta;</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="15">4</td>';
$table .= '<td width="635">Kepala Direktorat Utama Revbang BPK RI di Jakarta;</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="15">5</td>';
$table .= '<td width="635">Inspektur Utama BPK RI di Jakarta.</td>';
$table .= '</tr>';
$table .= '</tbody></table>';
$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++ ADD PAGE TO 2nd DOCUMENT ++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// add a page
/*$pdf->AddPage();

$pdf->SetFont('times', 'B', 12);
$html = '<span style="text-align: center;">';
$html .= '<strong>SURAT KETERANGAN PENYELESAIAN PENUGASAN</strong>';
$html .= '</span><br>';

$pdf->SetFont('times', '', 10);
$html .= 'Menerangkan bahwa:';
$pdf->writeHTML($html, true, 0, true, true);

//++++++++++++++++++++++++++++++++++++++++ PERSON IN CHARGE TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table cellspacing="0" cellpadding="1" border="1">
    <thead>
    <tr>
        <td align="center" width="30">NO</td>
        <td align="center" width="200">NAMA</td>
        <td align="center" width="160">PANGKAT/GOL</td>
        <td align="center" width="125">JFP</td>
        <td align="center" width="135">PERAN PEMERIKSA</td>
    </tr>
    </thead>
    <tbody>';

$i = 1;

foreach ($officers as $officer) {
    $table .= '<tr nobr="true"><td nobr="true" width="30" align="center">';
    $table .= $i;
    $table .= '</td>';
    $table .= '<td nobr="true" width="200">';
    $table .= '&nbsp;' . $officer['name'] . '</td>';
    $table .= '<td nobr="true" width="160" align="center">';
    $table .= $officer['leveldescription'] . ' (' . $officer['levelname'] . ')';
    $table .= '</td>';
    $table .= '<td nobr="true" width="125" align="center">';
    $table .= $officer['positionlevelname'];
    $table .= '</td>';
    $table .= '<td nobr="true" width="135" align="center">';
    $table .= $officer['roledescription'];
    $table .= '</td>';
    $table .= '</tr>';
    $i++;
}

$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ OFFICER'S DUTY TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
    <tbody>
    <tr>
        <td width="150">&nbsp;Telah melaksanakan</td>
        <td align="center" width="15">:</td>
        <td width="485" style="text-align: justify;">';
$table .= 'Kegiatan&nbsp;' . $description;
$table .= '&nbsp;sebagai&nbsp;<strong><i>pemapar</i></strong>';
$table .= '</td></tr></tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ AUDIENCE TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table cellspacing="0" cellpadding="1" border="1">
    <thead>
    <tr>
        <td align="center" width="30">NO</td>
        <td align="center" width="200">NAMA</td>
        <td align="center" width="160">PANGKAT/GOL</td>
        <td align="center" width="125">JFP</td>
        <td align="center" width="135">PERAN PEMERIKSA</td>
    </tr>
    </thead>
    <tbody>';

$i = 1;

foreach ($users as $user) {
    $table .= '<tr nobr="true"><td nobr="true" width="30" align="center">';
    $table .= $i;
    $table .= '</td>';
    $table .= '<td nobr="true" width="200">';
    $table .= '&nbsp;' . $user['name'] . '</td>';
    $table .= '<td nobr="true" width="160" align="center">';
    $table .= $user['leveldescription'] . ' (' . $user['levelname'] . ')';
    $table .= '</td>';
    $table .= '<td nobr="true" width="125" align="center">';
    $table .= $user['positionlevelname'];
    $table .= '</td>';
    $table .= '<td nobr="true" width="135" align="center">';
    $table .= $user['roledescription'];
    $table .= '</td>';
    $table .= '</tr>';
    $i++;
}

$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ AUDIENCE'S DUTY TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
    <tbody>
    <tr>
        <td width="150">&nbsp;Telah</td>
        <td align="center" width="15">:</td>
        <td width="485" style="text-align: justify;" colspan="2">';
$table .= 'Mengikuti&nbsp;kegiatan&nbsp;';
$table .= $description;
$table .= '&nbsp;sebagai&nbsp;<strong><i>peserta</i></strong><br>';
$table .= '</td></tr>';
$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ AUDIENCE'S AND OFFICER'S DUTY TABLE +++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
<tbody>
<tr>
<td>
';
//+++++++++ First Row
$table .= '
<table>
    <tbody>';
$table .= '<tr>';
$table .= '<td width="650">';
$table .= 'Telah menyelesaikan penugasan berdasarkan SP2 No&nbsp;';
$table .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $numberFormat . $arrDate[1] . '/' . $arrDate[0];
$table .= '&nbsp;dengan hasil kegiatan sebagai berikut:';
$table .= '</td>';
$table .= '</tr>';
$table .= '</tbody></table>';

//+++++++++ 2nd Row
$table .= '
<table cellspacing="0" cellpadding="1" border="1">
    <tbody>
    <tr>
        <td align="center" width="30">No</td>
        <td align="center" width="400">Uraian Kegiatan</td>
        <td align="center" width="220">Hasil Kegiatan</td>
    </tr>';
$table .= '<tr style="padding-left: 15px;">';
$table .= '<td align="center">';
$table .= '1.';
$table .= '</td>';
$table .= '<td style="text-align: justify; margin-left: 15px;">';
$table .= 'Mengikuti&nbsp;kegiatan&nbsp;';
$table .= $description;
$table .= '&nbsp;(Pelaksana:&nbsp;';

$rolesCount = count($roles);
$i = 0;
foreach ($roles as $key => $values) {
    $table .= $values;
    if ($i == $rolesCount - 3) {
        $table .= '&nbsp;dan&nbsp;';
    } elseif ($i == $rolesCount - 2) {
        $table .= '&nbsp;serta&nbsp;';
    } elseif ($i > $rolesCount - 2) {

    } else {
        $table .= ',&nbsp;';
    }
    $i++;
}

$table .= ')';
$table .= '</td>';
$table .= '<td>';
$table .= '&nbsp;Terlampir';
$table .= '</td>';
$table .= '</tr>';
$table .= '</tbody></table>';

//+++++++++ 3rd Row
$table .= '</td>';
$table .= '</tr>';
$table .= '<tr><td></td></tr>';

$table .= '<tr>';
$table .= '<td>';

$table .= '
<table>
    <tbody>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: right;">' . $city . ',&nbsp;' . $arrDate[2] . '&nbsp;' . $month . '&nbsp;' . $arrDate[0] . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: center;">Kepala Perwakilan<br><br><br><br><br></td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: center;">' . $master['Chief']['User']['name'] . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="450" colspan="3"></td>';
$table .= '<td width="200" style="text-align: center;">NIP&nbsp;' . $master['Chief']['User']['number'] . '</td>';
$table .= '</tr>';
$table .= '</tbody></table>';

//+++++++++ Finishing Table
$table .= '</td>';
$table .= '</tr>';
$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ DEPARTEMENT TO SEND LETTER ++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 10);

$table = '
<table nobr="true">
    <tbody>
    <tr>
        <td width="650" colspan="2">Tembusan:</td>';
$table .= '</tr>';
$i = 1;
foreach ($departements as $departement) {
    $table .= '<tr>';
    $table .= '<td width="15">' . $i . '.</td>';
    $table .= '<td width="635">' . 'Kepala&nbsp;' . $departement['departementdescription'] . '</td>';
    $table .= '</tr>';
    $i++;
}

$table .= '</tbody></table>';
$pdf->writeHTML($table, true, false, false, false, '');
*/
//++++++++++++++++++++++++++++++++++++++++ END OF FILE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->lastPage();

echo $pdf->Output(APP . 'webroot/files/' . DS . $fileName . '.pdf', 'F');