<?php
/**
 * @var View $this
 */
echo 'Berhasil menyimpan Draft SP2.&nbsp;';
$fileLink = '/evidences/download/' . $fileId . '/draft';
echo $this->Html->link('Unduh Draft SP2', $fileLink);
echo '.';