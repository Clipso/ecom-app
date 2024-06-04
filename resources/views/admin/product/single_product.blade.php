<!DOCTYPE html>
<html>
@include('admin.css')
<style>
    label {
        display: block;
        margin-top: 1em;
        color: white !important;
        font-weight: bold;
    }
</style>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <h1>Product Detail</h1>
        <div class="mx-auto block max-w-4xl rounded-lg bg-orange-500 p-6 shadow-4 dark:bg-surface-dark mt-10">
            <?php if ($product) : ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="col-xs-6">
                                <img src="{{ asset('products/'.$product->image) }}" alt="pic" class="w-120 h-120">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-xs-6">
                                <label for="title">Title</label>
                                <p>{{ $product->title }}</p>
                            </div>
                            <div class="col-xs-6">
                                <label for="description">Description</label>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="col-xs-6">
                                <label for="category">Category</label>
                                <p>{{ $product->category }}</p>
                            </div>
                            <div class="col-xs-6">
                                <label for="price">Price</label>
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="col-xs-6">
                                <label for="stock">Stock</label>
                                <p>{{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                    <div class=" card-footer bg-transparent text-end grid-footer">
                        <a href="{{ url('product_list') }}" class="btn btn-link">Back</a>
                    </div>
                </div>
            <?php else: ?>
            <p>No product found</p>
            <?php endif; ?>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>
