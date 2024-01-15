<div id="myModal"
    class="modal hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center transition-opacity duration-300 ease-in-out">
    <div class="w-1/2 modal-content bg-white p-8 rounded transform scale-0 transition-transform duration-300 ease-in-out">
        <div class="flex item-center justify-end">
            <span id="closeModalBtn" class="close text-gray-600 cursor-pointer">&times;</span>
        </div>
        <section>
            {{$slot}}
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openModalBtn');
        const modal = document.getElementById('myModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        // Open the modal
        openModalBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
            modal.querySelector('.modal-content').classList.remove('scale-0');
        });

        // Close the modal
        closeModalBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
            modal.querySelector('.modal-content').classList.add('scale-0');
        });

        // Close the modal if the overlay is clicked
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
                modal.querySelector('.modal-content').classList.add('scale-0');
            }
        });
    });
</script>
