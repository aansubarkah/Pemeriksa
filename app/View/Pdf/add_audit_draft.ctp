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
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT, false);

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

$fileName = 'cobaST';
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
$style = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$width = $pdf->getPageWidth() - 10;
$y = $pdf->GetY() + 1;
$pdf->Line(10, $y, $width, $y, $style);
$pdf->SetFont('times', '', 10);

$html = '<span style="text-align: center;">';
$html .= '<br><strong><u>SURAT TUGAS</u></strong><br>';
$html .= 'No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $letter['Letter']['name'] . '<br><br>';
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
$pdf->SetMargins(10, 5, 10, true);
// add a page
$pdf->AddPage();

$pdf->SetFont('times', '', 12);
$table = '<table nobr="true">
    <tbody>
    <tr><td width="325" style="vertical-align: middle; text-align: center;">';
$table .= '<img src="/img/garuda.jpg" width="100" height="100">';
$table .= '</td>';
$table .= '<td width="325">';
$table .= '<table nobr="true">';
$table .= '<tbody>';
$table .= '<tr>';
$table .= '<td width="100">Lembar ke</td>';
$table .= '<td width="5">:</td>';
$table .= '<td width="225">.........................................................</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="100">Kode No.</td>';
$table .= '<td width="5">:</td>';
$table .= '<td width="225">.........................................................</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="100">Nomor</td>';
$table .= '<td width="5">:</td>';
$table .= '<td width="225">........./SPD/PS/XVIII.SBY/' . $arrDate[1] . '/' . $arrDate[0] . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="100"></td>';
$table .= '<td width="5"></td>';
$table .= '<td width="225">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $month . '&nbsp;' . $arrDate[0] . '</td>';
$table .= '</tr>';
$table .= '</tbody>';
$table .= '</table>';
$table .= '</td>';
$table .= '</tr>';
$table .= '<tr><td width="325" style="vertical-align: middle; text-align: center; font-weight: bold;">BADAN PEMERIKSA KEUANGAN RI</td></tr>';
$table .= '<tr><td width="325" style="vertical-align: middle; text-align: center; font-weight: bold;">PERWAKILAN PROVINSI JAWA TIMUR</td></tr>';
$table .= '<tr><td width="325" style="vertical-align: middle; text-align: center;">Jalan Raya Juanda</td></tr>';
$table .= '<tr><td width="325" style="vertical-align: middle; text-align: center;">Sidoarjo</td></tr>';
$table .= '</tbody></table>';
$pdf->writeHTML($table, true, false, false, false, '');

$pdf->SetFont('times', 'B', 12);
$html = '<span style="text-align: center;">SURAT PERJALANAN DINAS (SPD)</span>';
$pdf->writeHTML($html, true, 0, true, true);

$pdf->SetFont('times', '', 12);
$table = '<table cellspacing="0" cellpadding="1">
    <tbody>';
$table .= '<tr nobr="true">';
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">1.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">Pejabat Pembuat Komitmen</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="310" style="text-align: justify; border-style: double;">Muhammad Hidayat</td>';
$table .= '</tr>';
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">2.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">Nama/NIP pegawai yang melaksanakan Perjalanan Dinas</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="310" style="text-align: justify; border-style: double;">' . $usersForSPD[0]['name'] . '&nbsp;/&nbsp;' . $usersForSPD[0]['number'] . '</td>';
$table .= '</tr>';//end line
//---------------------------- 3 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">3.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">a.&nbsp;Pangkat dan Golongan</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="20" style="border-top: 1px solid #000000;">a.</td>';
$table .= '<td width="290" style="text-align: justify; border-style: double;">' . $usersForSPD[0]['leveldescription'] . '&nbsp;(' . $usersForSPD[0]['levelname'] . ')</td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">b.&nbsp;Jabatan/Instansi</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">b.</td>';
$table .= '<td width="290" style="text-align: justify;">' . $usersForSPD[0]['positionlevelname'] . '&nbsp;/&nbsp;BPK RI Perwakilan Provinsi Jawa Timur</td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">c.&nbsp;Tingkat biaya perjalanan dinas</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">c.</td>';
$table .= '<td width="290" style="text-align: justify;"></td>';
$table .= '</tr>';//end line
//---------------------------- 4 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">4.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">Maksud perjalanan dinas</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="300" style="text-align: justify; border-style: double;">' . $users[0]['Activityuserview']['activitydescription'] . '</td>';
$table .= '</tr>';//end line
//---------------------------- 5 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">5.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">Alat angkutan yang dipergunakan</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="300" style="text-align: justify; border-style: double;">Kendaraan Umum</td>';
$table .= '</tr>';//end line
//---------------------------- 6 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">6.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">a.&nbsp;Tempat berangkat</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="20" style="border-top: 1px solid #000000;">a.</td>';
$table .= '<td width="290" style="text-align: justify; border-style: double;">' . $city . '</td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">b.&nbsp;Tempat tujuan</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">b.</td>';
$table .= '<td width="290" style="text-align: justify;">' . $entity['Entityview']['name'] . '</td>';
$table .= '</tr>';//end line
//---------------------------- 7 ---
$dateStart = new DateTime($users[0]['Activityuserview']['userstart']);
$dateEnd = new DateTime($users[0]['Activityuserview']['userend']);
$dateDiff = $dateEnd->diff($dateStart)->format("%a");

$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">7.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">a.&nbsp;Lamanya perjalanan dinas</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="20" style="border-top: 1px solid #000000;">a.</td>';
$table .= '<td width="290" style="text-align: justify; border-style: double;">' . $dateDiff . '&nbsp;hari</td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">b.&nbsp;Tanggal berangkat</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">b.</td>';
$table .= '<td width="290" style="text-align: justify;"></td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">c.&nbsp;Tanggal harus kembali</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">c.</td>';
$table .= '<td width="290" style="text-align: justify;"></td>';
$table .= '</tr>';//end line
//---------------------------- 8 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">8.</td>';
$table .= '<td width="125" style="text-align: center; border-top: 1px solid #000000;">Pengikut</td>';
$table .= '<td width="125" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">Nama</td>';
$table .= '<td width="210" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">Pangkat/Golongan</td>';
$table .= '<td width="170" style="text-align: center; border-style: double; border-top: 1px solid #000000;">Jabatan</td>';
$table .= '</tr>';//end line
//for followers
$charArr = array('a', 'b', 'c', 'd', 'e', 'f');
if(true) {
    $j = 0;
    for($i=3; $i<=5; $i++) {
        $table .= '<tr nobr="true">';//create newline
        $table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
        $table .= '<td width="20" style="text-align: center; border-top: 1px solid #000000;">' . $charArr[$j] . '.</td>';
        $table .= '<td width="230" style="text-align: justify; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">' . $usersForSPD[$i]['name'] . '</td>';
        $table .= '<td width="210" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">' . $usersForSPD[$i]['leveldescription'] . '&nbsp;(' . $usersForSPD[$i]['levelname'] . ')</td>';
        $table .= '<td width="170" style="text-align: center; border-style: double; border-top: 1px solid #000000;">' . $usersForSPD[$i]['positionlevelname'] . '</td>';
        $table .= '</tr>';//end line
        $j++;
    }
}

$i = 1;
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="20" style="text-align: center; border-top: 1px solid #000000;">' . $charArr[$j] . '.</td>';
$table .= '<td width="230" style="text-align: justify; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">' . $usersForSPD[$i]['name'] . '</td>';
$table .= '<td width="210" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">' . $usersForSPD[$i]['leveldescription'] . '&nbsp;(' . $usersForSPD[$i]['levelname'] . ')</td>';
$table .= '<td width="170" style="text-align: center; border-style: double; border-top: 1px solid #000000;">' . $usersForSPD[$i]['positionlevelname'] . '</td>';
$table .= '</tr>';//end line
/*$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="20" style="text-align: center; border-top: 1px solid #000000;">' . $charArr[$j] . '.</td>';
$table .= '<td width="230" style="text-align: justify; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">' . $usersForSPD[$i]['name'] . '</td>';
$table .= '<td width="210" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">' . $usersForSPD[$i]['leveldescription'] . '&nbsp;(' . $usersForSPD[$i]['levelname'] . ')</td>';
$table .= '<td width="170" style="text-align: center; border-style: double; border-top: 1px solid #000000;">' . $usersForSPD[$i]['positionlevelname'] . '</td>';
$table .= '</tr>';//end line*/

//---------------------------- 9 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000;">9.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double; border-top: 1px solid #000000;">Pembebanan Anggaran</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="20" style="border-top: 1px solid #000000;"></td>';
$table .= '<td width="290" style="text-align: justify; border-style: double;"></td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">a.&nbsp;Instansi</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">a.</td>';
$table .= '<td width="290" style="text-align: justify;">BPK RI Perwakilan Provinsi Jawa Timur</td>';
$table .= '</tr>';//end line
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="290" style="text-align: justify;">c.&nbsp;Akun</td>';
$table .= '<td width="10" style="border-right: 1px solid #000000;"></td>';
$table .= '<td width="10"></td>';
$table .= '<td width="20">b.</td>';
$table .= '<td width="290" style="text-align: justify;"></td>';
$table .= '</tr>';//end line
//---------------------------- 10 ---
$table .= '<tr nobr="true">';//create newline
$table .= '<td width="30" style="text-align: center; border-style: double; border-top: 1px solid #000000; border-right: 1px solid #000000; border-bottom: 1px solid #000000;">10.</td>';
$table .= '<td width="10" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;"></td>';
$table .= '<td width="610" style="text-align: justify; border-style: double; border-top: 1px solid #000000; border-bottom: 1px solid #000000;">Keterangan lain-lain: Melaksanakan Surat Tugas Kepala Perwakilan BPK RI Provinsi Jawa Timur No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $letter['Letter']['name'] . '&nbsp;Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $month . '&nbsp;' . $arrDate[0] . '</td>';
$table .= '</tr>';//end line

$table .= '</tbody>';
$table .= '</table>';
$pdf->writeHTML($table, true, false, false, false, '');

//++++++++++++++++++++++++++++++++++++++++ MASTER'S TABLE +++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->SetFont('times', '', 12);

$table = '
<table nobr="true">
    <tbody>
    <tr>';
$table .= '<td width="350"></td>';
$table .= '<td width="100">Dikeluarkan di</td>';
$table .= '<td width="10">:</td>';
$table .= '<td width="200">' . $city . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="350"></td>';
$table .= '<td width="100" style="border-bottom: 1px solid #000000;">Pada Tanggal</td>';
$table .= '<td width="10" style="border-bottom: 1px solid #000000;">:</td>';
$table .= '<td width="200" style="border-bottom: 1px solid #000000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $month . '&nbsp;' . $arrDate[0] . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="350"></td>';
$table .= '<td width="310" style="text-align: center;">Pejabat Pembuat Komitmen,<br><br><br></td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="350"></td>';
$table .= '<td width="310" style="text-align: center;">' . $master['Chief']['User']['name'] . '</td>';
$table .= '</tr>';
$table .= '<tr>';
$table .= '<td width="350"></td>';
$table .= '<td width="310" style="text-align: center;">NIP&nbsp;' . $master['Chief']['User']['number'] . '</td>';
$table .= '</tr>';
$table .= '</tbody></table>';

$pdf->writeHTML($table, true, false, false, false, '');
//++++++++++++++++++++++++++++++++++++++++ END OF FILE +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$pdf->lastPage();

echo $pdf->Output(APP . 'webroot/files/' . DS . $fileName . '.pdf', 'F');