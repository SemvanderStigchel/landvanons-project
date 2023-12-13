<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/news.css'])
    <style>
        #container {
            position: relative;
            width: clamp(200px, 90vw, 360px);
            height: clamp(200px, 65vw, 300px);
            background-repeat: no-repeat;
            background-size: cover;
            margin-bottom: 50px;

        }

        #background {
            width: 100%;
            bottom: -20%;
            z-index: 2;
            position: relative;
        }
#container{
    animation: float;
    animation-duration: 5s;
    animation-iteration-count: infinite;
}
        .draggable-button {
            position: absolute;
            cursor: pointer;
            user-select: none;
            touch-action: none;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            z-index: 5;
            width: 80px;
            height: 80px;
            object-fit: fill;
        }

        .purchase-button img {
            width: 40px;
            object-fit: fill;
        }

        .purchase-button {
            width: 95px;
            height: 120px;

        }

        @keyframes float {
            0%{
                transform: translateY(5px);
            }
            50%{
                transform:  translateY(0px);
            }
            100%{
                transform: translateY(5px);
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', getButtons);

        let buttonTimeOut;
        let buttonIsPressed = false;
        let buttons = [];
        let pageLoaded = true; // Flag to check if the page is just loaded
        let sellMenu;

        function getButtons() {
            sellMenu = document.getElementById("sellMenu");
            sellMenu.style.display = "none";

            let parent = document.getElementById("container")
            for (let i = 0; i < 9; i++) {

                if (localStorage.getItem('button' + i) !== null) {
                    let newItem = document.createElement('img');
                    newItem.classList.add("draggable-button");

                    newItem.id = 'button' + (i);
                    newItem.src = "../images/tree4.png"
                    makeDraggable(newItem);
                    parent.append(newItem);
                    console.log(newItem.id)
                }
            }
            buttons = document.querySelectorAll('.draggable-button');
            setButtonPositions()
        }

        function setButtonPositions() {
            buttons.forEach((item) => {
                let position = localStorage.getItem(item.id);
                if (position) {
                    position = JSON.parse(position);
                    item.style.left = position.left;
                    item.style.top = position.top;
                    item.style.zIndex = "5";
                }
            });

            // Reset the flag after the initial load
            pageLoaded = false;
        }

        function makeDraggable(element) {
            let isDragging = false;
            let offsetX, offsetY;

            function startDrag(event) {
                if (pageLoaded) {
                    // Skip saving position during the initial load
                    return;
                }

                isDragging = true;
                buttonIsPressed = true;
                buttonTimeOut = setTimeout(openButtonMenu, 1000);

                const rect = element.getBoundingClientRect();
                offsetX = event.clientX - rect.left;
                offsetY = event.clientY - rect.top;

                if (event.type === 'touchstart') {
                    offsetX = event.touches[0].clientX - rect.left;
                    offsetY = event.touches[0].clientY - rect.top;
                }

                document.addEventListener('mousemove', dragButton);
                document.addEventListener('mouseup', stopDrag);
                document.addEventListener('touchmove', dragButton, {passive: false});
                document.addEventListener('touchend', stopDrag);
            }

            function openButtonMenu(button) {

            }

            function dragButton(event) {
                event.preventDefault();

                if (isDragging) {
                    const containerRect = document.getElementById('container').getBoundingClientRect();
                    const maxX = containerRect.width - element.offsetWidth;
                    const maxY = containerRect.height - element.offsetHeight;

                    let x, y;

                    if (event.type === 'mousemove') {
                        x = (event.clientX - offsetX - containerRect.left) / containerRect.width * 100;
                        y = (event.clientY - offsetY - containerRect.top) / containerRect.height * 100;
                    } else if (event.type === 'touchmove') {
                        x = (event.touches[0].clientX - offsetX - containerRect.left) / containerRect.width * 100;
                        y = (event.touches[0].clientY - offsetY - containerRect.top) / containerRect.height * 100;
                    }

                    x = Math.min(Math.max(0, x), maxX / containerRect.width * 100);
                    y = Math.min(Math.max(0, y), maxY / containerRect.height * 100);

                    element.style.left = x + '%';
                    element.style.top = y + '%';
                }
            }

            function stopDrag() {
                isDragging = false;
                buttonIsPressed = false;
                clearTimeout(buttonTimeOut);

                document.removeEventListener('mousemove', dragButton);
                document.removeEventListener('mouseup', stopDrag);
                document.removeEventListener('touchmove', dragButton);
                document.removeEventListener('touchend', stopDrag);

                // Save position only when dragging ends
                if (!isDragging) {
                    saveButtonPosition(element);
                }
            }

            element.addEventListener('mousedown', startDrag);
            element.addEventListener('touchstart', startDrag);
        }

        function saveButtonPosition(button) {
            const rect = button.getBoundingClientRect();
            const containerRect = document.getElementById('container').getBoundingClientRect();

            const leftPercentage = ((rect.left - containerRect.left) / containerRect.width) * 100;
            const topPercentage = ((rect.top - containerRect.top) / containerRect.height) * 100;

            const roundedLeft = Math.round(leftPercentage * 100) / 100;
            const roundedTop = Math.round(topPercentage * 100) / 100;

            if (roundedTop > 4) {
                button.style.zIndex = `${Math.round(roundedTop) + 3}`;
            }
            const position = {
                left: roundedLeft + '%',
                top: roundedTop + '%',
            };

            localStorage.setItem(button.id, JSON.stringify(position));
        }

        buttons.forEach(button => {
            makeDraggable(button);
        });

        let resizeObserver;

        document.addEventListener('DOMContentLoaded', () => {
            resizeObserver = new ResizeObserver(() => {
                if (!pageLoaded) {
                    buttons.forEach(button => {
                        saveButtonPosition(button);
                    });
                }
            });
            resizeObserver.observe(container);
        });
    </script>

</head>
<body style="background-color: #F6F7FC">
<header class="bg-green-main" style="width: 100vw; height: clamp(50px, 20vh, 300px)">
    <nav class="flex content-between bg-green-main">
        <h1 class="white mg-3 mg-top-4">Mijn Land</h1>
        <span class="mg-3 white mg-top-4">🪙{{$points}} punten</span>
    </nav>
</header>
<main class="flex align-center column" style="width: 100vw;">
    <?php if (isset($item)) { ?>
    <script>
        document.addEventListener('DOMContentLoaded', apendChild);

        function apendChild() {
            let itemCount = document.getElementsByClassName("draggable-button");

            let parent = document.getElementById("container")
            let newItem = document.createElement('img');
            newItem.classList.add("draggable-button");

            newItem.id = 'button' + (itemCount.length + 1);
            newItem.style = "left: 40%; top: 40%;";
            newItem.style.zIndex = "10";
            newItem.src = "../images/tree4.png"
            makeDraggable(newItem);
            buttons = document.querySelectorAll('.draggable-button');
            saveButtonPosition(newItem);
            parent.append(newItem);
        }
    </script>
    <?php } ?>

    <div id="" class="border-4 " style="transform: translateY(-25%); background-color: #F6F7FC">
        <div id="container" class="scrollAnimation">
            <div id="sellMenu">
                <button>Sell</button>
                <button>Move</button>
            </div>
            <img id="background" class="" src="../images/Layer 1.svg">
        </div>
    </div>
    <div class="flex content-around" style="width: 95vw;">
        <div class="purchase-button flex column align-center content-between border-3 scrollAnimation"
             style="background-color: #72B94F;">
            <p class="mg-1 white">boom</p>
            <img src="../images/tree4.png">
            <form action="{{route('item.purchase')}}" method="POST">
                @csrf
                <input id="item" type="number" name="item" value="0" hidden="hidden">
                <button type="submit" class="text-small button bg-green-main white mg-2" style="width: fit-content">5
                    punten
                </button>
            </form>
        </div>
        <div class="purchase-button flex column align-center content-between border-3 scrollAnimation"
             style="background-color: #E6773F;">
            <p class="mg-1 white">boom</p>
            <img src="../images/tree4.png">
            <form action="{{route('item.purchase')}}" method="POST">
                @csrf
                <input id="item" type="number" name="item" value="1" hidden="hidden">
                <button type="submit" class="text-small button bg-green-main white mg-2" style="width: fit-content">10
                    punten
                </button>
            </form>
        </div>
        <div class="purchase-button flex column align-center content-between border-3 scrollAnimation"
             style="background-color: #2BA0CB;">
            <p class="mg-1 white">boom</p>
            <img src="../images/tree4.png">
            <form action="{{route('item.purchase')}}" method="POST">
                @csrf
                <input id="item" type="number" name="item" value="2" hidden="hidden">
                <button type="submit" class="text-small button bg-green-main white mg-2" style="width: fit-content">15
                    punten
                </button>
            </form>
        </div>
    </div>
</main>
@include('partials.navbar')

</body>
</html>
