function captureSelections() {
    const orderPage = window.location.pathname.split('/').pop();
    if (['order1.php', 'order2.php', 'order3.php'].includes(orderPage)) {
        const formId = {
            'order1.php': 'baseSelection',
            'order2.php': 'fruitSelections',
            'order3.php': 'addOnSelections',
        }[orderPage];

        const form = document.getElementById(formId);
        form.addEventListener('change', function() {
            const formData = new FormData(form);
            const selections = Array.from(formData.entries()).map(([key, value]) => value).join(', ');
            localStorage.setItem(orderPage + '-selections', selections);
        });
    }
}

function displaySelectionsOnCart() {
    if (window.location.pathname.includes('cart.php')) {
        const selections = [
            localStorage.getItem('order1.php-selections'),
            localStorage.getItem('order2.php-selections'),
            localStorage.getItem('order3.php-selections')
        ].filter(Boolean).join(', ');

        console.log("Custom Smoothie Ingredients: ", selections);
        ['order1.php-selections', 'order2.php-selections', 'order3.php-selections'].forEach(key => localStorage.removeItem(key));
    }
}

function submitAllSelections() {
    var customDescription = [
        localStorage.getItem('order1.php-selections'),
        localStorage.getItem('order2.php-selections'),
        localStorage.getItem('order3.php-selections')
    ].filter(Boolean).join(', '); 

    var inputElement = document.getElementById('customDescriptionInput');
    if(inputElement) {
        inputElement.value = customDescription;
        console.log("Submitting Custom Description: ", inputElement.value);
    } else {
        console.error('customDescriptionInput not found');
    }

    localStorage.removeItem('order1.php-selections');
    localStorage.removeItem('order2.php-selections');
    localStorage.removeItem('order3.php-selections');
}

document.addEventListener('DOMContentLoaded', function() {
    captureSelections();
    displaySelectionsOnCart();

    var continueButton = document.getElementById('continueButton3');
    if (continueButton) {
        continueButton.addEventListener('click', function(event) {
            event.preventDefault();
            submitAllSelections();
            this.closest('form').submit(); 
        });
    }
});
