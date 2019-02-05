<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
            integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/"
            crossorigin="anonymous"></script>
    <style>
        {
            box-sizing: border-box
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h1 {
            text-align: center;
            color: navy;
        }

        /*Style the header */
        header {
            background-color: RoyalBlue;
            padding: 20px;
            text-align: center;
            width: 100%


        }

        /* Create two columns/boxes that floats next to each other */
       

        /* Style the list inside the menu */
       

        /* Clear floats after the columns */
        section:after {
            content: "";
            display: table;
            clear: both;
        }


        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: PowderBlue;
        }

        th {
            border: 3px solid black;
            text-align: center;
            padding: 8px;
            background-color: lightblue;

        }

        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: lightblue;
        }


        .button {
            border-radius: 8px;
            font-size: 20px;
            width: 200px;
            background-color:#2e8b57;
            border:3px solid black;
            padding: 15px 15px 5px 5px;
            position:relative;
            margin-top:30%;
            color:black;
            float:right;
        }
        
        .form {
            float: left;
        }

        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {
            nav {
                width: 100%;
                height: auto;


            }
        }
    </style>
</head>
<body>


<h1><b>Sales Report</b></h1>
<header>
    <form>

        <b>Date From:</b><input style="margin-right: 40px" type="date" name="from" id="dateFrom">
        <b>Date To:</b><input type="date" name="to" id="dateTo">

    </form>


</header>

<section>
    <div id="container">
       
        <div id="tableToPrint">
            <table id="myTable">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Total Sales</th>
                </tr>
                </thead>
                <tbody id="tableBody">

                </tbody>
            </table>
        </div>
     
      
    </div>
</section>


<button onclick="getReportFunction()" class="button ">Submit</button>
<button class="button" onclick="printReport()">Print</button>


    <script>
        function getReportFunction() {
            let dateFrom = document.getElementById("dateFrom").value;
            let dateTo = document.getElementById("dateTo").value;

            console.log(dateFrom);
            console.log(dateTo);

            var tbody = "";

            let total = 0;
            let quantity = 0;

            $.ajax({
                type: "POST",
                url: "http://localhost/basic/web/site/sreport ",
                data: {'dateFrom': dateFrom, 'dateTo': dateTo},
                success: function (data) {
                    var data1 = JSON.parse(data).result;
                    console.log(data1);
                    data1.forEach(function (item) {
                        total += parseInt(item.Total);
                        quantity += parseInt(item.Quantity);
                        tbody += "<tr>" +
                            "<td>" + item.Date + "</td>" +
                            "<td>" + item.Product_Id + "</td>" +
                            "<td>" + item.Quantity + "</td>" +
                            "<td>" + item.Total + "</td>"
                            + "</tr>";
                    });
                    tbody += "<tr>" +
                        "<td></td>" +
                        "<td></td>" +
                        "<td>Quantity = " + quantity + "</td>" +
                        "<td>Total = " + total + "</td>"
                        + "</tr>";
                    $('#myTable tbody').html(tbody);
                },
            });
        }

        function printReport() {
            let doc = new jsPDF();
            let elementHandler = {
                '#tableToPrint': function (element, renderer) {
                    return true;
                }

            };
            let source = window.document.getElementById("tableToPrint");
            doc.fromHTML(
                source,
                15,
                15,
                {
                    'width': 30, 'elementHandlers': elementHandler
                });
            doc.output("dataurlnewwindow");
        }
    </script>
</body>
</html>