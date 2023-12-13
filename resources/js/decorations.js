let isDragging = false;
let offsetX, offsetY;

function startDrag(event) {
    isDragging = true;

    // Calculate the offset between the mouse position and the button position
    offsetX = event.clientX - event.target.getBoundingClientRect().left;
    offsetY = event.clientY - event.target.getBoundingClientRect().top;

    // Add event listeners for mousemove and mouseup
    document.addEventListener('mousemove', dragButton);
    document.addEventListener('mouseup', stopDrag);
}

function dragButton(event) {
    if (isDragging) {
        // Set the button position based on the mouse position and the offset
        const x = event.clientX - offsetX;
        const y = event.clientY - offsetY;

        document.getElementById('draggableButton').style.left = x + 'px';
        document.getElementById('draggableButton').style.top = y + 'px';
    }
}

function stopDrag() {
    isDragging = false;

    // Remove the event listeners when dragging is stopped
    document.removeEventListener('mousemove', dragButton);
    document.removeEventListener('mouseup', stopDrag);
}
