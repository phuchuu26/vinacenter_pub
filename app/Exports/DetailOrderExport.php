<?php
namespace App\Exports;

use Modules\Lending\Services\LoanRequestService;

use Maatwebsite\Excel\Collections;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Widget;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\withHeadings;



class DetailOrderExport implements Collections, WithHeadings, WithMapping, ShouldAutoSize, WithColumnFormatting , WithEvents
{ 
    public $count;
    public $approval_request;
    public $customer_status;
    public $models;
    public $type;
    public $use_case_group;
    public $form_data;
    public $loan_status_code;
    protected $loan_request_service;

    public function __construct($customer, $models, $user, $order_id)
    {
        $this->models = $models;

    }
    
    public function collection()
    {
        return $this->models;
    }

    public function map($model) : array
    {
        $order = $model->order ?? null;
        $product_type_desc = null;
        $brand = null;
       
        $return_row = [
          

        ];
       

        return $return_row;
    }

    
    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $text = 'A3:V'.(count($this->models) + 3);
    //             $event->sheet->getStyle($text)->applyFromArray([
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                         'color' => ['argb' => '000000'],
    //                     ],
    //                 ],

    //                 'font' => array(
    //                     'name' => 'Time New Roman',
    //                     'size' => 12,
    //                 ),
    //             ]);

    //             $event->sheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCFFFF');
    //             $event->sheet->getStyle('H3:N3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCFFFF');
    //             $event->sheet->getStyle('Q3:R3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCFFFF');
    //             $event->sheet->getStyle('E3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFFCC');
    //             $event->sheet->getStyle('O3:P3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFFCC');
    //             $event->sheet->getStyle('S3:V3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFFCC');

    //             $event->sheet->getDelegate()->getRowDimension('3')->setRowHeight(40);
    //             // $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(60);
    //             // $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(60);

    //             $event->sheet->getDelegate()->getStyle('A3:V3')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    //             // $event->sheet->getDelegate()->getStyle('A4:V4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

    //             $event->sheet->mergeCells('A1:V1');
    //             $event->sheet->mergeCells('A2:V2');
    //             $event->sheet->getDelegate()->getStyle('A1:V1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    //             $event->sheet->getDelegate()->getStyle('A2:V2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    //             $event->sheet->getDelegate()->getStyle('A3:V3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    //             // $event->sheet->getDelegate()->getStyle('A4:V4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    //             $event->sheet->getStyle('A1:V1')->applyFromArray(
    //                 [
    //                     'font' => array(
    //                         'name' => 'Time New Roman',
    //                         'size' => 15,
    //                         'bold' => true,
    //                     ),
    //                 ]
    //             );
             
    //             $event->sheet->getStyle('A3:V3')->applyFromArray(
    //                 [
    //                     'font' => array(
    //                         'name' => 'Time New Roman',
    //                         'size' => 12,
    //                         'bold' => true,
    //                         // 'color' => ['argb' => 'B8E7EA'],
    //                     ),

    //                     'borders' => [
    //                         'allBorders' => [
    //                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                         ],
    //                     ],

    //                     '',
    //                 ]
    //             );

               



    //         },
    //     ];
    // }


    
    public function headings() : array
    {
        $from_date = $this->form_data['from_date'] ?? '[dd/mm/yyyy]';
        $to_date = $this->form_data['to_date'] ?? '[dd/mm/yyyy]';
        $type_date = config('lending.loan_request.type_date');
        $date_title = $type_date[$this->form_data['type_date'] ?? 2]; 
        // $date_title = ($this->type != 'search') ? 'Thời gian' : 'Ngày hoạt động';
        $return_header = [['Dịch vụ Thanh toán trả góp qua Ví điện tử Foxpay'],
        ['Từ ngày '. $from_date .' đến ngày '. $to_date .'  ('. $date_title . ' thành công)'],
        [
            'Họ và tên',
            'Số điện thoại',
            'Email',
            'Địa chỉ',
            'Đối tác bán hàng',
            'Mid đối tác',
            'Tid đối tác',
            'Mã giao dịch',
            'Mã đơn hàng',
            'Số hợp đồng',
            'Loại hàng hóa',
            'Tên hàng hóa',
            'Mẫu hàng hóa',
            'Lãi suất áp dụng',
            'Tổng giá trị sản phẩm',
            'Tình trạng Hủy đơn hàng',
            'Mã đối soát/Mã khoản vay',
            'Ngày khởi tạo khoản vay',
            'Mã tham chiếu Đối tác tín dụng',
            'Mã ExternalApplyNo',
            'Trạng thái khoản vay',
            // 'Mã đơn hàng',
            'Số hợp đồng',
            'Ngày ký hợp đồng',
            'Ngày giải ngân',
            'Số tiền giải ngân',
        ]
        // ,
        // [
        //     'Họ tên khách hàng',
        //     'SĐT của khách hàng',
        //     'Email của khách hàng',
        //     'Địa chỉ thường trú của KH',
        //     'Tên đối tác bán hàng',
        //     'Tên Mid',
        //     'Tên Tid',
        //     'Mã đơn hàng từ mobisale',
        //     'Tên sản phẩm',
        //     'Lấy tất cả thông tin trường \'Loại hàng hóa\'.',
        //     'Tổng tiền của tất cả sản phẩm',
        //     'Tình trạng hủy đơn hàng',
        //     'mã External Apply No',
        //     '',
        //     'Mã tham chiếu đối tác',
        //     'Trạng thái khoản vay',
        //     'Mã hợp đồng vay',
        //     'Ngày ký hợp đồng vay',
        //     'Ngày giải ngân khoản vay',
        //     'Số tiền giải ngân'
        // ]
    ];

            // if ($this->type != 'list') {
            //     $return_header[] = 'Phê duyệt';
            // }
            // $return_header = ['Dịch vụ Thanh toán trả góp qua Ví điện tử Foxpay'];
        return $return_header;

    }

    public function columnFormats(): array
    {
        return [
            // 'V' => '"US$ "#,##0.00_-',
            'M' => '#,##0_-" VNĐ"',
            'V' => '#,##0_-" VNĐ"',
            // 'V' => NumberFormat::FORMAT_NUMBER_00,
        ];
    }
}