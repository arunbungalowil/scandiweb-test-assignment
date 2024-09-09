<footer>
    <hr>
    <p>Scandiweb Test assignment</p>
</footer>

<?php if (isset($includeJs) && $includeJs): ?>
    <script src="/JS/productType.js"></script>
    <script src="/JS/productValidation.js"></script>
    <script>
        document.getElementById('cancel-button').addEventListener('click', function() {
            window.location.href = 'App/Views/partials/ViewProducts.php'; 
        });
    </script>
<?php endif; ?>
<?php
    if(!empty($includeDeleteJs)): ?>
         <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="/JS/deleteProduct.js"></script>
    <?php endif; ?>
</body>
</html>
