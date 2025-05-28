document.addEventListener('DOMContentLoaded', () => {
    let currentInput = '0';
    let previousInput = '';
    let operation = null;
    let resetScreen = false;
    
    const display = document.getElementById('display');
    const numberButtons = document.querySelectorAll('.number');
    const operatorButtons = document.querySelectorAll('.operator');
    const functionButtons = document.querySelectorAll('.function');
    const clearButton = document.querySelector('.clear');
    const equalsButton = document.querySelector('.equals');
    
    function updateDisplay() {
        display.textContent = currentInput;
    }
    
    function appendNumber(number) {
        if (currentInput === '0' || resetScreen) {
            currentInput = '';
            resetScreen = false;
        }
        currentInput += number;
        updateDisplay();
    }
    
    function handleOperator(op) {
        if (operation !== null) calculate();
        operation = op === 'x' ? '*' : op;
        previousInput = currentInput;
        resetScreen = true;
    }
    
    function handleFunction(func) {
        switch(func) {
            case 'sqroot':
                currentInput = Math.sqrt(parseFloat(currentInput)).toString();
                break;
            case '^':
                operation = '^';
                previousInput = currentInput;
                resetScreen = true;
                return;
            case 'mod':
                operation = '%';
                previousInput = currentInput;
                resetScreen = true;
                return;
        }
        updateDisplay();
    }
    
    function clearDisplay() {
        currentInput = '0';
        previousInput = '';
        operation = null;
        updateDisplay();
    }
    
    function calculate() {
        if (operation === null) return;
        
        let result;
        const prev = parseFloat(previousInput);
        const current = parseFloat(currentInput);
        
        switch (operation) {
            case '+':
                result = prev + current;
                break;
            case '-':
                result = prev - current;
                break;
            case '*':
                result = prev * current;
                break;
            case '/':
                result = prev / current;
                break;
            case '^':
                result = Math.pow(prev, current);
                break;
            case '%':
                result = prev % current;
                break;
            default:
                return;
        }
        
        currentInput = result.toString();
        operation = null;
        updateDisplay();
    }
    
    numberButtons.forEach(button => {
        button.addEventListener('click', () => {
            appendNumber(button.textContent);
        });
    });
    
    operatorButtons.forEach(button => {
        button.addEventListener('click', () => {
            handleOperator(button.textContent);
        });
    });
    
    functionButtons.forEach(button => {
        button.addEventListener('click', () => {
            handleFunction(button.textContent);
        });
    });
    
    clearButton.addEventListener('click', clearDisplay);
    equalsButton.addEventListener('click', calculate);
    
    updateDisplay();
});
