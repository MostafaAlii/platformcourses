<button type="button" class="btn btn-dark back-to-top" id="back-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
    </svg>
</button>


<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap4.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap4.5.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/aoe.js') }}"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="{{ asset('dashboard/assets/js/site/assets/js/burger-menu.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
<script>
    AOS.init({

        offset: 200, // Offset (in px) from the original trigger point
        duration: 1000, // Duration of animation (in ms)
        easing: 'ease-in-out-sine', // Easing function
        delay: 100, // Delay before the animation starts (in ms)
        once: true, // Whether animation should happen only once - while scrolling down
        mirror: false, // Whether elements should animate out while scrolling past them
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const dropdownToggle = document.getElementById('dropdownMenuButton1');
        const currentUrl = window.location.href;
        const headurl = document.getElementById('headurl');

        if (currentUrl.includes('/en')) {
            dropdownToggle.textContent = 'English';


        } else if (currentUrl.includes('/ar')) {
            dropdownToggle.textContent = 'Arabic';
        }



        dropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                const selectedText = this.textContent;
                dropdownToggle.textContent = selectedText;
            });
        });
    });

</script>
<!-- JS scripts -->
<!--end::JS-->
@stack('js')
</body>
<!--end::Body-->

</html>
