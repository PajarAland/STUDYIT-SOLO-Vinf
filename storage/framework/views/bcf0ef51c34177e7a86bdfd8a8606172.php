<?php $__env->startSection('title', 'Add New Course'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h1 class="mb-4 text-center">Add New Course</h1>
    <a href="/admin/course" class="btn btn-secondary mb-3">Back to List</a>
    <form id="create-course-form" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" >
        </div>
        <div class="mb-3">
            <label for="instructor_id" class="form-label">Instructor</label>
            <select class="form-select" id="instructor_id" name="instructor_id" required>
                <option value="" disabled selected>Select an Instructor</option>
                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->firstname); ?> <?php echo e($instructor->lastname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" >
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="expert">Expert</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" >
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" >
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" >
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Course</button>
    </form>
</div>

<script>
    const apiCoursesUrl = 'http://localhost:3000/api/courses';
    const apiInstructorsUrl = 'http://localhost:3000/api/instructors';

    // Fungsi untuk memuat instruktur ke dalam dropdown
    async function loadInstructors() {
        try {
            const response = await fetch(apiInstructorsUrl);
            const instructors = await response.json();
            const instructorDropdown = document.getElementById('instructor_id');

            // Menambahkan instruktur ke dalam dropdown
            instructors.forEach(instructor => {
                const option = document.createElement('option');
                option.value = instructor.id;
                option.textContent = `${instructor.firstname} ${instructor.lastname}`;
                instructorDropdown.appendChild(option);
            });
        } catch (error) {
            console.error('Error loading instructors:', error);
        }
    }

    // Panggil fungsi untuk memuat instruktur saat halaman dimuat
    document.addEventListener('DOMContentLoaded', loadInstructors);

    // Event listener untuk menangani submit form
    document.getElementById('create-course-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Mengambil data form
        const course_name = document.getElementById('course_name').value;
        const description = document.getElementById('description').value;
        const level = document.getElementById('level').value;
        const start_date = document.getElementById('start_date').value;
        const end_date = document.getElementById('end_date').value;
        const status = document.getElementById('status').value;
        const instructor_id = document.getElementById('instructor_id').value;
        const image = document.getElementById('image').files[0]; // Mengambil file yang diupload

        // Membuat objek FormData
        const formData = new FormData();
        formData.append("course_name", course_name);
        formData.append("description", description);
        formData.append("level", level);
        formData.append("start_date", start_date);
        formData.append("end_date", end_date);
        formData.append("status", status);
        formData.append("instructor_id", instructor_id);
        formData.append("image", image); // Menambahkan file image ke FormData

        try {
            // Mengirim data form ke API
            const response = await fetch(apiCoursesUrl, {
                method: 'POST',
                body: formData, // Mengirim FormData
            });

            // Mengecek apakah permintaan berhasil
            if (response.ok) {
                alert('Course added successfully');
                window.location.href = '/admin/courses'; // Arahkan kembali ke halaman daftar course
            } else {
                const error = await response.json();
                alert('Error adding course: ' + error.message);
            }
        } catch (error) {
            console.error('Error adding course:', error);
            alert('Error adding course: ' + error.message);
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/course/create.blade.php ENDPATH**/ ?>