<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.js')}}"></script>

<script src="{{asset('dist/js/demo.js')}}"></script>

<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('dist/js/datatables.min.js')}}"></script>
<!-- Date picker -->
<script src="{{ asset('flatpickr.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>

<script>
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
          $.ajax({
                  type: 'post',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{ route('users.destroy', ':id') }}".replace(':id', userId),
                  data: {
                    '_method': 'delete'
                  },
                  success: function (response, textStatus, xhr) {
                    if (response.success)
                    {
                      alert('User deleted successfully.');
                      location.href = "{{route('users')}}"
                    }
                    else
                    {
                      alert('You cannot delete your own account. Please contact system administrator.');
                    }
                    
                  },
                  error: function (xhr, textStatus, errorThrown) {
                    alert('Error in deleting...')
                  }
              });
        }
    }
</script>

<script>
    function deleteGlossaryItem(item_id) {
        if (confirm('Are you sure you want to delete this glossary item?')) {
          $.ajax({
                  type: 'post',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{ route('glossary.destroy', ':id') }}".replace(':id', item_id),
                  data: {
                    '_method': 'delete'
                  },
                  success: function (response, textStatus, xhr) {
                    if (response.success)
                    {
                      alert('Glossary item deleted successfully.');
                      location.href = "{{route('glossary')}}"
                    }
                    
                  },
                  error: function (xhr, textStatus, errorThrown) {
                    alert('Error in deleting...')
                  }
              });
        }
    }

    function checkAllPermissions(menuId) {
            const checkboxes = document.querySelectorAll(`input[name^="permissions[${menuId}"]`);
            const checkAllCheckbox = document.querySelector(`input[data-menu-id="${menuId}"]`);
            const isChecked = checkAllCheckbox.checked;

            checkboxes.forEach((checkbox) => {
                checkbox.checked = isChecked;
            });
        }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('.datepicker', {
            dateFormat: 'Y-m-d',
            // Additional configuration options can be added here
        });
    });
</script>


<script>
    function deleteEquipment(equipmentId) {
        if (confirm('Are you sure you want to delete this equipment?')) {
          $.ajax({
                  type: 'post',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{ route('equipment.destroy', ':id') }}".replace(':id', equipmentId),
                  data: {
                    '_method': 'delete'
                  },
                  success: function (response, textStatus, xhr) {
                    if (response.success)
                    {
                      alert('Equipment deleted successfully.');
                      location.href = "{{route('equipments')}}"
                    }
                    
                  },
                  error: function (xhr, textStatus, errorThrown) {
                    alert('Error in deleting...')
                  }
              });
        }
    }
</script>
