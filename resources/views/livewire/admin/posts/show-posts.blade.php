
<div class="pl-4 pr-4">
    <h1 class="mt-4">Posts</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('posts.show-posts') }}">Posts</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-table mr-1"></i>
                Posts
            </div>
            <div>
                <a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive container-fluid">
                @include('partials.message')

                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="dataTables_length" id="dataTable_length">
                            <label class="d-flex">Show
                                <select name="dataTable_length" wire:model="paginate" aria-controls="dataTable" class="custom-select-sm ml-2">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                        </div>
                        <div id="dataTable_filter" class="dataTables_filter">
                            <input type="search" class="form-control-sm" placeholder="Search" aria-controls="dataTable">
                        </div>
                    </div>

                </div>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 30%" >
                            <div wire:click="sortBy('title')">
                                Tittle
                                <i class="fas pointer fa-arrow-circle-{{ $sortField === 'title' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'down' }}">
                                </i>
                            </div>
                        </th>
                        <th style="width: 10%">Image</th>
                        <th style="width: 10%">User</th>
                        <th style="width: 5%">Category</th>
                        <th style="width: 10%">Published</th>
                        <th style="width: 15%">
                            <div wire:click="sortBy('created_at')">
                                Created At
                                <i class="fas pointer fa-arrow-circle-{{ $sortField === 'created_at' ? ($sortDirection === 'asc' ? 'up' : 'down') : 'down' }}">
                                </i>
                            </div>
                        </th>
                        <th style="width: 10%">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $post->title }}</td>
                            <td ><img src="{{  asset('storage/' .$post->image) }}" alt="" height="60" width="90"></td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td class="pb-0">
                                <livewire:admin.posts.publish-post :post="$post" :key="'admin.posts.publish-post'.$post->id" />
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td class="d-flex">
                                <a href="" title="Visit" class="btn btn-primary btn">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('posts.edit', $post->id) }}" title="Edit" class="btn btn-warning ml-2">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button wire:click="delete({{ $post->id }})"
                                        onclick="confirm('Are you sure you want to delete this post?') || event.stopImmediatePropagation()"
                                        class="btn btn-danger btn ml-2"
                                        title="Delete">

                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $posts->links() }}

    </div>
</div>





