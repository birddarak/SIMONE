<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{ url("templates/panel") }}/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="{{ url('templates/panel') }}/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/select2-4/dist/js/select2.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/jquery.repeater/jquery.repeater.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/mohithg-switchery/dist/switchery.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/screenfull/dist/screenfull.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js">
</script>
<script src="{{ url('templates/panel') }}/node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
</script>
<script src="{{ url('templates/panel') }}/node_modules/moment/moment.js"></script>
<script
    src="{{ url('templates/panel') }}/node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js">
</script>
<script src="{{ url('templates/panel') }}/node_modules/d3/dist/d3.min.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/c3/c3.min.js"></script>
<script src="{{ url('templates/panel') }}/js/tables.js"></script>
<script src="{{ url('templates/panel') }}/js/widgets.js"></script>
<script src="{{ url('templates/panel') }}/js/charts.js"></script>
<script src="{{ url('templates/panel') }}/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="{{ url('templates/panel') }}/dist/js/theme.min.js"></script>
<script src="{{ url('templates/panel') }}/js/alerts.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: '---Pilih dan Tambahkan---',
            allowClear: true
        });
    });
</script>