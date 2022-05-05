<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }
        .bg-grey {
            background: #F3F3F3;
        }
        .text-right {
            text-align: right;
        }

        .w-full {
            width: 100%;
        }

        .small-width {
            width: 15%;
        }
        .invoice {
            background: white;
            border: 1px solid #CCC;
            font-size: 14px;
            padding: 48px;
            margin: 20px 0;
        }
    </style>
</head>
<body class="bg-grey">

  <div class="container container-smaller">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1" style="margin-top:20px; text-align: right">
        <div class="btn-group mb-4">
          <a href="/menus/invoice-pdf" class="btn btn-success">Save as PDF</a>
        </div>
      </div>
    </div>

    

    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
          <div class="invoice">
            <div class="row">
              <div class="col-sm-6">
                <address>
                  <strong>Company Inc.</strong><br>
                  123 Company Ave. <br>
                  Toronto, Ontario - L2R 4U6<br>
                  P: (416) 123 - 4567 <br>
                  E: company@company.com
                </address>
              </div>

              <div class="col-sm-6 text-right">
                <img src="http://127.0.0.1:8000/images/logo.png" alt="logo">
              </div>
            </div>

            <div style="text-align: right;">
            <h2 style="font-size: 14px;font-weight: 600; margin-bottom: 12px;">Month: May</h2>
        </div>

            <div class="table-responsive">
              <table class="table invoice-table">
                 <thead style="background: #F5F5F5;">
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>In Stock</th>
                    <th>Orders</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Sales</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($menus as $menu)
                    <tr>
                      <td class="col-md-3">{{$menu->name}}</td>
                      <td class="col-md-4">Product description goes here.</td>
                      <td class="col-md-1 text-center">{{$menu->qty_available}}</td>
                      <td class="col-md-1 text-center">{{$menu->orders_count}}</td>
                      <td class="col-md-1 text-right">@peso($menu->price)</td>
                      <td class="col-md-2 text-right">@peso($menu->price * $menu->orders_count)</td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>
              </div><!-- /table-responsive -->

              <table class="table invoice-total">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>Total Sales :</strong></td>
                    <td class="text-right small-width">Php @peso($sales)</td>
                  </tr>
                </tbody>
              </table>

              <hr>

            </div>
        </div>
      </div>
    </div>

  </body>
</html>
