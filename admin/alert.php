<style>
@-webkit-keyframes shake-vertical {

    0%,
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }

    10%,
    30%,
    50%,
    70% {
        -webkit-transform: translateY(-8px);
        transform: translateY(-8px);
    }

    20%,
    40%,
    60% {
        -webkit-transform: translateY(8px);
        transform: translateY(8px);
    }

    80% {
        -webkit-transform: translateY(6.4px);
        transform: translateY(6.4px);
    }

    90% {
        -webkit-transform: translateY(-6.4px);
        transform: translateY(-6.4px);
    }
}

@keyframes shake-vertical {

    0%,
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }

    10%,
    30%,
    50%,
    70% {
        -webkit-transform: translateY(-8px);
        transform: translateY(-8px);
    }

    20%,
    40%,
    60% {
        -webkit-transform: translateY(8px);
        transform: translateY(8px);
    }

    80% {
        -webkit-transform: translateY(6.4px);
        transform: translateY(6.4px);
    }

    90% {
        -webkit-transform: translateY(-6.4px);
        transform: translateY(-6.4px);
    }
}


.message {

    -webkit-animation: shake-vertical 0.8s cubic-bezier(0.455, 0.03, 0.515, 0.955) both;
    animation: shake-vertical 0.8s cubic-bezier(0.455, 0.03, 0.515, 0.955) both;
    text-align: center;
    box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2) !important;
    background: #b00020 !important;
    color: white;
    margin-top: 14px;
    border-radius: 0px !important;
    padding: 10px;
    margin-bottom: 15px;


}

</style>


<?php if(isset($_SESSION['status']) && $_SESSION['status'] !='') :?>


<div class="message">
    <h3><?php echo $_SESSION['status'];
              unset($_SESSION['status'])
         ?>
    </h3>

</div>





<?php endif; ?>
