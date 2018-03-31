<?php


namespace App\Helpers;

require base_path().'/vendor/autoload.php';


use Modules\Order\Entities\Orderlist;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class Report
{
    public function generateReport($commodity_id)
    {
        ini_set('max_execution_time', 600000);

        $data = Orderlist::join('order','order_list.order_id','=','order.order_id')->join('member','order.member_id','=','member.member_id')->where([['commodity_id',$commodity_id],['order_status','!=','refund'],])
            ->select('id','order_number', 'member_name','amount','member_sex','price','member_year','member_month','member_mail','member_phone','member_tel','member_city','member_area','member_location')->get();
//        dd($data);

        $bookmark = 0;

        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
            ->setLastModifiedBy('Maarten Balliauw')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('A1', '訂單編號');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('B1', '用戶名稱');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('C1', '數量');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('D1', '價格');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('E1', '下定時間');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('F1', '性別');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('G1', '生日');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('H1', '信箱');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('I1', '手機');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('J1', '電話');
        $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('K1', '地址');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);


        $title_row = 2;

        foreach ($data as $v) {
            $created_at = Orderlist::find($v->id);
            $v['member_city'] = (new TownshipHelper())->getCity($v->member_city);
            $v['member_area'] = (new TownshipHelper())->getArea($v->member_area);
            $v['created_at'] = $created_at['created_at'];
//            dd($v);

            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('A'.$title_row, $v->order_number);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('B'.$title_row, $v->member_name);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('C'.$title_row, $v->amount);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('D'.$title_row, ($v->amount*$v->price));
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('E'.$title_row, $v->created_at);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('F'.$title_row, $v->member_sex);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('G'.$title_row, $v->member_year.'-'.$v->member_month);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('H'.$title_row, $v->member_mail);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('I'.$title_row, $v->member_phone);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('J'.$title_row, $v->member_tel);
            $spreadsheet->setActiveSheetIndex($bookmark)->setCellValue('K'.$title_row, $v->member_city.'-'.$v->member_area.'-'.$v->member_location);

            $title_row++;


        }
//        $bookmark++;

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename='TEST.xls'");
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');
//        $writer->save('/var/www/html/mrt_report/public/');
    }



}