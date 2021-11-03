function databaseinfo(database) {
    $.ajax({
        type: "GET",
        url: "selects/databaseinfo.php",
        data: "database=" + database, // serializes the form's elements.
        //  when it is a sucsess so this with the data it got back
        success: function(data)
        {
             // higher the questions value so next form knows when to update and when to insert
             html = "";
             htmltable = `<thead><tr><th scope="col">Tablename</th><th></th><th></th></tr></thead>`;
             json = JSON.parse(data);

             for (const element of json) {
                 html += "<a href='javascript:void(0);' class='db_container_data' onclick='databasetableinfo(`" + element + "`);'>"+ element +"</a>";

                 htmltable += `
                 <tr>
                    <td> <input type="text" id="table_`+ element +`" value="`+ element +`"></td>
                    <td>
                        <button type='button' id='btnUpdate_`+ element +`' onclick="updateTable('`+ element +`', '`+ database +`')">Update</button>
                    </td>
                    <td>
                        <button type='button' id='btnDelete'>Delete</button>
                    </td>

                </tr>
                 `;
            }
            $( "#container_" + database ).html(html);
            $( "#dbtable").html(htmltable);
            if ($("#container_" + database).css('display') == 'none')
            {
                $('div[id^="container_"]').css('display', 'none');
                $( "#container_" + database ).toggle();
            }else {
                $('div[id^="container_"]').css('display', 'none');
            }
        }
    });
}
function updateTable(tableelement, dbname){
    $.ajax({
        type: "GET",
        url: "selects/tableupdate.php",
        data: "table=" + tableelement + "&newName=" + document.getElementById("table_" + tableelement).value, // serializes the form's elements.
        //  when it is a sucsess so this with the data it got back
        success: function(data)
        {
             // higher the questions value so next form knows when to update and when to insert
            console.log(data);
            databaseinfo(dbname);
            $( "#container_" + dbname ).toggle();
        }
    });
}
function databasetableinfo(tableelement){
    console.log(tableelement);
    $.ajax({
        type: "GET",
        url: "selects/tableinfo.php",
        data: "table=" + tableelement, // serializes the form's elements.
        //  when it is a sucsess so this with the data it got back
        success: function(data)
        {
             // higher the questions value so next form knows when to update and when to insert
             htmltable = `<thead><tr>`;
             json = JSON.parse(data);
            console.log(json);
            //  for (const element of json) {
            //     htmltable += `
            //         <th>Tablename</th>`;
            //  }
            //  htmltable += `</tr></thead>`;
            //  for (const element of json) {
            //      html += "<a href='javascript:void(0);' class='db_container_data' onclick='databasetableinfo(`" + element + "`);'>"+ element +"</a>";

            //      htmltable += `
            //      <tr>
            //         <td>`+ element +`</td>
            //         <td>
            //             <button type='button' id='btnUpdate'>Update</button>
            //         </td>
            //         <td>
            //             <button type='button' id='btnDelete'>Delete</button>
            //         </td>

            //     </tr>
            //      `;
            // }
            // $( "#container_" + database ).html(html);
            // $( "#dbtable").html(htmltable);
            // if ($("#container_" + database).css('display') == 'none')
            // {
            //     $('div[id^="container_"]').css('display', 'none');
            //     $( "#container_" + database ).toggle();
            // }else {
            //     $('div[id^="container_"]').css('display', 'none');
            // }
        }
    });
}