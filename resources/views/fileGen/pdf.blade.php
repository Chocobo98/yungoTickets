<html lang="en">
<head>
    <style>
        table,th,td {
            border: 1px solid black;
        }

        table {
            width: 100%;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Tickets registrados en el mes</h3>
    <table class="table-auto">
        <tr>
            <th class="px-4 py-2">idTicket</th>
            <th class="px-4 py-2">Tipo de Problema</th>
            <th class="px-4 py-2">Fecha</th>
        </tr>
        @foreach ($tMensual as $tM)
            <tr>
                <td class="border px-4 py-2">{{ $tM->idTicket }}</td>
                <td class="border px-4 py-2">{{ $tM->tipoProblema }}</td>
                <td class="border px-4 py-2">{{ $tM->Fecha }}</td>
            </tr>            
        @endforeach

    </table>

    <h3>Tickets solucionados en el mes</h3>
    <table>
        <tr>
            <th class="px-4 py-2">idTicket</th>
            <th class="px-4 py-2">Tipo de Problema</th>
            <th class="px-4 py-2">Fecha</th>
        </tr>
        @foreach ($tEstado as $tE)
            <tr>
                <td class="border px-4 py-2">{{ $tE->idTicket }}</td>
                <td class="border px-4 py-2">{{ $tE->tipoProblema }}</td>
                <td class="border px-4 py-2">{{ $tE->Fecha }}</td>
            </tr>
        @endforeach
    </table>

    <h3>Conteo del tipo de problema registrado en el mes</h3>
    <table>
        <tr>
            <th class="px-4 py-2">Registros</th>
            <th class="px-4 py-2">Tipo de Problema</th>
        </tr>   
        @foreach ($tConteo as $tC)
            <tr>
                <td class="border px-4 py-2">{{ $tC->Registros }}</td>
                <td class="border px-4 py-2">{{ $tC->tipoProblema }}</td>
            </tr>
        @endforeach
    </table>

    <h3>Conteo de los tickets por zona</h3>
    <table>
        <tr>
            <th class="px-4 py-2">Registros</th>
            <th class="px-4 py-2">Zona</th>
        </tr>
        @foreach ($tZona as $tZ)
            <tr>
                <td class="border px-4 py-2">{{ $tZ->Registros }}</td>
                <td class="border px-4 py-2">{{ $tZ->zona }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>