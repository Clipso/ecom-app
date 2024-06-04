<!DOCTYPE html>
<html>
  @include('admin.css')
  <style>
    label {
      display: block;
      margin-top: 1em;
      color: white!important;
      font-weight: bold;
    }
  </style>
  <body>
    @include('admin.header')
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <h1>Create Product</h1>
            <div class="mx-auto block max-w-4xl rounded-lg bg-orange-500 p-6 shadow-4 dark:bg-surface-dark mt-10">
               <?php if ($product) : ?>
               <form class="space-y-6" action="{{ url('update_product', $product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" value="{{ $product->description }}">{{ $product->description }}</textarea>
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="image">IMG</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ $product->image }}">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div>
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                    </div>
                </div>
                <div class=" card-footer bg-transparent text-end grid-footer">
                    <a href="{{ url('product_list') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-success ms-auto">Update Product</button>
                </div>
            </form>
            <?php else: ?>
                <p>No product found</p>
            <?php endif; ?>
            </div>
      </div>
        @include('admin.footer')
  </body>
</html>