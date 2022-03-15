<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
        /* CSS provided with the example (slightly edited) */
        h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
        p.p-centre { text-align: center; font-size: 1em; font-family: 'Open Sans', sans-serif; }
        #nav { width: 100%; float: center; margin: 0 0 1em 0; padding: 0; list-style: none;}
        #cogs { display: block; padding-top: 20px; margin-left: auto; margin-right: auto; }
        
        /* (Task 3.4) Alex: Added tooltip CSS to hide the tooltip text (use .tooltiptext class to use tooltips) */
        .tooltip {
            display:inline-block;
            position:relative;
            text-align:left;
            border-bottom: 1px dotted purple;
            cursor: default;
        }

        .tooltip .bottom {
            min-width:200px; 
            top:35px;
            left:50%;
            transform:translate(-50%, 0);
            padding:10px 20px;
            color:#444444;
            background-color:#EEEEEE;
            font-size: 0.75em;
            border-radius:8px;
            position:absolute;
            z-index:1;
            box-sizing:border-box;
            box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2);
            visibility:hidden; opacity:0; transition:opacity 0.3s;
        }

        .tooltip:hover .bottom {
            visibility:visible; opacity:1;
        }
        /* END OF TASK 3.4 */

        /* two-tone div for styling */
        .footer__container {
            background: hsl(0, 0%, 97%);
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 10px 0 0 0;
        }

    </style>
    <title>Home</title>
</head>
<body>

<main>
    <h1>MICE Cinemas</h1>

    <p class="p-centre">You are <?php 
        if($_SESSION && $_SESSION["loggedin"] === 1){
            echo " a " . $_SESSION["role"] . ".";
        }else{
            echo " not logged in.";
        }
        ?>
    </p>
    <p class="p-centre">
    <?php 
        if($_SESSION && $_SESSION["loggedin"]){
            echo "<ul class='nav'><li><a class='button' href='" . site_url('main/login') . "'>Signout</a></li>";
        }else{
            echo "<ul class='nav'><li><a class='button' href='" . site_url('main/login') . "'>Login</a></li>" . "<li><a class='button' href='" . site_url('main/register') . "'>Register</a></li>";
        }
        ?>
    </p>
</main>

</body>
</html>
