
    document.addEventListener('DOMContentLoaded', function () {
        const apiUrl = 'http://localhost:3000/api/coursesUser'; // Ganti dengan URL API Anda
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
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
          rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.bottom >= 0
        );
      }
      
    
    
      const container = document.getElementById('course-container');
    
      container.addEventListener('click', (event) => {
      const card = event.target.closest('.card');
    
    
      if (card) {
        const path = window.location.pathname;
        const courseId = card.getAttribute('data-id'); 
        const akunId = path.split('/').pop();
        console.log(akunId)
        if (courseId) {
          // Log untuk debugging
          console.log('Card clicked:', card); 
          console.log('Course ID:', courseId); 
    
          const targetUrl = `/students/${akunId}/courses/${courseId}/modul`;


          console.log('Redirecting to:', targetUrl); 
          window.location.href = targetUrl;
        } else {
          console.log('No course ID found for this card.');
        }
      } else {
        console.log('Clicked outside a valid card or on the template.'); 
      }
    });
    
      
    
    