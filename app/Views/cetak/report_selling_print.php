<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url('public/img/'.$logo_pt); ?>">
    <title><?= $title;?></title>

    <style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Selling Report</h3>
    </div>
    <div class="col-lg-6" style="text-align:left">
        <table width="100%" border="0">
            <tr>
                <td width="20%">Customer ID</td>
                <td width="30%">: <?= $list['0']->CustomerID;?></td>
                <td width="10%"></td>
                <td width="10%">Address</td>
                <td width="30%">: <?= $list['0']->Address;?></td>
            </tr>
            <tr>
                <td width="20%">Customer Name</td>
                <td width="30%">: <?= $list['0']->FullName;?></td>
                <td width="10%"></td>
                <td width="10%">Phone</td>
                <td width="30%">: <?= $list['0']->MobilePhone;?></td>
            </tr>
        </table>
    </div>

    <table id="table" border="0">

        <thead>

            <tr>

            </tr>
            <tr>
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Harga Jual</th>
                <th>Terjual</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Kacang Goreng</td>
                <td>Rp5.000,-</td>
                <td>1</td>
                <td>25 Oktober 2020, 17:01:03</td>
            </tr>
            <tr>
                <td scope="row">2</td>
                <td>Kopi Hitam</td>
                <td>Rp5.000,-</td>
                <td>1</td>
                <td>25 Oktober 2020, 16:01:03</td>
            </tr>
            <tr>
                <td scope="row">3</td>
                <td>Gorengan Bakwan</td>
                <td>Rp3.000,-</td>
                <td>3</td>
                <td>25 Oktober 2020, 15:01:02</td>
            </tr>
            <tr>
                <td scope="row">4</td>
                <td>Nasi uduk</td>
                <td>Rp14.000,-</td>
                <td>2</td>
                <td>25 Oktober 2020, 14:04:03</td>
            </tr>
        </tbody>
    </table>
</body>

</html>