$(document).ready(function() {
            $("#tabs").tabs();
            $("#acordeon_1").accordion({
                header: "h3"
            });
            $("#acordeon_2").accordion({
                header: "h3"
            });
            $("#acordeon_3").accordion({
                header: "h3"
            });
            $( "#fnac" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#fecha" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
        });