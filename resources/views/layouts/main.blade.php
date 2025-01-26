<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <title>VSS-ERP</title>

        <link rel="shortcut icon" href="{{ asset('assets/img/logo-small1.jpeg') }}" />

        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" />

         <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    </head>
    <body>
        <div class="main-wrapper">
            @include('includes.header')

            @include('includes.sidebar')

            <div class="page-wrapper">
                @yield('content')

            @include('includes.footer')
            </div>
        </div>

        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/circle-progress/1.2.2/circle-progress.min.js"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

        <script src="{{ asset('assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('assets/js/feather.min.js') }}"></script>

        <script src="{{ asset('assets/js/ckeditor.js') }}"></script>

        <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

        <script src="{{ asset('assets/js/script.js') }}"></script>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

       <script>
            $('.confirm-delete').on('click', function() {
                var href = $(this).data('href');
                var name = $(this).data('name');
                var type = $(this).data('type');
                var msg = "Once deleted, you will not recover this "+name+".";

                swal({
                    title: "Are you sure?",
                    text: msg,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        console.log('dsdsa');

                        $.ajax({
                            type: "POST",
                            url: href,
                            data: {
                                _method: 'DELETE',
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                swal("Success!", name + " has been deleted.", "success").then(() => {
                                    location.reload();
                                });
                            },
                            error: function (xhr) {
                                swal("Error!", "Something went wrong. Please try again.", "error");
                            }
                        })
                    }
                });
            });
        </script>

         @stack('push_scripts')
    </body>
</html>
