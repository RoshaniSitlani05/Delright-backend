<script src="{{ asset('all.js') }}"></script>
<!-- Stack array for including inline js or scripts -->
@stack('script')

<script src="{{ asset('dist/js/theme.js') }}"></script>
<script src="{{ asset('js/chat.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
<script>
	
	function mark_cod(value) {
            $.ajax({
                url: "/addcod",
                method: "POST",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    value: value
                },
                success: function(response) {
                    if (response.error === false) {
                        // alert('Location details status has been changed');
                    } else {
                        // alert('Oops something went wrong!');
                    }
                }
            });
        }
</script>