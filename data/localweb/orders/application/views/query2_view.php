<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
        /* (Task 3.1) Alex: Clear styling of elements in a given screen */
        h1 { text-align: center; font-size: 2em; font-family: 'Open Sans Light', sans-serif; color: purple; font-weight: 500;}
        h2 { text-align: center; font-size: 1.5em; font-family: 'Open Sans', sans-serif; color: purple; font-weight: 500;}
        p.p-centre { text-align: center; font-size: 1em; font-family: 'Open Sans', sans-serif; }


        table.mytable { box-shadow:0 4px 6px 0 hsla(0,0%,0%,0.2); border-collapse: collapse;}
        table.mytable td, th { font-family: 'Open Sans', sans-serif; border: 1px solid hsl(220, 12%, 95%); padding: 5px 15px 2px 7px;}
        th { color: #562c56; font-family: 'Open Sans', sans-serif; font-size: 1em; background: hsl(220, 12%, 95%);}		
        
        button { font-family: 'Open Sans', sans-serif; font-size: 0.9em; border: 0px solid; padding: 5px 10px 5px; border-radius: 6px; transition-duration: 0.2s;}
        button:hover { background: purple; color: white; transition-duration: 0.1s; cursor: pointer;}
    
        /* (Task 3.4) Alex: Added tooltip CSS to hide the tooltip text (use .tooltiptext class to use tooltips) */
        .tooltip {
            display:inline-block;
            position:relative;
            text-align:left;
            border-bottom: 1px dotted purple;
            font-family: 'Open Sans', sans-serif;
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

        /* Grid styling for "?" next to Header2. */
        .Header__Grid { display: grid; grid-template-columns: auto auto; justify-items: center; justify-content: center; }
        .Header__Text { padding: 10px; }
        .Header__Tooltip { padding: 17px 0 20px 0; }

        h2 { display: inline; }
    </style>
</head>
<body>

<h1>Queries</h1>
<div align='center'>
    <p class="p-centre">
        Here you can view pre-defined queries regarding profits and earnings.
    </p>
    <button type="submit" onclick="location.href='<?php echo site_url('main/query1')?>'">Profits From Films</button>
    <button type="submit" onclick="location.href='<?php echo site_url('main/query2')?>'">Profits From Bookings</button>
    <button type="submit" onclick="location.href='<?php echo site_url('main/query3')?>'">Profits From Performances</button>
</div>
<div class="Header__Grid">
    <div class="Header__Text">
        <h2>Profits From Bookings</h2>
    </div>
    <div class="Header__Tooltip">
        <a class="tooltip">?<span class="bottom">This Query polls the number of seats in a given booking, and multiplies the value by the price of admission into the corresponding Cinema screen.</span></a>
    </div>
</div>
<div align='center'>
    <?php
        $tmpl = array ('table_open' => '<table class="mytable">');
        $this->table->set_template($tmpl); 
        
        $this->db->query('drop table if exists temp');
        $this->db->query('create temporary table temp as 
        (select b.id AS "Booking ID", b.seats AS "Number of Seats", CONCAT("£", ROUND(s.price/100*b.seats, 2)) AS "Booking Profits" 
        FROM booking b 
        JOIN performance p ON (b.performance = p.id) 
        JOIN screen s ON (p.screen = s.screen) 
        group by b.id)');
        $query = $this->db->query('select * from temp;');
        echo $this->table->generate($query);
    ?>
</div>
</body>
</html>
