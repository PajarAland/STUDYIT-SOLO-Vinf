<?php $__env->startSection('title', 'Courses List'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1 class="mb-4 text-center">Courses List</h1>
    <a href="/admin/courses/create" class="btn btn-success mb-3">Add New Course</a>
    <table class="table table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Level</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="courses-table" class="text-center">
            <!-- Data akan diisi melalui JavaScript -->
        </tbody>
    </table>
</div>

<script>
    const apiUrl = 'http://localhost:3000/api/coursesAdmin'; // Ganti dengan API endpoint Anda
    const baseUrl = 'http://localhost:8000/backend-uploads/';

    function fetchData() {
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const table = document.getElementById('courses-table');
                table.innerHTML = ''; // Hapus konten tabel sebelumnya
                if (data.length === 0) {
                    table.innerHTML = `<tr><td colspan="9" class="text-center">No courses found.</td></tr>`;
                } else {
                    data.forEach((course, index) => {
                        table.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>
                                    <img src="${baseUrl}${course.image}" alt="${course.course_name}" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>${course.course_name}</td>
                                <td>${course.firstname} ${course.lastname}</td> 
                                <td>${course.level.charAt(0).toUpperCase() + course.level.slice(1)}</td>
                                <td>${new Date(course.start_date).toLocaleDateString()}</td>
                                <td>${new Date(course.end_date).toLocaleDateString()}</td> 
                                <td>
                                    <span class="badge ${course.status === 'active' ? 'bg-success' : 'bg-secondary'}">
                                        ${course.status.charAt(0).toUpperCase() + course.status.slice(1)}
                                    </span>
                                </td>
                                <td>
                                    <a href="/admin/courses/${course.id}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger" onclick="deleteCourse(${course.id})">Delete</button>
                                </td>
                            </tr>`;
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    function deleteCourse(id) {
        if (confirm('Are you sure?')) {
            fetch(`${apiUrl}/${id}`, {
                method: 'DELETE'
            }).then(() => {
                alert('Course deleted successfully');
                fetchData();
            }).catch(error => {
                console.error('Error deleting course:', error);
            });
        }
    }

    // Load initial data
    fetchData();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/course/index.blade.php ENDPATH**/ ?>