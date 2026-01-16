document.addEventListener('change', function(e) {
    if (e.target.classList.contains('role-option')) {
        const tutorSection = document.getElementById('tutorExtra');
        const studentSection = document.getElementById('studentExtra');
        
        if (e.target.value === 'tutor') {
            tutorSection.style.display = 'block';
            studentSection.style.display = 'none';
        } 
        else if (e.target.value === 'student-guardian') {
            tutorSection.style.display = 'none';
            studentSection.style.display = 'block';
        }
    }
});

// Use 'click' for the Reset button
document.getElementById('resetBtn').addEventListener('click', function() {
    document.getElementById('tutorExtra').style.display = 'none';
    document.getElementById('studentExtra').style.display = 'none';
});