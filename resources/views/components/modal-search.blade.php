<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
    id="modal-id">
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col md:w-1/3 bg-white outline-none focus:outline-none">
        {{ $slot }}
    </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
<script type="text/javascript">
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }
    const closemodal = document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            clearTable();
            toggleModal("modal-id");
        }
    });
</script>
