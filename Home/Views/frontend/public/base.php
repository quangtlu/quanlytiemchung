<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
:root {
    --primary-color: #2e3091;
    --red-color: #ed1b23;
}

html {
    box-sizing: border-box;
    font-size: 62.5%;
    font-family: 'SF Pro Display', sans-serif;
}

* {
    margin: 0;
    padding: 0;
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

input {
    font-size: 1.4rem !important;
}

.form-message {
    font-size: 1.4rem;
    color: #ed1b23;
}

.border-radius {
    border-radius: 8px 8px 8px 0
}

.invalid-feedback {
    font-size: 14px;
}

.header {
    background: linear-gradient(133deg, #ed1b23, #2e3091, #2d3192) !important;
    color: #fff;
    height: 78px;
    display: flex;
    align-items: center;
}

.header-nav-list {
    display: flex;
    list-style: none;
    justify-content: space-between;
}

.header-nav-list-item__link {
    color: #fff;
    font-size: 1.6rem;
    text-decoration: none;
}

.header-nav-list-item__link:hover {
    text-decoration: none;
    color: #fff;
}

.log {
    background-color: #fff;
    color: var(--primary-color);
    padding: 7px 10px;
    border: 1px solid #fff;
    font-weight: 500;
}

.log:hover {
    color: #fff;
    background-color: var(--primary-color);
    border-color: #fff;
}

.custom-control {
    margin-top: 35px;
    display: flex;
    justify-content: center;
    transform: translateX(30px);
    font-size: 1.4rem;
}

.custom-control-label {
    padding-left: 10px;
}

.register-modal {
    height: 100%;
}

.register-content {
    padding: 35px;
}

.button {
    text-align: center;
    border: 0;
    color: #fff;
    font-size: 1.4rem;
    padding: 5px 35px;
    width: auto;
    cursor: pointer;
    outline: none;
    height: 42px;
    border-radius: 8px 8px 8px 0;

}

.cancel-btn {
    background-color: #ed1b23;
    border: 1px solid #ed1b23;

}

.register-btn {
    background-color: #2e3091;
    border: 1px solid #2e3091;
}

.register-btn:hover {
    color: #2e3091;
    background-color: #fff;
}

.cancel-btn:hover {
    color: #ed1b23;
    background-color: #fff;
}

.register-content__heading {
    text-align: center;
    font-size: 2.5rem;
}

.form-label {
    margin-top: 25px;
    font-size: 1.5rem;
    font-weight: 500;
}

input {
    font-size: 1.4rem;
    padding: 5px;
}

.button-wrap {
    margin-top: 40px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.footer-clean {
    padding: 50px 0;
    background-color: #2d2188;
    color: #fff;
}

.footer-clean h3 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: bold;
    font-size: 16px;
}

.footer-clean ul {
    padding: 0;
    list-style: none;
    line-height: 1.6;
    font-size: 14px;
    margin-bottom: 0;
}

.footer-clean ul a {
    color: inherit;
    text-decoration: none;
    opacity: 0.8;
}

.footer-clean ul a:hover {
    opacity: 1;

}

:hover {
    transition: all 0.2s;
}

.footer-clean .item.social {
    text-align: right;
}

@media (max-width:767px) {
    .footer-clean .item {
        text-align: center;
        padding-bottom: 20px;
    }
}

@media (max-width: 768px) {
    .footer-clean .item.social {
        text-align: center;
    }
}

.footer-clean .item.social>a {
    font-size: 24px;
    width: 40px;
    height: 40px;
    line-height: 40px;
    display: inline-block;
    text-align: center;
    border-radius: 50%;
    border: 1px solid #ccc;
    margin-left: 10px;
    margin-top: 22px;
    color: inherit;
    opacity: 0.75;
}

.footer-clean .item.social>a:hover {
    opacity: 0.9;
}

@media (max-width:991px) {
    .footer-clean .item.social>a {
        margin-top: 40px;
    }
}

@media (max-width:767px) {
    .footer-clean .item.social>a {
        margin-top: 10px;
    }
}

.footer-clean .copyright {
    margin-top: 14px;
    margin-bottom: 0;
    font-size: 13px;
    opacity: 0.6;
}

.login-wrap {
    width: 437px;
    display: block;
    margin: 0 auto;
}

.hopital-icon {
    font-size: 5rem;
    text-align: center;
    color: var(--primary-color);
    padding: 20px 0;
    display: block;
}

label {
    font-size: 1.5rem;
}

.forgot-password {
    color: red;
    margin: 15px 0px;
    display: block;
    text-decoration: none;
    font-size: 1.4rem;
    font-weight: bold;
}

.forgot-password:hover {
    color: var(--primary-color);
    text-decoration: none;
}

input {
    font-size: 1.4rem !important;
    border-radius: 8px;
    box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.05);
}

.offer-register {
    margin-top: 30px;
    font-size: 1.4rem;
}

.link-to-register {
    color: red;
}

.link-to-register:hover {
    color: var(--primary-color);
    font-weight: bold;
    text-decoration: none;
}

.login-btn {
    display: block;
    text-align: center;
    border: 0;
    background-color: var(--primary-color);
    color: #fff;
    font-size: 1.5rem;
    padding: 10px 25px;
    width: auto;
    cursor: pointer;
    outline: none;
    margin-left: 150px;

}

.login-btn:hover {
    background-color: var(--red-color);
}

.register-content__heading {
    color: var(--primary-color);
}

select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 10px);
    font-size: 1.4rem;
    width: 100%;

}

.require {
    color: red;
}

optgroup {
    font-size: 1.4rem;
}

.tiensubenh {
    display: flex;
    justify-content: space-between;
}

#tracuu {
    position: relative;
    cursor: pointer;
}

#tracuu:hover .lookup-list {
    display: block;
}

#tracuu::after {
    content: "";
    width: 50px;
    height: 20px;
    position: absolute;
    top: 20px;
    left: 0;
}

.lookup-list {
    display: none;
    list-style: none;
    position: absolute;
    background-color: #fff;
    z-index: 10;
    top: 30px;
    width: 180px;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);

}

.lookup-item__link {
    color: #000;
    display: block;
    font-size: 1.3rem;
    padding: 10px 0;
    font-weight: 500;
}

.lookup-item__link:hover {
    text-decoration: none;
    color: var(--primary-color);
}

#success-alert {
    font-size: 1.4rem;
    width: fit-content;
    right: 10px;
    z-index: 99;
    position: absolute;
    animation: fadeInDown 0.5s linear;
    font-weight: 500;
    border-radius: 3px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}
</style>