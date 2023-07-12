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
        
        $ventasmes=DB::select('SELECT month(v.sale_date) as mes, sum(v.total) as totalmes from sales v where 
        v.status="VALIDO" group by month(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia from sales v where 
        v.status="VALIDO" group by v.sale_date order by day(v.sale_date) desc limit 15');

        $comprasdia=DB::select('SELECT DATE_FORMAT(c.purchase_date,"%d/%m/%Y") as dia, sum(c.total) as totaldia from purchases c where
         c.status="VALIDO" group by c.purchase_date order by day(c.purchase_date) desc limit 15');
        
        
        $estadoActivo = 'VALIDO';
        
        $canventa=DB::select('SELECT COUNT(*) as id FROM sales WHERE status= ?', [$estadoActivo]);
        $canVentasAct = $canventa[0]->id;
        $cancompra=DB::select('SELECT COUNT(*) as id FROM purchases WHERE status= ?', [$estadoActivo]);
        $canCompraAct = $cancompra[0]->id;


        
       $totales=DB::select('SELECT 
        (SELECT IFNULL(SUM(c.total), 0) FROM purchases c WHERE MONTH(c.purchase_date) = MONTH(CURDATE()) AND c.status = "VALIDO") AS totalcompra,
        (select ifnull(sum(c.total),0) from purchases c where DATE(c.purchase_date)=curdate() and c.status="VALIDO") as totalcomprad, 
        (SELECT IFNULL(SUM(v.total), 0) FROM sales v WHERE MONTH(v.sale_date) = MONTH(CURDATE()) AND v.status = "VALIDO") AS totalventa,
        (select ifnull(sum(v.total),0) from sales v where DATE(v.sale_date)=curdate() and v.status="VALIDO") as totalventad');
          
          $productosvendidos=DB::select('SELECT sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
          inner join sale_details dv on p.id=dv.product_id 
          inner join sales v on dv.sale_id=v.id where v.status="VALIDO" 
          and year(v.sale_date)=year(curdate()) 
          group by p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');

        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'comprasdia', 'totales', 'canVentasAct', 'canCompraAct', 'productosvendidos'));
        
    }
}
