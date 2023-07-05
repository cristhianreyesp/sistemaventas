<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $comprasmes=DB::select('SELECT month(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where 
        c.status="VALIDO" group by month(c.purchase_date) order by month(c.purchase_date) desc limit 12');





        $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALIDO" group by month(v.sale_date) order by month(v.sale_date) desc limit 12');
        $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where v.status="VALIDO" group by v.sale_date order by day(v.sale_date) desc limit 15');
        $comprasdia=DB::select('SELECT DATE_FORMAT(c.purchase_date,"%d/%m/%Y") as dia, sum(c.total) as totaldia from purchases c where c.status="VALIDO" group by c.purchase_date order by day(c.purchase_date) desc limit 15');
        
        $estadoActivo = 'VALIDO';
        $canventa=DB::select('SELECT COUNT(*) as id FROM sales WHERE status= ?', [$estadoActivo]);
        $canVentasAct = $canventa[0]->id;
        $cancompra=DB::select('SELECT COUNT(*) as id FROM purchases WHERE status= ?', [$estadoActivo]);
        $canCompraAct = $cancompra[0]->id;

        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALIDO") as totalventa');
          
        
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'comprasdia', 'totales', 'canVentasAct', 'canCompraAct'));
        
    }
}
