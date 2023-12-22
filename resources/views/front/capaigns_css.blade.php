<style>
    /*list card */
    .list-box {
        border: 1px solid #f0f0f0;
        /*overflow: hidden;*/
        margin-bottom: 20px;
        height: 470px;
        border-radius: 2px;
    }

    .details-box h6 a {
        text-decoration: none;
        color: #303030;
    }

    .details-box h6 {
        margin-top: 15px;
        margin-bottom: 0px;
        font-size: 18px;
    }

    .details-box span {
        display: flex;
        align-items: center;
    }

    .details-box span img {
        width: 85px;
        margin-right: 7px;
    }

    .details-box {
        padding: 8px;
    }

    .details-box p {
        font-size: 16px;
    }

    .img-box {
        height: 268px;
    }

    .details-box span {
        cursor: pointer;
    }

    .details-box .minus,
    .details-box .plus {
        width: 26px;
        height: 26px;
        background: #f2f2f2;
        border-radius: 4px;
        border: 1px solid #ddd;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        font-size: 15px;
    }

    .details-box input {
        height: 26px;
        width: 70px;
        text-align: center;
        font-size: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .progress-tp-head .progress {
        height: 10px;
        border-radius: 20px;

    }

    .progress-tp-head .progress .skill .val {
        float: right;
        font-style: normal;
        margin: 0 20px 0 0;
    }

    .progress-tp-head span {
        display: block;
        position: relative;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        color: #888888;
        line-height: 17px;
        margin-bottom: 5px;
    }

    .progress-tp-head .progress-bar {
        text-align: left;
        border-radius: 20px;
        transition-duration: 3s;
        background-color: #53a92c;
    }

    .with-cart {
        margin: 15px 0px 18px 0px;
    }

    .with-cart,
    .bar-value {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .cart-btn a {
        background-color: #53a92c;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        padding: 4px 10px;
        border-radius: 5px;
        font-weight: 500;
        display: inline-block;
    }

    .cart-btn a:hover {
        background-color: #2f2e67;
        transition: 0.4s;
    }

    .bar-value span b {
        color: #53a92c;
        font-weight: 600;
    }

    /*list card*/


    #description {
        padding: 5px;
        margin: 10px 0;
        color: rgba(0, 0, 0, 0.5);
    }

    #thumbs {
        display: flex;
    }

    #thumbs {
        img {
            height: 100px;
            cursor: pointer;
            margin-right: 10px;
        }
    }

    #thumbs {
        margin-top: 16px;
    }

    .details-left img {
        width: 100%;
    }

    .details-poduct {
        padding-left: 30px;
    }

    .rating img {
        width: 100px;
    }

    .rating {
        color: #7e7a87;
        margin: 16px 0px;
        display: block;
    }

    .details-poduct h1 {
        font-weight: 400;
    }

    .details-poduct h1,
    .details-poduct p {
        color: #4d4d4d;
    }

    .pay {
        font-size: 18px;
        font-weight: 500;
        padding-left: 7px;
    }

    .tree-select ul {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        padding: 0px;
    }

    .tree-select ul li {
        margin-right: 10px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .tree-select .navbar-mini .nav-item .nav-main.active {
        background-color: #4d4d4d;
        color: #fff;
    }

    .tree-select ul li a {
        padding: 8px 19px;
        border: 1px solid #4d4d4d;
        border-radius: 30px;
        text-decoration: none;
        color: #4d4d4d;
        font-weight: 500;
        display: inline-block;
    }

    .tree-select {
        margin-top: 20px;
    }

    .quantity label {
        margin-bottom: 5px;
        display: block;
    }

    .quantity label,
    .tree-select label {
        color: #7e7a87;
    }

    .quantity .minus,
    .quantity .plus {
        width: 45px;
        height: 45px;
        border-radius: 4px;
        border: none;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        font-size: 25px;
        color: #9d9d9d;
    }

    .quantity input {
        height: 45px;
        width: 50px;
        text-align: center;
        font-size: 20px;
        border: none;
        color: #9d9d9d;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .quantity span {
        cursor: pointer;
    }

    .quantity .number {
        display: inline-block;
        border: 1px solid #9d9d9d;
    }

    .hint p {
        margin-bottom: 4px;
        color: #7e7a87;
    }

    .hint {
        margin: 24px 0px;
    }

    .hint p span {
        font-weight: 500;
    }

    .add-card a {
        background-color: #ff6b6b;
        text-decoration: none;
        color: #fff;
        padding: 12px 16px;
        font-weight: 500;
        border-radius: 4px;
        display: inline-block;
        width: 100%;
        text-align: center;
    }


    .acordian-main button.accordion {
        width: 100%;
        border: none;
        outline: none;
        display: flex;
        align-items: center;
        text-align: left;
        padding: 12px 12px 12px 0px;
        font-size: 16px;
        position: relative;
        color: #272727;
        cursor: pointer;
        border-top: 1px solid #eeeeee;
        background-color: transparent;
    }

    .acordian-main .accordion:first-child {
        border-bottom: 1px solid #eeeeee;
    }

    .acordian-main button.accordion:after {
        content: "\f078";
        font-family: "fontawesome";
        font-size: 12px;
        right: 12px;
        color: #4d4d4d;
        position: absolute;
    }

    .accordion svg {
        margin-right: 14px;
    }

    .acordian-main button.accordion.is-open:after {
        content: "\f077";
    }

    .acordian-main .accordion-content {
        padding: 0 1rem;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-in-out;
    }

    .acordian-main .accordion-content p {
        color: #7a7a7a;
        font-weight: 500;
        line-height: 26px;
    }

    .acordian-main label {
        margin: 24px 0px;
        font-size: 18px;
        font-weight: 500;
        color: #4d4d4d;
    }

    .acor-down {
        margin-top: 24px;
        font-weight: 500;
        color: #7a7a7a !important;
        line-height: 28px;
        margin-bottom: 48px;
    }

    .all-peragraph {
        color: #7a7a7a;
        line-height: 26px;
    }

    .trending-today .list-box {
        height: auto;
        border: none;
    }

    .trending-today .list-box h6 {
        margin-top: 0px;
    }

    .trending-today .with-cart {
        margin: 5px 0px;
    }

    .trending-today .with-cart p {
        font-weight: 500;
        font-size: 18px;
    }

    .img-box {
        position: relative;
        overflow: hidden;
    }

    .img-box .hover-switch>img {
        position: absolute;
    }

    .img-box .hover-switch>img:last-of-type {
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
        -moz-transition: opacity 0.3s ease-in-out;
        -webkit-transition: opacity 0.3s ease-in-out;
    }

    .img-box .hover-switch:hover>img:last-of-type {
        opacity: 0;
    }

    .trending-today {
        margin-top: 48px;
    }

    .trending-today h3 {
        margin-bottom: 12px;
    }

    .trand-view {
        text-align: center;
    }

    .trand-view a {
        background-color: #ff6b6b;
        text-decoration: none;
        color: #fff;
        padding: 12px 30px;
        font-weight: 500;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
    }

    .create-forest,
    .social-impact,
    .why-trees,
    .scope {
        margin-top: 48px;
    }

    .scope ul {
        margin-bottom: 0px;
    }

    .scope ul li {
        color: rgb(77, 77, 77);
        line-height: 30px;
    }

    .tree-species {
        margin-top: 48px;
    }

    .why-trees ul {
        margin-bottom: 0px;
    }

    .left-forest ul li,
    .social-impact ul li,
    .why-trees ul li {
        line-height: 28px;
        color: #7a7a7a;
        margin-bottom: 12px;
    }

    .social-impact ul li span,
    .why-trees ul li span {
        font-weight: 500;
    }

    .create-forest {
        background-color: #f5f3ed;
    }

    .left-forest {
        padding: 3rem 5rem;
    }

    .left-forest h3 {
        margin-bottom: 16px;
    }

    .forest-right-img {
        height: 100%;
    }

    .left-forest ul li,
    .left-forest p {
        color: #7a7a7a;
    }
</style>
