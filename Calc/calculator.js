function appendNumber(number) {
    const display = document.getElementById('display');
    display.value += number;
}

function clearDisplay() {
    const display = document.getElementById('display');
    display.value = '';
}

function calculateResult() {
    const display = document.getElementById('display');
    try {
        display.value = eval(display.value);  // eval використовує вираз з екрану для обчислення
    } catch (e) {
        display.value = 'Помилка';
    }
}
