<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('v2/admin/img/logo/logo.png') }}" rel="icon">
  <title>Digital Wedding</title>
  <link href="{{ asset('v2/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('v2/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('v2/admin/css/ruang-admin.min.css') }}" rel="stylesheet">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />




  @yield('css-third')
</head>

<body id="page-top">
  <div id="wrapper">

    @include('back.layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- TopBar -->
        @include('back.layouts.topbar')
        <!-- Topbar -->

        {{-- Content --}}
        @yield('content')
        {{-- !Content --}}

      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://digital.wedding" target="_blank">Digital Wedding</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ asset('v2/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
  <script src="{{ asset('v2/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('v2/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('v2/admin/js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('v2/admin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('v2/admin/js/demo/chart-area-demo.js') }}"></script>

  <script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#dataTable').DataTable();

        $('#jumlah_bayar').keyup(function(){
            console.log()
            $('#jumlah_kembalian').val(parseInt($(this).val())-parseInt($('#subtotal').val()));
        });

    });
    function sum(){
            var pay = document.getElementById('jumlah_bayar').value;
            var total = document.getElementById('sub_total').value;
            var result = parseInt(pay) - parseInt(total);
            if(!isNaN(result)){
                console.log(result)
                document.getElementById('jumlah_kembalian').value = result;
            }
        }

    function deleteRecord(params, id) {
        $.ajax({
            type: "DELETE",
            url: "/api/order-temp/"+params+"/destroy",
            dataType: "json",
            success: function (response) {
                var i = id.parentNode.parentNode.rowIndex;
                document.getElementById("dataTable").deleteRow(i);
            },
            error: function (err) {
                alert(err)
            }
        });
    }
  </script>
  @yield('js-third')
</body>

</html>
