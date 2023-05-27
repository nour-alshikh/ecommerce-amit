<div>
    <form>
        <div class="searchContainer">
            <input id="keyword" type="text" placeholder="Search Here What You Need...." />
            <div class="d-flex justify-content-center align-items-center">
                <span class="ms-2"><i class="fab fa-sistrix"></i></span>
            </div>
        </div>
    </form>
    <div id="products" class="d-flex container">

    </div>
</div>


@section('script')
    <script>
        $('#keyword').keyup(function() {
                    let keyword = $(this).val();
                    let url = "{{ route('search') }}" + "?search=" + keyword

                    $.ajax({
                            type: "GET",
                            url: url,
                            contentType: false,
                            processDate: false,
                            success: function(data) {
                               $('#products').empty();
                    for (product of data) {
                        $('#products').append(`
                        <div class="my-5">
                            <div class="col-md-3">
                                <img src="/uploads/products/${product.image}" style="width: 350px; height: 250px;" class="my-2" />
                                <h3>${product.name}</h3>
                                </div>
                            </div>
                        `)
                    }
                                    if ($('#keyword').val() === "") {
                                        $('#products').empty();

                                    }
                                }
                            })
                    })
    </script>
@endsection
