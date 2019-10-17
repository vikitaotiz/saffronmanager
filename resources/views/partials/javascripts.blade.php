<script>
    window.deleteButtonTrans = '{{ trans("quickadmin.qa_delete_selected") }}';
    window.copyButtonTrans = '{{ trans("quickadmin.qa_copy") }}';
    window.csvButtonTrans = '{{ trans("quickadmin.qa_csv") }}';
    window.excelButtonTrans = '{{ trans("quickadmin.qa_excel") }}';
    window.pdfButtonTrans = '{{ trans("quickadmin.qa_pdf") }}';
    window.printButtonTrans = '{{ trans("quickadmin.qa_print") }}';
    window.colvisButtonTrans = '{{ trans("quickadmin.qa_colvis") }}';
</script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/English.json"
        }
    });

</script>

<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>
<script src="{{asset('summernote/summernote.js')}}"></script>
<script src="{{asset('summernote/summer_scripts.js')}}"></script>

@toastr_js
@toastr_render

<script>

        function goBack() {
            window.history.back();
        }

        $(document).ready(function() {
            $('#clients_table').DataTable();
            $('#appointments_table').DataTable();

            $('#housekeeps_table').DataTable(
                {
                  "order": [[ 1, 'desc' ]],
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'copy',
                            text: window.copyButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            text: window.csvButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excel',
                            text: window.excelButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdf',
                            text: window.pdfButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'print',
                            text: window.printButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'colvis',
                            text: window.colvisButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                    ]
                }
            );

        });

        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }


    $(function(){
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
             return this.href == url;
        }).parentsUntil('.sidebar-menu > .treeview-menu').addClass('menu-open').css('display', 'block');
    });
</script>


@yield('javascript')
