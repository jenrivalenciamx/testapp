<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura Venta</title>
    <style>
        .b{
            border: 1px solid black;
        }

    </style>
</head>
<body>
    <table class="b" width="100%">
        <tr>
           
            <td width=25%>
                <img src="<?php echo e('/'.'storage/'.$shop->image); ?>" class="img-fluid rounded-top" alt=""/>
                
            </td>
            <td width=50%>
                nombre
            </td>
            <td width=25%>
                informacion
            </td>
        </tr>
    </table>
    
</body>
</html><?php /**PATH /var/www/testapp/resources/views/sales/invoice.blade.php ENDPATH**/ ?>