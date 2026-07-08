<script>
document.addEventListener("DOMContentLoaded", function () {

    const search = document.getElementById("search");
    const result = document.getElementById("search-result");

    search.addEventListener("keyup", function () {

        let value = this.value;

        if (value.trim() == "") {
            result.innerHTML = "";
            return;
        }

        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                result.innerHTML = this.responseText;
            }
        };

        xhr.open("GET", "search.php?search=" + encodeURIComponent(value), true);
        xhr.send();
    });

});
</script>