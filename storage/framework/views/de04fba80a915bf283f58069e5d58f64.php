<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Status</h1>
        <a href="/admin/tasks" class="btn btn-secondary mb-3">Back to List</a>
        <form id="edit-task-form">
            <div class="mb-3">
                <label for="Status" class="form-label">Status</label>
                <select class="form-control" id="Status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>
    <script>
        const apiUrl = 'http://localhost:3000/api/tasks';
        const taskId = window.location.pathname.split('/').slice(-2, -1)[0];

        // Fetch data task untuk mengisi form
        fetch(`${apiUrl}/${taskId}`)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Data:", data);
                document.getElementById('Status').value = data.Status; // Pastikan ID sesuai

            })
            .catch(error => {
                console.error('Error fetching task:', error);
                alert('Failed to load task data.');
            });

        // Update data task
        document.getElementById('edit-task-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const Status = document.getElementById('Status').value;

            fetch(`${apiUrl}/${taskId}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ Status }) // Kirim data ke API
            })
                .then(() => {
                    alert('Task updated successfully');
                    window.location.href = '/admin/tasks';
                })
                .catch(error => {
                    console.error('Error updating task:', error);
                    alert('Failed to update task.');
                });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\alienware\Documents\WebPro\TUBESSS\WebStudyIT\resources\views/modul/edit.blade.php ENDPATH**/ ?>