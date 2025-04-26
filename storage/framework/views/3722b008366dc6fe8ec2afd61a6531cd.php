<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course View</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/stylesCor.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="banner">
        <img id="banner-image" src="" alt="Banner Image">
        <div class="banner-text" id="course-title">Course Title</div>
    </div>

    <div class="arw-back">
        <a href="../page/homePage.html">
            <img src="<?php echo e(asset('image/backarrow.png')); ?>" alt="Back to Course View">
        </a>
    </div>

    <div class="dec-container">
        <p>What You'll Learn:</p>
        <div id="json-items">
            <!-- Data will be inserted dynamically -->
        </div>
    </div>

    <div class="des-tools">
        <p>Here are some tools that you'll learn in this course</p>
        <div class="img-tools">
            <!-- <img src="../asset/image/figmaaa.png" alt="Figma Icon" class="img-icon">
            <img src="../asset/image/adobe1.jpg" alt="Adobe Icon" class="img-icon"> -->
        </div>
    </div>

    <!-- YouTube Video Iframe -->
    <div class="des-container">
        <div class="vid-cor">
            <!-- YouTube iframe will be inserted dynamically here -->
        </div>
    </div>

    <div class="task-container">
        <p>Tasks:</p>
        <div id="task-list">
            <!-- Task items will be inserted dynamically -->
        </div>
    </div>

    <div class="submit-container">
        <form id="submit-task" enctype="multipart/form-data">
            <input type="file" class="form-control" id="FileTask" name="FileTask" required>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const apiUrl = 'http://localhost:3000/api/modulsByCourseID/<?php echo e($courses->id); ?>';
        const taskUploadUrl = 'http://localhost:3000/api/tasks/'; // API endpoint for uploading tasks
        const baseUrl = 'http://localhost:8000/backend-uploads/';

        // Fetch course data
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched Data:", data);

                // Update banner
                document.getElementById('banner-image').src = `${baseUrl}${data.Assetto}`;
                document.getElementById('course-title').textContent = data.Title;
                document.getElementById('json-items').textContent = data.Description;
                document.getElementById('task-list').textContent = data.Task;

                // YouTube video setup
                const youtubeVideoUrl = `https://www.youtube.com/embed/${data.YTEmbedLink}`;
                const iframe = document.createElement('iframe');
                iframe.src = youtubeVideoUrl;
                iframe.width = "100%";
                iframe.height = "315";
                iframe.frameBorder = "0";
                iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
                iframe.allowFullscreen = true;

                // Replace video container
                const videoContainer = document.querySelector('.vid-cor');
                videoContainer.innerHTML = '';
                videoContainer.appendChild(iframe);
            })
            .catch(error => {
                console.error("Error fetching courses:", error);
            });

        // Handle file task submission
    document.getElementById('submit-task').addEventListener('submit', async function (e) {
    e.preventDefault();

    // Get the file input
    const fileInput = document.getElementById('FileTask');
    const file = fileInput.files[0];

    if (!file) {
        alert('Please select a file to upload.');
        return;
    }

    // Get the current pathname
    const url = window.location.pathname;
    const pathParts = url.split('/');

    // Ensure that you are getting the correct segment for the ModulID
    // For example, with URL like: /students/4/courses/3/modul
    // pathParts would look like: ['', 'students', '4', 'courses', '3', 'modul']
    const userId = pathParts[2]; // Index 2 mengacu pada '4' dalam '/students/4/courses/1/modul'
    const modul = pathParts[4]; // 3rd index will be the course ID (modul)

    // Output the course ID (ModulID)
    console.log('ModulID:', modul);
    console.log('UserID:', userId);


    // Create FormData and append the file and ModulID
    const formData = new FormData();
    formData.append('FileTask', file);  // Add the file
    formData.append('ModulID', modul);  // Ensure the ModulID is correctly passed
    formData.append('UserID', userId); // Tambahkan UserID 

    try {
        // Send the file to the API (taskUploadUrl should be your backend API endpoint)
        const response = await fetch(taskUploadUrl, {
            method: 'POST',
            body: formData, // Send FormData containing the file and ModulID
        });

        // Handle the response
        if (response.ok) {
            alert('Task submitted successfully!');
            console.log("susc")
            fileInput.value = ''; // Reset file input
        } else {
            const errorData = await response.json();
            alert('Error submitting: ' + (errorData.message || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error submitting task:', error);
        alert('An error occurred while submitting the task. Please try again later.');
    }
});


    </script>
</body>
</html>
<?php /**PATH C:\Users\alienware\Documents\WebPro\TUBESSS\WebStudyIT\resources\views/user/modul.blade.php ENDPATH**/ ?>