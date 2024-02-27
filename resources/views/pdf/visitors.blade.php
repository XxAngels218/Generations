<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Visitors Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center; /* Centra la imagen horizontalmente */
            margin-top: -20; /* Ajusta el espaciado superior según sea necesario */
            padding-top: 0; /* Ajusta el espaciado superior según sea necesario */
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
        }

    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('images/header_image_top.png') }}" alt="Header Image Top" style="max-width: 100%; height: auto;">
    </div>

    <h2>Visitors Report</h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Generation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pdfData as $data)
                <tr>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['generation'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <img src="{{ public_path('images/footer_image_top.png') }}" alt="Footer Image Top" style="max-width: 100%; height: auto;">
    </div>

</body>
</html>
