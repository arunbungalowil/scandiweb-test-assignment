document.getElementById('productType').addEventListener('change', (event)=>{
    const productSpecific = document.getElementById('product-specific');
    const selectedType = event.target.value;

    productSpecific.innerHTML = '';

    if(selectedType === 'DVD'){
        productSpecific.innerHTML = `
         <div class="form-group">
            <div class="form-field">
                <label for="size">Size (MB)</label>
                <input type="number" id="size" name="size" required>
            </div>
            <div class="error-class">
                <p>Please, provide size.</p>
                <span class="error" id="size-error">Size is required</span>
            </div>   
        </div>
        `;
    }else if(selectedType === 'Book'){
        productSpecific.innerHTML = `
           <div class="form-group">
                <div class="form-field">
                    <label for="weight">Weight (KG)</label>
                    <input type="number" id="weight" name="weight" required>
                </div>
                <div class="error-class">
                    <p>Please, provide weight.</p>
                    <span class="error" id="weight-error">Weight is required</span>
                </div>   
            </div>
    `;
    }else if(selectedType === 'Furniture'){
        productSpecific.innerHTML = `
              <div class="form-group">
                <div class="form-field">
                    <label for="height">Height (CM)</label>
                    <input type="number" id="height" name="height" required>
                </div>
                <div class="error-class">
                    <span class="error" id="height-error">Height is required</span>
                </div>   
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label for="width">Width (CM)</label>
                    <input type="number" id="width" name="width" required>
                </div>
                <div class="error-class">
                    <span class="error" id="width-error">Width is required</span>
                </div>   
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label for="length">Length (CM)</label>
                    <input type="number" id="length" name="length" required>
                </div>
                <div class="error-class">
                    <span class="error" id="length-error">Length is required</span>
                </div>   
            </div>
            <div id="select-informations">
                <p>Please, provide dimensions.</p>
            </div>  
        `;
    }
});