<?php
namespace CMS\App\Libs;


use Maatwebsite\Excel\Files\NewExcelFile;

class MyExcel extends NewExcelFile
{

    /**
     * Get file
     *
     * @return string
     */
    public function getFilename()
    {
        return 'Thanh Tung';
    }

    public function getExt(){
        return 'pdf';
    }
}

