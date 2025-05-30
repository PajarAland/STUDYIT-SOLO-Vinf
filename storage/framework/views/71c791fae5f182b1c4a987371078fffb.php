<?php $__env->startSection('title', 'Instructor Data'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1 class="mb-4 text-center">Instructor List</h1>
    <a href="/admin/instructors/create" class="btn btn-primary mb-3">Add New Instructor</a>
    <table class="table table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Instructor ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="instructors-table" class="text-center">
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
    const apiUrl = 'http://localhost:3000/api/instructors'; // Ganti dengan API endpoint Anda
    let currentPage = 1;
    const itemsPerPage = 2; // Satu data per halaman

   
    function fetchData(page = 1) {
    const url = `${apiUrl}?page=${page}&limit=${itemsPerPage}`;
    fetch(url)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        return response.json();
    })
    .then(data => {
        const totalItems = data.meta.total; // Ambil total items dari meta
        const totalPages = data.meta.totalPages; // Ambil total pages dari meta

        // Update pagination UI
        document.getElementById('pageInfo').textContent = `Page ${currentPage} of ${totalPages}`;
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage === totalPages;

        const table = document.getElementById('instructors-table');
        const instructors = data.data; // Akses array di dalam properti 'data'
        table.innerHTML = '';
        instructors.forEach((instructor, index) => {
            table.innerHTML += `
                <tr>
                    <td>${(currentPage - 1) * itemsPerPage + index + 1}</td>
                    <td>${instructor.id}</td>
                    <td>${instructor.firstname} ${instructor.lastname}</td>
                    <td>${instructor.email}</td>
                    <td>${instructor.phone_number}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="deleteInstructor(${instructor.id})">Delete</button>
                    </td>
                </tr>`;
        });
    });

}


    function deleteInstructor(id) {
        fetch(`${apiUrl}/${id}`, {
            method: 'DELETE'
        }).then(() => {
            alert('Instructor deleted successfully');
            fetchData(currentPage);
        });
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/instructor/index.blade.php ENDPATH**/ ?>