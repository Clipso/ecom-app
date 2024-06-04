<!DOCTYPE html>
<html>
  @include('admin.css')
  <body>
    @include('admin.header')
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
            <div class="mx-auto block max-w-4xl rounded-lg bg-orange-500 p-6 shadow-4 dark:bg-surface-dark mt-10">
                <?php if ($category) : ?>
                <form class="space-y-6" action="{{ url('update_category')}}/{{ $category->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}">
                        <label for="category_description">Description</label>
                        <textarea class="form-control" id="category_description" name="category_description">{{ $category->category_description }}</textarea>
                    </div>
                    <div class=" card-footer bg-transparent text-end grid-footer">
                        <a href="{{ url('view_category') }}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-success ms-auto">Add Category</button>
                    </div>
                </form>
                <?php else: ?>
                    <p>No category found</p>
                <?php endif; ?>
            </div>
                {{-- <form class="space-y-6" action="{{ url('update_category')}}" method="put">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" >
                        <label for="category_description">Description</label>
                        <textarea class="form-control" id="category_description" name="category_description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form> --}}
            {{-- </div> --}}
      </div>
        @include('admin.footer')
  </body>
</html>