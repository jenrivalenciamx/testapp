<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura Venta</title>
    <style>
        .b {
            border: 1px solid black;

        }

        .shop-info {
            display: block;
            padding: 3px;
            font-size: 12.5px;
        }

        .factura-id {
            font-size: 1.5rem;
            font-style: normal;
            color: #525659;
        }

        .factura-fecha {
            font-size: 1rem;
            font-style: normal;
            color: #525659;
        }

        .productos {
            text-align: center;
            margin-top: 1rem;
        }

        .productos thead {
            background-color: #525659ab;
            color: white;
        }

        .productos tr:nth-child(even) {
            background-color: #ddd;
        }

        th,
        td {
            padding: 10px;
        }

        .badge {
            background-color: #5256598d;
            color: white;
            padding: 3px;
            border-radius: 100%;
            font-weight: 500;
            width: 10px;
            margin: 0 auto;



        }
    </style>
</head>

<body>
    <table class="" width="100%">
        <tr>

            <td width=25%>



                <x-image :item="$shop = App\Models\Shop::find(1)" size="200" float="float-right" />


            </td>
            <td width=50% style="text-align:center ">
                <h1>{{ $shop->nombre }}</h1>
                @if ($shop->slogan)
                    <p>{{ $shop->slogan }}</p>
                @endif
            </td>
            <td width=25%>
                @if ($shop->telefono)
                    <span class="shop-info">
                        <b>Telefono: </b>{{ $shop->telefono }}
                    </span>
                @endif
                @if ($shop->email)
                    <span class="shop-info">
                        <b>Email: </b>{{ $shop->email }}
                    </span>
                @endif
                @if ($shop->direccion)
                    <span class="shop-info">
                        <b>Direccion: </b>{{ $shop->direccion }}
                    </span>
                @endif
                @if ($shop->ciudad)
                    <span class="shop-info">
                        <b>Ciudad: </b>{{ $shop->ciudad }}
                    </span>
                @endif


            </td>

        </tr>
    </table>
    <table width="100%">
        <tr>
            <td width=33%>
                <h2 style="margin-bottom: .5rem">Cliente:</h2>

                @if ($sale->clientes->nombre)
                    <span class="shop-info">
                        <b>Nombre: </b>{{ $sale->clientes->nombre }}
                    </span>
                @endif

                @if ($sale->clientes->identificacion)
                    <span class="shop-info">
                        <b>Identificacion: </b>{{ $sale->clientes->identificacion }}
                    </span>
                @endif

                @if ($sale->clientes->telefono)
                    <span class="shop-info">
                        <b>Telefono: </b>{{ $sale->clientes->telefono }}
                    </span>
                @endif

                @if ($sale->clientes->email)
                    <span class="shop-info">
                        <b>Email: </b>{{ $sale->clientes->email }}
                    </span>
                @endif

                @if ($sale->clientes->empresa)
                    <span class="shop-info">
                        <b>Empresa: </b>{{ $sale->clientes->empresa }}
                    </span>
                @endif

                @if ($sale->clientes->nit)
                    <span class="shop-info">
                        <b>Nit: </b>{{ $sale->clientes->nit }}
                    </span>
                @endif
            </td>
            <td width="33%">
                <h2 style="text-align: center">
                    Factura: <span class="factura-id">FV-{{ $sale->id }}</span>
                </h2>
            </td>
            <td width="33%">
                <h3>
                    Fecha: <span class="factura-fecha">{{ $sale->created_at }}</span>
                </h3>
            </td>
        </tr>
    </table>
    <table width="100%" class="productos">
        <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th style="text-align: center">Cantidad</th>
            <th>Subtotal</th>
            <th>Iva</th>
        </thead>

        <tbody>
            @forelse ($sale->items as $item)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ money($item->precio) }}</td>
                    <td>
                        <div class="badge">
                            {{ $item->cantidad }}
                        </div>
                    </td>
                    <td>
                        {{ money($item->precio * $item->cantidad) }}
                    </td>
                    <td>

                        {{ money($item->iva) }}
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6">Sin registros</td>

                </tr>
            @endforelse
            <tr>
                <td colspan="4"></td>
                <td>Total:</td>
                <td>
                    <b>{{ money($sale->total) }}</b>
                </td>
            </tr>
        </tbody>

    </table>
    <table width="100%" style="text-align: center; margin-top:5rem;">
        <tr>
            <td>
                ___________________________ <br>
                <b>{{ $sale->user->nombre }}</b> <br>
                Vendedor
            </td>
        </tr>

    </table>

    <p style="text-align: center">Muchas gracias por tu compra!</p>



</body>

</html>
