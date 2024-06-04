@include('admin.css')
<style>
  th, td {
    margin-top: 1em;
    color: white!important;
    font-weight: bold;
  }
</style>
@include('admin.header')
      <!-- Sidebar Navigation-->
@include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
            <div>
                <h1>Products Inventory</h1>
                <!-- I want to show all the categories here if exist and also to have a button for adding new category -->
                <div class="m-10 text-end">
                  <a href="{{ url('create_product') }}" class="btn btn-success"><i class="fa fa-plus-circle mr-2"></i>Create Product</a>
                </div>
                <?php if ($products) : ?>
                  <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8 items-center justify-between">
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                      <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                        <tr>
                          <th scope="col" class="px-6 py-4">#</th>
                          <th scope="col" class="px-6 py-4">TITLE</th>
                          <th scope="col" class="px-6 py-4">DESCRIPTION</th>
                          <th scope="col" class="px-6 py-4">CATEGORY</th>
                          <th scope="col" class="px-6 py-4">PRICE</th>
                          <th scope="col" class="px-6 py-4">STOCK</th>
                          <th scope="col" class="px-6 py-4">IMAGE</th>
                          <th scope="col" class="px-6 py-4">ACTION</th>
                        </tr>
                      </thead>
                    <?php foreach($products as $product): ?>
                      <tbody>
                        <tr class="border-b border-neutral-200 dark:border-white/10">
                          <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $product->id }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $product->title }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $product->description }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $product->category }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $product->price }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $product->stock }}</td>
                          <td class="whitespace-nowrap px-6 py-4">
                            <img src="{{ asset('products/'.$product->image) }}" alt="pic" class="w-20 h-20">
                          </td>
                          
                          <td class="whitespace-nowrap px-6 py-4">
                            <a href="{{ url('single_product',$product->id) }}" class="btn btn-info"><i class="fa fa-info-circle"></i></a>
                            <a href="{{ url('edit_product',$product->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            {{-- <a href="{{ url('delete_category',$category->id) }}" class="btn btn-danger">Delete</a> --}}
                            <form  action="{{ url('delete_product', $product->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger" onclick="confirmation(event)"><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach; ?>
                  </table>
                  </div>
                <?php else: ?>
                <div class="text-center card rounded box-border h-32 w-32 p-4 border-4 text-surface">
                    <h1>No products found</h1>
                </div>
                <?php endif; ?>
            </div>
      </div>
@include('admin.footer')
