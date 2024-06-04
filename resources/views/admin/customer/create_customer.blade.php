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
        <h1>Create Customer</h1>
            <div class="mx-auto block max-w-4xl rounded-lg bg-orange-500 p-6 shadow-4 dark:bg-surface-dark mt-10">
                <form class="space-y-6" action="{{ url('add_customer')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label for="customer_name">Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                        <div>
                            <label for="customer_email">Email</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                        </div>
                        <div>
                            <label for="customer_phone">Phone</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
                        </div>
                        <div>
                            <label for="customer_address">Address</label>
                            <input type="text" class="form-control" id="customer_address" name="customer_address" required>
                        </div>
                        <div>
                            <label for="customer_state">State</label>
                            <input type="text" class="form-control" id="customer_state" name="customer_state" required>
                        </div>
                        <div>
                            <label for="customer_city">City</label>
                            <input type="text" class="form-control" id="customer_city" name="customer_city" required>
                        </div>
                        <div>
                            <label for="customer_zip">Zip code</label>
                            <input type="text" class="form-control" id="customer_zip" name="customer_zip" required>
                        </div>
                    </div>
                    <div class=" card-footer bg-transparent text-end grid-footer">
                        <a href="{{ url('customer_list') }}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-success ms-auto">Add Customer</button>
                    </div>
                </form>
            </div>
            <!-- Page content end-->
            <!-- side canvase start-->
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Toggle right offcanvas</button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <form class="space-y-6" action="{{ url('add_customer')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label for="customer_name">Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                        <div>
                            <label for="customer_email">Email</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                        </div>
                        <div>
                            <label for="customer_phone">Phone</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
                        </div>
                        <div>
                            <label for="customer_address">Address</label>
                            <input type="text" class="form-control" id="customer_address" name="customer_address" required>
                        </div>
                        <div>
                            <label for="customer_state">State</label>
                            <input type="text" class="form-control" id="customer_state" name="customer_state" required>
                        </div>
                        <div>
                            <label for="customer_city">City</label>
                            <input type="text" class="form-control" id="customer_city" name="customer_city" required>
                        </div>
                        <div>
                            <label for="customer_zip">Zip code</label>
                            <input type="text" class="form-control" id="customer_zip" name="customer_zip" required>
                        </div>
                    </div>
                    <div class=" card-footer bg-transparent text-end grid-footer">
                        <a href="{{ url('customer_list') }}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-success ms-auto">Add Customer</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- side canvase end-->
      </div>
        @include('admin.footer')
  </body>
</html>