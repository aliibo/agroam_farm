<?php

namespace App\Http\Controllers;

use App\Exports\DayExport;
use App\Exports\MonthExport;
use App\Exports\YearExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    
    public function to_view_export()
    { 
        return view('export_option');
    }

    public function export_day(Request $request)
    {       
        if (!$request->day_to_export) {
            return redirect()->back()->with('danger', "Sélectionné un jour pour exporter");
        }

        $date = date('Y-m-d', strtotime($request->day_to_export));
        
        // CSV
        return Excel::download(new DayExport($date), 'Station météo '.$date.'.csv', \Maatwebsite\Excel\Excel::CSV);
        
        // XLSX
        // return Excel::download(new DayExport($date), 'Station météo '.$date.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function export_month(Request $request)
    { 
        if (!$request->month_to_export) {
            return redirect()->back()->with('danger', "Sélectionné un Mois pour exporter");
        }

        $date = date('Y-m', strtotime($request->month_to_export));
        // return Excel::download(new MonthExport($date), 'Station météo '.$date.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        return Excel::download(new MonthExport($date), 'Station météo '.$date.'.csv', \Maatwebsite\Excel\Excel::CSV);

        // return Excel::download(new MonthExport(Carbon::today()->format('Y'),3), 'temp.xlsx');
        // return Excel::download(new MonthExport(Carbon::today()->format('Y'),Carbon::today()->format('m')), 'temp.xlsx');
    }

    public function export_week()
    { 
        dd('export_semaine');
    }
    
    public function export_year(Request $request)
    { 
        // return Excel::download(new YearExport($request->year), 'Station météo '.$request->year.'.xlsx');
        return Excel::download(new YearExport($request->year), 'Station météo '.$request->year.'.csv', \Maatwebsite\Excel\Excel::CSV);

        // return Excel::download(new YearMultiSheetExport(2022), 'temp.xlsx');
    }

    
}
