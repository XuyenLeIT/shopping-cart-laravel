<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Order detail</h2>
<div class="row">
    <div class="col-lg-3">
        <h4 class="text-success">
            A cứ đọc pass này nhé: {{$order->order_number}}</h4 style="text-success">
        <img src="https://image-us.24h.com.vn/upload/4-2021/images/2021-11-13/Roi-SVd-My-dinh-Tram-Anh-khien-dan-mang-sao4-1636802462-193-width660height533.jpg" width="100%"/>
    </div>
    <div class="col-lg-9">
        <h1>Danh sách sản phẩm của anh nek</h1>
        <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
             
                @foreach ($order->products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->pivot->quantity}}</td>
                  </tr>
                @endforeach
              
            </tbody>
          </table>
    </div>
</div>
</div>

</body>
</html>
