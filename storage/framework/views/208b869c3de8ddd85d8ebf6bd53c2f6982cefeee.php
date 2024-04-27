<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
        }
        table {
            border-collapse: collapse;
            border-radius: 30px;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .header {
            display: inline-block;
            text-align: left;
            margin-left: 20px;
        }
        .sum {
            color: red;
            margin-left: 350px;
            display: inline-block;
        }
        .btn{
            width:100%;
        }
        .tablestyle{
            border-radius: 50px;
        }

    </style>
</head>
<body>

<div class='container'>
    <div>
        <h3 class='header'>Busy Days</h3><h3 class='sum'>Sum: 1480</h3>
    </div>

    <div class='tablestyle'>
    <table>
        <tr>
            <th>Date</th>
            <th>Timing</th>
            <th>Working Hrs</th>
            <th>Deduction</th>
        </tr>
        <tr>
            <td>02/12/2024</td>
            <td>09:30 AM to 10:30 PM</td>
            <td>10/12 Hrs</td>
            <td>2-350</td>
        </tr>
        <tr>
            <td>02/12/2024</td>
            <td>09:30 AM to 10:30 PM</td>
            <td>10/12 Hrs</td>
            <td>2-350</td>
        </tr>
        <tr>
            <td>02/12/2024</td>
            <td>09:30 AM to 10:30 PM</td>
            <td>10/12 Hrs</td>
            <td>2-350</td>
        </tr>
        <tr>
            <td>02/12/2024</td>
            <td>09:30 AM to 10:30 PM</td>
            <td>10/12 Hrs</td>
            <td>2-350</td>
        </tr>
    </table>

    </div>
        <div>
    <button class='btn'>Back</button>
</div>
</div>

    
</body>
</html>
<?php /**PATH /var/www/html/crud5/crud/resources/views/welcome.blade.php ENDPATH**/ ?>