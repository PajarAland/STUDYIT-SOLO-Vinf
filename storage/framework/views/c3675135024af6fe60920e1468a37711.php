<?php $__env->startSection('title', 'Task List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1 class="mb-4 text-center">Tasks List</h1>
    <a href="/admin/tasks/create" class="btn btn-success mb-3">Add New Task</a>
    <table class="table table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Modul ID</th>
                <th>User ID</th>
                <th>Submission</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tasks-table" class="text-center">
            <!-- Data akan diisi melalui JavaScript -->
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        <button id="prevPage" class="btn btn-secondary me-2" disabled>Previous</button>
        <span id="pageInfo" class="align-self-center">Page 1</span>
        <button id="nextPage" class="btn btn-secondary ms-2">Next</button>
    </div>
</div>

<script>
    const apiUrl = 'http://localhost:3000/api/tasks';
     // Ganti dengan API endpoint Anda
    const baseUrl = 'http://localhost:8000/backend-uploads/'
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
                document.getElementById('pageInfo').textContent = `Page ${page} of ${totalPages}`;
                document.getElementById('prevPage').disabled = page === 1;
                document.getElementById('nextPage').disabled = page === totalPages;

                return response.json();
            })
            .then(data => {
                const table = document.getElementById('tasks-table');
                table.innerHTML = ''; // Hapus konten tabel sebelumnya
                if (data.length === 0) {
                    table.innerHTML = `<tr><td colspan="9" class="text-center">No tasks found.</td></tr>`;
                } else {
                    data.forEach((task, index) => {
    table.innerHTML += `
        <tr>
            <td>${(page - 1) * itemsPerPage + index + 1}</td>
            <td>${task.ModulID}</td>
            <td>${task.UserID}</td>
            <td>
                ${task.FileTask ? `<a href="${baseUrl}${task.FileTask}" target="_blank" class="btn btn-sm btn-info">View File</a>` : 'No File'}
            </td>
            <td>
                <span class="badge ${task.Status === 'Pending' ? 'bg-secondary' : 'bg-success'}">
                    ${task.Status}
                </span>
            </td>
            <td>
                <a href="/admin/tasks/${task.id}/edit" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="deleteTask(${task.id})">Delete</button>
            </td>
        </tr>`;
});

                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function deleteTask(id) {
        if (confirm('Are you sure?')) {
            fetch(`${apiUrl}/${id}`, {
                method: 'DELETE'
            }).then(() => {
                alert('Task deleted successfully');
                fetchData(currentPage);
            }).catch(error => {
                console.error('Error deleting task:', error);
            });
        }
    }

    document.getElementById('prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            fetchData(currentPage);
        }
    });

    document.getElementById('nextPage').addEventListener('click', () => {
        currentPage++;
        fetchData(currentPage);
    });

    // Load initial data
    fetchData(currentPage);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/modul/index.blade.php ENDPATH**/ ?>