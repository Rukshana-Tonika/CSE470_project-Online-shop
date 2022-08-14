<script src="https://releases.jquery.com/git/jquery-1.x-git.min.js"></script>
<script src="script.js"></script>


@section('scripts')
<script>
    $(document).ready(function(e) {

        $('.addToCartBtn').click(function (e) { 
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id' : product_id,  //will fetch in the controller by field name 'product_id'
                    'product_qty' : product_qty
                },
                success: function (response) {
                    swal(response.status);
                }
            });

        });

        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);

            value = isNaN(value) ? 0 : value;  //value num na hoile 0 banay dbe
            if(value < 10)
            {
                value++;
                $('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);

            value = isNaN(value) ? 0 : value;  //value num na hoile 0 banay dbe
            if(value>1)
            {
                value--;
                $('.qty-input').val(value);
            }
        });
    });
</script>