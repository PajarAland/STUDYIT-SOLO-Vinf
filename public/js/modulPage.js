const apiUrl = 'http://localhost:3000/api/moduls/'; // Replace with your API vidio
const baseUrl = 'http://localhost:8000/backend-uploads/'; // Replace with your base vidio for assets

fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        console.log("Data fetched from API:", data); // Debug: Check the data

        const courseContainer = document.getElementById('course-container');
        const courseTemplate = document.getElementById('course-template');

        data.forEach(course => {
            // Update banner
            console.log("Processing course:", course); // Debug: Log each course data
            document.getElementById('banner-image').src = `${baseUrl}${course.vidio}`;
            document.getElementById('course-title').textContent = course.Title;

            // Create a new course card
            const courseCard = courseTemplate.cloneNode(true);
            courseCard.style.display = 'block'; // Show the card
            courseCard.querySelector('.card-img-top').src = `${baseUrl}${course.vidio}`; // Set image
            courseCard.querySelector('.card-img-top').alt = "Cover course";
            courseCard.querySelector('.card-title').textContent = course.Title;
            courseCard.querySelector('.date-card').textContent = new Date(course.end_date).toLocaleDateString('id-ID', {
                weekday: 'long',
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            });

            // Append the card to the container
            courseContainer.appendChild(courseCard);
        });

        // Insert learning points
        const desContainer = document.getElementById('json-items');
        data[0].Description.split('. ').forEach((item, index) => {
            const paragraph = document.createElement('p');
            paragraph.textContent = `${index + 1}. ${item}`;
            desContainer.appendChild(paragraph);
        });

        // Update the video poster and YouTube iframe
        const videoContainer = document.querySelector('.vid-cor');
        if (!videoContainer) {
            console.error("Video container not found!"); // Debug: Check if the container exists
            return;
        }

        // YouTube Video URL
        const youtubeId = data[0].youtube_url; // Use the ID directly
        console.log("YouTube ID from API:", youtubeId); // Debug: Log YouTube ID

        const youtubeEmbedUrl = `https://www.youtube.com/embed/${youtubeId}`;
        console.log("YouTube Embed URL:", youtubeEmbedUrl); // Debug: Log embed URL

        // Replace content in the video container
        videoContainer.innerHTML = ''; // Clear existing video content
        if (youtubeId) {
            const iframe = document.createElement('iframe');
            iframe.src = youtubeEmbedUrl;
            iframe.width = "100%";
            iframe.height = "315";
            iframe.frameBorder = "0";
            iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
            iframe.allowFullscreen = true;
            videoContainer.appendChild(iframe);
            console.log("Iframe appended successfully!"); // Debug: Confirm iframe is added
        } else {
            console.error("YouTube ID is invalid. Iframe not created."); // Debug: Log if ID is missing
        }
    })
    .catch(error => {
        console.error('Error fetching courses:', error); // Debug: Log fetch errors
    });
