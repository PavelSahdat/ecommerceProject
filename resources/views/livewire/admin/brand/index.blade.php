
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Brand List
                    <a href="{{route('admin.brand.create')}}" class="btn btn-primary btn-sm float-end">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->slug}}</td>
                            <td>{{$brand->status == 1 ? 'Hidden' : 'Visible'}}</td>
                            <td>
                                <a href="{{url('')}}" class="btn btn-success">Edit</a>

                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                            </tr>
                            </tbody>
                            @empty
                                <div>nothing</div>
                            @endforelse             
                    </table>
                    <div>
                        {{$brands->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('script')

<script>

    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
    });

</script>

@endpush
