<?php
    namespace Classes;

use TCPDF;

    require_once '../public/tcpdf/tcpdf.php';

    class Reportes extends TCPDF{

        public function header(){
            $bMargin = $this->getBreakMargin();
            $auto_page_break = $this->AutoPageBreak;
            $this->SetAutoPageBreak(false,0);
            $img = imagecreatefrompng('../public/assets/img/logo.png');
            
            $imgWidth = imagesx($img);
            $imgHeight = imagesy($img);
            
            ob_start();
            imagepng($img);
            $imageData = ob_get_clean();
        
            $this->Image('@' . $imageData, 85, 8, 20, 25, 'PNG', '', '', false, 300, '', false, false, 0);
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            $this->setPageMark();
        }


    }
