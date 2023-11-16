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
        <h2>Cart Order</h2>
        <a class="btn btn-success" href="{{route("product.index")}}">Continue shopping</a>
        @if (session('success'))
        <div class="alert alert-success">
            <strong>Success!</strong>{{session('success')}}
          </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            <strong>Danger!</strong>{{session('error')}}
          </div>
        @endif
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }}</td>
                            <td>  <a class="btn btn-danger" href="{{route("cart.decrease",$key)}}">-</a>
                                {{ $item['quantity'] }}
                                <a class="btn btn-success" href="{{route("cart.increase",$key)}}">+</a>
                            </td>
                            <td><a class="btn btn-danger" 
                              href="{{route("cart.delete_item",$key)}}"   >Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex flex-row-reverse bg-secondary">
                <div class="p-2 bg-info">Total price: {{$totalPrice}}$</div>
                <a class="btn btn-primary" 
                    href="{{route("order.store")}}">Order</a>
            </div>
        </div>

    </div>

</body>

</html>
