<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable()
        $('.select2').select2()
    });

    function showModal(id, type, id2 = null) {
        $('#modalPopupLabel').html("")
        $('#modalPopupContent').html("<div class='text-center my-3'>Sedang memproses...</div>")
        $.ajax({
            type: 'POST',
            url: '{{ route('modal') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
                'type': type,
                'id2': id2,
            },
            success: function(data) {
                $('#modalPopupLabel').html(data.ttl);
                $('#modalPopupContent').html(data.msg);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    }

    // BEGIN: Steganography
    var loaded_image = {
        "cover": undefined,
        "secret": undefined,
        "stegimage": undefined,
    };
    const bit = 1;

    function loadImage(which, cb, url = null) {
        if (which == "secret" && url == null) {
            let fileExtension = ['jpeg', 'jpg', 'png'];
            let ext = $("#secret").val().split('.').pop().toLowerCase();
            if (!fileExtension.includes(ext)) {
                $('#secret').val('');
                alert('Tipe file yang diterima adalah jpg, jpeg, dan png');
            }
        }

        loaded_image[which] = undefined;
        let image = new Image;
        image.onload = function() {
            loaded_image[which] = image;
            cb(which);
        }
        if (which == "cover" || which == "stegimage" || (which == "secret" && url != null)) image.src = url;
        else {
            image.src = URL.createObjectURL($('#' + which)[0].files[0]);
            $('#simpansign').prop('disabled', false);
        }
    }
    // END: Steganography
</script>
@yield('script')
