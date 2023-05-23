 @include('admin.layout.cssPopup')
 <!-- Pop-up modal -->
 <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalMessage"></p>
            <button id="modalOkButton">OK</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const updateForm = document.getElementById('updateForm');
            const updateButton = document.getElementById('updateButton');
            const modal = document.getElementById('myModal');
            const modalMessage = document.getElementById('modalMessage');
            const modalOkButton = document.getElementById('modalOkButton');
            const closeButton = document.getElementsByClassName('close')[0];

            updateButton.addEventListener('click', (e) => {
                e.preventDefault();
                const formData = new FormData(updateForm);

                fetch('{{ route('users.update', $user->id) }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    modalMessage.textContent = 'User data updated successfully';
                    modal.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });

            // Close the modal when the close button is clicked
            closeButton.addEventListener('click', () => {
                modal.style.display = 'none';
                window.location.href = '{{ route('users') }}';
            });

            // Close the modal when the OK button is clicked
            modalOkButton.addEventListener('click', () => {
                modal.style.display = 'none';
                window.location.href = '{{ route('users') }}';
            });
        });
    </script>