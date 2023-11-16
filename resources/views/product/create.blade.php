<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create product page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Create a new Product</h2>
  <form method="POST" action="{{route("product.store")}}">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control"
      value="{{old("name")}}"
         placeholder="Enter name" name="name">
         @error('name')
             <span class="text-danger">{{$message}}</span>
         @enderror
    </div>
    <div class="mb-3">
      <label for="price">Price:</label>
      <input type="number" class="form-control"
      value="{{old("price")}}"
         placeholder="Enter price" name="price">
         @error('price')
         <span class="text-danger">{{$message}}</span>
     @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
