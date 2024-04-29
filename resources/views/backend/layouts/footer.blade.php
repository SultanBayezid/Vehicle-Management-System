<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">{!! _lang('Copyright &copy; Omniverse Dynamics 2024') !!}</div>
                            <div>
                                <a href="{{route('privacy')}}">{{ _lang('Privacy Policy')}}</a>
                                &middot;
                                <a href="{{route('terms')}}">{!! _lang('Terms &amp; Conditions') !!}</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{asset('template/js/scripts.js')}}"></script>
        <!-- jQuery -->


<!-- Select2 JavaScript -->
<script src="{{ asset('backend/plugins/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
      $('.select2-ajax').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.s2').select2();
    });
  </script>
       @stack('js-script')
    </body>
</html>
