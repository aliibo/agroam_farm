<?php

namespace App\Exports;

use DateTime;
use App\Models\Data_meteo;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DayExport implements WithEvents,
    WithHeadings,
    WithMapping,
    WithTitle,
    ShouldAutoSize,
    FromQuery
{ 

    private $date_to_exp;

    public function __construct(string $date_to_exp)
    {
        $this->date_to_exp = $date_to_exp;
    }

    public function query()
    {
        $data_Day = Data_meteo::whereDate('created_at', $this->date_to_exp);
        return $data_Day;
        // $data_Day = Data_meteo::query()->whereBetween('created_at' , [Carbon::today()->subDays(1), Carbon::today()]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {            
                $columns = ['A','B','C','D','E','F'];
                foreach ($columns as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                ]);
            },
        ];   
    }

    public function Headings(): array
    {
        return [
            "Date",'Temperature C°',"Humidite %","Vitesse km/h","Direction °","Pluie L/m³",
        ];
    }

    public function map($Station_data): array
    {
        $date = date('H:00 d-m-Y', strtotime($Station_data->created_at));
        return [
            $date,
            $Station_data->temperature,
            $Station_data->humidite,
            $Station_data->vitesse,
            $Station_data->direction,
            $Station_data->pluie,
        ];
    }

    public function title(): string
    {
        return 'Station météo ' . $this->date_to_exp; 
    }

}
