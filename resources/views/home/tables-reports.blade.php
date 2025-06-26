<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <b>Productos mas vendidos hoy</b>
                </h3>
                <div class="card-tools">

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio.vt</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productosMasVendidosHoy as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset($product->url) }}" width="50px" class="img-fluid rounded">


                                    </td>
                                    <td>{{ $product->nombre_producto }}</td>
                                    <td>{{ money($product->precio_venta) }}</td>
                                    <td>
                                        <span class="badge bg-success">
                                            {{ $product->total_vendido }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ money($product->precio_venta * $product->total_vendido) }}
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="10">
                                        Sin registros
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
    <!-- /.col-md-6 -->
    <!--.col-md-6 -->

</div>
