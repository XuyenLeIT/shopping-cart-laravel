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
        <div class="d-flex bg-secondary">
            <div class="p-2 ms-auto bg-success">
              <a href="{{route("cart.index")}}" class="btn btn-info">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="text-danger">{{$totalCount}}</span>
              </a>
            </div>
          </div>
        <h2>Product List</h2>
        <a class="btn btn-primary" 
            href="{{route("product.create")}}">Create a new product</a>
        <div class="row">
            @foreach ($products as $item)
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" 
                        src="https://vtv1.mediacdn.vn/thumb_w/640/562122370168008704/2023/10/19/ngoc-trinh-16977123656701928692535.jpg"
                         alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">{{$item->name}}</h4>
                      <p class="card-text">{{$item->price}}$</p>
                      <a href="{{route("cart.add_item",$item->id)}}"
                         class="btn btn-primary">Add to Cart</a>
                    </div>
                  </div>
            </div>
            @endforeach
         
        </div>
    </div>

</body>

</html>
