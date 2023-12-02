<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dash.css'])
</head>
<body style="background-color: #F6F7FC">
<main>

    <!-- Banner -->
    <div class="banner">
        <a href="{{route('posts.index')}}" class="back-button">Terug</a>
        <div class="title">Overzicht</div>
    </div>





    <!-- reusable navbar -->
    @include('partials.navbar')

    <!-- ... (your existing HTML) -->

    {{-- Rectangle with tiles --}}
    <div class="tile-rectangle">
        <div class="image-tile">
            <div class="image-tile-item">
                <img src="{{ asset('images/tile1.svg') }}" alt="Image 1">
                <div class="image-text">@if($user->trees === null) N/A Bomen @else {{$user->trees}} Bomen @endif</div>
            </div>
            <div class="image-tile-item">
                <img src="{{ asset('images/tile2.svg') }}" alt="Image 2">
                <div class="image-text">@if($user->animals === null) N/A Dieren @else {{$user->animals}} Dieren @endif</div>
            </div>
            <div class="image-tile-item">
                <img src="{{ asset('images/tile3.svg') }}" alt="Image 3">
                <div class="image-text">@if($user->trees === null) N/A kg Co2 opgenomen per jaar @else {{$user->trees * 25}} kg Co2 opgenomen per jaar @endif</div>
            </div>
            <div class="image-tile-item">
                <img src="{{ asset('images/tile4.svg') }}" alt="Image 4">
                <div class="image-text">{{$user->points}} Punten</div>
            </div>
        </div>
    </div>

    <div id="detailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="detailsText"></div>
        </div>
    </div>

</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tileItems = document.querySelectorAll('.image-tile-item');
        var modal = document.getElementById('detailsModal');
        var closeButton = document.querySelector('.close');
        var modalContent = document.querySelector('.modal-content');

        tileItems.forEach(function (item, index) {
            item.addEventListener('click', function () {
                // Handle tile click
                showModal(index);
            });
        });

        // Close the modal when the close button is clicked
        closeButton.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        // Close the modal when clicking outside the modal content
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        function showModal(tileIndex) {
            // Simulate fetching details from the server based on the tile index
            var details = getDetailsForTile(tileIndex);

            // Get the color of the clicked tile
            var tileColor = getTileColor(tileIndex);

            // Update modal content with the fetched details
            modalContent.innerHTML = details;


            modalContent.style.backgroundColor = tileColor;

            // Show the modal
            modal.style.display = 'block';
        }

        function getDetailsForTile(tileIndex) {

            var detailsText = "";
            switch (tileIndex) {
                case 0:
                    detailsText = "Je draagt nu bij aan het planten van 200 bomen.";
                    break;
                case 1:
                    detailsText = "Meer dan 20 diersoorten bevinden zich op jou grond";
                    break;
                case 2:
                    detailsText = "Dankzij jou minder C02 uitstoot!";
                    break;
                case 3:
                    detailsText = "Je punten totaal is {{$user->points}} punten. je kunt deze gebruiken om items te kopen in de shop";
                    break;

            }
            return detailsText;
        }

        function getTileColor(tileIndex) {
            // Simulated tile colors, replace with actual colors
            var colors = ['#72B94F', '#CF8DCD', '#2BA0CB', '#F7C053'];
            return colors[tileIndex] || '#000000';
        }
    });
</script>
</body>
</html>
