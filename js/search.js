jQuery.noConflict();
(
    function($) {
        const url = {
            search: 'include/search_process.php'
        };

        $("#search_form").submit(function(e){
            e.preventDefault();
            var search_select = document.getElementById("search_select").value;
            var search_text = document.getElementById("search_input").value;
            var action = search_select;

            function generate_block_table(json_data, table_tail){
                var table_total = "";
                const table_header_block = "<div class=\"card mb-3\">\n" +
                    "          <div class=\"card-header\">\n" +
                    "            <i class=\"fas fa-table\"></i>\n" +
                    "            Search result</div>\n" +
                    "          <div class=\"card-body\">\n" +
                    "            <div class=\"table-responsive\">\n" +
                    "              <div id=\"dataTable_wrapper\" class=\"dataTables_wrapper dt-bootstrap4\"><div class=\"row\"><div class=\"col-sm-12 col-md-6\"><div class=\"dataTables_length\" id=\"dataTable_length\"><label>Show <select name=\"dataTable_length\" aria-controls=\"dataTable\" class=\"custom-select custom-select-sm form-control form-control-sm\"><option value=\"10\">10</option><option value=\"25\">25</option><option value=\"50\">50</option><option value=\"100\">100</option></select> entries</label></div></div><div class=\"col-sm-12 col-md-6\"><div id=\"dataTable_filter\" class=\"dataTables_filter\"><label>Search:<input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"\" aria-controls=\"dataTable\"></label></div></div></div><div class=\"row\"><div class=\"col-sm-12\"><table class=\"table table-bordered dataTable\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\" role=\"grid\" aria-describedby=\"dataTable_info\" style=\"width: 100%;\">\n" +
                    "                <thead>\n" +
                    "                  <tr role=\"row\"><th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Name: activate to sort column descending\" style=\"width: 144px;\">Name</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"People: activate to sort column ascending\" style=\"width: 144px;\">People</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Apply: activate to sort column ascending\" style=\"width: 106px;\">Apply</th></tr>\n" +
                    "                </thead>\n" +
                    "                <tbody>";
                table_total = table_header_block;
                for(var i = 0; i < json_data["length"];++i) {
                    var table_row =  "                  <tr role=\"row\" class=\"odd\">\n" +
                        "                    <td class=\"sorting_1\">"+ json_data[i]["block_name"] +"</td>\n" +
                        "                    <td>"+json_data[i]["COUNT(uid)"]+"</td>\n" +
                        "                    <td>apply link</td>\n" +
                        "                   </tr>";
                    table_total += table_row;
                }

                table_total += table_tail;
                return table_total;
            }

            function generate_thread_table(json_data, table_tail){
                var table_total = "";
                const table_header_thread = "<div class=\"card mb-3\">\n" +
                    "          <div class=\"card-header\">\n" +
                    "            <i class=\"fas fa-table\"></i>\n" +
                    "            Search result</div>\n" +
                    "          <div class=\"card-body\">\n" +
                    "            <div class=\"table-responsive\">\n" +
                    "              <div id=\"dataTable_wrapper\" class=\"dataTables_wrapper dt-bootstrap4\"><div class=\"row\"><div class=\"col-sm-12 col-md-6\"><div class=\"dataTables_length\" id=\"dataTable_length\"><label>Show <select name=\"dataTable_length\" aria-controls=\"dataTable\" class=\"custom-select custom-select-sm form-control form-control-sm\"><option value=\"10\">10</option><option value=\"25\">25</option><option value=\"50\">50</option><option value=\"100\">100</option></select> entries</label></div></div><div class=\"col-sm-12 col-md-6\"><div id=\"dataTable_filter\" class=\"dataTables_filter\"><label>Search:<input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"\" aria-controls=\"dataTable\"></label></div></div></div><div class=\"row\"><div class=\"col-sm-12\"><table class=\"table table-bordered dataTable\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\" role=\"grid\" aria-describedby=\"dataTable_info\" style=\"width: 100%;\">\n" +
                    "                <thead>\n" +
                    "                  <tr role=\"row\"><th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Name: activate to sort column descending\" style=\"width: 144px;\">Name</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Owner: activate to sort column ascending\" style=\"width: 144px;\">Owner</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"LastMessage: activate to sort column ascending\" style=\"width: 244px;\">LastMessage</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Time: activate to sort column ascending\" style=\"width: 128px;\">Time</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"ViewMsg: activate to sort column ascending\" style=\"width: 106px;\">ViewMsg</th></tr>\n" +
                    "                </thead>\n" +
                    "                <tbody>";

                table_total = table_header_thread;

                //thread_name, author, textbody, timestamp
                for(var i = 0; i < json_data["length"]; ++i) {
                    var table_row = "                  <tr role=\"row\" class=\"odd\">\n" +
                        "                    <td class=\"sorting_1\">"+ json_data[i]["thread_name"] +"</td>\n" +
                        "                    <td>"+json_data[i]["author"]+"</td>\n" +
                        "                    <td>"+json_data[i]["textbody"]+"</td>\n" +
                        "                    <td>"+json_data[i]["timestamp"]+"</td>\n" +
                        "                    <td>view msg</td>\n" +
                        "                   </tr>";
                    table_total += table_row;
                }

                table_total += table_tail;
                return table_total;
            }

            function generate_friend_table(json_data, table_tail){
                var table_total = "";
                const table_header_friend = "<div class=\"card mb-3\">\n" +
                    "          <div class=\"card-header\">\n" +
                    "            <i class=\"fas fa-table\"></i>\n" +
                    "            Search result</div>\n" +
                    "          <div class=\"card-body\">\n" +
                    "            <div class=\"table-responsive\">\n" +
                    "              <div id=\"dataTable_wrapper\" class=\"dataTables_wrapper dt-bootstrap4\"><div class=\"row\"><div class=\"col-sm-12 col-md-6\"><div class=\"dataTables_length\" id=\"dataTable_length\"><label>Show <select name=\"dataTable_length\" aria-controls=\"dataTable\" class=\"custom-select custom-select-sm form-control form-control-sm\"><option value=\"10\">10</option><option value=\"25\">25</option><option value=\"50\">50</option><option value=\"100\">100</option></select> entries</label></div></div><div class=\"col-sm-12 col-md-6\"><div id=\"dataTable_filter\" class=\"dataTables_filter\"><label>Search:<input type=\"search\" class=\"form-control form-control-sm\" placeholder=\"\" aria-controls=\"dataTable\"></label></div></div></div><div class=\"row\"><div class=\"col-sm-12\"><table class=\"table table-bordered dataTable\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\" role=\"grid\" aria-describedby=\"dataTable_info\" style=\"width: 100%;\">\n" +
                    "                <thead>\n" +
                    "                  <tr role=\"row\"><th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Name: activate to sort column descending\" style=\"width: 144px;\">Name</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Block: activate to sort column ascending\" style=\"width: 244px;\">Block</th><th class=\"sorting\" tabindex=\"0\" aria-controls=\"dataTable\" rowspan=\"1\" colspan=\"1\" aria-label=\"Msg: activate to sort column ascending\" style=\"width: 106px;\">Msg</th></tr>\n" +
                    "                </thead>\n" +
                    "                <tbody>";
                table_total = table_header_friend;

                for(var i = 0; i < json_data["length"]; ++i) {
                    var table_row = "                  <tr role=\"row\" class=\"odd\">\n" +
                        "                    <td class=\"sorting_1\">"+ json_data[i]["unickname"] +"</td>\n" +
                        "                    <td>"+json_data[i]["block_name"]+"</td>\n" +
                        "                    <td>msg</td>\n" +
                        "                   </tr>";
                    table_total += table_row;
                }

                table_total += table_tail;
                return table_total;
            }

            $.ajax({
                url: url.search,
                type: 'post',
                data:{
                    action: action,
                    search_text: search_text
                }
            }).done(function(res){
                const table_tail = "                </tbody>\n" +
                    "\n" +
                    "              </table>\n" +
                    "              </div>\n" +
                    "              </div>\n" +
                    "              </div>\n" +
                    "            </div>\n" +
                    "          </div>\n" +
                    "        </div>";

                res = JSON.parse(res);
                document.getElementById("content-wrapper").innerHTML = "";
                switch (search_select) {
                    case "Block": document.getElementById("content-wrapper").innerHTML = generate_block_table(res, table_tail); break;
                    case "Thread": document.getElementById("content-wrapper").innerHTML = generate_thread_table(res, table_tail); break;
                    case "Friend": document.getElementById("content-wrapper").innerHTML = generate_friend_table(res, table_tail); break;
                    default: break;
                }
            }).fail(function(){

            });
        });
    }
)(jQuery);