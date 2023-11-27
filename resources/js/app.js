import './bootstrap';

// Function to check if an element is in the viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();

    return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&

        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
    );

}

// Function to add the 'visible' class to elements in the viewport
function handleScrollAnimation() {
    const elements = document.querySelectorAll('.scrollAnimation');

    elements.forEach(element => {
        if (isInViewport(element)) {
            element.classList.add('visible');
        } else {
            element.classList.remove('visible')
        }
    });
}

function animationOnLoad() {
    const elements = document.querySelectorAll('.scrollAnimation');

    elements.forEach(function (el, index) {
        setTimeout(function () {
            if (isInViewport(el)) {
                el.classList.add('visible');
            }
        }, index * 200);
    });
}



// Attach the 'handleScrollAnimation' function to the scroll event
window.addEventListener('scroll', handleScrollAnimation);

// Initial check for elements in the viewport when the page loads
document.addEventListener('DOMContentLoaded', animationOnLoad);
