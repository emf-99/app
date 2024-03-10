<!-- Begining of footer.php -->
<nav>
    <div class="active" id="home">
        <img src="image/home_assets/icons/home_icon_selected.svg" height="35" width="35"/>
    </div>
    <div id="map">
        <img src="image/home_assets/icons/map_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="order">
        <img src="image/home_assets/icons/order_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="rewards">
        <img src="image/home_assets/icons/rewards_icon_neutral.svg" height="35" width="35"/>
    </div>
    <div id="account">
        <img src="image/home_assets/icons/account_icon_neutral.svg" height="35" width="35"/>
    </div>
</nav>

<script>
    function navigateToPage(page) {
        window.location.href = page + '.php';
    }

    
    document.getElementById('home').addEventListener('click', function() {
        navigateToPage('home');
    });

    document.getElementById('map').addEventListener('click', function() {
        navigateToPage('map');
    });

    document.getElementById('order').addEventListener('click', function() {
        navigateToPage('order');
    });

    document.getElementById('rewards').addEventListener('click', function() {
        navigateToPage('rewards');
    });

    document.getElementById('account').addEventListener('click', function() {
        navigateToPage('account');
    });

    document.getElementById('custom').addEventListener('click', function() {
        navigateToPage('order/order1');
    });
</script>
</body>
</html>
