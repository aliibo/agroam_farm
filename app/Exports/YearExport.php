<?php

namespace App\Exports;

use DateTime;
use App\Models\Data_meteo;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class YearExport implements WithEvents,
    WithHeadings,
    WithMapping,
    WithTitle,
    ShouldAutoSize,
    FromQuery
{  
    use Exportable;

    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function query()
    {
        $data_Day = Data_meteo::query()
            ->whereYear('created_at', $this->year);
            
        return $data_Day;
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

    public function title(): string
    {
        // return Carbon::today()->format('Y'); $this->year
        return DateTime::createFromFormat('!Y', $this->year)->format('Y');
        // DateTime::createFromFormat('!Y', $this->year)->format('F');
    }
}
