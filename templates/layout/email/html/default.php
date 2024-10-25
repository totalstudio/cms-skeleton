<html>
<head>
    <?php
    /** @var \App\View\AppView $this */
    $this->Html->charset();
    ?>
    <style>
      body{
        font-family: Arial, serif;
        font-size:17px;
        padding:0;
        margin:0;
        background-color: #F6F6F6!important;
        color: #464646!important;
        text-align:left;
      }
      h1{

        font-size:19px;
        margin-top: 30px;
        margin-bottom: 15px;
        text-align:left;
      }
      h2{
        font-size:17px;
        font-weight:bold;
        margin-top:20px;
      }
      .header{
        background-color: #F4F4F4;
        text-align: center;
      }
      .title{
        font-size: 16px;
        text-align:left;
        padding:15px;
        font-weight:bold;
        color: #0DADFD;
        text-transform: uppercase;
        width: 285px;
        display:inline-block;
      }

      .title b{
        text-transform: uppercase;
      }
      .external{
        background-color: #464646;
        color: #ffffff!important;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        padding: 13px 70px;
        margin-top:30px;
        margin-bottom:30px;
        display:inline-block;
        border-radius: 25px;
      }
      .external:hover{
        background-color: black;
      }

      td{
        padding: 5px;
        font-size: 15px;
        border-bottom: 1px solid #DBDFE3;
      }
      thead td{
        font-weight: bold;
        border-bottom: 2px solid #6A7176;
      }

      .team{
        margin-top: 20px;
        margin-bottom: 20px;
        text-align:center;
      }
      table{
        width:100%!important;
      }
      code{
        font-family: Arial, serif;
        font-size: 11px;
        margin-top: 15px;
      }
      .footer{
        font-size:11px;
        margin-top:15px;
        margin-bottom:30px;
      }
    </style>
</head>
<body>
<table style="width:100%;" width="100%">
    <tr>
        <td align="center"">

        <div style="background-color:#ffffff; margin: 30px auto;border: 1px solid #EBEBEB; width:100%; max-width:600px;">
            <div class="header">
                <img src="cid:logo" style="height: 40px; margin-top:15px; margin-bottom:15px;">
            </div>
            <div style=" padding:20px; text-align:left;">
                <?= $this->fetch('content'); ?>
            </div>
        </div>
        </td>
    </tr>
</table>
</body>
</html>
<?=(!empty($debug_vars)?debug($debug_vars):null)?>
