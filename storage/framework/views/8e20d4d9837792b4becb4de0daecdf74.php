<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Course</h1>
        <a href="/admin/courses" class="btn btn-secondary mb-3">Back to List</a>
        <form id="edit-course-form">
            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="course_name" required>
            </div>
            <div class="mb-3">
            <label for="instructor_id" class="form-label">Instructor</label>
            <select class="form-select" id="instructor" name="instructor" required>
                <option value="">Select an Instructor</option>
                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->firstname); ?> <?php echo e($instructor->lastname); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" id="level">
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="expert">Advanced</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" required>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>
    <script>
        const apiUrl = 'http://localhost:3000/api/courses';
        const apiInstructorsUrl = 'http://localhost:3000/api/instructors';
        const courseId = window.location.pathname.split('/').slice(-2, -1)[0];

        async function loadInstructors() {
    try {
        const response = await fetch(apiInstructorsUrl);
        const instructors = await response.json();
        const instructorDropdown = document.getElementById('instructor');

        instructors.forEach(instructor => {
            const option = document.createElement('option');
            option.value = instructor.id; // value adalah ID instruktur
            option.textContent = `${instructor.firstname} ${instructor.lastname}`; // teks adalah nama instruktur
            instructorDropdown.appendChild(option);
        });
    } catch (error) {
        console.error('Error loading instructors:', error);
    }
}


        // Fetch data course untuk diisi di form
        fetch(`${apiUrl}/${courseId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('course_name').value = data.course_name;
                document.getElementById('instructor').value = data.instructor_id;
                document.getElementById('level').value = data.level;
                document.getElementById('start_date').value = new Date(data.start_date).toISOString().split('T')[0];
                document.getElementById('end_date').value = new Date(data.end_date).toISOString().split('T')[0];
                document.getElementById('status').value = data.status;
            });

        // Update data course
        document.getElementById('edit-course-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const course_name = document.getElementById('course_name').value;
            const level = document.getElementById('level').value;
            const instructor_id = document.getElementById('instructor').value;
            const start_date = document.getElementById('start_date').value;
            const end_date = document.getElementById('end_date').value;
            const status = document.getElementById('status').value;

            fetch(`${apiUrl}/${courseId}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ course_name, instructor_id, level, start_date, end_date, status })
            }).then(() => {
                alert('Course updated successfully');
                window.location.href = '/admin/courses';
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\KULIAHAHAHHA\KULIAH\SEMESTER 5\WEB\laravel-frontend\resources\views/course/edit.blade.php ENDPATH**/ ?>