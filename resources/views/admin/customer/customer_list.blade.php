@include('admin.css')
<style>
    th,
    td {
        margin-top: 1em;
        color: white !important;
        font-weight: bold;
    }
</style>
@include('admin.header')
<!-- Sidebar Navigation-->
@include('admin.sidebar')
<!-- Sidebar Navigation end-->
<div class="page-content">
    <div>
        <h1>Customers List</h1>
        <!-- I want to show all the categories here if exist and also to have a button for adding new category -->
        <div class="m-10 text-end">
            <a href="{{ url('create_customer') }}" class="btn btn-success">Create Customer</a>
        </div>
        <?php if (count($customers) > 0) : ?>
        <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8 items-center justify-between">
            <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">NAME</th>
                        <th scope="col" class="px-6 py-4">EMAIL</th>
                        <th scope="col" class="px-6 py-4">ADDRESS</th>
                        <th scope="col" class="px-6 py-4">STATUS</th>
                        <th scope="col" class="px-6 py-4">CREATED AT</th>
                        <th scope="col" class="px-6 py-4">ACTION</th>
                    </tr>
                </thead>
                <?php foreach($customers as $customer): ?>
                <tbody>
                    <tr class="border-b border-neutral-200 dark:border-white/10">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $customer->id }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->title }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->description }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->category }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->price }}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $customer->stock }}</td>

                        <td class="whitespace-nowrap px-6 py-4">
                            <a href="{{ url('single_customer', $customer->id) }}"
                                class="btn btn-info icon-presentation"></a>
                            <a href="{{ url('edit_customer', $customer->id) }}"
                                class="btn btn-info icon-paper-and-pencil"></a>
                            <form action="{{ url('delete_customer', $customer->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger icon-close"
                                    onclick="confirmation(event)"></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        <?php else: ?>
        <div class="text-center card rounded box-border h-32 w-32 p-4 border-4 text-surface">
            <h1>No Customers list found</h1>
        </div>
        <?php endif; ?>
    </div>
</div>
@include('admin.footer')
