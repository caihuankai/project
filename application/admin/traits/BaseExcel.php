<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2018/6/4
 * Time: 10:03
 */

namespace app\admin\traits;

use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Reader_Excel5;
trait BaseExcel
{
    /**
     * 用于生成excel文件的函数
     * author:walker
     * @param $data 生成excel的数据(二维数组形式)
     * @param null $savefile 生成excel的文件名(保不指定,则为当前时间戳)
     * @param null $title 生成excel的表头(一维数组形式)
     * @param string $sheetname 生成excel的sheet名称(缺省为sheet1)
     */
    public function exportExcel($data,$savefile=null,$title=null,$sheetname='sheet1',$type=true){
        //若没有指定文件名则为当前时间戳
        if(is_null($savefile)){
            $savefile=time();
        }
        //若指字了excel表头，则把表单追加到正文内容前面去
        if(is_array($title)){
            array_unshift($data,$title);
        }
        $objPHPExcel = new PHPExcel();
        //Excel内容
        $key = 0;//超过26列是用这个
        foreach($data as $k => $v){
            $colum = \PHPExcel_Cell::stringFromColumnIndex($key);//超过26列是用这个
            $obj=$objPHPExcel->setActiveSheetIndex(0);
            $row=$k+1;//行
            $key += 1;//超过26列是用这个
            // $nn=0;//少于26列市
            $span = 0;//超过26列是用这个
            foreach($v as $vv){
//                $col=chr(65+$nn);//少于26列市，控制列数
                $col = \PHPExcel_Cell::stringFromColumnIndex($span);//超过26列是用这个
                $obj->setCellValue($col.$row,$vv);//列,行,值
                //$nn++;//少于26列市，控制列数
                $span++;//超过26列是用这个
            }
        }
        if($type == true){
            $size = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y',
                'Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT',
                'AU','AV','AW','AX','AY','AZ'];
            $maxsize = [];
            for ($j=0; $j <count($data); $j++) {
                for ($i=0;$i<count($data[$j]);$i++){
                    $datas = array_keys($data[$j]);
                    $str = $data[$j][$datas[$i]];
                    if ($this -> ispreg($str) == true) {
                        if (!array_key_exists($size[$i],$maxsize)){
                            $maxsize[$size[$i]] =  mb_strlen($str,'UTF8')+15;
                            $len = $maxsize[$size[$i]];
                        }else{
                            if ($maxsize[$size[$i]]> mb_strlen($str,'UTF8')+15){
                                $len = $maxsize[$size[$i]];
                            }else{
                                $maxsize[$size[$i]] = mb_strlen($str,'UTF8')+15;
                                $len = $maxsize[$size[$i]];
                            }
                        }
                        $objPHPExcel->getActiveSheet()->getColumnDimension($size[$i])->setWidth($len);
                    }else{
                        if (!array_key_exists($size[$i],$maxsize)){
                            $maxsize[$size[$i]] =  mb_strlen($str,'UTF8')+3;
                            $len = $maxsize[$size[$i]];
                        }else{
                            if ($maxsize[$size[$i]] > mb_strlen($str,'UTF8')+3){
                                $len = $maxsize[$size[$i]];
                            }else{
                                $maxsize[$size[$i]] = mb_strlen($str,'UTF8')+3;
                                $len = $maxsize[$size[$i]];
                            }
                        }
                        $objPHPExcel->getActiveSheet()->getColumnDimension($size[$i])->setWidth($len);
                        //$objPHPExcel->getActiveSheet()->getColumnDimension($size[$i])->setAutoSize(true);
                    }
                }
            }
        }
        $objPHPExcel->getActiveSheet()->setTitle($sheetname);
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$savefile.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }//end

    public function ispreg($str)
    {
        $pattern = "/[\x7f-\xff]/";
        if(preg_match($pattern,$str)){
            return true;
        }else{
            return false;
        }
    }

}