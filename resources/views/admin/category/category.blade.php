<x-layout title="Dashboard" path="category">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home/</span> Category</h4>
        @if (session('status'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <!-- Basic -->
            <div class="col-md-7 mb-4">
                <div class="card">
                    <h5 class="card-header">List categories</h5>
                    <div class="card-body">
                        <div class="divider">
                            {{-- <div class="divider-text">Text</div> --}}
                            <div class="table-responsive">
                                <table class="table-responsive text-nowrap ui celled table dataTable no-footer" id="list-categories" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#STT</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($list as $item)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong>{{ $item->id }}</strong>
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge bg-label-primary me-1">Active</span>
                                                    @else
                                                        <span class="badge bg-label-danger me-1">Unactive</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    {{-- <div class="dropdown"> --}}
                                                    <div class="d-flex justify-content-evenly">
                                                        <button type="button"
                                                            class="btn btn rounded-pill btn-icon btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit-{{ $item->id }}">
                                                            <i class="bx bx-edit-alt me-1"></i>
                                                        </button>
                                                        {{-- <button type="button" class="btn rounded-pill btn-icon btn-primary">
                                                            <span class="tf-icons bx bx-pie-chart-alt"></span>
                                                        </button> --}}
                                                        {{-- <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-edit-alt me-1"></i> </a> --}}
                                                        <form action="{{ route('category.delete', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn rounded-pill btn-icon btn-outline-danger"
                                                                href="/"><i class="bx bx-trash me-1"></i></button>
                                                        </form>
                                                    </div>

                                                    {{-- </div> --}}
                                                </td>
                                            </tr>
                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="modalEdit-{{ $item->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <form action="{{ route('category.update', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Cập
                                                                    nhật
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label"
                                                                        for="basic-default-name">ID</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="basic-default-name" name="id"
                                                                            value="{{ $item->id }}" disabled
                                                                            placeholder="TTieu đề danh mục" />
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label"
                                                                        for="basic-default-name">Title</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="basic-default-name" name="title"
                                                                            value="{{ $item->title }}"
                                                                            placeholder="TTieu đề danh mục" />
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label"
                                                                        for="exampleFormControlSelect1">status</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" name="status"
                                                                            id="exampleFormControlSelect1"
                                                                            aria-label="Default select example">
                                                                            <option value="1"
                                                                                @if ($item->status == 1) @selected(true) @endif>
                                                                                Hoạt động</option>
                                                                            <option value="0"
                                                                                @if ($item->status == 0) @selected(false) @endif>
                                                                                Ẩn</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                                <button type="submit" class="btn btn-primary">Cập
                                                                    nhật</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Basic -->
            <div class="col-md-5 mb-4">
                <div class="card">
                    <h5 class="card-header">Add new</h5>
                    <div class="card-body">
                        <div class="divider">
                            {{-- <div class="divider-text">Text</div> --}}
                            <form action="{{ route('category.add', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="basic-default-name"
                                            name="title" value="" placeholder="Tieu đề danh mục" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"
                                        for="exampleFormControlSelect1">status</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="status" id="exampleFormControlSelect1"
                                            aria-label="Default select example">
                                            <option value="1">
                                                Hoạt động</option>
                                            <option value="0">
                                                Ẩn</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- /Basic -->


        </div>
    </div>
    <script>
       
        $('#list-categories').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json',
            },
        });
    </script>
</x-layout>
