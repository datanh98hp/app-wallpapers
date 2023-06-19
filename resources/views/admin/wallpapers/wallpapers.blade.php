<x-layout title="Dashboard" path="wallpapers-admin">

    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home/</span> Wallpapers</h4>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <div class="row">
            <!-- Basic -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <h5 class="card-header">List categories</h5>
                    <div class="card-body">
                        <div class="divider">
                            {{-- <div class="divider-text">Text</div> --}}

                            <div class="table-responsive text-nowrap">
                                <table class="table-responsive text-nowrap ui celled table" id="list-wallpapers"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">#STT</th>
                                            <th>Tên gọi</th>
                                            <th>Review</th>
                                            <th>Danh mục</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($list as $item)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong>{{ $item->id }}</strong>
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a href="{{url($item->src)}}" target="_blank">
                                                        <img src="{{ url($item->src) }}"
                                                            style="height: 60px; width: 40px" />
                                                    </a>
                                                </td>
                                                <td>
                                                    @foreach ($categories as $cate)
                                                        @if ($cate->id === $item->category_id)
                                                            <span
                                                                class="badge bg-label-info me-1">{{ $cate->title }}</span>
                                                        @endif
                                                    @endforeach
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
                                                        <form action="{{ route('wallpapers.delete', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="btn btn rounded-pill btn-icon btn-outline-danger"
                                                                href=""><i class="bx bx-trash me-1"></i></button>
                                                        </form>
                                                    </div>

                                                    {{-- </div> --}}
                                                </td>
                                            </tr>
                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="modalEdit-{{ $item->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <form action="{{ route('wallpapers.update', $item->id) }}"
                                                    id="formUpdate-{{ $item->id }}" method="POST"
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
                                                                        for="basic-default-name">Tiêu đề ảnh</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control"
                                                                            id="basic-default-name" name="name"
                                                                            value="{{ $item->name }}"
                                                                            placeholder="TTieu đề danh mục" />
                                                                    </div>
                                                                    {{-- @error('name')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror --}}
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label"
                                                                        for="exampleFormControlSelect1">Category</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-select" name="category_id"
                                                                            id="exampleFormControlSelect1"
                                                                            aria-label="Default select example">
                                                                            @foreach ($categories as $ct)
                                                                                <option value="{{ $ct->id }}"
                                                                                    @if ($ct->id === $item->category_id) @selected(true) @endif>
                                                                                    {{ $ct->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    {{-- @error('category_id')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror --}}
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-2 col-form-label"
                                                                        for="">Upload ảnh</label>
                                                                    <div class="col-sm-10">
                                                                        <input class="form-control" type="file"
                                                                            name="src" id="formFile">
                                                                    </div>
                                                                    {{-- @error('src')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror --}}
                                                                    {{-- review --}}
                                                                    <a href="{{ asset($item->src) }}" target="_blank"
                                                                        class="btn btn-outline-primary my-2">Review</a>
                                                                    {{-- <img class="card-img" src="{{ asset($item->src) }}"
                                                                        alt="Card image"> --}}

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                                <button type="s" class="btn btn-primary"
                                                                    id="btn-submit-{{ $item->id }}"
                                                                    onclick="">Cập
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

            <div class="col-md-6 mb-4">
                <div class="card">
                    <h5 class="card-header">Add new</h5>
                    <div class="card-body">
                        <div class="divider">

                            <form action="{{ route('wallpapers.add') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Tiêu đề
                                        ảnh</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="basic-default-name"
                                            name="name" value="" placeholder="Tiêu đề hình ảnh" />
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Danh
                                        mục</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="category_id" id="exampleFormControlSelect1"
                                            aria-label="Default select example">
                                            @foreach ($categories as $ct)
                                                <option value="{{ $ct->id }}">
                                                    {{ $ct->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Upload ảnh</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="formFile" name="src">
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
        // delete
        $('#list-wallpapers').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json',
            },
        });

        function submitFormUpdate(id) {

            var form = document.getElementById('formUpdate-' + id);

            document.getElementById("btn-submit-" + id).addEventListener("click", function() {
                form.submit();
            });
        }
    </script>
</x-layout>
