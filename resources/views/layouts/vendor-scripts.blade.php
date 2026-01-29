<!-- JAVASCRIPT -->
 <script src="{{ URL::asset('/assets/libs/jquery/jquery.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/metismenu/metismenu.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/waypoints/waypoints.min.js')}}"></script>
 <script src="{{ URL::asset('/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>
 <!-- DataTables -->
 <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

 <!-- SweetAlert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- Admin Form Handlers -->
 <script src="{{ URL::asset('/assets/js/admin-form-handlers.js')}}"></script>

 @yield('script')

 <!-- App js -->
 <script src="{{ URL::asset('/assets/js/app.min.js')}}"></script>
 
 @yield('script-bottom')