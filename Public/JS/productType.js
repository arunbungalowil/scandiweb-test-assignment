document.getElementById('productType').addEventListener('change', (event)=>{
    const productSpecific = document.getElementById('product-specific');
    const selectedType = event.target.value;

    productSpecific.innerHTML = '';

    if(selectedType === 'DVD'){
        productSpecific.innerHTML = `
         <div class="form-group">
            <div class="form-field">
                <label for="size">Size (MB)</label>
                <input type="number" id="size" name="size" placeholder ="Please provide  size in number">
            </div>
            <div class ="select-informations" id = "info">
                <p>Please, provide size.</p>
            </div>
            <div class="error-class">
                <span class="error" id="size-error">Please, submit required data</span>
                <?php if(!empty($errors['size'])) {echo $errors['size']; } ?>

            </div>   
        </div>
        `;
    }else if(selectedType === 'Book'){
        productSpecific.innerHTML = `
           <div class="form-group">
                <div class="form-field">
                    <label for="weight">Weight (KG)</label>
                    <input type="number" id="weight" name="weight" placeholder ="Please provide  weight in number" >
                </div>
                <div class ="select-informations" id = "info">
                   <p>Please, provide weight.</p>
                </div>
                <div class="error-class">     
                    <span class="error" id="weight-error">Please, submit required data</span>
                    <?php if(!empty($errors['weight'])) {echo $errors['weight']; } ?>

                </div>   
            </div>
    `;
    }else if(selectedType === 'Furniture'){
        productSpecific.innerHTML = `
              <div class="form-group">
                <div class="form-field">
                    <label for="height">Height (CM)</label>
                    <input type="number" id="height" name="height" placeholder ="Please provide height in number" >
                </div>
                <div class="error-class">
                    <span class="error" id="height-error">Please, submit required data</span>
                    <?php if(!empty($errors['height'])) {echo $errors['height']; } ?>

                </div>   
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label for="width">Width (CM)</label>
                    <input type="number" id="width" name="width" placeholder ="Please provide width in number">
                </div>
                <div class="error-class">
                    <span class="error" id="width-error">Please, submit required data</span>
                    <?php if(!empty($errors['width'])) {echo $errors['width']; } ?>

                </div>   
            </div>

            <div class="form-group">
                <div class="form-field">
                    <label for="length">Length (CM)</label>
                    <input type="number" id="length" name="length" placeholder ="Please provide length in number">
                </div>
                <div class="error-class">
                    <span class="error" id="length-error">Please, submit required data</span>
                    <?php if(!empty($errors['length'])) {echo $errors['length']; } ?>
                </div>   

                <div class ="select-informations" id = "info">
                    <p>Please, provide dimensions.</p>
                </div> 
            </div>
         
        `;
    }
});