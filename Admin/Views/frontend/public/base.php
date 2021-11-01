<!-- Custom styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<?php $this->view('frontend.public.template.css.style')?>







<style>
html {
    box-sizing: border-box;
    scroll-behavior: smooth;
    
}

* {
    margin: 0;
    padding: 0;
    transition: all linear 0.1s;
    scroll-behavior: smooth;

}

:root {
    --animate-duration: 1s;
}

*,
*:before,
*:after {
    box-sizing: border-box;
}

input,
textarea,
select,
button {
    outline: none;
}

input {
    line-height: normal;
}

label,
button {
    cursor: pointer;
}

a {
    text-decoration: none;
}

img {
    display: block;
    max-width: 100%;
}

.tableFixHead          
{ overflow: auto; height: 480px; }
.tableFixHead thead th 
{ position: sticky; top: -1px; z-index: 1; background-color: #17a2b8;}

.row-content:hover {
    background-color: #ccc;
    color: #000;
}

.editRemove {
    display: flex;
    justify-content: space-between;
}

tbody{
    text-align: center;
    font-size: 13px;
}
thead {
    text-align: center;
    font-size: 13px;
    background-color: #17a2b8;
    color:#fff;
}


.control {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.removeBtn {
    color: red;
    cursor: pointer;
}

.removeBtn:hover {
    font-weight: bold;
}

.editBtn {
    color: #007bff;
    cursor: pointer;

}

.editBtn:hover {
    color: blue;
}


.close-btn {
    color: red;
    float: right;
    font-size: 25px;
    margin-right: 20px;
    margin-top: 10px;
    cursor: pointer;
}

.valid-feedback {
    font-size: 16px !important;
}

label {
    font-weight: bold;
}

.list-group-item {
    line-height: 1.5;
}

.createBtn {
    margin: 10px;
}

.table td {
    text-align: center !important;
}

.check-btn {
    font-size: 1.4rem;
    color: forestgreen;
}

.check-btn:hover {
    font-weight: bold;
}

#success-alert {
    font-size: 14px;
    z-index: 99;
    width: fit-content;
    right: 20px;
    position: absolute;
    animation: fadeInDown 0.5s linear;
    box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
}

.sidebar-icon {
    padding-right: 10px;
}

.wrap-title-icon {
    display: flex;
    color: #007bff;


}

.head-title {
    padding-right: 10px;
    text-transform: uppercase;
    font-family: Gill Sans, Verdana;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.chart-pie{
    width: 500px !important;
    height: 500px !important;

}
.ignore{
    display: none;
    animation: fadeIn linear 0.5s;
}
#table:hover .ignore{
    display: block;
    transition: all linear 0.2s;
}



</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>