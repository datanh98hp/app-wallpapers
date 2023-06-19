<x-layout-admin path="user-client" title="Girl">
{{-- @dd($store_path) --}}
    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h3 class="card-title mb-0 text-center">Quản lí Girl
                    </h3>
                </div>
                <div>
                    @if (session('status'))
                        <div class="text-center text-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">

                    <div class="my-4">
                        {{-- <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseAdd" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Link with href
                        </a> --}}

                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            Tạo
                        </a>


                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form action="{{ route('girl.add') }}" id="form-add" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-12 col-xl-2">
                                                <label for="name" class="my-2">Họ tên</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Ho ten">
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-xl-4">
                                                <label for="age" class="my-2">Tuổi</label>
                                                <input type="text" class="form-control" name="age"
                                                    placeholder="Tuoi">
                                                @error('age')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-xl-2">
                                                <label for="country" class="my-2">Địa phương</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                    placeholder="Dia phuong">
                                                @error('country')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-xl-4">
                                                <label for="age" class="my-2">Danh mục</label>
                                                <select class="form-select mb-3" name="category_id">
                                                    <option selected="">Chọn danh mục</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-xl-6">

                                                <label for="image" class="form-label my-2">Chọn ảnh</label>
                                                <input class="form-control" name="image[]" type="file" id="image"
                                                    multiple>
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-xl-6">

                                                <label for="video_src" class="form-label my-2">Chọn video ngắn</label>
                                                <input class="form-control" name="video_src" type="file"
                                                    id="video_src">
                                                @error('video_src')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-xl-12">

                                                <label for="description" class="form-label">Mô tả</label>
                                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                                <script type="text/javascript">
                                                    ClassicEditor
                                                        .create(document.querySelector('#description'),{
                                                            ckfinder:{
                                                                uploadUrl:'{{ route('ckeditor.upload'). '?_token='.csrf_token() }}'
                                                            }
                                                        })
                                                        .then(editor=>{
                                                            console.error(editor);
                                                        })
                                                        .catch(error => {
                                                            console.error(error);
                                                        });
                                                </script>
                                            </div>

                                            <div class="d-flex justify-content-evenly">

                                                <button class="btn btn-outline-success my-4" type="submit">
                                                    Thêm
                                                </button>
                                                <button class="btn btn-outline-secondary my-4" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Ẩn
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover my-0" id="user_client_list" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th style="max-width: 250px;">Tên</th>
                                    <th style="max-width: 100px;">Tuổi</th>
                                    <th>Quê quán</th>
                                    <th>Danh mục</th>
                                    <th style="max-width: 100px;">View</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->id }}</td>
                                        <td class="">{{ $item->name }}</td>
                                        <td class="">{{ $item->age }}</td>
                                        <td class="">{{ $item->country }}</td>
                                        <td class="text-center">
                                            @foreach ($categories as $ct)
                                                @if ($ct->id === $item->category_id)
                                                    <span class="badge bg-success">{{ $ct->title }}</span>
                                                @endif
                                            @endforeach

                                        </td>
                                        <td><span class="badge bg-success">{{ $item->view_count }}</span></td>
                                        <td class="">
                                            <div class="d-flex justify-content-evenly">
                                                <a href="{{ route('girl.detail', $item->id) }}"
                                                    class="btn btn-outline-secondary rounded-circle px-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('girl.del', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-trash3"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Launch static backdrop modal
                                                </button> --}}
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>




    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            $('#user_client_list').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json'
                },
            });
        });
    </script>
</x-layout-admin>
