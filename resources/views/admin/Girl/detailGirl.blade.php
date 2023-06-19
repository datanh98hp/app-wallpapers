<x-layout-admin path="user-client" title="Dashboard">

    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h3 class="card-title mb-0 text-center">Quản lí Girl
                    </h3>
                </div>
                <div class="card-body">

                    <div class="row d-flex justify-content-center">
                        {{-- <div class="col-xl-12 col-xxl-4  border-primary mb-3">
                            <div class="card-header"></div>
                            <div class="card-body text-primary">
                                
                                <div>
                                    
                                </div>
                            </div>
                        </div> --}}
                        <div class="d-flex justify-content-center mb-5">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaAVBg7BH4aZeq7yuScAByxB51p3kdgg2SIqZWRpTeT6rANZujVFTJKYZWg1WPyUavfJ4&usqp=CAU"
                                class="rounded" alt="...">
                        </div>
                        <form action="{{ route('girl.update', $item->id) }}" id="form-add" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="row">
                                    <div class="col-12 col-xl-3">
                                        <label for="name" class="my-2">Họ tên</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $item->name }}" placeholder="Ho ten">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-xl-3">
                                        <label for="age" class="my-2">Tuổi</label>
                                        <input type="text" class="form-control" name="age"
                                            value="{{ $item->age }}" placeholder="Tuoi">
                                        @error('age')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-xl-3">
                                        <label for="country" class="my-2">Địa phương</label>
                                        <input type="text" class="form-control" id="country"
                                            value="{{ $item->country }}" name="country" placeholder="Dia phuong">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-xl-3">
                                        <label for="age" class="my-2">Danh mục</label>
                                        <select class="form-select mb-3" name="category_id">
                                            <option selected="">Chọn danh mục</option>
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}"
                                                    @if ($cate->id === $item->category_id) @selected(true) @endif>
                                                    {{ $cate->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-12 col-xl-6">

                                        <label for="image" class="form-label my-2">Chọn ảnh</label>
                                        <input class="form-control" name="image[]" type="file" id="image"
                                            value="{{ $item->image }}" multiple>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-center my-3">
                                            <img src="{{ $store_path . $item->images[0]->src }}" height="250px"
                                                class="rounded mx-auto d-block" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">

                                        <label for="video_src" class="form-label my-2">Chọn video ngắn</label>
                                        <input class="form-control" name="video_src" type="file" id="video_src"
                                            value="{{ $item->video_src }}">
                                        @error('video_src')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="text-center my-3">
                                            <video width="320" height="240" controls>
                                                <source src="{{ $store_path . $item->video_src }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-12">

                                        <label for="description" class="form-label">Mô tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="4">{{ $item->description }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <script type="text/javascript">
                                            ClassicEditor
                                                .create(document.querySelector('#description'), {
                                                    ckfinder: {
                                                        uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                    </div>

                                    <div class="d-flex justify-content-evenly">
                                        <a class="btn btn-outline-secondary my-4" href="{{ route('list.girl') }}"
                                            aria-controls="collapseExample">
                                            Trở về
                                        </a>
                                        <button class="btn btn-outline-success my-4" type="submit">
                                            Cập nhật
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>
        // $(document).ready(function() {
        //     $('#user_client_list').DataTable({
        //         language: {
        //             url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json'
        //         }
        //     , });
        // });
    </script>
</x-layout-admin>
