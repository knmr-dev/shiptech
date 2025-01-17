
document.getElementById('type').addEventListener('change', function() {
    const priceInput = document.getElementById('price');
    switch (this.value) {
        case 'Regular':
            priceInput.value = '300';
            break;
        case 'Student':
            priceInput.value = '240';
            break;
        case 'Senior':
            priceInput.value = '216';
            break;
        default:
            priceInput.value = '';
    }
});