<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

        <<script src="{{ asset('js/main.js') }}"></script>

        <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                items: 3,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: { items: 1 },
                    768: { items: 2 },
                    1024: { items: 3 }
                }
            });
        });
    </script>