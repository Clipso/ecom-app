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
        <h1>Create Category</h1>
            <div class="mx-auto block max-w-4xl rounded-lg bg-orange-500 p-6 shadow-4 dark:bg-surface-dark mt-10">
                <form class="space-y-6" action="{{ url('add_category')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                        <label for="category_description">Description</label>
                        <textarea class="form-control" id="category_description" name="category_description" required></textarea>
                    </div>
                    <div class=" card-footer bg-transparent text-end grid-footer">
                      <a href="{{ url('view_category') }}" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-success ms-auto">Add Category</button>
                    </div>
                </form>
            </div>
      </div>
        @include('admin.footer')
  </body>
</html>