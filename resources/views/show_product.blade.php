<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('css')

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('sidebar')
      <!-- partial -->
    @include('header')

    <div class="main-panel">
        <div class="content-wrapper">
        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Discount Price</th>
    </tr>
  </thead>
  <tbody>
  @php $i=0 @endphp
  @foreach($product as $product)
  @php $i++ @endphp
    <tr>
      <th scope="row">
        {{ $i }}
    </th>
      <td>{{ $product->title }}</td>
      <td>{{ $product->description}}</td>
      <td>
        <img class="img_size" src="/product/{{ $product->image }}" alt="">
      </td>
      <td>{{ $product->category_id}}</td>
      <td>{{ $product->quantity}}</td>
      <td>{{ $product->price}}</td>
      <td>{{ $product->discount_price}}</td>
      <td>
      <a href="{{ url('edit_product',$product->id) }}" class="btn btn-info">Edit</a>
      <a href="{{ url('delete_product',$product->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure to delete?')">Delete</a>
     </td>
    </tr>
    @endforeach
  </tbody>
</table>
 </div>
</div>
        <!-- partial -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('script')
  </body>
</html>
