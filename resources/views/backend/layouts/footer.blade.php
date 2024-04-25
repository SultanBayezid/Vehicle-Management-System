<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Omniverse Dynamics 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset('template/js/scripts.js')}}"></script>
        <!-- jQuery -->


<!-- Select2 JavaScript -->
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
      $('.select2-ajax').select2();
    });
  </script>
        @yield('js-script')
    </body>
</html>
