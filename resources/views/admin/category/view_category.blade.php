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
                <h1>Categories</h1>
                <!-- I want to show all the categories here if exist and also to have a button for adding new category -->
                <div class="m-10 text-end">
                  <a href="{{ url('create_category') }}" class="btn btn-success"><i class="fa fa-plus-circle mr-1"></i>Category</a>
                </div>
                <?php if ($categories) : ?>
                  <div>
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                      <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                        <tr>
                          <th scope="col" class="px-6 py-4">#</th>
                          <th scope="col" class="px-6 py-4">NAME</th>
                          <th scope="col" class="px-6 py-4">DESCRIPTION</th>
                          <th scope="col" class="px-6 py-4">ACTION</th>
                        </tr>
                      </thead>
                    <?php foreach($categories as $category): ?>
                      <tbody>
                        <tr class="border-b border-neutral-200 dark:border-white/10">
                          <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $category->id }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $category->category_name }}</td>
                          <td class="whitespace-nowrap px-6 py-4">{{ $category->category_description }}</td>
                          <td class="whitespace-nowrap px-6 py-4">
                            <a href="{{ url('edit_category',$category->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                            {{-- <a href="{{ url('delete_category',$category->id) }}" class="btn btn-danger">Delete</a> --}}
                            <form  action="{{ url('delete_category', $category->id) }}" method="POST" style="display:inline;">
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
                  <p>No categories found</p>
                <?php endif; ?>
            </div>
      </div>
@include('admin.footer')
