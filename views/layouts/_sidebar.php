<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .sidebar{
            background-color:#f5f5f5;
            padding:10px 10px 10px 20px;
            height:100vh;

        }
       
    </style>
</head>
<body>
<div class=row>
    <div class=col-sm-2>
        <aside class="main-sidebar">


            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->

                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <?if(Yii::$app->user->identity->id == 1):?>
                    <li><?= Html::a('<i class="	fa fa-file-text"></i> Shipment',['/shipment/index'])?> </li>
                    <li><?= Html::a('<i class="	fa fa-address-card"></i> User Manegment',['/user-management/user/create'])?> </li>
                    <li><?= Html::a('<i class="fa fa-shopping-cart"></i> Add Item',['/product/index'])?> </li>
                    <li><?= Html::a('<i class="fa fa-shopping-bag"></i> Item Categorize',['/main-category/index'])?></li>
                    <li><?= Html::a('<i class="fa fa-file"></i> Sales Report',['/site/sales-report'])?></li>
                    <li><?= Html::a('<i class="fa fa-envelope"></i> Delivery Note',['/delevery-note/index'])?> </li>
                        
    <?else:?>
                        <li><?= Html::a('<i class="fa fa-file"></i> Create Invoices',['/site/index'])?></li>
                        <li><?= Html::a('<i class="fa fa-cart-plus"></i> Online Orders',['/order/index'])?> </li>
                        <li><?= Html::a('<i class="fa fa-user-plus"></i> Add Customers',['/customer/index'])?></li>
                        <li><?= Html::a('<i class="fa fa-envelope"></i> Delivery Note',['/delevery-note/index'])?> </li>
                    

    <?endif;?>

                  


                </ul>
            </section>
            <!-- /.sidebar -->

        </aside>

    </div>
</div>
</body>

</html> 
