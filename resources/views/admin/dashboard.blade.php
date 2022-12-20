@extends('layout.admin-layout')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Are you sure to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="deleteModalBtn">Delete</button>
      </div>
    </div>
  </div>
</div>
<div class="container col-xl-9 mt-5">
    <div class="row align-items-center">
@foreach ($products as $index => $product)
        <div class="card m-3" style="width: 18rem;">
            <img src="{{asset('img/' . $product->photo)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a class="no-style" href="{{route('product', $product->slug)}}">{{$product->name}}</a></h5>
              <p class="card-text">{{$product->price}} $</p>
              <a href="{{route('edit', $product->slug)}}" class="btn btn-primary">Edit</a>
              <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" form="delete-product{{$index}}" class="btn btn-danger delete-btn">Delete</button>
              <form action="{{route('destroy', $product->slug)}}" method="post" id="delete-product{{$index}}">
                @csrf
              </form>
            </div>
        </div>
@endforeach

</div>
</div>
    
@endsection

@section('js')
<script>
  let form = '';
  let delete_btn = document.querySelectorAll('.delete-btn');
  $('.delete-btn').click(function() {
      form = this.getAttribute('form');
      console.log(form)
    });
  $('#deleteModal').on('shown.bs.modal', function () {
    $('#deleteModalBtn').attr('form', form)
  })
</script>
@endsection