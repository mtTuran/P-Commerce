<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">

            <div class="col-lg-12">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank">Services</a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank">Contact</a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank">About</a>
                    </li>
                
                </ul>
            </div>
        </div>
    </div>
</footer>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    <?php if (isset($_SESSION['update_message'])) {?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('<?php echo $_SESSION['update_message']; ?>');
            <?php
            unset($_SESSION['update_message']);
            } ?>
</script>
   

</body>

</html>