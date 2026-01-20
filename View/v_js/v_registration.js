document.addEventListener('change', optionDisplay);

function optionDisplay(check) {
    if (check.target.classList.contains('role-option')) {
        const tutorSection = document.getElementById('tutorExtra');
        const studentSection = document.getElementById('studentExtra');
        
        if (check.target.value === 'tutor') {
            tutorSection.style.display = 'block';
            studentSection.style.display = 'none';
        } 
        else if (check.target.value === 'student-guardian') {
            tutorSection.style.display = 'none';
            studentSection.style.display = 'block';
        }
    }
};


const form = document.querySelector('form');

form.addEventListener('reset', reset);

function reset() {
    document.getElementById('tutorExtra').style.display = 'none';
    document.getElementById('studentExtra').style.display = 'none';
};