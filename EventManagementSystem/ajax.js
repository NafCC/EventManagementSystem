function deleteEvent(id) {

    if (!confirm("Are you sure you want to delete this event?")) {
        return;
    }

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            console.log("Server Response:");
            console.log(this.responseText);

            try {

                var data = JSON.parse(this.responseText);

                if (data.message) {

                    alert(data.message);

                    var row = document.getElementById("event-" + id);

                    if (row) {
                        row.remove();
                    }

                } else if (data.error) {

                    alert(data.error);
                }

            } catch (error) {

                console.log("JSON Error:", error);
                alert("Something went wrong. Check the browser console.");
            }
        }
    };

    xhttp.open("POST", "adminController.php", true);

    xhttp.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );

    xhttp.send("action=delete&id=" + encodeURIComponent(id));
}