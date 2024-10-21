const classes = [
    { name: 'Primary 1', teacher: 'Emily Davis', photo: 'class2b.jpg', link: 'Primary1.php' },
    { name: 'Primary 2', teacher: 'William Brown', photo: 'class3a.jpg', link: 'Primary2.php' },
    { name: 'Primary 3', teacher: 'Olivia Wilson', photo: 'class3b.jpg', link: 'Primary3.php' },
    { name: 'Primary 4', teacher: 'James Jones', photo: 'class4a.jpg', link: 'Primary4.php' },
    { name: 'Primary 5', teacher: 'Linda Garcia', photo: 'class4b.jpg', link: 'Primary5.php' },
    { name: 'Primary 6', teacher: 'Elizabeth Miller', photo: 'class5a.jpg', link: 'Primary6.php' },
    { name: 'Jhs 1', teacher: 'Robert Martinez', photo: 'class5b.jpg', link: 'Jhs1.php' },
    { name: 'Jhs 2', teacher: 'David Anderson', photo: 'class6a.jpg', link: 'Jhs2.php' },
    { name: 'Jhs 3', teacher: 'Sarah Thomas', photo: 'class6b.jpg', link: 'Jhs3.php' }
];
document.addEventListener('DOMContentLoaded', (event) => {
    const table = document.getElementById('table');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) { // Start at 1 to skip the header row
        rows[i].addEventListener('click', function() {
            // Remove the active class from any row that has it
            for (let j = 1; j < rows.length; j++) {
                rows[j].classList.remove('active');
            }
            // Add the active class to the clicked row
            this.classList.add('active');
        });
    }
});
document.addEventListener("DOMContentLoaded", function() {
    var studentsLink = document.getElementById("students-link");
    var studentsDropdown = document.getElementById("students-dropdown");

    studentsLink.addEventListener("mouseover", function() {
        studentsDropdown.style.display = "block";
    });

    studentsLink.addEventListener("mouseout", function() {
        setTimeout(function() {
            studentsDropdown.style.display = "none";
        }, 300);
    });

    studentsDropdown.addEventListener("mouseover", function() {
        studentsDropdown.style.display = "block";
    });

    studentsDropdown.addEventListener("mouseout", function() {
        setTimeout(function() {
            studentsDropdown.style.display = "none";
        }, 300);
    });
});

document.getElementById("add-student-btn").addEventListener("click", function() {
    var form = document.getElementById("add-student-form");
    form.classList.toggle("hidden");
});
    // JavaScript to clear form inputs
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('add-student-form');

            form.addEventListener('submit', function (event) {
                // Check if the form was submitted successfully
                if (window.location.search.includes('success')) {
                    form.reset(); // Reset the form fields
                }
            });

            // Automatically reset form if there's a success message
            if (window.location.search.includes('success')) {
                form.reset(); // Reset the form fields
            }
        });
document.addEventListener('DOMContentLoaded', () => {
    const profileContainer = document.querySelector('.profile-container');

    classes.forEach(classInfo => {
        const profileCard = document.createElement('a');
        profileCard.classList.add('profile-card');
        profileCard.href = classInfo.link;

        const profileImage = document.createElement('img');
        profileImage.src = classInfo.photo;
        profileImage.alt = `${classInfo.name} photo`;

        const className = document.createElement('p');
        className.textContent = classInfo.name;

        const classTeacher = document.createElement('h3');
        classTeacher.textContent = `Teacher: ${classInfo.teacher}`;

        profileCard.appendChild(profileImage);
        profileCard.appendChild(classTeacher);
        profileCard.appendChild(className);
        profileContainer.appendChild(profileCard);
    });
});

// End of Admin Act
function makeActive(event) {
    // Prevent default behavior
    event.preventDefault();

    // Get all links in the sidebar
    const links = document.querySelectorAll('.teachSb a');

    // Remove 'active' class from all links
    links.forEach(link => link.classList.remove('active'));

    // Add 'active' class to the clicked link
    event.currentTarget.classList.add('active');
}

// Attach 'makeActive' function to all links when the document is loaded
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.teachSb a');
    links.forEach(link => {
        link.addEventListener('click', makeActive);
    });
});

let slideIndex = 0;
const users = document.querySelector('.users');
const cards = document.querySelectorAll('.card');
const totalCards = cards.length;
const cardWidth = users.querySelector('.card').offsetWidth;

function moveSlider() {
    slideIndex++;
    if (slideIndex >= totalCards) {
        slideIndex = 2;
    }
    users.style.transform = `translateX(-${slideIndex * cardWidth}px)`;
}



function addJuniorSubject() {
    const subject = document.getElementById('junior-subject-input').value;
    if (subject) {
        const cardContainer = document.getElementById('junior-cards');
        const newCard = document.createElement('div');
        newCard.className = 'card';
        newCard.textContent = subject;
        cardContainer.appendChild(newCard);
        document.getElementById('junior-subject-input').value = '';
    }
}

function deleteJuniorSubject() {
    const subject = document.getElementById('delete-junior-subject-input').value;
    if (subject) {
        const cardContainer = document.getElementById('junior-cards');
        const cards = cardContainer.getElementsByClassName('card');
        for (let i = 0; i < cards.length; i++) {
            if (cards[i].textContent === subject) {
                cardContainer.removeChild(cards[i]);
                break;
            }
        }
        document.getElementById('delete-junior-subject-input').value = '';
    }
}

function addPrimarySubject() { 
    const subject = document.getElementById('primary-subject-input').value;
    if (subject) {
        const cardContainer = document.getElementById('primary-cards');
        const newCard = document.createElement('div');
        newCard.className = 'card';
        newCard.textContent = subject;
        cardContainer.appendChild(newCard);
        document.getElementById('primary-subject-input').value = '';
    }
}

function deletePrimarySubject() {
    const subject = document.getElementById('delete-primary-subject-input').value;
    if (subject) {
        const cardContainer = document.getElementById('primary-cards');
        const cards = cardContainer.getElementsByClassName('card');
        for (let i = 0; i < cards.length; i++) {
            if (cards[i].textContent === subject) {
                cardContainer.removeChild(cards[i]);
                break;
            }
        }
        document.getElementById('delete-primary-subject-input').value = '';
    }
}












