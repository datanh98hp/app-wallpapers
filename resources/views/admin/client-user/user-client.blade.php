<x-layout-admin path="user-client" title="Người dùng">

    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h2 class="card-title mb-0 text-center">Nguoi dung dang nhap</h2>
                </div>
                <div class="card-body">

                    {{-- <div class="my-4">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="align-middle me-2" data-feather="plus-circle"></i> Them moi
                        </button>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Form add
                            </div>
                        </div>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-hover my-0" id="user_client_list" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ma thiet bi </th>
                                    <th>Ho ten</th>
                                    <th>Sinh nhat</th>
                                    <th>Gioi tinh</th>
                                    <th>Ngay dang ki</th>
                                    <th>T.G truy cap gan day</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td class="d-none d-xl-table-cell">{{$item->id}}</td>
                                    <td class="d-none d-xl-table-cell">{{$item->name}}</td>
                                    <td><span class="">{{$item->dateOfBirth}}</span></td>
                                    <td><span class="badge @if($item->sex === 'girl') bg-success  @else bg-primary  @endif">{{$item->sex}}</span></td>
                                    <td class="">{{$item->created_at}}</td>
                                    <td class="">{{$item->updated_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#user_client_list').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json'
                }
            , });
        });

    </script>
</x-layout-admin>
