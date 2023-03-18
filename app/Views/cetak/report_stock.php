<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url('public/img/'.$logo_pt); ?>">
    <title><?= $title;?></title>

    <style>
    #table {
        /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
        font-family: "Times New Roman";
        font-size: 12px;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        /* border: 1px solid #ddd; */
        padding: 8px;
        font-size: 14px;

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
        text-align: center;
        /* background-color: #4CAF50; */
        background-color: #BC8F8F;
        color: Black;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Report Stock</h3>
    </div>
    <!-- <div class="col-lg-6" style="text-align:left">
        <table width="100%">
            <tr>
                <td width="20%">Customer Name</td>
                <td width="30%">: </td>
                <td width="10%"></td>
                <td width="10%">Phone</td>
                <td width="30%">: </td>
            </tr>
        </table>
    </div> -->

    <table id="table">
        <thead>
            <tr>
                <td colspan="2" width="12%" style="font-weight:bold">Product ID : <?= $list[0]->ProductID;?></td>
                <td width="24%"></td>
                <!-- <td width="24%"></td> -->
                <td colspan="4" width="14%" style="font-weight:bold">Product Name : <?= $list[0]->ProductName;?></td>
                <!-- <td width="40%"></td> -->
            </tr>
            <tr>
                <th width="8%">No</th>
                <th width="20%">Date</th>
                <th width="24%">Customer</th>
                <th width="12%">Last Stock</th>
                <th width="12%">IN</th>
                <th width="12%">Out</th>
                <th width="12%">Stock Now</th>
            </tr>
        </thead>
        <?php $no=1;$gtotal=0;
        foreach ($detail as $p):
        ?>
        <tbody>
            <tr>
                <td style="text-align:center;padding:0rem"><?= $no;?></td>
                <td><?= $p->UpdateDate;?></td>
                <td style="text-align:left;padding:0rem"><?= $p->FullName;?></td>
                <td style="text-align:center;padding:0rem"><?= $p->Stock_awal;?></td>
                <td style="text-align:center;padding:0rem"><?= $p->StockPlus;?></td>
                <td style="text-align:center;padding:0rem"><?= $p->StockMin;?></td>
                <td style="text-align:center;padding:0rem"><?= $p->Stock_Sekarang;?></td>
                </td>
            </tr>
        </tbody>



        <?php $no++;endforeach;?>
    </table>
    <br>
    <!-- <table width="100%">
        <tr>
            <td width="20%"></td>
            <td width="20%"> </td>
            <td width="20%"> </td>
            <td width="20%">Rekening Number</td>
            <td width="20%">: BNI 004 858 0417 </td>
        </tr>
        <tr>
            <td width="20%"></td>
            <td width="20%"> </td>
            <td width="20%"> </td>
            <td width="20%"></td>
            <td width="20%">&nbsp; a/n JUSUF </td>
        </tr>
    </table> -->
</body>

</html>