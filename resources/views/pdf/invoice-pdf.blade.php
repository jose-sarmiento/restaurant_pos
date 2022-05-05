<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <link rel="stylesheet" href="{{public_path('css\bootstrap.css')}}" type="text/css">

    <style>
        .logo {
           height: 80px; 
           width: 80px; 
           float: right;
        }
        img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>
 
</head>
<body style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <strong>Company Inc.</strong><br>
                123 Company Ave. <br>
                Toronto, Ontario - L2R 5A4<br>
                P: (416) 123-4567 <br>
                E: copmany@company.com <br>
            </div>

            <div class="col-xs-4">
                <div class="logo">
                    <img src="{{ public_path("images/logo.png") }}" class="logo" alt="logo">
                </div>
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div style="text-align: right;">
            <h2 style="font-size: 14px;font-weight: 600; margin-bottom: 12px;">Month: May</h2>
        </div>

        <table class="table">
                 <thead style="background: #F5F5F5;">
                  <tr>
                    <th class="col-xs-3">Name</th>
                    <th class="col-xs-4">Description</th>
                    <th class="col-xs-1">In Stock</th>
                    <th class="col-xs-1">Orders</th>
                    <th class="text-right col-xs-1">Price</th>
                    <th class="text-right col-xs-2">Sales</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($menus as $menu)
                    <tr>
                      <td class="col-xs-3">{{$menu->name}}</td>
                      <td class="col-xs-4">Product description goes here.</td>
                      <td class="col-xs-1 text-center">{{$menu->qty_available}}</td>
                      <td class="col-xs-1 text-center">{{$menu->orders_count}}</td>
                      <td class="col-xs-1 text-right">@peso($menu->price)</td>
                      <td class="col-xs-2 text-right">@peso($menu->price * $menu->orders_count)</td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>

            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Total Sales </div></th>
                                <td style="padding: 5px" class="text-right"><strong> @peso($sales) </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>

        </div>

    </body>
    </html>
