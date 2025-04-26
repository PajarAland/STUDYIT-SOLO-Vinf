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

    <div class="download-container text-center mt-4">
    <a href="https://drive.google.com/uc?export=download&id=1kX9-QUqetgU8uIGQRCQEpBCI79EqSNG3" target="_blank" class="btn btn-success">
        Download Modul
    </a>
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
            <!-- Preview Area -->
            <div id="file-preview" class="mt-3"></div>
            <!-- <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 100%; margin-top: 10px;"> -->
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <div class="discussion-container mt-5 p-4 bg-light">
    <h4>Forum Diskusi</h4>

<div class="discussion-container mt-5 p-4 bg-light">
    <h4>Forum Diskusi</h4>

    <!-- Form Komentar -->
    <form id="comment-form" class="mb-4">
        <div class="mb-3">
            <label for="username" class="form-label">Nama</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Komentar</label>
            <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
        </div>

        <input type="hidden" id="parent-id" name="parent_id" value=""> <!-- Tambahan untuk balasan -->

        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
    </form>

    <!-- Modal Reply -->
<div id="replyModal" class="modal-overlay" style="display:none;">
  <div class="modal-box">
    <h5>Reply Komentar</h5>
    <form id="reply-form">
      <input type="hidden" id="reply-parent-id">
      <div class="mb-3">
        <label for="reply-username">Nama</label>
        <input type="text" id="reply-username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="reply-comment">Komentar</label>
        <textarea id="reply-comment" class="form-control" rows="3" required></textarea>
      </div>
      <div class="button-group">
  <button type="submit" class="btn btn-primary">Kirim Reply</button>
  <button type="button" class="btn btn-secondary" id="close-reply-modal">Batal</button>
</div>
    </form>
  </div>
</div>



    <!-- Daftar komentar -->
    <div id="comment-list" style="margin-top: 20px;">
        <!-- Komentar akan dimuat disini -->
    </div>
</div>

</div>

    <script>
        const apiUrl = 'http://localhost:3000/api/modulsByCourseID/<?php echo e($courses->id); ?>';
        const taskUploadUrl = 'http://localhost:3000/api/tasks/'; // API endpoint for uploading tasks
        const baseUrl = 'http://localhost:8000/backend-uploads/';
        const commentApiUrl = 'http://localhost:3000/api/comments/';

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
    formData.append('FileTask', file); // ← SESUAI dengan multer field
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

document.getElementById('FileTask').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('file-preview');

    preview.innerHTML = ''; // clear previous preview

    if (file) {
        const fileName = document.createElement('p');
        fileName.textContent = `File: ${file.name}`;

        // preview.appendChild(fileName);

        const fileType = file.type;

        // Preview untuk gambar
        if (fileType.startsWith('image/')) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.maxWidth = '300px';
            img.style.marginTop = '10px';
            preview.appendChild(img);
        }

        // Preview untuk PDF
        else if (fileType === 'application/pdf') {
            const embed = document.createElement('embed');
            embed.src = URL.createObjectURL(file);
            embed.type = 'application/pdf';
            embed.width = '100%';
            embed.height = '400px';
            embed.style.marginTop = '10px';
            preview.appendChild(embed);
        }

        // Teks atau lainnya
        else {
            const note = document.createElement('p');
            note.textContent = 'Preview tidak tersedia untuk jenis file ini.';
            preview.appendChild(note);
        }
    }
});

// document.getElementById('FileTask').addEventListener('change', function (event) {
//     const file = event.target.files[0];
//     const preview = document.getElementById('image-preview');

//     if (file && file.type.startsWith('image/')) {
//         const reader = new FileReader();
//         reader.onload = function (e) {
//             preview.src = e.target.result;
//             preview.style.display = 'block';
//         }
//         reader.readAsDataURL(file);
//     } else {
//         preview.src = '#';
//         preview.style.display = 'none';
//     }
// });

// const commentApiUrl = `http://localhost:8000/modul/${modul}/comments`; // Ganti dengan route Laravel yang sesuai

// Fetch komentar yang ada
function loadComments() {
    const url = window.location.pathname;
    const pathParts = url.split('/');
    const modul = pathParts[4];

    fetch(commentApiUrl)
        .then(res => res.json())
        .then(data => {
            const filteredComments = data.filter(comment => comment.ModulID == modul);

            const mainComments = filteredComments.filter(c => !c.ParentID);
            const replies = filteredComments.filter(c => c.ParentID);

            const commentList = document.getElementById('comment-list');
            commentList.innerHTML = '';

            mainComments.forEach(comment => {
                const commentItem = document.createElement('div');
                commentItem.classList.add('comment-box', 'mb-3', 'p-3');

                commentItem.innerHTML = `
                    <div class="comment-content">
                        <strong>${comment.username}</strong>
                        <p>${comment.comment}</p>
                        <a href="#" class="reply-button" data-id="${comment.id}">Reply</a>
                    </div>
                    <div class="reply-list"></div>
                `;

                // Cari balasan untuk komentar ini
                const replyList = commentItem.querySelector('.reply-list');

                replies.filter(r => r.ParentID == comment.id).forEach(reply => {
                    const replyItem = document.createElement('div');
                    replyItem.classList.add('reply-box', 'mt-2', 'p-2');
                    replyItem.innerHTML = `
                        <strong>${reply.username}</strong>
                        <p>${reply.comment}</p>
                    `;
                    replyList.appendChild(replyItem);
                });

                commentList.appendChild(commentItem);
            });

            // Buat tombol Reply berfungsi
// Setelah load komentar
document.querySelectorAll('.reply-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const parentId = this.dataset.id;
        
        // Buka modal
        document.getElementById('replyModal').style.display = 'flex';
        
        // Set parent id ke input hidden
        document.getElementById('reply-parent-id').value = parentId;
    });
});

// Tombol batal / close modal
document.getElementById('close-reply-modal').addEventListener('click', function() {
    document.getElementById('replyModal').style.display = 'none';
});
        })
        .catch(error => {
            console.error('Error loading comments:', error);
        });
}


// Kirim komentar baru
// Kirim komentar baru
document.getElementById('comment-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Get the current pathname to extract ModulID and UserID
    const url = window.location.pathname;
    const pathParts = url.split('/');

    const userId = pathParts[2]; // Assuming '2' is the user ID in URL like '/students/4/courses/3/modul'
    const modul = pathParts[4];  // Assuming '4' is the course (modul) ID

    // Append ModulID and UserID to the FormData
    formData.append('ModulID', modul);  // Append the ModulID from URL
    formData.append('UserID', userId);  // Append the UserID from URL

    try {
        const response = await fetch(commentApiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: this.elements['username'].value,
                comment: this.elements['comment'].value,
                ModulId: modul, // You can use `modul` or `course_id` based on your backend's expected parameter
                UserID: userId
            })
        });

        if (response.ok) {
            alert('Komentar berhasil dikirim!');
            this.reset(); // Reset the form after successful submission
            loadComments(); // Reload comments
        } else {
            const resData = await response.json();
            alert('Gagal mengirim komentar: ' + (resData.message || 'Terjadi kesalahan'));
        }
    } catch (error) {
        console.error('Error submitting comment:', error);
        alert('Terjadi kesalahan saat mengirim komentar.');
    }
});

document.getElementById('reply-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const parentId = document.getElementById('reply-parent-id').value;
    const username = document.getElementById('reply-username').value;
    const replies = document.getElementById('reply-comment').value;

    const url = window.location.pathname;
    const pathParts = url.split('/');
    const userId = pathParts[2];
    const modul = pathParts[4];

    try {
        const response = await fetch('http://localhost:3000/api/reply/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                username: username,
                replies: replies,
                ModulID: modul,
                UserID: userId,
                ParentID: parentId
            })
        });

        if (response.ok) {
            alert('Reply berhasil dikirim!');
            document.getElementById('reply-form').reset();
            document.getElementById('replyModal').style.display = 'none';
            loadComments(); // Reload komentar
        } else {
            const resData = await response.json();
            alert('Gagal kirim reply: ' + (resData.message || 'Terjadi kesalahan'));
        }
    } catch (error) {
        console.error('Error submitting reply:', error);
        alert('Terjadi kesalahan saat mengirim reply.');
    }
});




// Panggil saat halaman dimuat
loadComments();

    </script>
</body>
</html><?php /**PATH C:\Users\alienware\Documents\WebPro\PROTING3\WebStudyIT\resources\views/user/modul.blade.php ENDPATH**/ ?>