<?php
App::import('Vendor', 'tcpdf/tcpdf');

class XTCPDF extends TCPDF
{
    public function headerGaruda()
    {
        $imageFile = APP . 'webroot/img/garuda.jpg';
        $this->Image($imageFile, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }
}