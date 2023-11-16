<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container mt-3">
        @if (session("success"))
        <div class="alert alert-success">
            <strong>Success!</strong> {{session('success')}}
          </div>
        @endif
        <div>
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Order Number</th>
                    <th>View Products</th>

                </tr>
                @foreach ($orders as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->order_number}}</td>
                    <td><a class="btn btn-info"
                         href={{route("order.detail",$item->id)}}>View Detail</a></td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>
