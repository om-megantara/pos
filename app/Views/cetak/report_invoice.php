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
        <h3> INVOICE #<?= $list['0']->NotaID?></h3>
    </div>
    <div class="col-lg-6" style="text-align:left">
        <table width="100%">
            <tr>
                <?php 
            $tanggal=date(substr($list['0']->DateInput,0,10));
            $tgl=substr($tanggal,-2,2);
            $bln=substr($tanggal,-5,2);
            $thn=substr($tanggal,0,4);
            ?>
                <td width="20%">Date</td>
                <td width="30%">: <?= $tgl."/".$bln."/".$thn;?></td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="30%"> </td>
            </tr>
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

    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1;$gtotal=0;
            foreach ($detail as $p):?>
            <tr>
                <td style="text-align:right"><?= $no;?></td>
                <td><?= $p->ProductID;?></td>
                <td><?= $p->ProductName;?></td>
                <td style="text-align:center"><?= $p->Qty;?></td>
                <td style="text-align:right">
                    <?= 'Rp ' . number_format(htmlentities($p->SellingPrice, ENT_QUOTES), 2, ",", ".");?></td>
                <td style="text-align:right">
                    <?= 'Rp ' . number_format(htmlentities($p->SellingPrice*$p->Qty, ENT_QUOTES), 2, ",", ".");$gtotal=$gtotal+($p->SellingPrice*$p->Qty);?>
                </td>
            </tr>
            <?php $no++;endforeach;?>
            <tr>
                <td colspan="4" style="text-align: center;" border="0">Shipping Costs</td>
                <td style="text-align: center;"> </td>
                <td style="text-align: right;">
                    <?= 'Rp ' . number_format(htmlentities($gtotal, ENT_QUOTES), 2, ",", ".");?></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center;">Disc </td>
                <td style="text-align: center;">10% </td>
                <td style="text-align: right">
                    <?= 'Rp ' . number_format(htmlentities($gtotal, ENT_QUOTES), 2, ",", ".");?></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center;font-weight:bold;font-size:large">TOTAL</td>
                <td style="text-align: center;"> </td>
                <td style="text-align: right;font-weight:bold;font-size:large">
                    <?= 'Rp ' . number_format(htmlentities($gtotal, ENT_QUOTES), 2, ",", ".");?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%">
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
    </table>
</body>

</html>