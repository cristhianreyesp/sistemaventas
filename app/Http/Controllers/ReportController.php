<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Purchase;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:reports.day')->only(['reports_day']);
        $this->middleware('can:reports.date')->only(['reports_date']);
        $this->middleware('can:reports.cday')->only(['reports_cday']);
        $this->middleware('can:reports.cdate')->only(['reports_cdate']);
    }
    public function reports_day(){
        $sales = Sale::WhereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->where('status', 'VALIDO')->sum('total');
        return view('admin.report.reports_day', compact('sales', 'total'));
    }
    public function reports_date(){
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->where('status', 'VALIDO')->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total'));
    }
    public function report_results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $sales->where('status', 'VALIDO')->sum('total');
        //$total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total')); 
    }
    public function reports_cday(){
        $purchases = Purchase::WhereDate('purchase_date', Carbon::today('America/Lima'))->get();
        $totalp = $purchases->where('status', 'VALIDO')->sum('total');
        return view('admin.report.reports_cday', compact('purchases', 'totalp'));
    }
    public function reports_cdate(){
        $purchases = Purchase::whereDate('purchase_date', Carbon::today('America/Lima'))->get();
        $totalp = $purchases->where('status', 'VALIDO')->sum('total');
        return view('admin.report.reports_cdate', compact('purchases', 'totalp'));
    }
    public function report_cresults(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $purchases = Purchase::whereBetween('purchase_date', [$fi, $ff])->get();
        $totalp = $purchases->where('status', 'VALIDO')->sum('total');
        //$total = $sales->sum('total');
        return view('admin.report.reports_cdate', compact('purchases', 'totalp')); 
    }
}
