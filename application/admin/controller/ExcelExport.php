<?php

namespace app\admin\controller;

use think\Db;
/**
 * excel表格生成
 * @author xiaokai
 * @return download
 */
class ExcelExport{

    public static $instance;
    protected static $site = ['A','B','C','D','E','F','G','H','I','J','K','L','N','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    protected static $rowSite = [];
    //自定义属性
    public static $conf = [
        'headerInfo' => [
             'creator' => 'lizhijian'
            ,'lastModifieder' => 'lizhijian'
            ,'title' => 'live'
            ,'subject' => 'live'
            ,'dscription' => 'live'
            ,'keywords' => 'live'
            ,'category' => 'result file'
        ]
        ,'start' => 3 //从第几行开始写入
        ,'search' => true //是否开启搜索条件自动写入, start>1时有效
    ];


    /**
     * 初始化
     * @param $data
     * @return string
     * @author Lizhijian
     */
    public static function __init($data)
    {
        if(empty($data['data']) || empty( $data['fileName'])){
            return '';
        }
        include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
        include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel/Reader/Excel2007.php';
        self::$instance = new \PHPExcel();
        //初始化phpexcel
        $header = self::$conf['headerInfo'];
        self::$instance->getProperties()->setCreator($header['creator'])
            ->setLastModifiedBy($header['lastModifieder'])
            ->setTitle($header['title'])
            ->setSubject($header['subject'])
            ->setDescription($header['dscription'])
            ->setKeywords($header['keywords'])
            ->setCategory($header['category']);
        //构造行头
        foreach (self::$site as$v){
            self::$rowSite[] = $v . self::$conf['start'];
        }
        //搜索条件
        if(self::$conf['start'] > 1 && true === self::$conf['search']){
            self::$instance->setActiveSheetIndex(0)->setCellValue('A2', '搜索条件：');
            //搜索日期
            if(input('logmin')) self::$instance->setActiveSheetIndex(0)->setCellValue('B2', '开始日期('.input('logmin').')');
            if(input('logmax')) self::$instance->setActiveSheetIndex(0)->setCellValue('C2', '结束日期('.input('logmax').')');
            if(input('course_type')) self::$instance->setActiveSheetIndex(0)->setCellValue('D2', '类型('.(input('course_type')==1?'单节课':'系列课').')');
            //搜索其他
            $i = 4;
            foreach (input() as $k => $v){
                if(isset($data['data'][$k]) && trim($v, ' ')){
                    self::$instance->setActiveSheetIndex(0)->setCellValue(self::$site[$i].'2', replaceSpecialChar($data['data'][$k]."($v)"));
                    $i++;
                }
            }
        }
    }

    /**
     * 输出文件
     * @param $fileName
     * @return bool
     * @author Lizhijian
     */
    protected static function __end($fileName){
        if(empty($fileName)){
            return false;
        }
        //居中显示
        self::$instance->getDefaultStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        self::$instance->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        //标题
        self::$instance->getActiveSheet()->setTitle('统计excel');
        self::$instance->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '_' . date('Ymd', time()).'.xls"');
        header('Cache-Control: max-age=0');
        //创建excel
        $objWriter = \PHPExcel_IOFactory::createWriter(self::$instance, 'Excel5');
        //导出
        $objWriter->save('php://output');
        exit;
    }

    /**
	 * 到处excel表
	 * @param  [type] $procedure   执行存储过程orSql语句
	 * @param  [type] $excelName   excel名称
	 * @param  [type] $titleArray  excel列名
	 * @param  [type] $columnArray 要取字段名
	 * @param  [type] $sqlType     执行类型 1：存储过程 2：sql语句
	 * @return [type]              [description]
	 */
	public function buildExcel($procedure,$excelName,$titleArray,$columnArray,$sqlType){
		include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
		include_once ROOT_PATH . 'vendor/phpoffice/phpexcel/Classes/PHPExcel/Reader/Excel2007.php';
		$objPHPExcel = new \PHPExcel();
		//初始化phpexcel
        $objPHPExcel->getProperties()->setCreator("caibibi")
            ->setLastModifiedBy("caibibi")
            ->setTitle("order")
            ->setSubject("order")
            ->setDescription("order")
            ->setKeywords("excel")
            ->setCategory("result file");
        $columnSite = ['A','B','C','D','E','F','G','H','I','J','K','L','N','M','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $columnSite1 = ['A1','B1','C1','D1','E1','F1','G1','H1','I1','J1','K1','L1','N1','M1','O1','P1','Q1','R1','S1','T1','U1','V1','W1','X1','Y1','Z1'];
        //排列要导出的数据列标题
        for ($i=0; $i < count($titleArray); $i++) { 
        	//设置列名
        	$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($columnSite1[$i], $titleArray[$i]);
            //设置列宽
            $objPHPExcel->getActiveSheet(0)->getColumnDimension($columnSite[$i])->setWidth(20);
        }
        if($sqlType == 1){
        	$model = Db::connect(config('bs_db_config'));
      		$rows = $model->query($procedure);
        }
        if(empty($rows)){
        	return;
        }
        //填充数据
        foreach ($rows[0] as $k => $v) {
            $num = $k + 2;
            for ($i=0; $i < count($columnArray); $i++) { 
            	$objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($columnSite[$i] . $num, $v[$columnArray[$i]]);
            }
        }
        $objPHPExcel->getActiveSheet()->setTitle('统计excel');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $excelName . '.xls"');
        header('Cache-Control: max-age=0');
        //创建excel
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //导出
        $objWriter->save('php://output');
        exit;
	}

    /**
     * 根据数据源导出excel表
     * @param $data 数据来源(一维数组)
     * @param $excelData excel表头与字段数组
     * example：
     * $excelData = [
        'fileName' => '课程直播间监控数据',
        'data' => [
            'id' => 'ID',
            'class_bname' => '课程名称',
            'type' => '课程类型',
            'plan_num' => '课程安排',
            'alias' => '创建人',
            'study_num' => '历史人数',
            'total' => '总停留时长（分）',
            'ave_total' => '总发言次数',
            'speak_total' => '人均停留时长（分）',
            'ave_speak_total' => '人均发言次数',
            ],
        ];
     * @return string
     * @author Lizhijian
     */
	public static function buildExcelByData($data, $excelData){
	    self::__init($excelData);

        //排列要导出的数据列标题
        $i = 0;
        foreach ($excelData['data'] as $k => $v){
            //设置列名
            self::$instance->setActiveSheetIndex(0)->setCellValue(self::$rowSite[$i], $v);
            //设置列宽
            self::$instance->getActiveSheet(0)->getColumnDimension(self::$site[$i])->setWidth(20);
            $i++;
        }
        //填充数据
        foreach ($data as $k => $v) {
            $num = $k + self::$conf['start'] + 1;//从第三行开始填充
            $i = 0;
            foreach ($excelData['data'] as $kk => $vv){
                self::$instance->setActiveSheetIndex(0)
                    ->setCellValue(self::$site[$i] . $num, replaceSpecialChar($v[$kk]));
                $i++;
            }
        }
        self::__end($excelData['fileName']);
    }
}
