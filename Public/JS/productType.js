document.getElementById('productType').addEventListener('change', (event)=>{
    const productSpecific = document.getElementById('product-specific');
    const selectedType = event.target.value;

    productSpecific.innerHTML = '';

    if(selectedType === 'DVD'){
        productSpecific.innerHTML = `
       <div class="form-group">
            <label for="size">Size (MB)</label>
            <input type="number" id="size" name="size" required>
            <p>Please, provide size.</p>
        </div>
        `;
    }else if(selectedType === 'Book'){
        productSpecific.innerHTML = `
        <div class="form-group">
            <label for="weight">Weight (KG)</label>
            <input type="number" id="weight" name="weight" required>
            <p>Please, provide weight.</p>
        </div>
    `;
    }else if(selectedType === 'Furniture'){
        productSpecific.innerHTML = `
            <div class="form-group">
                <label for="height">Height (CM)</label>
                <input type="number" id="height" name="height" required>
            </div>
            <div class="form-group">
                <label for="width">Width (CM)</label>
                <input type="number" id="width" name="width" required>
            </div>
            <div class="form-group">
                <label for="length">Length (CM)</label>
                <input type="number" id="length" name="length" required>
            </div>
            <p>Please, provide dimensions.</p>
        `;
    }
});