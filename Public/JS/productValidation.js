// Clear all the errror messages.
const errorDivs = document.querySelectorAll('.error');
function clearErrors(collections) {
    collections.forEach(e => {
        e.style.display = 'none';
    });
}

// Clear the error messages of the dynamically loaded content.
function clearDynamicFieldErrors(){
    document.getElementById('productType').addEventListener('change', function(){
        const dynamicInputsErrors = document.querySelectorAll('#product-specific input');
        dynamicInputsErrors.forEach(function(inputElement) {
            const dynamicInputError = document.getElementById(`${inputElement.id}-error`);
            dynamicInputError.style.display = 'none';
        });
    });
}


// Function for validating the dynamically added content.
function validateDynamicFields() {
    let isValid = true;
    const dynamicInputs = document.querySelectorAll('#product-specific input');
    const info = document.getElementById('info');
    console.log(info);

    dynamicInputs.forEach(function(inputElement) {
        const dynamicInputError = document.getElementById(`${inputElement.id}-error`);
        const inputElementValue = inputElement.value.trim();
        if (inputElementValue === ''|| inputElementValue <= 0 ) {
            isValid = false;
            dynamicInputError.style.display = 'block';
            info.style.display = 'none';
        } else {
            dynamicInputError.style.display = 'none';
        }
    });

    return isValid;
}

clearErrors(errorDivs); 
clearDynamicFieldErrors();

// Basic form validation
document.getElementById('product_form').addEventListener('submit', function(event){

    let isValid = true;
    const sku = document.getElementById('sku').value.trim();
    const name = document.getElementById('name').value.trim();
    const price = document.getElementById('price').value.trim();
    const productType = document.getElementById('productType').value.trim();
    if(sku === ''){
        isValid = false;
        document.getElementById('sku-error').style.display = 'block';
    }else{
        isValid = true;
        document.getElementById('sku-error').style.display = 'none';

    }
    if(name === '' || name.length <= 2){
        isValid = false;
        document.getElementById('name-error').style.display = 'block';
    }else{
        isValid = true;
        document.getElementById('name-error').style.display = 'none';

    }
    if(price === '' || isNaN(price) || price <= 0){
        isValid = false;
        document.getElementById('price-error').style.display = 'block';
    }else{
        isValid = true;
        document.getElementById('price-error').style.display = 'none';

    }
    if(productType === ''){
        isValid = false;
        document.getElementById('productType-error').style.display = 'block';
    }else{
        isValid = true;
        document.getElementById('productType-error').style.display = 'none';

    }
    
    if (!validateDynamicFields()) {
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});


