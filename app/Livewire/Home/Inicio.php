<?php

namespace App\Livewire\Home;
/*
use App\Models\Item;
*/
use Carbon\Carbon;
use App\Models\ventas;
use App\Models\ventas_detalle;
use App\Models\productos;
use App\Models\categorias;
use App\Models\clientes;
/**/
use App\Models\User;



use Livewire\Component;
/*
*/
use Livewire\Attributes\Title;
/**/
use Illuminate\Support\Facades\DB;

#[Title('Inicio')]
class Inicio extends Component
{
    // Ventas hoy
    public $ventasHoy=0;
    public $totalventasHoy=0;
    public $totalventasMes=0;
    public $articulosHoy=0;
    public $productosHoy=0;

    // Ventas mes grafica
    public $listTotalVentasMes='';

    // Cajas reportes
    public $cantidadVentas=0;
    public $totalventas=0;
    public $cantidadArticulos=0;
    public $cantidadProductos=0;

    public $cantidadProducts=0;
    public $cantidadStock=0;
    public $cantidadCategories=0;
    public $cantidadClients=0;

    // Productos mas vendidos y recientes
    public $productosMasVendidosHoy=0;
    public $productosMasVendidosMes=0;
    public $productosMasVendidos=0;
    public $productosRecientes=0;

    // Propiedades mejores vendedores y compradores
    public $bestSellers=0;
    public $bestBuyers=0;


    public function render()
    {

        $this->sales_today();
        $this->calVentasMes();
        $this->boxes_reports();
        $this->set_products_reports();/*
        $this->set_best_sellers_buyers();
*/
        return view('livewire.home.inicio');
    }

      public function sales_today(){
        $fecha = date('Y-m-d');
        $this->ventasHoy = ventas::whereDate('fecha',date('Y-m-d'))->count();
        $this->totalventasHoy = ventas::whereDate('fecha',date('Y-m-d'))->sum('total');
        $this->totalventasMes = ventas::whereMonth('fecha', Carbon::now()->month)->whereYear('fecha', Carbon::now()->year)->sum('total');

       // $this->productosHoy = count(ventas_detalle::whereDate('created_at',date('Y-m-d'))->groupBy('productos_id')->get());
        $this->articulosHoy = ventas_detalle::whereDate('created_at',date('Y-m-d'))->sum('cantidad');
    }

      public function calVentasMes(){
        for ($i=1; $i <=12 ; $i++) {
            $this->listTotalVentasMes .= ventas::whereMonth('fecha','=',$i)->sum('total').',';
        }
       // dd($this->listTotalVentasMes );
    }


    public function boxes_reports(){
        $this->cantidadVentas = ventas::whereYear('fecha','=',date('Y'))->count();
        $this->totalventas = ventas::whereYear('fecha','=',date('Y'))->sum('total');
        $this->cantidadArticulos = ventas_detalle::whereYear('created_at','=',date('Y'))->sum('cantidad');
       // $this->totalventasMes = ventas::whereMonth('fecha', Carbon::now()->month)->whereYear('fecha', Carbon::now()->year)->sum('total');
        $this->cantidadProductos = ventas_detalle::whereYear('created_at',Carbon::now()->year)->groupBy('productos_id')->count();

        $this->cantidadProducts = productos::count();
        $this->cantidadStock = productos::sum('stock');
        $this->cantidadCategories = categorias::count();
        $this->cantidadClients = clientes::count();
/**/
    }


    public function set_best_sellers_buyers(){
        $this->bestSellers = $this->best_sellers();
        $this->bestBuyers = $this->best_buyers();
    }

    public function best_buyers(){
        return clientes::select('clientes.id','clientes.nombre',DB::raw('SUM(ventas.total) as total'))
        ->join('ventas','ventas.clientes_id','=','clientes.id')
        ->whereYear('sventasales.fecha',date("Y"))
        ->groupBy('clientes.id', 'clientes.nombre')
        ->orderBy('total', 'desc')
        ->take(5)
        ->get();
    }

    public function best_sellers(){
        return User::select('users.id','users.name','users.admin',DB::raw('SUM(sales.total) as total'))
        ->join('sales','sales.user_id','=','users.id')
        ->whereYear('sales.fecha',date("Y"))
        ->groupBy('users.id', 'users.name')
        ->orderBy('total', 'desc')
        ->take(5)
        ->get();
    }

    // Cargar propiedades productos mas vendidos
    public function set_products_reports(){


        $this->productosMasVendidosHoy = $this->products_reports(1);
      //  dd($this->productosMasVendidosHoy);
        $this->productosMasVendidosMes = $this->products_reports(0,1);
        $this->productosMasVendidos = $this->products_reports();
        $this->productosRecientes = productos::
                                            take(5)
                                            ->orderBy('id','desc')
                                            ->get();


    }
    // Consulta productos mas vendidos
    public function products_reports($filtraDia=0,$filtrarMes=0){
        $productsQuery = ventas_detalle::select('ventas_detalles.productos_id',DB::raw('SUM(ventas_detalles.cantidad) as total_quantity'))->groupBy('productos_id')
        ->whereYear('ventas_detalles.created_at',date("Y"));
      //  dd($productsQuery);
        //$this->cantidadProductos = ventas_detalle::whereYear('created_at',Carbon::now()->year)->groupBy('productos_id')->count();

       //   $resultado = DB::table('productos')->where('nombre', $valor)->first();

       // return $resultado->precio_venta;

        $productsQuery = DB::table("ventas_detalles")
        ->join("ventas","ventas_detalles.ventas_id","=", "ventas.id")
        ->join("productos","ventas_detalles.productos_id","=", "productos.id")
        ->join("imagenes","productos.id","=", "imagenes.imageable_id")
    ->SELECT(
        "productos.id","productos.nombre AS nombre_producto",
	"productos.precio_venta",
	"imagenes.url",

        DB::raw("SUM(ventas_detalles.cantidad) AS total_vendido"))
        ->whereDate('ventas.created_at',date('Y-m-d'))
        ->where(DB::raw('LEFT(imagenes.url, 9)'), '=', 'productos')
    ->groupBy('productos.id','productos.nombre','productos.precio_venta','imagenes.url')
    ->orderByDesc('total_vendido')
    ->get();



        if($filtraDia){
         // $productsQuery = $productsQuery->whereDate('ventas_detalles.created_at',date('Y-m-d'));
        }

        if($filtrarMes){
           // $productsQuery = $productsQuery->whereMonth('ventas_detalles.created_at',date('m'));
        }

       // $productsQuery = $productsQuery->orderBy('total_vendido','desc')
                       //     ->take(5)
                         //   ->get();

       //dd($productsQuery);
        return $productsQuery;

    }







}
