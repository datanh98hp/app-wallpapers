<x-layout-admin path="user-client" title="Dashboard">

    <div class="row">
       <h2>Dashboard</h2>
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
