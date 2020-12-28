
<div class="container">
    <h1 class="mt-4">Categories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('categories.show-categories') }}">Categories</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-table mr-1"></i>
                Categories
            </div>
            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
            </div>
        </div>


        <div class="card-body">
            @include('partials.message')
            <div class="table-responsive">
                <label>Show
                    <select name="dataTable_length" wire:model="paginate" aria-controls="dataTable" class="custom-select-sm ml-1">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
                </label>


                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 30%">
                            <div wire:click="sortBy('name')">
                                Name<i class="ml-1 pointer fas fa-arrow-circle-{{ $sortField === 'name' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'down' }}"></i>
                            </div>
                        </th style="width: 30%">
                        <th>
                            <div wire:click="sortBy('post_count')">
                                Posts<i class="ml-1 pointer fas fa-arrow-circle-{{ $sortField === 'post_count' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'down' }}"></i>
                            </div>
                        </th>
                        <th style="width: 30%">
                            <div wire:click="sortBy('created_at')">
                                Created At<i class="ml-1 pointer fas fa-arrow-circle-{{ $sortField === 'created_at' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'down' }}"></i>
                            </div>
                        </th>
                        @can('admin-access')<th style="width: 10%"s>Action</th>@endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->posts->count() }}</td>
                            <td>{{ $category->created_at }}</td>
                            @can('admin-access')
                            <td class="d-flex">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="btn btn-info mr-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-danger" wire:click="delete({{ $category->id }})"
                                        onclick="confirm('If you delete this category it will automatically delete all posts from this category. Are you sure?') || event.stopImmediatePropagation()"
                                        title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

