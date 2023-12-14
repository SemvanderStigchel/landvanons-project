<!-- resources/views/partials/navbar.blade.php -->

<style>



    .navbar {
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: fixed;
        bottom: 0;
        width: 100vw;
        background-color: #ffffff;
        padding: 0 0;
        z-index: 100;
    }


    .navbar a {
        color: white;
        text-decoration: none;
        text-align: center;
        padding: 10px;
        flex: 1;


    }





    .navbar a img {
        max-width: 20px;
        max-height: 20px;

    }


    .navbar a.mypage-icon img {
        max-width: 50px;
        max-height: 50px;
    }

</style>


<nav class="navbar">
    <a href="{{route('home')}}"><img src="{{ asset('images/homeicon.png') }}" alt="Home"></a>
    <a href="#"><img src="{{ asset('images/􀋱vrijwilligerstakenIcon.svg') }}" alt="Vrijwilligerstaken"></a>
    <a href="#" class="mypage-icon">
        <img src="{{ asset('images/mypageicon.png') }}" alt="Middle Icon">
    </a>
    <a href="{{route('dashboard')}}"><img src="{{ asset('images/dashboardIcon.svg') }}" alt="Dashboard"></a>
    <a href="#"><img src="{{ asset('images/profileicon.png') }}" alt="Icon 4"></a>
</nav>


