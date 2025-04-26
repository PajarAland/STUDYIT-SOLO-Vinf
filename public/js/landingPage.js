
    document.addEventListener('DOMContentLoaded', function () {
    const apiUrl = 'http://localhost:3000/api/coursesAdmin'; // Ganti dengan URL API Anda
    const baseUrl = 'http://localhost:8000/backend-uploads/';
    const courseContainer = document.getElementById('course-container');
    const courseTemplate = document.getElementById('course-template');

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            data.forEach(course => {
                const courseCard = courseTemplate.cloneNode(true);
                courseCard.style.display = 'block'; 
                courseCard.setAttribute('data-id', course.id);
                courseCard.querySelector('.card-img-top').src = `${baseUrl}${course.image}`; 
                courseCard.querySelector('.card-img-top').alt = "Cover course";
                courseCard.querySelector('.card-title').textContent = course.course_name + " " +  course.level.charAt(0).toUpperCase() + course.level.slice(1) + " Class";
                // courseCard.querySelector('.card-level').textContent = "Level :" +  course.level.charAt(0).toUpperCase() + course.level.slice(1);
                courseCard.querySelector('.date-card').textContent = new Date(course.start_date).getDate() + " - " +  new Date(course.end_date).toLocaleDateString('id-ID', 
                {
                
                  month: 'long',    
                  day: 'numeric',   
                  year: 'numeric'  
                });

                // Tambahkan card ke container
                courseContainer.appendChild(courseCard);
            });
        })
        .catch(error => {
            console.error('Error fetching courses:', error);
        });
});



function toggleMenu() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}
document.addEventListener('click', function (event) {
    const sidebar = document.querySelector('.nav-menu');
    const hamburger = document.querySelector('.hamburger');

    if (!sidebar.contains(event.target) && !hamburger.contains(event.target)) {
        sidebar.classList.remove('active'); // Close the sidebar
    }
});
function navigatePayment(){
    window.location.href = "/page/payment.html";
}
function navigateLogin(){
  window.location.href = "/login"
}
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.bottom >= 0
    );
  }
  
 
  function animateOnScroll() {
    const benefitsContainer = document.querySelector('.benefits-container');
    const testimoniContainer = document.querySelector('.testimoni-container');
  
 
    if (isInViewport(benefitsContainer)) {
      benefitsContainer.classList.add('active');
    }
    if (isInViewport(testimoniContainer)) {
      testimoniContainer.classList.add('active');
    }
  }
  
  // Listen for scroll events
  window.addEventListener('scroll', animateOnScroll);
  
  animateOnScroll();


  
