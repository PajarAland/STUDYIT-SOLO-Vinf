@extends ('layouts.admin')

@section('title', 'Instructor Data')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Instructor List</h1>
    <a href="/admin/users/create" class="btn btn-primary mb-3">Add New Instructor</a>
    <table class="table table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Name/th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="users-table" class="text-center">
            <!-- Data akan diisi melalui JavaScript -->
        </tbody>
    </table>
    <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                <nav>
                    <ul id="pagination" class="pagination">
                        <!-- Pagination buttons akan di-generate oleh JavaScript -->
                    </ul>
                </nav>
            </div>
</div>

<script>
   const apiUrl = 'http://localhost:3000/api/Accounts'; // API endpoint
        let currentPage = 1;
        const itemsPerPage = 5; // Jumlah data per halaman

        function fetchData(page = 1) {
            fetch(`${apiUrl}?_page=${page}&_limit=${itemsPerPage}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const totalItems = response.headers.get('X-Total-Count'); // Total data (pastikan API mendukung header ini)
                    const totalPages = Math.ceil(totalItems / itemsPerPage);
                    updatePagination(totalPages, page);
                    return response.json();
                })
                .then(data => {
                    const table = document.getElementById('users-table');
                    table.innerHTML = ''; // Hapus konten tabel sebelumnya
                    if (data.length === 0) {
                        table.innerHTML = `<tr><td colspan="6" class="text-center">No users found.</td></tr>`;
                    } else {
                        data.forEach((user, index) => {
                            table.innerHTML += `
                                <tr>
                                    <td>${(page - 1) * itemsPerPage + index + 1}</td>
                                    <td>${user.firstname} ${user.lastname}</td>
                                    <td>${user.email}</td>
                                    <td>${user.phone_number}</td>
                                    <td>${user.user_type}</td>
                                    <td>
                                        <a href="/admin/users/${user.id}/edit" class="btn btn-sm btn-warning">Edit</a>
                                        <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.id})">Delete</button>
                                    </td>
                                </tr>`;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function deleteUser(id) {
            fetch(`${apiUrl}/${id}`, {
                method: 'DELETE'
            })
                .then(() => {
                    alert('User deleted successfully');
                    fetchData(currentPage);
                })
                .catch(error => {
                    console.error('Error deleting user:', error);
                });
        }

        function updatePagination(totalPages, currentPage) {
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = ''; // Clear existing buttons

            // Generate Previous Button
            const prevButton = document.createElement('li');
            prevButton.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevButton.innerHTML = `<a class="page-link" href="#" aria-label="Previous">&laquo;</a>`;
            prevButton.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    fetchData(currentPage);
                }
            });
            pagination.appendChild(prevButton);

            // Generate Page Buttons
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('li');
                pageButton.className = `page-item ${i === currentPage ? 'active' : ''}`;
                pageButton.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                pageButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    currentPage = i;
                    fetchData(currentPage);
                });
                pagination.appendChild(pageButton);
            }

            // Generate Next Button
            const nextButton = document.createElement('li');
            nextButton.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
            nextButton.innerHTML = `<a class="page-link" href="#" aria-label="Next">&raquo;</a>`;
            nextButton.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    fetchData(currentPage);
                }
            });
            pagination.appendChild(nextButton);
        }

        // Load initial data
        fetchData(currentPage);

</script>
@endsection
